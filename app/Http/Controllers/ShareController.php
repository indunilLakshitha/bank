<?php

namespace App\Http\Controllers;

use App\cash_in_hand_ledger;
use App\Member;
use App\Models\CashierDailyTransaction;
use App\Models\CustomerBasicData;
use App\Models\PaymentLog;
use App\Models\saving_deposit_base_ledger;
use App\Models\TransactionData;
use App\Share;
use App\TransactionShare;
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
        $members = Share::all();
        return view('shares.history',compact('members'));
    }

    public function buy_shares(Request $request){


        if(Member::where('customer_id',$request->customer_id)->first()){
            $mem=Member::where('customer_id',$request->customer_id)->first();
            $mem->share_amount+=$request->n_of_shares;
            $mem->save();
            $customer=CustomerBasicData::where('customer_id',$request->customer_id)->first();
            $payment_log=$request;
            $payment_log['created_by']=Auth::user()->id;
            $payment_log['transaction_type']="DEPOSITE";
            $payment_log['transaction_details']="Shares buy in member creation";
            $payment_log['transaction_value']=$request->share_value;
            $payment_log['transaction_code']="ST";
            $payment_log['payment_method_id']=1;
            // $deposits_today=TransactionData::where()
            $transaction_data=TransactionData::create($payment_log->all());

            $transaction_shares=$request;
            $transaction_shares['member_id']=$mem->member_number;
            $transaction_shares['transaction_type']="DEPOSITE";
            $transaction_shares['transaction_code']="ST";
            $transaction_shares['transaction_details']=$payment_log['transaction_details'];
            $transaction_shares['customer_id']=$request->customer_id;
            $transaction_shares['customer_id']=$request->account_id;
            $transaction_shares['branch_id']=$customer->branch_id;
            $transaction_shares['is_enable']=1;
            $transaction_shares['created_by']=Auth::user()->id;
            $transaction_shares['transaction_value']= $request->total_share_cost;
            $transaction_shares['balance_value']=$request->total_share_cost;
            TransactionShare::create($transaction_shares->all());


            $cash_in_hand_ledger=$request;
            $cash_in_hand_ledger['transaction_data_id']=$transaction_data->id;
            $cash_in_hand_ledger['customer_id']=$request->customer_id;
            $cash_in_hand_ledger['user_id']=Auth::user()->id;
            $cash_in_hand_ledger['transaction_type']="DEPOSITE";
            $cash_in_hand_ledger['transaction_value']=$request->transaction_value;
            $deposite_total=cash_in_hand_ledger::where('transaction_type','DEPOSITE')
                                        ->where('user_id',Auth::user()->id)
                                        ->sum('transaction_value');
            $withdraw_total=cash_in_hand_ledger::where('transaction_type','WITHDRAW')
                                            ->where('user_id',Auth::user()->id)
                                            ->sum('transaction_value');
            $cash_in_hand_ledger['balance_amount']=$deposite_total-$withdraw_total+$request->transaction_value;
            $cash_in_hand_ledger['is_enable']=1;

            cash_in_hand_ledger::create($cash_in_hand_ledger->all());

            $payment_log['transaction_data_id']=$transaction_data->id;
            // $payment_log['balance_amount']=$transaction_data->account_balance;
            $succsess=PaymentLog::create($payment_log->all());

            $cashie_daily_trancastion=$request;
            $cashie_daily_trancastion['user_id']=Auth::user()->id;
            $cashie_daily_trancastion['transaction_type']="DEPOSITE";
            $cashie_daily_trancastion['transaction_id']=$transaction_data->id;
            // $cashie_daily_trancastion['account_number']=$request->account_id;
            $cashie_daily_trancastion['transaction_amount']=$request->share_amount;
            // $cashie_daily_trancastion['balance_value']=$general_account->account_balance;
            $cashie_daily_trancastion['is_enable']=1;
            $cashie_daily_trancastion['transaction_date']=Carbon::today()->toDateString();
            $cashie_daily_trancastion['branch_id']=Auth::user()->branh_id;
            $cashie_daily_trancastion['branch_balance']=
            CashierDailyTransaction::where('branch_id',Auth::user()->branh_id)->sum('branch_balance')+$request->share_amount;

            CashierDailyTransaction::create($cashie_daily_trancastion->all());

             $saving_deposit_base_ledger=$request;
             $saving_deposit_base_ledger['transaction_data_id']=$transaction_data->id;
             $saving_deposit_base_ledger['acccount_id']=$request->account_id;
             $saving_deposit_base_ledger['transaction_type']="DEPOSITE";
             $saving_deposit_base_ledger['transaction_value']=$request->share_amount;
            //  $saving_deposit_base_ledger['balance_value']=$general_account->account_balance;
             $saving_deposit_base_ledger['is_enable']=1;
             saving_deposit_base_ledger::create($saving_deposit_base_ledger->all());

            return response()->json($mem);
        }

        return response()->json('Not a Member');




    }
    public function transfer_shares(Request $request){
        $seller=Member::where('customer_id',$request->seller_id)->first();
        if($seller->share_amount>$request->n_of_shares_to_transfer){

            $buyer=Member::where('customer_id',$request->buyer_id)->first();
            $seller->share_amount-= $request->n_of_shares_to_transfer;
            $buyer->share_amount += $request->n_of_shares_to_transfer;
            $seller->save();
            $buyer->save();
            $response['seller_balance']=$seller->share_amount;
            $response['buyer_balance']=$buyer->share_amount;
            $response['msg']="Successfully Transfered";
            return response()->json($response);

        }else{
            $response['msg']="Insufficient Share Balance";
            return response()->json($response);
        }
    }
}
