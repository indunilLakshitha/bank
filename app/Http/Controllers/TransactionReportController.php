<?php

namespace App\Http\Controllers;

use App\Models\AccountGeneralInformation;
use Illuminate\Http\Request;

class TransactionReportController extends Controller
{
    public function index(){

        return view('transaction_report.index');

    }
      //returning active acounts by acc no
      public function findMembersById(Request $request){

        $transactions= AccountGeneralInformation::leftjoin('customer_basic_data','customer_basic_data.customer_id','account_general_information.customer_id')
                ->leftjoin('transaction_data','transaction_data.account_id','account_general_information.account_number')
                ->select('account_general_information.account_number','account_general_information.account_balance','customer_basic_data.*','transaction_data.*')
                 ->where('account_general_information.account_number',$request->id)
                //  ->where('account_general_information.status',1)
                 ->get();
        return response()->json($transactions);
    }
}
