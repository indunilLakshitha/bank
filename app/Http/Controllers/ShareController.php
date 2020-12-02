<?php

namespace App\Http\Controllers;

use App\cash_in_hand_ledger;
use App\Member;
use App\Models\CashierDailyTransaction;
use App\Models\PaymentLog;
use App\Models\saving_deposit_base_ledger;
use App\Models\TransactionData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShareController extends Controller
{

    public function buyview(){
        return view('shares.buy');
    }

    public function transferview(){
        return view('shares.transfer');
    }

    public function historyview(){
        return view('shares.history');
    }

    public function buy_shares(Request $request){

        // return response()->json($request);

        if(Member::where('customer_id',$request->customer_id)->first()){
            $member=Member::where('customer_id',$request->customer_id)->first();
            $member->share_amount+=$request->n_of_shares;
            $member->save();

            $payment_log=$request;
            $payment_log['created_by']=Auth::user()->id;
            $payment_log['transaction_type']="DEPOSITE";
            $payment_log['transaction_value']=$request->total_share_cost;
            $payment_log['payment_method_id']=1;
            $transaction_data=TransactionData::create($payment_log->all());

            $payment_log['transaction_data_id']=$transaction_data->id;
            // $payment_log['balance_amount']=$transaction_data->account_balance;
            $succsess=PaymentLog::create($payment_log->all());

            $cashie_daily_trancastion=$request;
            $cashie_daily_trancastion['user_id']=Auth::user()->id;
            $cashie_daily_trancastion['transaction_type']="DEPOSITE";
            $cashie_daily_trancastion['transaction_id']=$transaction_data->id;
            // $cashie_daily_trancastion['account_number']=$request->account_id;
            $cashie_daily_trancastion['transaction_amount']=$request->total_share_cost;
            // $cashie_daily_trancastion['balance_value']=$general_account->account_balance;
            $cashie_daily_trancastion['is_enable']=1;
            $cashie_daily_trancastion['transaction_date']=Carbon::today()->toDateString();
            $cashie_daily_trancastion['branch_id']=Auth::user()->branh_id;
            $cashie_daily_trancastion['branch_balance']=
            CashierDailyTransaction::where('branch_id',Auth::user()->branh_id)->sum('branch_balance')+$request->total_share_cost;

            CashierDailyTransaction::create($cashie_daily_trancastion->all());

            $cash_in_hand_ledger=$request;
            $cash_in_hand_ledger['transaction_data_id']=$transaction_data->id;
            $cash_in_hand_ledger['customer_id']=$transaction_data->id;
            $cash_in_hand_ledger['acccount_id']=$request->account_id;
            $cash_in_hand_ledger['transaction_type']="DEPOSITE";
            $cash_in_hand_ledger['transaction_value']=$request->total_share_cost;
            // $cash_in_hand_ledger['balance_value']=$general_account->account_balance;
            $cash_in_hand_ledger['is_enable']=1;

             cash_in_hand_ledger::create($cash_in_hand_ledger->all());


             $saving_deposit_base_ledger=$request;
             $saving_deposit_base_ledger['transaction_data_id']=$transaction_data->id;
             $saving_deposit_base_ledger['acccount_id']=$request->account_id;
             $saving_deposit_base_ledger['transaction_type']="DEPOSITE";
             $saving_deposit_base_ledger['transaction_value']=$request->total_share_cost;
            //  $saving_deposit_base_ledger['balance_value']=$general_account->account_balance;
             $saving_deposit_base_ledger['is_enable']=1;
             saving_deposit_base_ledger::create($saving_deposit_base_ledger->all());



            return response()->json($member);
        }

        return response()->json('Not a Member');




    }
    public function transfer_shares(Request $request){
        return response()->json($request);
    }
}
