<?php

namespace App\Http\Controllers;

use App\AccountGeneralInformation as AppAccountGeneralInformation;
// use App\Models\cash_in_hand_ledger;
use App\cash_in_hand_ledger;
use App\Member;
use App\Models\AccountGeneralInformation;
use App\Models\CustomerBasicData;
use App\Models\PaymentLog;
use App\Models\CashierDailyTransaction;
use App\Models\saving_deposit_base_ledger;
use App\Models\TransactionData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {

        date_default_timezone_set('Asia/Colombo');

    }
    //returning active acounts by name
    public function findMembers(Request $request){

        $customers= CustomerBasicData::join('account_general_information','account_general_information.customer_id','customer_basic_data.customer_id')
            ->where('customer_basic_data.name_in_use',$request->name)
            ->where('account_general_information.status',1)
            ->select('account_general_information.account_number','account_general_information.account_balance','customer_basic_data.*')
            ->get();
        return response()->json($customers);
    }

    //returning active acounts by acc no
    public function findMembersById(Request $request){

        $customers= AccountGeneralInformation::leftjoin('customer_basic_data','customer_basic_data.customer_id','account_general_information.customer_id')
                ->select('account_general_information.account_number','account_general_information.account_balance','customer_basic_data.*')
                 ->where('account_general_information.account_number',$request->id)
                 ->where('account_general_information.status',1)
                 ->get();
        return response()->json($customers);
    }
//  noramal withdrawal
    public function normalWithdraw(Request $request){

       //---------------------------------------request parameters
        // $request->account_id
        // $request->customer_id
        // $request->payment_method_id
        // $request->transaction_type
        // $request->transaction_value

        $payment_log=$request;

        $general_account=AccountGeneralInformation::where('account_number',$request->account_id)->first();
        $general_account->account_balance -= $request->transaction_value;
        $general_account->save();

        $payment_log['created_by']=Auth::user()->id;
        $payment_log['transaction_type']="WITHDRAW";
        $payment_log['is_intern_transaction']=0;
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
        $cash_in_hand_ledger['user_id']=Auth::user()->id;
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
    // normal deposites
    public function normalDeposite(Request $request){



//---------------------------------------request parameters
        // $request->account_id
        // $request->customer_id
        // $request->payment_method_id
        // $request->transaction_type
        // $request->transaction_value
        $payment_log=$request;

        $general_account=AccountGeneralInformation::where('account_number',$request->account_id)->first();
        $general_account->account_balance += $request->transaction_value;
        $general_account->save();

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
