<?php

namespace App\Http\Controllers;

use App\cash_in_hand_ledger;
use App\Models\AccountGeneralInformation;
use App\Models\Branch;
use App\Models\CashierDailyTransaction;
use App\Models\CustomerBasicData;
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
        $branch_acc = CustomerBasicData::leftjoin('account_general_information','account_general_information.customer_id','customer_basic_data.customer_id')
                    ->where('account_general_information.status',1)
                    ->where('customer_basic_data.branch_id',Auth::user()->branh_id)->get();


        return view('deposit.branchCashInOut1',compact('branches','branch','branch_acc'));
    }
    public function index2(){
        $branches = Branch::where('id',Auth::user()->branh_id)->get();
        return view('deposit.branchCashInOut2',compact('branches'));
    }

    public function cashiarOut(Request $request){

        $payment_log=$request;

        $branch_account=AccountGeneralInformation::where('account_number',$request->branch_account_id)->first();
        $branch_account->account_balance += $request->transaction_value;
        $branch_account->save();

        $payment_log['created_by']=$request->cashier_id;
        $payment_log['transaction_type']="WITHDRAW";
        $payment_log['is_intern_transaction']=1;
        $payment_log['balance_value']= $branch_account->account_balance;
        $payment_log['account_id']= $request->branch_account_id;
        $payment_log['customer_id']= $branch_account->customer_id;
        $payment_log['payment_method_id']= 1;
        $payment_log['transaction_value']=$request->transaction_value;
        $transaction_data=TransactionData::create($payment_log->all());

        $payment_log['transaction_data_id']=$transaction_data->id;
        $payment_log['balance_amount']=$branch_account->account_balance;
        $succsess=PaymentLog::create($payment_log->all());

        $cashie_daily_trancastion=$request;
        $cashie_daily_trancastion['user_id']=$request->cashier_id;
        $cashie_daily_trancastion['transaction_type']="WITHDRAW";
        $cashie_daily_trancastion['transaction_id']=$transaction_data->id;
        $cashie_daily_trancastion['account_number']=$request->branch_account_id;
        $cashie_daily_trancastion['transaction_amount']=$request->transaction_value;
        $cashie_daily_trancastion['branch_balance']=$branch_account->account_balance;
        $cashie_daily_trancastion['transaction_code']="Cash tansfer to cashier";
        $cashie_daily_trancastion['is_enable']=1;
        $cashie_daily_trancastion['branch_id']=Auth::user()->branh_id;
        $cashie_daily_trancastion['balance_value']=
        CashierDailyTransaction::where('branch_id',$request->cashier_id)
            // ->where('user_id',Auth::user()->id)
            ->where('transaction_date',Carbon::today()->toDateString())
            ->sum('transaction_amount')-$request->transaction_value;
        $cashie_daily_trancastion['transaction_date']=Carbon::today()->toDateString();

        $cashie_daily = CashierDailyTransaction::create($cashie_daily_trancastion->all());

        $cash_in_hand_ledger=$request;
        $cash_in_hand_ledger['transaction_data_id']=$transaction_data->id;
        $cash_in_hand_ledger['customer_id']=$transaction_data->customer_id;
        $cash_in_hand_ledger['acccount_id']=$request->branch_account_id;
        $cash_in_hand_ledger['user_id']=$request->cashier_id;
        $cash_in_hand_ledger['transaction_type']="WITHDRAW";
        $cash_in_hand_ledger['is_intern_transaction']=1;
        $cash_in_hand_ledger['transaction_value']=$request->transaction_value;
        $cash_in_hand_ledger['balance_value']=$cashie_daily->balance_value;
        $cash_in_hand_ledger['is_enable']=1;
        // $cash_in_hand_ledger['crated_by']=Auth::user()->id;

        cash_in_hand_ledger::create($cash_in_hand_ledger->all());

        $saving_deposit_base_ledger=$request;
        $saving_deposit_base_ledger['transaction_data_id']=$transaction_data->id;
        $saving_deposit_base_ledger['acccount_id']=$request->branch_account_id;
        $saving_deposit_base_ledger['transaction_type']="DEPOSITE";
        $saving_deposit_base_ledger['transaction_value']=$request->transaction_value;
        $saving_deposit_base_ledger['branch_balance']=$branch_account->account_balance;
        $saving_deposit_base_ledger['is_enable']=1;
        $saving_deposit_base_ledger['user_id']=$request->cashier_id;
        $saving_deposit_base_ledger['transaction_date']=Carbon::today()->toDateString();

        $saving_deposit_base_ledger['balance_value']=
        saving_deposit_base_ledger::where('user_id',$request->cashier_id)
            // ->where('user_id',Auth::user()->id)
            ->where('transaction_date',Carbon::today()->toDateString())
            ->sum('transaction_value')-$request->transaction_value;
        // $saving_deposit_base_ledger['transaction_date']=Carbon::today()->toDateString();
        saving_deposit_base_ledger::create($saving_deposit_base_ledger->all());


        return response()->json('Success');

    }
    public function cashiarIn(Request $request){
        $payment_log=$request;

        $branch_account=AccountGeneralInformation::where('account_number',$request->branch_account_id)->first();
        $branch_account->account_balance -= $request->transaction_value;
        $branch_account->save();

        $payment_log['created_by']=$request->cashier_id;
        $payment_log['transaction_type']="DEPOSITE";
        $payment_log['is_intern_transaction']=1;
        $payment_log['balance_value']= $branch_account->account_balance;
        $payment_log['account_id']= $request->branch_account_id;
        $payment_log['customer_id']= $branch_account->customer_id;
        $payment_log['payment_method_id']= 1;
        $payment_log['transaction_value']=$request->transaction_value;
        $transaction_data=TransactionData::create($payment_log->all());

        $payment_log['transaction_data_id']=$transaction_data->id;
        $payment_log['balance_amount']=$branch_account->account_balance;
        $succsess=PaymentLog::create($payment_log->all());

        $cashie_daily_trancastion=$request;
        $cashie_daily_trancastion['user_id']=$request->cashier_id;
        $cashie_daily_trancastion['transaction_type']="DEPOSITE";
        $cashie_daily_trancastion['transaction_id']=$transaction_data->id;
        $cashie_daily_trancastion['account_number']=$request->branch_account_id;
        $cashie_daily_trancastion['transaction_amount']=$request->transaction_value;
        $cashie_daily_trancastion['branch_balance']=$branch_account->account_balance;
        $cashie_daily_trancastion['transaction_code']="Cash tansfer to cashier";
        $cashie_daily_trancastion['is_enable']=1;
        $cashie_daily_trancastion['branch_id']=Auth::user()->branh_id;
        $cashie_daily_trancastion['balance_value']=
        CashierDailyTransaction::where('branch_id',$request->cashier_id)
            // ->where('user_id',Auth::user()->id)
            ->where('transaction_date',Carbon::today()->toDateString())
            ->sum('transaction_amount')+$request->transaction_value;
        $cashie_daily_trancastion['transaction_date']=Carbon::today()->toDateString();

        $cashie_daily = CashierDailyTransaction::create($cashie_daily_trancastion->all());

        $cash_in_hand_ledger=$request;
        $cash_in_hand_ledger['transaction_data_id']=$transaction_data->id;
        $cash_in_hand_ledger['customer_id']=$transaction_data->customer_id;
        $cash_in_hand_ledger['acccount_id']=$request->branch_account_id;
        $cash_in_hand_ledger['user_id']=$request->cashier_id;
        $cash_in_hand_ledger['transaction_type']="DEPOSITE";
        $cash_in_hand_ledger['is_intern_transaction']=1;
        $cash_in_hand_ledger['transaction_value']=$request->transaction_value;
        $cash_in_hand_ledger['balance_value']=$cashie_daily->balance_value;
        $cash_in_hand_ledger['is_enable']=1;
        // $cash_in_hand_ledger['crated_by']=Auth::user()->id;

        cash_in_hand_ledger::create($cash_in_hand_ledger->all());

        $saving_deposit_base_ledger=$request;
        $saving_deposit_base_ledger['transaction_data_id']=$transaction_data->id;
        $saving_deposit_base_ledger['acccount_id']=$request->branch_account_id;
        $saving_deposit_base_ledger['transaction_type']="WITHDRAW";
        $saving_deposit_base_ledger['transaction_value']=$request->transaction_value;
        $saving_deposit_base_ledger['branch_balance']=$branch_account->account_balance;
        $saving_deposit_base_ledger['is_enable']=1;
        $saving_deposit_base_ledger['user_id']=$request->cashier_id;
        $saving_deposit_base_ledger['transaction_date']=Carbon::today()->toDateString();

        $saving_deposit_base_ledger['balance_value']=
        saving_deposit_base_ledger::where('user_id',$request->cashier_id)
            // ->where('user_id',Auth::user()->id)
            ->where('transaction_date',Carbon::today()->toDateString())
            ->sum('transaction_value')+$request->transaction_value;
        // $saving_deposit_base_ledger['transaction_date']=Carbon::today()->toDateString();
        saving_deposit_base_ledger::create($saving_deposit_base_ledger->all());


        return response()->json('Success');
    }

    public function getCashiar(Request $request){

        $cashiars = User::where('branh_id',$request->branchId)->get();
        return response()->json($cashiars);
    }
}
