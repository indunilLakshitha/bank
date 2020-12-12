<?php

namespace App\Http\Controllers;

use App\Models\AccountGeneralInformation;
use App\Models\CustomerBasicData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PalmtopTransactionData;
use Illuminate\Support\Facades\DB;

class BranchvsHqTransferController extends Controller
{
    public function index(){
         $branchoffices=CustomerBasicData::leftjoin('account_general_information','account_general_information.customer_id',
                                'customer_basic_data.customer_id')
                            ->where('customer_basic_data.is_branch','1')
                            ->where('customer_basic_data.branch_id',Auth::user()->branh_id)
                            ->select('account_general_information.account_number')
                            ->get();
         $headofices=CustomerBasicData::leftjoin('account_general_information','account_general_information.customer_id',
                                'customer_basic_data.customer_id')
                            ->where('customer_basic_data.is_branch','1')
                            ->where('customer_basic_data.is_hq','1')
                            ->select('account_general_information.account_number')
                            ->get();
        return view('palmtop.branchvsheadoffice',compact('branchoffices','headofices'));
    }
    public function palmtop(){

        $data = DB::select("
        SELECT
            palmtop_transaction_data.id, palmtop_transaction_data.created_at,palmtop_transaction_data.transaction_value,
            customer_basic_data.full_name, customer_basic_data.customer_id,
            account_general_information.account_number
        FROM
            palmtop_transaction_data

        LEFT JOIN
            customer_basic_data ON customer_basic_data.id = palmtop_transaction_data.customer_id
        LEFT JOIN
            account_general_information ON account_general_information.id = palmtop_transaction_data.account_id
        WHERE
            palmtop_transaction_data.transferred = 0
        ");
        return view('palmtop.palmtoptransactions', compact('data'));
    }

    public function transfer(Request $request){
        return response()->json($request);
    }
}
