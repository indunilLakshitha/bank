<?php

namespace App\Http\Controllers;

use App\cash_in_hand_ledger;
use App\Models\AccountGeneralInformation;
use App\Models\Branch;
use App\Models\CashierDailyTransaction;
use App\Models\PaymentLog;
use App\Models\saving_deposit_base_ledger;
use App\Models\TransactionData;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchCashInOutController extends Controller
{
    public function index(){
        return view('cashier.index');
    }

    public function index1(){
        $branches = Branch::where('id',Auth::user()->branh_id)->get();
        $branch = Branch::where('id',Auth::user()->branh_id)->first();
        return view('deposit.branchCashInOut1',compact('branches','branch'));
    }
    public function index2(){
        $branches = Branch::where('id',Auth::user()->branh_id)->get();
        return view('deposit.branchCashInOut2',compact('branches'));
    }

    public function cashiarGive(Request $request){

        $payment_log=$request;

        $general_account=AccountGeneralInformation::where('account_number',$request->account_id)->first();
        $general_account->account_balance += $request->transaction_value;
        $general_account->save();

        $payment_log['created_by']=Auth::user()->id;
        $payment_log['transaction_type']="WITHDRAW";
        $payment_log['is_intern_transaction']=1;
        $payment_log['balance_value']= $general_account->account_balance;

        $transaction_data=TransactionData::create($payment_log->all());

        $payment_log['transaction_data_id']=$transaction_data->id;
        $payment_log['balance_amount']=$general_account->account_balance;
        $succsess=PaymentLog::create($payment_log->all());

        $cashie_daily_trancastion=$request;
        $cashie_daily_trancastion['user_id']=Auth::user()->id;
        $cashie_daily_trancastion['transaction_type']="WITHDRAW";
        $cashie_daily_trancastion['transaction_id']=$transaction_data->id;
        $cashie_daily_trancastion['account_number']=$request->account_id;
        $cashie_daily_trancastion['transaction_amount']=$request->transaction_value;
        $cashie_daily_trancastion['balance_value']=$general_account->account_balance;
        $cashie_daily_trancastion['transaction_code']="testing";
        $cashie_daily_trancastion['is_enable']=1;
        $cashie_daily_trancastion['branch_id']=Auth::user()->branh_id;
        $cashie_daily_trancastion['branch_balance']=
        CashierDailyTransaction::where('branch_id',Auth::user()->branh_id)
            // ->where('user_id',Auth::user()->id)
            ->where('transaction_date',Carbon::today()->toDateString())
            ->sum('transaction_amount')+$request->transaction_value;
        $cashie_daily_trancastion['transaction_date']=Carbon::today()->toDateString();

        CashierDailyTransaction::create($cashie_daily_trancastion->all());

        $cash_in_hand_ledger=$request;
        $cash_in_hand_ledger['transaction_data_id']=$transaction_data->id;
        $cash_in_hand_ledger['customer_id']=$transaction_data->id;
        $cash_in_hand_ledger['acccount_id']=$request->account_id;
        $cash_in_hand_ledger['user_id']=$request->cashiar;
        $cash_in_hand_ledger['transaction_type']="WITHDRAW";
        $cash_in_hand_ledger['transaction_value']=$request->transaction_value;
        $deposite_total=cash_in_hand_ledger::where('transaction_type','DEPOSITE')
                                        ->where('user_id',Auth::user()->id)
                                        ->sum('transaction_value');
        $withdraw_total=cash_in_hand_ledger::where('transaction_type','WITHDRAW')
                                        ->where('user_id',Auth::user()->id)
                                        ->sum('transaction_value');
        $cash_in_hand_ledger['balance_amount']=$deposite_total-$withdraw_total;
        $cash_in_hand_ledger['is_enable']=1;

        cash_in_hand_ledger::create($cash_in_hand_ledger->all());
        return response()->json($succsess);

        $saving_deposit_base_ledger=$request;
        $saving_deposit_base_ledger['transaction_data_id']=$transaction_data->id;
        $saving_deposit_base_ledger['acccount_id']=$request->account_id;
        $saving_deposit_base_ledger['transaction_type']="WITHDRAW";
        $saving_deposit_base_ledger['transaction_value']=$request->transaction_value;
        $saving_deposit_base_ledger['balance_value']=$general_account->account_balance;
        $saving_deposit_base_ledger['is_enable']=1;
        $saving_deposit_base_ledger['user_id']=Auth::user()->id;
        $saving_deposit_base_ledger['transaction_date']=Carbon::today()->toDateString();

        $saving_deposit_base_ledger['branch_balance']=
        saving_deposit_base_ledger::where('user_id',Auth::user()->id)
            // ->where('user_id',Auth::user()->id)
            ->where('transaction_date',Carbon::today()->toDateString())
            ->sum('transaction_value')+$request->transaction_value;
        // $saving_deposit_base_ledger['transaction_date']=Carbon::today()->toDateString();
        saving_deposit_base_ledger::create($saving_deposit_base_ledger->all());


        return response()->json($succsess);

    }
    public function cashiarIn(Request $request){
        $payment_log=$request;

        $general_account=AccountGeneralInformation::where('account_number',$request->account_id)->first();
        $general_account->account_balance -= $request->transaction_value;
        $general_account->save();

        $payment_log['created_by']=Auth::user()->id;
        $payment_log['transaction_type']="DEPOSITE";
        $payment_log['is_intern_transaction']=1;
        $payment_log['balance_value']= $general_account->account_balance;

        $transaction_data=TransactionData::create($payment_log->all());

        $payment_log['transaction_data_id']=$transaction_data->id;
        $payment_log['balance_amount']=$general_account->account_balance;
        $succsess=PaymentLog::create($payment_log->all());

        $cashie_daily_trancastion=$request;
        $cashie_daily_trancastion['user_id']=Auth::user()->id;
        $cashie_daily_trancastion['transaction_type']="DEPOSITE";
        $cashie_daily_trancastion['transaction_id']=$transaction_data->id;
        $cashie_daily_trancastion['account_number']=$request->account_id;
        $cashie_daily_trancastion['transaction_amount']=$request->transaction_value;
        $cashie_daily_trancastion['balance_value']=$general_account->account_balance;
        $cashie_daily_trancastion['transaction_code']="testing";
        $cashie_daily_trancastion['is_enable']=1;
        $cashie_daily_trancastion['branch_id']=Auth::user()->branh_id;
        $cashie_daily_trancastion['branch_balance']=
        CashierDailyTransaction::where('branch_id',Auth::user()->branh_id)
            // ->where('user_id',Auth::user()->id)
            ->where('transaction_date',Carbon::today()->toDateString())
            ->sum('transaction_amount')+$request->transaction_value;
        $cashie_daily_trancastion['transaction_date']=Carbon::today()->toDateString();

        CashierDailyTransaction::create($cashie_daily_trancastion->all());

        $cash_in_hand_ledger=$request;
        $cash_in_hand_ledger['transaction_data_id']=$transaction_data->id;
        $cash_in_hand_ledger['customer_id']=$transaction_data->id;
        $cash_in_hand_ledger['acccount_id']=$request->account_id;
        $cash_in_hand_ledger['user_id']=Auth::user()->id;
        $cash_in_hand_ledger['transaction_type']="DEPOSITE";
        $cash_in_hand_ledger['transaction_value']=$request->transaction_value;
        $cash_in_hand_ledger['balance_value']=$general_account->account_balance;
        $cash_in_hand_ledger['is_enable']=1;
        // $cash_in_hand_ledger['crated_by']=Auth::user()->id;

        cash_in_hand_ledger::create($cash_in_hand_ledger->all());

        $saving_deposit_base_ledger=$request;
        $saving_deposit_base_ledger['transaction_data_id']=$transaction_data->id;
        $saving_deposit_base_ledger['acccount_id']=$request->account_id;
        $saving_deposit_base_ledger['transaction_type']="DEPOSITE";
        $saving_deposit_base_ledger['transaction_value']=$request->transaction_value;
        $saving_deposit_base_ledger['balance_value']=$general_account->account_balance;
        $saving_deposit_base_ledger['is_enable']=1;
        $saving_deposit_base_ledger['user_id']=$request->cashiar;
        $saving_deposit_base_ledger['transaction_date']=Carbon::today()->toDateString();

        $saving_deposit_base_ledger['branch_balance']=
        saving_deposit_base_ledger::where('user_id',Auth::user()->id)
            // ->where('user_id',Auth::user()->id)
            ->where('transaction_date',Carbon::today()->toDateString())
            ->sum('transaction_value')+$request->transaction_value;
        // $saving_deposit_base_ledger['transaction_date']=Carbon::today()->toDateString();
        saving_deposit_base_ledger::create($saving_deposit_base_ledger->all());


        return response()->json($succsess);
    }

    public function getCashiar(Request $request){

        $cashiars = User::where('branh_id',$request->branchId)->get();
        return response()->json($cashiars);
    }
}
