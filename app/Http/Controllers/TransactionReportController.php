<?php

namespace App\Http\Controllers;

use App\Models\AccountGeneralInformation;
use App\Models\CashierDailyTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function cashierReport(){
         $details=CashierDailyTransaction::where('user_id',Auth::user()->id)->where('transaction_date',Carbon::today()->toDateString())->get();
         return view('transaction_report.cashie_daily',compact('details'));
    }

    public function cashInHand(){

        return view('transaction_report.cashInHand');
    }

    public function reportOfTransactions(){

        return view('transaction_report.reportOfMember');
    }

    public function cashInHandBranch(){

        return view('transaction_report.cashInHandBranch');
    }

    public function getUserRep(Request $request){

        return response()->json($request);
    }

    public function getBranchRep(Request $request){

        return response()->json($request);
    }

    public function getTransactions(Request $request){

        return response()->json($request);
    }
}
