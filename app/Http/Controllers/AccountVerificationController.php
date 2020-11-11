<?php

namespace App\Http\Controllers;

use App\Models\AccountGeneralInformation;
use App\Models\CustomerBasicData;
use App\Models\GuardianData;
use App\Models\Joinaccount;
use App\Models\JoinaccountMember;
use App\Models\NomineeMember;
use App\Models\ProductDocument;
use App\Models\ProductFeeData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountVerificationController extends Controller
{
    public function accountDetails($id)
    {

        $data = AccountGeneralInformation::where('account_general_information.account_number', $id)
            ->leftjoin('customer_basic_data', 'customer_basic_data.customer_id', 'account_general_information.customer_id')
            ->leftjoin('iedentification_types', 'iedentification_types.id', 'customer_basic_data.identification_type_id')
            ->leftjoin('customer_status_dates', 'customer_status_dates.customer_id', 'customer_basic_data.customer_id')
            ->leftjoin('branches', 'branches.id', 'account_general_information.branch_id')
            ->leftjoin('lead_sources', 'lead_sources.id', 'account_general_information.lead_source_category_id')
            ->leftjoin('account_categories', 'account_categories.id', 'account_general_information.account_category_id')
            ->leftjoin('account_types', 'account_types.id', 'account_general_information.account_type_id')
            ->leftjoin('product_data', 'product_data.account_id', 'account_general_information.id')
            ->leftjoin('product_types', 'product_types.id', 'product_data.product_type_id')
            ->leftjoin('interest_types', 'interest_types.id', 'product_data.interest_type_id')
            ->leftjoin('currencies', 'currencies.id', 'product_data.currency_id')
            ->leftjoin('join_accounts', 'join_accounts.account_id', 'account_general_information.id')
            // ->leftjoin('joinaccount_members', 'joinaccount_members.join_account_id', 'join_accounts.id')
            ->first();

        // return $data;
        // _encode($data);

        #join account members
        $acc_id = AccountGeneralInformation::where('account_number', $id)->first()->id;
        $join_acc_id = Joinaccount::where('account_id', $acc_id)->first()->id;
        $join_acc_mems = JoinaccountMember::where('join_account_id', $join_acc_id)->get();

        #guardians
        $cus_id = AccountGeneralInformation::where('account_number', $id)->first()->customer_id;
        $guardians = GuardianData::where('customer_id', $cus_id)->get();
        $g_arr = array();
        foreach($guardians as $g){
            array_push($g_arr,CustomerBasicData::find($g->id));
        }

        #nominees
        $noms = NomineeMember::where('account_id', $acc_id)->get();

        #tax details
        $tax_dets = ProductFeeData::where('account_id', $acc_id)
        ->leftjoin('fee_types', 'fee_types.id', 'product_fee_data.fee_type_id')
        ->leftjoin('fee_details', 'fee_details.id', 'product_fee_data.fee_details_id')
        ->get();

        #documents
        $docs = ProductDocument::where('account_id', $acc_id)
        ->leftjoin('documents', 'product_documents.document_id', 'documents.id')
        ->select('documents.*', 'product_documents.*')
        ->get();

        return view('savings.view_details.account_details', compact('data', 'join_acc_mems', 'g_arr', 'noms', 'tax_dets', 'docs'));
    }

    public function verify_image(Request $request){
        $doc = ProductDocument::find($request->id);
        $doc->status = 1;
        $doc->save();

        return response()->json($request);
    }
}
