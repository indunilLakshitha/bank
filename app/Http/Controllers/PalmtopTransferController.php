<?php

namespace App\Http\Controllers;

use App\cash_in_hand_ledger;
use App\Models\AccountGeneralInformation;
use App\Models\CashierDailyTransaction;
use App\Models\PalmtopTransactionData;
use App\Models\PaymentLog;
use App\Models\saving_deposit_base_ledger;
use App\Models\TransactionData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PalmtopTransferController extends Controller
{
    //getting selected palmtop transactions to in
    public function submit_palmtop_data(Request $request){
        // return $request;

        $ids_arr = [];
        foreach($request->is_checked as $palmtop_transaction_id){
            array_push($ids_arr, ['palmtop_transaction_id' => $palmtop_transaction_id]) ;
        }

        //transferting selected records one by one
        foreach($ids_arr as $ids_ar){

        $palm=PalmtopTransactionData::where('id',$ids_ar)->first();
        $payment_log=$request;

        $general_account=AccountGeneralInformation::where('account_number',$palm->account_id)->first();
        $general_account->account_balance += $palm->transaction_value;
        $general_account->save();

        $payment_log=$request;

        $general_account=AccountGeneralInformation::where('account_number',$palm->account_id)->first();
        $general_account->account_balance += $palm->transaction_value;
        $general_account->save();
        $general_account_branch=AccountGeneralInformation::where('branch_id',Auth::user()->branh_id)->first();
        $payment_log['created_by']=Auth::user()->id;
        $payment_log['transaction_type']="DEPOSITE";
        $payment_log['is_intern_transaction']=0;
        $payment_log['balance_value']= $general_account->account_balance;

        $transaction_data=TransactionData::create($payment_log->all());
        $payment_log['transaction_data_id']=$transaction_data->id;
        $payment_log['balance_amount']=$general_account->account_balance;
        $succsess=PaymentLog::create($payment_log->all());

        $cashie_daily_trancastion=$request;
        $cashie_daily_trancastion['user_id']=Auth::user()->id;
        $cashie_daily_trancastion['transaction_type']="DEPOSITE";
        $cashie_daily_trancastion['transaction_id']=$transaction_data->id;
        $cashie_daily_trancastion['account_number']=$palm->account_id;
        $cashie_daily_trancastion['transaction_amount']=$palm->transaction_value;
        $total_cash_in_hand=CashierDailyTransaction::where('user_id',Auth::user()->id)->orderBy('id','desc')
        ->select('balance_value')->first();

        $balance_amount =isset($total_cash_in_hand)?$total_cash_in_hand->balance_amount:0.00;
        $cashie_daily_trancastion['balance_value']=$balance_amount+$palm->transaction_value;
        $cashie_daily_trancastion['transaction_code']="testing";
        $cashie_daily_trancastion['is_enable']=1;
        $cashie_daily_trancastion['branch_id']=Auth::user()->branh_id;
        $cashie_daily_trancastion['branch_balance']= $general_account_branch->account_balance;
        $cashie_daily_trancastion['transaction_date']=Carbon::today()->toDateString();

        CashierDailyTransaction::create($cashie_daily_trancastion->all());

        $cash_in_hand_ledger=$request;
        $cash_in_hand_ledger['transaction_data_id']=$transaction_data->id;
        $cash_in_hand_ledger['customer_id']=$transaction_data->id;
        $cash_in_hand_ledger['acccount_id']=$palm->account_id;
        $cash_in_hand_ledger['user_id']=Auth::user()->id;
        $cash_in_hand_ledger['transaction_type']="DEPOSITE";
        $cash_in_hand_ledger['transaction_value']=$palm->transaction_value;
        $total_cash_in_hand=cash_in_hand_ledger::where('user_id',Auth::user()->id)->orderBy('id','desc')
        ->select('balance_amount')->first();
        $balance_amount =isset($total_cash_in_hand)?$total_cash_in_hand->balance_amount:0.00;
        $cash_in_hand_ledger['balance_amount']=0;
        $cash_in_hand_ledger['balance_amount']=$balance_amount+$palm->transaction_value;
        $cash_in_hand_ledger['branch_balance']= isset($general_account_branch)?$general_account_branch->account_balance:0.00;
        $cash_in_hand_ledger['is_enable']=1;

        cash_in_hand_ledger::create($cash_in_hand_ledger->all());


        $saving_deposit_base_ledger=$request;
        $saving_deposit_base_ledger['transaction_data_id']=$transaction_data->id;
        $saving_deposit_base_ledger['acccount_id']=$palm->account_id;
        $saving_deposit_base_ledger['transaction_type']="WITHDRAW";
        $saving_deposit_base_ledger['transaction_value']=$palm->transaction_value;
        $saving_deposit_base_ledger_in_hand=saving_deposit_base_ledger::where('user_id',Auth::user()->id)
        ->orderBy('id','desc')->first();
        $balance_amount1 =isset($saving_deposit_base_ledger_in_hand)?doubleval($saving_deposit_base_ledger_in_hand->balance_amount):0.00;
        $saving_deposit_base_ledger['balance_amount']=$balance_amount1+$palm->transaction_value;
        $saving_deposit_base_ledger['is_enable']=1;
        $saving_deposit_base_ledger['user_id']=Auth::user()->id;
        $saving_deposit_base_ledger['transaction_date']=Carbon::today()->toDateString();

        $saving_deposit_base_ledger['branch_balance']= isset($general_account_branch)?$general_account_branch->account_balance:0.00;

        saving_deposit_base_ledger::create($saving_deposit_base_ledger->all());
        $palm->is_transfered=1;
        $palm->save();



        }
        return response()->json("completed");

    }
    //getting selected palmtop transactions to in
    public function submit_palmtop_data_single(Request $request){


        $palm=PalmtopTransactionData::where('id',$request->text)->first();
        $payment_log=$request;

        $general_account=AccountGeneralInformation::where('account_number',$palm->account_id)->first();
        $general_account->account_balance += $palm->transaction_value;
        $general_account->save();

        $payment_log=$request;

        
        $general_account_branch=AccountGeneralInformation::where('branch_id',Auth::user()->branh_id)->first();
        $payment_log['created_by']=Auth::user()->id;
        $payment_log['transaction_type']="DEPOSITE";
        $payment_log['is_intern_transaction']=0;
        $payment_log['balance_value']= $general_account->account_balance;

        $transaction_data=TransactionData::create($payment_log->all());
        $payment_log['transaction_data_id']=$transaction_data->id;
        $payment_log['balance_amount']=$general_account->account_balance;
        $succsess=PaymentLog::create($payment_log->all());

        $cashie_daily_trancastion=$request;
        $cashie_daily_trancastion['user_id']=Auth::user()->id;
        $cashie_daily_trancastion['transaction_type']="DEPOSITE";
        $cashie_daily_trancastion['transaction_id']=$transaction_data->id;
        $cashie_daily_trancastion['account_number']=$palm->account_id;
        $cashie_daily_trancastion['transaction_amount']=$palm->transaction_value;
        $total_cash_in_hand=CashierDailyTransaction::where('user_id',Auth::user()->id)->orderBy('id','desc')
        ->select('balance_value')->first();

        $balance_amount =isset($total_cash_in_hand)?$total_cash_in_hand->balance_amount:0.00;
        $cashie_daily_trancastion['balance_value']=$balance_amount+$palm->transaction_value;
        $cashie_daily_trancastion['transaction_code']="testing";
        $cashie_daily_trancastion['is_enable']=1;
        $cashie_daily_trancastion['branch_id']=Auth::user()->branh_id;
        $cashie_daily_trancastion['branch_balance']= $general_account_branch->account_balance;
        $cashie_daily_trancastion['transaction_date']=Carbon::today()->toDateString();

        CashierDailyTransaction::create($cashie_daily_trancastion->all());

        $cash_in_hand_ledger=$request;
        $cash_in_hand_ledger['transaction_data_id']=$transaction_data->id;
        $cash_in_hand_ledger['customer_id']=$transaction_data->id;
        $cash_in_hand_ledger['acccount_id']=$palm->account_id;
        $cash_in_hand_ledger['user_id']=Auth::user()->id;
        $cash_in_hand_ledger['transaction_type']="DEPOSITE";
        $cash_in_hand_ledger['transaction_value']=$palm->transaction_value;
        $total_cash_in_hand=cash_in_hand_ledger::where('user_id',Auth::user()->id)->orderBy('id','desc')
        ->select('balance_amount')->first();
        $balance_amount =isset($total_cash_in_hand)?$total_cash_in_hand->balance_amount:0.00;
        $cash_in_hand_ledger['balance_amount']=0;
        $cash_in_hand_ledger['balance_amount']=$balance_amount+$palm->transaction_value;
        $cash_in_hand_ledger['branch_balance']= isset($general_account_branch)?$general_account_branch->account_balance:0.00;
        $cash_in_hand_ledger['is_enable']=1;

        cash_in_hand_ledger::create($cash_in_hand_ledger->all());


        $saving_deposit_base_ledger=$request;
        $saving_deposit_base_ledger['transaction_data_id']=$transaction_data->id;
        $saving_deposit_base_ledger['acccount_id']=$palm->account_id;
        $saving_deposit_base_ledger['transaction_type']="WITHDRAW";
        $saving_deposit_base_ledger['transaction_value']=$palm->transaction_value;
        $saving_deposit_base_ledger_in_hand=saving_deposit_base_ledger::where('user_id',Auth::user()->id)
        ->orderBy('id','desc')->first();
        $balance_amount1 =isset($saving_deposit_base_ledger_in_hand)?doubleval($saving_deposit_base_ledger_in_hand->balance_amount):0.00;
        $saving_deposit_base_ledger['balance_amount']=$balance_amount1+$palm->transaction_value;
        $saving_deposit_base_ledger['is_enable']=1;
        $saving_deposit_base_ledger['user_id']=Auth::user()->id;
        $saving_deposit_base_ledger['transaction_date']=Carbon::today()->toDateString();

        $saving_deposit_base_ledger['branch_balance']= isset($general_account_branch)?$general_account_branch->account_balance:0.00;

        saving_deposit_base_ledger::create($saving_deposit_base_ledger->all());
        $palm->is_transfered=1;
        $palm->save();


        return response()->json("completed");

    }

    function reject(Request $request){
    PalmtopTransactionData::where('id',$request->text)->update(['is_transfered'=>1]);
    return response()->json("completed");
    }
}
