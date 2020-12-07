<?php

namespace App\Http\Controllers;

use App\Models\AccountGeneralInformation;
use App\Models\CustomerBasicData;
use App\Models\GuardianData;
use App\Models\Joinaccount;
use App\Models\JoinaccountMember;
use App\Models\NomineeMember;
use App\Models\ProductData;
use App\Models\ProductDocument;
use App\Models\ProductFeeData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AccountCategory;
use App\Models\BeneficiaryData;
use App\Models\Branch;
use App\Models\ContactData;
use App\Models\ContactType;
use App\Models\CustomerAsset;
use App\Models\CustomerStatusDates;
use App\Models\CutomerMainType;
use App\Models\CutomerTitle;
use App\Models\IedentificationType;
use App\Models\OccupationData;
use App\Models\OtherSocietyData;
use App\Models\SmallGroup;
use App\Models\SpecialData;
use App\Models\SubAccountOffice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class AccountVerificationController extends Controller
{
    public function accountDetails(Request $request)
    {
// Commented by Kanishka

        // $data = AccountGeneralInformation::where('account_general_information.account_number', $id)
        //     ->leftjoin('customer_basic_data', 'customer_basic_data.customer_id', 'account_general_information.customer_id')
        //     ->leftjoin('iedentification_types', 'iedentification_types.id', 'customer_basic_data.identification_type_id')
        //     ->leftjoin('customer_status_dates', 'customer_status_dates.customer_id', 'customer_basic_data.customer_id')
        //     ->leftjoin('branches', 'branches.id', 'account_general_information.branch_id')
        //     ->leftjoin('lead_sources', 'lead_sources.id', 'account_general_information.lead_source_category_id')
        //     ->leftjoin('account_categories', 'account_categories.id', 'account_general_information.account_category_id')
        //     ->leftjoin('account_types', 'account_types.id', 'account_general_information.account_type_id')
        //     ->leftjoin('product_data', 'product_data.account_id', 'account_general_information.id')
        //     ->leftjoin('product_types', 'product_types.id', 'product_data.product_type_id')
        //     ->leftjoin('interest_types', 'interest_types.id', 'product_data.interest_type_id')
        //     ->leftjoin('currencies', 'currencies.id', 'product_data.currency_id')
        //     ->leftjoin('join_accounts', 'join_accounts.account_id', 'account_general_information.id')
        //     // ->leftjoin('joinaccount_members', 'joinaccount_members.join_account_id', 'join_accounts.id')
        //     ->first();
// End Comment

        // return $data;
        // _encode($data);

        // #join account members
// Commented by Kanishka
        // $acc_id = AccountGeneralInformation::where('account_number', $id)->first()->id;
// End Comment

        // $join_acc_id = Joinaccount::where('account_id', $acc_id)->first()->id;
        // $join_acc_mems = JoinaccountMember::where('join_account_id', $join_acc_id)->get();

        // #guardians
        // $cus_id = AccountGeneralInformation::where('account_number', $id)->first()->customer_id;
        // $guardians = GuardianData::where('customer_id', $cus_id)->get();
        // $g_arr = array();
        // foreach($guardians as $g){
        //     array_push($g_arr,CustomerBasicData::find($g->id));
        // }

        #nominees
        // $noms = NomineeMember::where('account_id', $acc_id)->get();
// Commented by Kanishka
        #tax details
        // $tax_dets = ProductFeeData::where('account_id', $acc_id)
        // ->leftjoin('fee_types', 'fee_types.id', 'product_fee_data.fee_type_id')
        // ->leftjoin('fee_details', 'fee_details.id', 'product_fee_data.fee_details_id')
        // ->get();

        // #documents
        // $docs = ProductDocument::where('account_id', $acc_id)
        // ->leftjoin('documents', 'product_documents.document_id', 'documents.id')
        // ->select('documents.*', 'product_documents.*')
        // ->get();

        // return view('savings.view_details.account_details', compact('data', 'tax_dets', 'docs'));
// End Comment
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
        return view('savings.view_details.view_account',compact('view_1', 'view_1_1', 'view_2', 'view_3', 'view_4', 'view_5','view_5_1','view_5_2', 'view_6', 'view_7', 'view_8', 'view_8_1', 'idtypes', 'CIF', 'acc_no'));

    }

    public function customer_details(Request $request){
// Commented by Kanishka

        // $data = AccountGeneralInformation::where('account_general_information.account_number', $id)
        // ->leftjoin('customer_basic_data', 'customer_basic_data.customer_id', 'account_general_information.customer_id')
        // ->leftjoin('iedentification_types', 'iedentification_types.id', 'customer_basic_data.identification_type_id')
        // ->leftjoin('customer_status_dates', 'customer_status_dates.customer_id', 'customer_basic_data.customer_id')
        // ->leftjoin('branches', 'branches.id', 'account_general_information.branch_id')
        // ->leftjoin('lead_sources', 'lead_sources.id', 'account_general_information.lead_source_category_id')
        // ->leftjoin('account_categories', 'account_categories.id', 'account_general_information.account_category_id')
        // ->leftjoin('account_types', 'account_types.id', 'account_general_information.account_type_id')
        // ->leftjoin('product_data', 'product_data.account_id', 'account_general_information.id')
        // ->leftjoin('product_types', 'product_types.id', 'product_data.product_type_id')
        // ->leftjoin('interest_types', 'interest_types.id', 'product_data.interest_type_id')
        // ->leftjoin('currencies', 'currencies.id', 'product_data.currency_id')
        // ->leftjoin('join_accounts', 'join_accounts.account_id', 'account_general_information.id')
        // // ->leftjoin('joinaccount_members', 'joinaccount_members.join_account_id', 'join_accounts.id')
        // ->first();

        // #guardians
        // $cus_id = AccountGeneralInformation::where('account_number', $id)->first()->customer_id;
        // $guardians = GuardianData::where('customer_id', $cus_id)->get();
        // $g_arr = array();
        // foreach($guardians as $g){
        //     array_push($g_arr,CustomerBasicData::find($g->id));
        // }

        // return view('savings.view_details.customer_details', compact('data', 'g_arr'));
// End Comment

        $view_1 = CustomerBasicData::where('customer_id',$request->id)->first();
        $view_1_1 = CutomerMainType::where('customer_id',$request->id)->first();
        $view_2 = CustomerStatusDates::where('customer_id',$request->id)->first();
        $view_3 = OccupationData::where('customer_id',$request->id)->first();
        $view_4 = OtherSocietyData::where('customer_id',$request->id)->first();

        $view_5_2 = GuardianData::leftjoin('customer_basic_data','customer_basic_data.customer_id','guardian_data.customer_id')
        ->where('guardian_data.customer_id',$request->id)->get();
        $view_6 = CustomerAsset::where('customer_id',$request->id)->get();
        return view('members.view_member',compact('view_1','view_1_1','view_2','view_3','view_4','view_5_2','view_6'));
    }

    public function document_verification($id){
         #documents
         $acc_id = AccountGeneralInformation::where('account_number', $id)->first()->id;
         $docs = ProductDocument::where('account_id', $acc_id)
         ->leftjoin('documents', 'product_documents.document_id', 'documents.id')
         ->select('documents.*', 'product_documents.*')
         ->get();

         return view('savings.view_details.document', compact('docs'));
    }

    public function signature_verification($id){
        $acc = AccountGeneralInformation::where('account_number', $id)->first();
        $cus = CustomerBasicData::where('customer_id',$acc->customer_id)->first();
        #join account members
        $acc_id = AccountGeneralInformation::where('account_number', $id)->first()->id;
        $customer=CustomerBasicData::where('customer_id',$acc_id)->first();
        $join_acc_id = Joinaccount::where('account_id', $acc_id)->first();
        if(!empty($join_acc_id)){
        $join_acc_mems = JoinaccountMember::where('join_account_id', $join_acc_id->id)->get();

         return view('savings.view_details.signature', compact('acc','cus', 'join_acc_mems'));
        }else{
            return view('savings.view_details.signature', compact('acc','cus'));
        }
    }

    public function verify_image(Request $request){
        $doc = ProductDocument::find($request->id);
        $doc->status = 1;
        $doc->save();

        return response()->json($request);
    }

    public function main_holder_sign(Request $request){
        $acc = AccountGeneralInformation::find($request->id);
        $acc->sign_status = 1;
        $acc->save();

        return response()->json($request);
    }

    public function other_holder_sign(Request $request){
        $acc = JoinaccountMember::find($request->id);
        $acc->sign_status = 1;
        $acc->save();

        return response()->json($request);
    }

    public function approve_check(Request $request){
        $acc = AccountGeneralInformation::where('account_number',$request->account_number)->first();

        if($acc->sign_status != 1){
            return response()->json('UNVERIFIED');
        }

        #join account members
        $join_acc_id = Joinaccount::where('account_id', $acc->id)->first();
        if(!empty($join_acc_id)){
        $join_acc_mems = JoinaccountMember::where('join_account_id', $join_acc_id->id)->get();

        foreach($join_acc_mems as $mem){
            if($mem->sign_status != 1){
                return response()->json('UNVERIFIED');
            }
        }
        }
        return response()->json('VERIFIED');
    }

    public function approve_done(Request $request){
        $acc = AccountGeneralInformation::where('account_number',$request->account_number)->first();
        $acc->status = 1;
        $acc->save();
        return response()->json('APPROVED');
    }


}
