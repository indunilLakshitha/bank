<?php

namespace App\Http\Controllers;

use App\AccountGeneralInformation;
use App\Models\AccountGeneralInformation as ModelsAccountGeneralInformation;
use App\Models\AuthorizedOfficer;
use App\Models\BeneficiaryData;
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


class OpenSavingsAccountController extends Controller
{
    public function get_cus_details(Request $request)
    {

        $data = DB::table('customer_basic_data')
            ->leftJoin('branches', 'branches.id', 'customer_basic_data.branch_id')
            ->leftJoin('customer_status_dates', 'customer_status_dates.customer_id', 'customer_basic_data.customer_id')
            ->where('customer_basic_data.identification_type_id', $request->identification_type_id)
            ->where('customer_basic_data.identification_number', $request->identification_number)
            ->select('customer_basic_data.customer_id', 'branches.branch_code', 'customer_basic_data.full_name', 'customer_status_dates.date_of_birth', 'customer_basic_data.branch_id')
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
        // return $request;
        $data = DB::select("
        SELECT * FROM customer_basic_data

        LEFT JOIN branches
        ON branches.id = customer_basic_data.branch_id

        LEFT JOIN customer_status_dates
        ON customer_status_dates.customer_id = customer_basic_data.customer_id

        WHERE full_name LIKE '%$request->text%'
        ");

        return response()->json($data);
    }
    public function search_by_customer_id(Request $request)
    {
        // return $request;
        $data = DB::select("
        SELECT * FROM customer_basic_data

        LEFT JOIN branches
        ON branches.id = customer_basic_data.branch_id

        LEFT JOIN customer_status_dates
        ON customer_status_dates.customer_id = customer_basic_data.customer_id

        WHERE customer_basic_data.customer_id LIKE '%$request->text%'
        ");

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

        if ($request->file('cus_sign_img')) {
            $image = $request->file('cus_sign_img');
            $path = '/images/';
            $acc->cus_sign_img = time() . rand() . '.' . $image->extension();
            $image->move(public_path($path), $acc->cus_sign_img);
        }
        $acc->save();

        $account_id = $acc->id;
        // $diposits ??
        // $acc_levels ??

        return view('savings.3_product_details', compact('account_id'));
    }



    public function product_details(Request $request)
    {
        // return $request;
        $prod_data = ProductData::create($request->all());

        $customer_id = AccountGeneralInformation::find($request->account_id)->customer_id;
        $prod_id = $prod_data->id;
        $account_id = $request->account_id;


        $cus_id = AccountGeneralInformation::find($request->account_id)->customer_id;
        $all_customers = CustomerBasicData::all();

        return view('members.5_benificiaries', compact('cus_id', 'account_id', 'prod_id', 'all_customers'))->with('success', 'Details submitted');
    }

    public function benificiaries(Request $request)
    {

        $prod_id = $request->prod_id;
        $account_id = $request->account_id;
        $customer_id = $request->customer_id;
        $is_joint_account = AccountGeneralInformation::find($request->account_id)->account_type_id == 2;

        if ($is_joint_account) {

            return view('savings.4_joint_acoount', compact('customer_id', 'prod_id', 'account_id'));
        } else {
            $docs = DB::table('documents')->get();
            $account_id = $request->account_id;
            $customer_id = $request->customer_id;
            $prod_id = $request->prod_id;
            return view('savings.7_documents', compact('docs', 'account_id', 'customer_id', 'prod_id'));
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

    public function guradian_information(Request $request)
    {
        $account_id = $request->account_id;
        $customer_id = $request->customer_id;
        $prod_id = $request->prod_id;
        $guardians = DB::table('guardian_data')->where('customer_id', $request->customer_id)->get();
        return view('savings.6_guardian_information', compact('guardians', 'account_id', 'customer_id', 'prod_id'));
    }

    public function getDocs(Request $request)
    {
        $docs = DB::table('documents')->get();
        $account_id = $request->account_id;
        $customer_id = $request->customer_id;
        $prod_id = $request->prod_id;
        return view('savings.7_documents', compact('docs', 'account_id', 'customer_id', 'prod_id'));
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

    public function tax_details(Request $request)
    {
        $account_id = $request->account_id;
        $customer_id = $request->customer_id;
        $prod_id = $request->prod_id;
        $f_details = DB::table('fee_details')->get();
        $f_types = DB::table('fee_types')->get();
        return view('savings.8_tax_details', compact('account_id', 'customer_id', 'prod_id', 'f_details', 'f_types'));
    }

    public function add_tax(Request $request)
    {

        ProductFeeData::create($request->all());
        return response()->json($request);
    }

    public function nominee(Request $request)
    {

        $account_id = $request->account_id;
        $customer_id = $request->customer_id;
        $prod_id = $request->prod_id;
        $acc_no = ModelsAccountGeneralInformation::find($account_id)->account_number;

        return view('savings.9_nominee_instruction', compact('account_id', 'customer_id', 'prod_id', 'acc_no'));
    }


    public function add_nominee(Request $request)
    {

        $n = NomineeMember::create($request->all());
        $n->created_by = Auth::user()->name;
        $n->save();
        return response()->json($request);
    }

    public function autorized_officers(Request $request)
    {

        $account_id = $request->account_id;
        $customer_id = $request->customer_id;
        $prod_id = $request->prod_id;



        return view('savings.11_authorized_officer', compact('account_id', 'customer_id', 'prod_id'));
    }

    public function add_officer(Request $request)
    {

        AuthorizedOfficer::create($request->all());
        return response()->json($request);
    }
    public function finish_open_account_saving(Request $request)
    {

        AccountGeneralInformation::where('account_number', $request->account_number)->update(['status' => '2']);
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
        $view_6 = ProductFeeData::where('customer_id', $request->id)->get();
        $view_7 = NomineeMember::where('customer_id', $request->id)->get();
        $view_8 = Joinaccount::where('customer_id', $request->id)->get();
        $view_8_1 = JoinaccountMember::where('customer_id', $request->id)->get();
        $idtypes = DB::table('iedentification_types')->get();
        $CIF = count(DB::table('account_general_information')->get()) + 1;
        $acc_no = 'ACC' . $CIF;

        // return response()->json($view_2);
        return view('savings.view_details.view_account', compact('view_1', 'view_1_1', 'view_2', 'view_3', 'view_4', 'view_5', 'view_6', 'view_7', 'view_8', 'view_8_1', 'idtypes', 'CIF', 'acc_no'));
    }
}
