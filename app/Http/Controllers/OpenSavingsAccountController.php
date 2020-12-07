<?php

namespace App\Http\Controllers;

use App\AccountGeneralInformation;
use App\Models\AccountGeneralInformation as ModelsAccountGeneralInformation;
use App\Models\AuthorizedOfficer;
use App\Models\BeneficiaryData;
use App\Models\Branch;
use App\Models\Joinaccount;
use App\Models\JoinaccountMember;
use App\Models\NomineeMember;
use App\Models\ProductData;
use App\Models\ProductDocument;
use App\Models\ProductFeeData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerBasicData;
use App\Models\GuardianData;
use App\Models\ProductType;
use App\Models\SubAccount;

class OpenSavingsAccountController extends Controller
{
    public function get_cus_details(Request $request)
    {

        $data = DB::table('customer_basic_data')
            ->leftJoin('branches', 'branches.id', 'customer_basic_data.branch_id')
            ->leftJoin('customer_status_dates', 'customer_status_dates.customer_id', 'customer_basic_data.customer_id')
            ->leftJoin('members', 'members.customer_id', 'customer_basic_data.customer_id')
            ->where('customer_basic_data.identification_type_id', $request->identification_type_id)
            ->where('customer_basic_data.identification_number', $request->identification_number)
            ->where('customer_basic_data.is_enable', 1)
            ->where('customer_basic_data.status', 1)
            ->where('customer_basic_data.branch_id', Auth::user()->branh_id)
            ->select('customer_basic_data.customer_id', 'branches.branch_code', 'customer_basic_data.full_name', 'customer_status_dates.date_of_birth', 'customer_basic_data.branch_id', 'members.share_amount')
            ->first();
        // $data = DB::select("
        // SELECT customer_basic_data.customer_id FROM customer_basic_data

        // LEFT JOIN branches
        // ON branches.id = customer_basic_data.branch_id

        // LEFT JOIN customer_status_dates
        // ON customer_status_dates.customer_id = customer_basic_data.customer_id

        // WHERE customer_basic_data.identification_type_id = '$request->identification_type_id'
        // AND customer_basic_data.identification_number = '$request->identification_number'
        // ");
        return response()->json($data);
    }

    public function get_cus_details_by_name(Request $request)
    {
        $data = DB::table('customer_basic_data')
            ->where('customer_basic_data.full_name', $request->full_name)
            ->leftJoin('branches', 'branches.id', 'customer_basic_data.branch_id')
            ->leftJoin('customer_status_dates', 'customer_status_dates.customer_id', 'customer_basic_data.customer_id')
            ->first();
        return response()->json($data);
    }

    public function get_guardian(Request $request)
    {
        $customer_id = DB::table('customer_basic_data')
            ->where('customer_basic_data.identification_type_id', $request->identification_type_id)
            ->where('customer_basic_data.identification_number', $request->identification_number)
            ->first()
            ->customer_id;

        $guradian_id = DB::table('guardian_data')->where('customer_id', $customer_id)->first()->guardian_id;

        $data = DB::table('customer_basic_data')
            ->where('customer_basic_data.customer_id', $guradian_id)
            ->leftJoin('address_data', 'address_data.customer_id', 'customer_basic_data.customer_id')
            ->get();


        return response()->json($data);
    }

    public function submitAll(Request $request)
    {

        $details['has_passbook'] = '1';
        $acc = AccountGeneralInformation::create($request->all());

        if ($request->file('cus_sign_img')) {
            $image = $request->file('cus_sign_img');
            $path = '/images/';
            $acc->cus_sign_img = time() . rand() . '.' . $image->extension();
            $image->move(public_path($path), $acc->cus_sign_img);
        }
        $acc->save();

        $prod_data = ProductData::create($request->all());

        return 123;
    }

    # MUST HAVE request->text  ---------------------------------------------------------
    public function search_by_full_name(Request $request)
    {
        // return response()->json($request);
        $req_type = intval($request->type);
        //saving account open query
        if($req_type == 1 ) {
            $sql = "SELECT DISTINCT
                        cbd.customer_id, cbd.full_name, cbd.id, cbd.identification_number, cbd.non_member, cbd.member,
                        csd.date_of_birth, b.branch_code, m.share_amount, 0.00 AS 'account_balance', '-' AS 'account_number'
                    FROM customer_basic_data AS cbd
                    INNER JOIN branches AS b ON b.id = cbd.branch_id
                    INNER JOIN customer_status_dates AS csd ON csd.customer_id = cbd.customer_id
                    LEFT JOIN members AS m ON m.customer_id = cbd.customer_id
                    WHERE cbd.full_name LIKE '%$request->text%' AND cbd.is_enable = 1 AND cbd.status != 3";
        } else {
            $sql = "SELECT DISTINCT
            cbd.customer_id, cbd.full_name, cbd.id, cbd.identification_number, cbd.non_member, cbd.member,
            csd.date_of_birth, b.branch_code, m.share_amount, agi.account_balance, agi.account_number
        FROM customer_basic_data AS cbd
        INNER JOIN branches AS b ON b.id = cbd.branch_id
        INNER JOIN account_general_information AS agi ON agi.customer_id = cbd.customer_id
        INNER JOIN customer_status_dates AS csd ON csd.customer_id = cbd.customer_id
        LEFT JOIN members AS m ON m.customer_id = cbd.customer_id
        WHERE cbd.full_name LIKE '%$request->text%' AND cbd.is_enable = 1 AND cbd.status != 3";
        }
        $user_role_id = intval(Auth::user()->roles[0]->id);
        $branch_id = Auth::user()->branh_id;
        if($user_role_id != 1) {
            $sql .= " cbd.branch_id = ". $branch_id;
        }
        $data = DB::select($sql);

        return response()->json($data);

        // return response()->json($data);
    }
    public function search_by_full_name_mem(Request $request)
    {
        $data = CustomerBasicData::leftjoin('customer_status_dates','customer_status_dates.customer_id','customer_basic_data.customer_id')
                                    ->leftjoin('branches','branches.id','customer_basic_data.branch_id')
                                    ->distinct('customer_basic_data.customer_id','customer_basic_data.full_name','customer_basic_data.id',
                                    'customer_basic_data.identification_number','customer_basic_data.non_member','customer_status_dates.date_of_birth',
                                    'branches.branch_code')
                                    ->where('full_name',$request->text)
                                    ->where('customer_basic_data.is_enable',1)
                                    ->where('customer_basic_data.status',1)
                                    ->where('member',0)
                                    ->get();

        return response()->json($data);
    }

    public function search_by_customer_id_mem(Request $request)
    {

        $data = CustomerBasicData::leftjoin('customer_status_dates','customer_status_dates.customer_id','customer_basic_data.customer_id')
                                    ->leftjoin('branches','branches.id','customer_basic_data.branch_id')
                                    ->leftjoin('account_general_information','account_general_information.customer_id','customer_basic_data.customer_id')
                                   ->distinct('customer_basic_data.customer_id','customer_basic_data.full_name','customer_basic_data.id',
                                    'customer_basic_data.identification_number','customer_basic_data.non_member','customer_status_dates.date_of_birth',
                                    'branches.branch_code')
                                    ->where('customer_basic_data.customer_id',$request->text)
                                    ->where('customer_basic_data.is_enable',1)
                                    ->where('customer_basic_data.status',1)
                                    ->where('member',0)
                                    ->get();

        return response()->json($data);
    }
    public function search_by_customer_id(Request $request)
    {
        // return $request;
        $req_type = intval($request->type);
        if($req_type == 1 ) {
            $sql = "SELECT DISTINCT
                        cbd.customer_id, cbd.full_name, cbd.id, cbd.identification_number, cbd.non_member, cbd.member,
                        csd.date_of_birth, b.branch_code, m.share_amount, 0.00 AS 'account_balance', '-' AS 'account_number'
                    FROM customer_basic_data AS cbd
                    INNER JOIN branches AS b ON b.id = cbd.branch_id
                    INNER JOIN customer_status_dates AS csd ON csd.customer_id = cbd.customer_id
                    LEFT JOIN members AS m ON m.customer_id = cbd.customer_id
                    WHERE cbd.customer_id LIKE '%$request->text%' AND cbd.is_enable = 1 AND cbd.status != 3";
        } else {
            $sql = "SELECT DISTINCT
            cbd.customer_id, cbd.full_name, cbd.id, cbd.identification_number, cbd.non_member, cbd.member,
            csd.date_of_birth, b.branch_code, m.share_amount, agi.account_balance, agi.account_number
        FROM customer_basic_data AS cbd
        INNER JOIN branches AS b ON b.id = cbd.branch_id
        INNER JOIN account_general_information AS agi ON agi.customer_id = cbd.customer_id
        INNER JOIN customer_status_dates AS csd ON csd.customer_id = cbd.customer_id
        LEFT JOIN members AS m ON m.customer_id = cbd.customer_id
        WHERE cbd.customer_id LIKE '%$request->text%' AND cbd.is_enable = 1 AND cbd.status != 3";
        }

        $user_role_id = intval(Auth::user()->roles[0]->id);
        $branch_id = Auth::user()->branh_id;
        if ($user_role_id != 1) {
            $sql .= " cbd.branch_id = " . $branch_id;
        }
        $data = DB::select($sql);
        return response()->json($data);
    }

    public function search_by_nic_id(Request $request)
    {
        // return $request;
        $req_type = intval($request->type);
        if($req_type == 1 ) {
            $sql = "SELECT DISTINCT
                        cbd.customer_id, cbd.full_name, cbd.id, cbd.identification_number, cbd.non_member, cbd.member,
                        csd.date_of_birth, b.branch_code, m.share_amount, 0.00 AS 'account_balance', '-' AS 'account_number'
                    FROM customer_basic_data AS cbd
                    INNER JOIN branches AS b ON b.id = cbd.branch_id
                    INNER JOIN customer_status_dates AS csd ON csd.customer_id = cbd.customer_id
                    LEFT JOIN members AS m ON m.customer_id = cbd.customer_id
                    WHERE cbd.identification_number LIKE '%$request->text%' AND cbd.is_enable = 1 AND cbd.status != 3";
        } else {
            $sql = "SELECT DISTINCT
                        cbd.customer_id, cbd.full_name, cbd.id, cbd.identification_number, cbd.non_member, cbd.member,
                        csd.date_of_birth, b.branch_code, m.share_amount, agi.account_balance, agi.account_number
                    FROM customer_basic_data AS cbd
                    INNER JOIN branches AS b ON b.id = cbd.branch_id
                    INNER JOIN account_general_information AS agi ON agi.customer_id = cbd.customer_id
                    INNER JOIN customer_status_dates AS csd ON csd.customer_id = cbd.customer_id
                    LEFT JOIN members AS m ON m.customer_id = cbd.customer_id
                    WHERE cbd.identification_number LIKE '%$request->text%' AND cbd.is_enable = 1 AND cbd.status != 3";
        }

        $user_role_id = intval(Auth::user()->roles[0]->id);
        $branch_id = Auth::user()->branh_id;
        if($user_role_id != 1) {
            $sql .= " cbd.branch_id = ". $branch_id;
        }
        $data = DB::select($sql);
        return response()->json($data);
    }

    public function search_by_name(Request $request)
    {

        $data = DB::select("
        SELECT * FROM customer_basic_data
        WHERE full_name LIKE '%$request->other_holder_name%'
        OR name_in_use LIKE '%$request->other_holder_name%'
        OR surname LIKE '%$request->other_holder_name%'
        ");
        return response()->json($data);
    }



    public function client_details(Request $request)
    {
        $details = $request;
        $details['created_by'] = Auth::user()->id;
        $details['is_enable'] = 1;
        $acc = AccountGeneralInformation::create($request->all());

        // if ($request->file('cus_sign_img')) {
        //     $image = $request->file('cus_sign_img');
        //     $path = '/images/';
        //     $acc->cus_sign_img = time() . rand() . '.' . $image->extension();
        //     $image->move(public_path($path), $acc->cus_sign_img);
        // }
        $acc->save();

        $account_id = $acc->id;
        // $diposits ??
        // $acc_levels ??

        return view('savings.3_product_details', compact('account_id'));
    }



    public function product_details(Request $request)
    {
        $prod_data = ProductData::create($request->all());


        $product_type=SubAccount::where('id',$prod_data->product_type_id)->first();

         $request->session()->put('is_beneficiearies_required',$product_type->is_beneficiearies_required);
         $request->session()->put('is_guardianes_required',$product_type->is_guardianes_required);
         $request->session()->put('is_nominies_required',$product_type->is_nominies_required);
         $request->session()->put('is_documents_required',$product_type->is_documents_required);

        $customer_id = AccountGeneralInformation::find($request->account_id)->customer_id;
        $prod_id = $prod_data->id;
         $account_id = $request->account_id;


        $cus_id = AccountGeneralInformation::find($request->account_id)->customer_id;
        $all_customers = CustomerBasicData::all();


        if($product_type->is_guardianes_required==1){

            $guard = $product_type->is_guardianes_required;
            $nomin = $product_type->is_nominies_required;
            $docum = $product_type->is_documents_required;
            $benef = $product_type->is_beneficiearies_required;

            $branch_code=CustomerBasicData::leftjoin('branches','branches.id','customer_basic_data.branch_id')
            ->where('customer_basic_data.customer_id',$customer_id)
            ->select('branches.branch_code')
            ->get();
             $cus_count = '0000' .$account_id ;
              $cus_id = substr($cus_count, -3);
               $account_number=$customer_id.'-'.$cus_id;
            //    $account_number=$branch_code[0]->branch_code.'-'.$cus_id;

            AccountGeneralInformation::where('id', $account_id)->update(['status' => '2','account_number'=>$account_number]);

            $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
            return view('members.5_benificiaries', compact('cus_id', 'docum','guard','nomin','account_id', 'prod_id', 'all_customers', 'benef','acc_no'))->with('success', 'Details submitted');

        }
        // }else if($product_type->is_guardianes_required==1){

        //     $account_id = $request->account_id;
        //     $prod_id = $request->prod_id;
        //     $guard = $product_type->is_guardianes_required;
        //     $nomin = $product_type->is_nominies_required;
        //     $docum = $product_type->is_documents_required;
        //     $benef = $product_type->is_beneficiearies_required;
        //     $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
        //     $guardians = DB::table('guardian_data')->where('customer_id', $request->customer_id)->get();
        //     return view('savings.6_guardian_information', compact('cus_id', 'benef','acc_no', 'docum','guard', 'all_customers','nomin','guardians', 'account_id', 'customer_id', 'prod_id'));


        // }else if($product_type->is_documents_required ==1){


        //     $docs = DB::table('documents')->get();
        //     $account_id = $request->account_id;
        //     $customer_id = $request->customer_id;
        //     $prod_id = $request->prod_id;
        //     return view('savings.7_documents', compact('docs', 'account_id', 'customer_id', 'prod_id'));

        // }else if($product_type->is_nominies_required ==1){

        //     $account_id = $request->account_id;
        //     $customer_id = $request->customer_id;
        //     $prod_id = $request->prod_id;
        //     $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
        //     return view('savings.9_nominee_instruction', compact('account_id', 'customer_id', 'prod_id', 'acc_no'));



        // }
        else {
            $branch_code=CustomerBasicData::leftjoin('branches','branches.id','customer_basic_data.branch_id')
            ->where('customer_basic_data.customer_id',$customer_id)
            ->select('branches.branch_code')
            ->get();
             $cus_count = '0000' .$account_id ;
              $cus_id = substr($cus_count, -3);
               $account_number=$customer_id.'-'.$cus_id;

            AccountGeneralInformation::where('id', $account_id)->update(['status' => '2','account_number'=>$account_number]);

            return redirect('/savings/open')->with('success','Account Created Successsfully');
        }

    }

    public function benificiaries(Request $request)
    {


        $prod_id = $request->prod_id;
        $account_id = $request->account_id;
        $customer_id = $request->customer_id;
        $is_joint_account = AccountGeneralInformation::find($request->account_id)->account_type_id == 2;

        if ($is_joint_account) {

            $guard = $request->guard;
            $nomin = $request->nomin;
            $docum = $request->docum;
            $benef = $request->benef;

            $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
            return view('savings.4_joint_acoount', compact('customer_id', 'prod_id', 'account_id', 'prod_id', 'docum','guard','nomin','acc_no'));
        } else {

        if(($request->guard == 1) && ($request->benef == 0)){

            $account_id = $request->account_id;
            $customer_id = $request->customer_id;
            $prod_id = $request->prod_id;
            $guard = $request->guard;
            $nomin = $request->nomin;
            $docum = $request->docum;
            $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
            $guardians = DB::table('guardian_data')->where('customer_id', $request->customer_id)->get();
            return view('savings.6_guardian_information', compact('guardians', 'account_id', 'customer_id', 'prod_id', 'docum','guard','nomin','acc_no'));

        }else if($request->docum ==1){

            $account_id = $request->account_id;
            $customer_id = $request->customer_id;
            $prod_id = $request->prod_id;
            $guard = $request->guard;
            $nomin = $request->nomin;
            $docum = $request->docum;
            $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
            $docs = DB::table('documents')->get();
            $account_id = $request->account_id;
            $customer_id = $request->customer_id;
            $prod_id = $request->prod_id;
            return view('savings.7_documents', compact('docs', 'account_id', 'customer_id', 'prod_id',  'docum','guard','nomin','acc_no'));


        }else if($nomin = $request->nomin ==1){

            $account_id = $request->account_id;
            $customer_id = $request->customer_id;
            $prod_id = $request->prod_id;
            $guard = $request->guard;
            $nomin = $request->nomin;
            $docum = $request->docum;
            $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
            return view('savings.9_nominee_instruction', compact('account_id', 'customer_id', 'prod_id',  'docum','guard','nomin','acc_no'));
        }else{

        }

    }
}

    public function create_join_account(Request $request)
    {

        $j_acc = Joinaccount::create($request->all());

        return response()->json($j_acc);
    }

    public function add_mem_join_account(Request $request)
    {

        $mem = JoinaccountMember::create($request->all());

        if ($request->file('other_holder_sign_img')) {
            $image = $request->file('other_holder_sign_img');
            $path = '/images/';
            $mem->other_holder_sign_img = time() . rand() . '.' . $image->extension();
            $image->move(public_path($path), $mem->other_holder_sign_img);
        }
        $mem->save();

        $j_acc = Joinaccount::find($request->join_account_id);
        $j_acc->holders_count++;
        $j_acc->save();
    }

    public function checkout(Request $request){

        $prod_id = $request->product_data_id;
        $account_id = $request->account_id;
        $customer_id = $request->customer_id;





        if(($request->guard == 1) && ($request->benef == 0)){

            $account_id = $request->account_id;
            $customer_id = $request->customer_id;
            $prod_id = $request->prod_id;
            $guard = $request->guard;
            $nomin = $request->nomin;
            $docum = $request->docum;
            $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
            $guardians = DB::table('guardian_data')->where('customer_id', $request->customer_id)->get();
            return view('savings.6_guardian_information', compact('guardians', 'account_id', 'customer_id', 'prod_id', 'docum','guard','nomin','acc_no'));

        }else if($request->docum ==1){

            $account_id = $request->account_id;
            $customer_id = $request->customer_id;
            $prod_id = $request->prod_id;
            $guard = $request->guard;
            $nomin = $request->nomin;
            $docum = $request->docum;
            $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
            $docs = DB::table('documents')->get();
            $account_id = $request->account_id;
            $customer_id = $request->customer_id;
            $prod_id = $request->prod_id;
            return view('savings.7_documents', compact('docs', 'account_id', 'customer_id', 'prod_id', 'prod_id', 'docum','guard','nomin','acc_no'));


        }else if($nomin = $request->nomin ==1){

            $account_id = $request->account_id;
            $customer_id = $request->customer_id;
            $prod_id = $request->prod_id;
            $guard = $request->guard;
            $nomin = $request->nomin;
            $docum = $request->docum;
            $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
            return view('savings.9_nominee_instruction', compact('account_id', 'customer_id', 'prod_id',  'docum','guard','nomin','acc_no'));
        }else{

        }



    }
    // public function guradian_information(Request $request)
    // {
    //     $account_id = $request->account_id;
    //     $customer_id = $request->customer_id;
    //     $prod_id = $request->prod_id;
    //     $guardians = DB::table('guardian_data')->where('customer_id', $request->customer_id)->get();
    //     return view('savings.6_guardian_information', compact('guardians', 'account_id', 'customer_id', 'prod_id'));
    // }



    public function getDocs(Request $request)
    {
        $account_id = $request->account_id;
        $customer_id = $request->customer_id;
        $prod_id = $request->product_data_id;



        if($request->docum ==1 ){

            $docs = DB::table('documents')->get();

            $account_id = $request->account_id;
            $customer_id = $request->customer_id;
            $prod_id = $request->product_data_id;
            $guard = $request->guard;
            $nomin = $request->nomin;
            $docum = $request->docum;
             $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
            return view('savings.7_documents', compact('docs', 'account_id', 'customer_id', 'prod_id', 'docum','guard','nomin','acc_no'));

        }else if($nomin = $request->nomin ==1){
            $account_id = $request->account_id;
            $customer_id = $request->customer_id;
            $prod_id = $request->product_data_id;
            $guard = $request->guard;
            $nomin = $request->nomin;
            $docum = $request->docum;
            $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
            return view('savings.9_nominee_instruction', compact('account_id', 'customer_id', 'prod_id',  'docum','guard','nomin','acc_no'));
        }else {

        }
    }

    public function save_documents(Request $request)
    {


        $prod = ProductDocument::create($request->all());
        $image = $request->file('img');
        $path = '/images/';
        $prod->img = time() . rand() . '.' . $image->extension();
        $image->move(public_path($path), $prod->img);
        $prod->save();

        return response()->json($request);
    }

//     public function tax_details(Request $request)
//     {
//         $account_id = $request->account_id;
//         $customer_id = $request->customer_id;
//         $prod_id = $request->product_data_id;
//         $f_details = DB::table('fee_details')->get();
//         $f_types = DB::table('fee_types')->get();
//         $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;


//         $productData = ProductData::where('id',$prod_id)->first();
//         $checkAccess = ProductType::where('id',$productData->product_type_id)->first();

//         if($checkAccess->is_nominies_required==1){

//             $account_id = $request->account_id;
//             $customer_id = $request->customer_id;
//             $prod_id = $request->        $prod_id = $request->product_data_id;
// ;
//             $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
//             return view('savings.9_nominee_instruction', compact('account_id', 'customer_id', 'prod_id', 'acc_no'));

//         }else {


//             return view('savings.8_tax_details', compact('account_id', 'customer_id', 'prod_id', 'f_details', 'f_types','acc_no'));


//         }
//     }
    // public function tax_details_view(Request $request)
    // {
    //     $account_id = $request->account_id;
    //     $customer_id = $request->customer_id;
    //     $prod_id = $request->product_data_id;
    //     $f_details = DB::table('fee_details')->get();
    //     $f_types = DB::table('fee_types')->get();
    //     $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;

    //     return view('savings.8_tax_details', compact('account_id', 'customer_id', 'prod_id', 'f_details', 'f_types','acc_no'));



    // }

    // public function add_tax(Request $request)
    // {

    //     ProductFeeData::create($request->all());
    //     return response()->json($request);
    // }

    public function nominee(Request $request)
    {

        $account_id = $request->account_id;
        $customer_id = $request->customer_id;
        $prod_id = $request->prod_id;
        $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;
        $account_id = $request->account_id;
            $customer_id = $request->customer_id;
            $prod_id = $request->product_data_id;
            $guard = $request->guard;
            $nomin = $request->nomin;
            $docum = $request->docum;

        return view('savings.9_nominee_instruction', compact('account_id', 'customer_id', 'prod_id', 'acc_no', 'docum','guard','nomin'));
    }


    public function add_nominee(Request $request)
    {

        $n = NomineeMember::create($request->all());
        $n->created_by = Auth::user()->name;
        $n->save();
        return response()->json($request);
    }

    // public function autorized_officers(Request $request)
    // {

    //     $account_id = $request->account_id;
    //     $customer_id = $request->customer_id;
    //     $prod_id = $request->prod_id;



    //     return view('savings.11_authorized_officer', compact('account_id', 'customer_id', 'prod_id'));
    // }

    // public function add_officer(Request $request)
    // {

    //     AuthorizedOfficer::create($request->all());
    //     return response()->json($request);
    // }
    public function finish_open_account_saving(Request $request)
    {

        AccountGeneralInformation::where('account_number', $request->account_number)->update(['status' => '2']);
        $take = AccountGeneralInformation::where('account_number', $request->account_number)->first();
        // $first = Auth::user()->branch;
        // $second = $take->customer_id;

        return redirect('/savings/open');

    }


    public function viewSavingAccount(Request $request)
    {

        $view_1 = AccountGeneralInformation::where('customer_id', $request->id)->first();
        $view_1_1 = CustomerBasicData::where('customer_id', $request->id)->first();
        $view_2 = ProductData::where('account_id', $view_1->id)->first();
        $view_3 = Joinaccount::where('customer_id', $request->id)->first();
        $view_4 = DB::table('guardian_data')->where('customer_id', $request->customer_id)->get();
        $view_5 = ProductDocument::where('customer_id', $request->id)->get();
        $view_5_1 = BeneficiaryData::leftjoin('customer_basic_data', 'customer_basic_data.customer_id', 'beneficiary_data.customer_id')
            ->where('beneficiary_data.customer_id', $request->id)->get();
        $view_5_2 = GuardianData::leftjoin('customer_basic_data', 'customer_basic_data.customer_id', 'guardian_data.customer_id')
            ->where('guardian_data.customer_id', $request->id)->get();
        $view_6 = ProductFeeData::where('customer_id', $request->id)->get();
        $view_7 = NomineeMember::where('customer_id', $request->id)->get();
        $view_8 = Joinaccount::where('customer_id', $request->id)->get();
        $view_8_1 = JoinaccountMember::where('customer_id', $request->id)->get();
        $idtypes = DB::table('iedentification_types')->get();
        $CIF = count(DB::table('account_general_information')->get()) + 1;
        $acc_no = 'ACC' . $CIF;

        // return response()->json($view_2);
        return view('savings.view_details.view_account', compact('view_1', 'view_1_1', 'view_2', 'view_3', 'view_4', 'view_5','view_5_1','view_5_2', 'view_6', 'view_7', 'view_8', 'view_8_1', 'idtypes', 'CIF', 'acc_no'));
    }
}
