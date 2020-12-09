<?php

namespace App\Http\Controllers;

use App\Models\AccountGeneralInformation;
use App\Models\Branch;
use App\Models\CustomerBasicData;
use App\Models\DepositePeriod;
use App\Models\DepositeType;
use App\Models\FdAccountGeneralInformation;
use App\Models\FdInterestType;
use App\Models\FdInvestor;
use App\Models\FdNominee;
use App\Models\SubAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FdAccountController extends Controller
{
    public function index(){
         $branch=Branch::where('id',Auth::user()->branh_id)->first();
         $deposite_types=DepositeType::where('is_enable',1)->get();
         $interest_types=FdInterestType::where('is_enable',1)->get();
         $deposite_periods=DepositePeriod::where('is_enable',1)->get();
        return view('fd.index',compact('branch','deposite_types','interest_types','deposite_periods'));
    }

    public function findProduct(Request $request){
        // return response()->json($request);

        $product_details=$data = DB::select("
        SELECT DISTINCT

        sub_accounts.*,
        intereset_type_data.from_value,
        intereset_type_data.to_value,
        intereset_type_data.amount,
        deposite_types.deposite_type,
        fd_interest_types.fd_interest_type,
        fd_sub_accounts.deposite_type_id,
        fd_sub_accounts.fd_interest_type_id

        FROM sub_accounts

        LEFT JOIN intereset_schemas
        ON intereset_schemas.sub_account_id = sub_accounts.id

        LEFT JOIN intereset_type_data
        ON intereset_type_data.interest_schema_id = intereset_schemas.id

        LEFT JOIN fd_sub_accounts
        ON fd_sub_accounts.sub_account_id = sub_accounts.id

        LEFT JOIN deposite_types
        ON deposite_types.id = fd_sub_accounts.deposite_type_id

        LEFT JOIN fd_interest_types
        ON fd_interest_types.id = fd_sub_accounts.fd_interest_type_id

        WHERE sub_accounts.schema_code LIKE '%$request->code%'
        AND sub_accounts.is_enable = 1
        ");
        return response()->json($product_details);
    }

    public function findProductByName(Request $request){
        // return response()->json($request);

        $product_details=$data = DB::select("
        SELECT DISTINCT

        sub_accounts.*,
        intereset_type_data.from_value,
        intereset_type_data.to_value,
        intereset_type_data.amount,
        deposite_types.deposite_type,
        fd_interest_types.fd_interest_type,
        fd_sub_accounts.deposite_type_id,
        fd_sub_accounts.fd_interest_type_id

        FROM sub_accounts

        LEFT JOIN intereset_schemas
        ON intereset_schemas.sub_account_id = sub_accounts.id

        LEFT JOIN intereset_type_data
        ON intereset_type_data.interest_schema_id = intereset_schemas.id

        LEFT JOIN fd_sub_accounts
        ON fd_sub_accounts.sub_account_id = sub_accounts.id

        LEFT JOIN deposite_types
        ON deposite_types.id = fd_sub_accounts.deposite_type_id

        LEFT JOIN fd_interest_types
        ON fd_interest_types.id = fd_sub_accounts.fd_interest_type_id

        WHERE sub_accounts.sub_account_description LIKE '%$request->code%'
        AND sub_accounts.is_enable = 1
        ");
        return response()->json($product_details);
    }

    public function createFd(Request $request){

        $id=FdAccountGeneralInformation::all()->count();
        $branch_code=Branch::where('id',$request->branch_id)->first()->branch_code;
        $c=$id+1;
             $cus_count = '0000' .$c ;
              $cus_id = substr($cus_count, -3);
               $fd_id='FD-'.$request->customer_id.'-'.$cus_id;

        $fd=$request;
        $fd['account_id']=$fd_id;
        $fd_account=FdAccountGeneralInformation::create($fd->all());
        return response()->json($fd_account);
    }

    public function findInvester(Request $request){
        $investers =DB::select("
        SELECT DISTINCT *

        FROM customer_basic_data

        WHERE customer_basic_data.name_in_use LIKE '%$request->text%'
        AND customer_basic_data.is_enable = 1
        ");
        return response()->json($investers);
    }

    public function addInvester(Request $request){

        $inv=CustomerBasicData::where('customer_id',$request->text)->first();
        $invester=$request;
        $invester['fd_account_id']=$request->fdod;
        $invester['customer_id']=$request->text;
        // $invester['investor_full_name']=$inv->
        // $invester['investor_nic_number']=$inv->
        // $invester['investor_mobile_number']=$inv->
        // $invester['investor_email_address']=$inv->
        // $invester['investor_address']=$inv->
        // $invester['is_enable']=$inv->
        // $invester['created_by']=$inv->
        // $invester['updated_by']=$inv->

        FdInvestor::create($invester->all());
        $investers=FdInvestor::where('fd_account_id',$request->fdod)->get();
        return response()->json($investers);
    }

    public function findNominee(Request $request){
        $nominees =DB::select("
        SELECT DISTINCT *

        FROM customer_basic_data

        WHERE customer_basic_data.name_in_use LIKE '%$request->text%'
        AND customer_basic_data.is_enable = 1
        ");
        return response()->json($nominees);
    }

    public function addNominee(Request $request){

        $inv=CustomerBasicData::where('customer_id',$request->text)->first();
        $invester=$request;
        $invester['fd_account_id']=$request->fdod;
        $invester['customer_id']=$request->text;
        // $invester['investor_full_name']=$inv->
        // $invester['investor_nic_number']=$inv->
        // $invester['investor_mobile_number']=$inv->
        // $invester['investor_email_address']=$inv->
        // $invester['investor_address']=$inv->
        // $invester['is_enable']=$inv->
        // $invester['created_by']=$inv->
        // $invester['updated_by']=$inv->

        FdNominee::create($invester->all());
        $investers=FdNominee::where('fd_account_id',$request->fdod)->get();
        return response()->json($investers);
    }

    public function findSavings(Request $request){

        $acc=AccountGeneralInformation::where('customer_id',$request->text)->get();

        return response()->json($acc);
    }
    public function verify(){
         return view('fd.verification.index');

    }
    public function view(Request $request){

        $branch=Branch::where('id',Auth::user()->branh_id)->first();
         $deposite_types=DepositeType::where('is_enable',1)->get();
         $interest_types=FdInterestType::where('is_enable',1)->get();
         $deposite_periods=DepositePeriod::where('is_enable',1)->get();
         $fD = FdAccountGeneralInformation::leftjoin('customer_basic_data', 'customer_basic_data.customer_id', 'fd_account_general_information.customer_id')
                                        ->leftjoin('branches', 'branches.id', 'fd_account_general_information.branch_id')
                                        ->where('fd_account_general_information.account_id',$request->id)->first();

        $fd_ins = FdInvestor::where('fd_account_id',$request->id)->get();
        $fd_ns = FdNominee::where('fd_account_id',$request->id)->get();
         return view('fd.verification.view',compact('branch','fD','deposite_types','interest_types','deposite_periods','fd_ins','fd_ns'));

    }

    public function verification(Request $request){

        $findFD = FdAccountGeneralInformation::where('account_id',$request->id)->first();
        $findFD->status=1;
        $findFD->save();

        return redirect('/verify');

    }
public function removeNominee(Request $request){
    FdNominee::find($request->text)->delete();

    $investers=FdNominee::where('fd_account_id',$request->fdod)->get();

    return response()->json($investers);
}
public function removeInvestor(Request $request){

    FdInvestor::find($request->text)->delete();

    $investers=FdInvestor::where('fd_account_id',$request->fdod)->get();
return response()->json($investers);
}


public function findByFullName(Request $request){
    // return response()->json($request);
    $product_details=$data = DB::select("
    SELECT DISTINCT *

    FROM users

    WHERE users.name LIKE '%$request->text%'
    AND users.status = 1
    ");
    return response()->json($product_details);
}


}
