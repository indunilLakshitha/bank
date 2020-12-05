<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\DepositePeriod;
use App\Models\DepositeType;
use App\Models\FdInterestType;
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
        $product_details=$data = DB::select("
        SELECT DISTINCT

        sub_accounts.*,
        intereset_type_data.from_value,
        intereset_type_data.to_value,
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

        WHERE sub_accounts.id LIKE '%$request->code%'
        AND sub_accounts.is_enable = 1
        ");
        return response()->json($product_details);
    }
}
