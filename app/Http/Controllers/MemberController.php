<?php

namespace App\Http\Controllers;

use App\cash_in_hand_ledger;
use App\Member;
use App\MemberCreationNominee;
use App\Models\Branch;
use App\Models\CashierDailyTransaction;
use App\Models\CustomerBasicData;
use App\Models\CustomerStatusDates;
use App\Models\PaymentLog;
use App\Models\saving_deposit_base_ledger;
use App\Models\TransactionData;
use App\TransactionShare;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Colombo');
    }
    public function search(Request $request)
    {
        // return $request;
        if(
            $request->customer_id == null &&
            $request->married_status_id == null &&
            $request->religion_data_id == null &&
            $request->expire_date == null &&
            $request->race_id == null &&
            $request->full_name == null &&
            $request->identification_type_id == null &&
            $request->identification_number == null
        ){
            $results = DB::select("
            SELECT * FROM customer_status_dates

            LEFT JOIN customer_basic_data
            ON customer_basic_data.customer_id = customer_status_dates.customer_id

            LEFT JOIN iedentification_types
            ON iedentification_types.id = customer_basic_data.identification_type_id

            ");
        } else{

            $results = DB::select("
            SELECT * FROM customer_status_dates

            LEFT JOIN customer_basic_data
            ON customer_basic_data.customer_id = customer_status_dates.customer_id

            LEFT JOIN iedentification_types
            ON iedentification_types.id = customer_basic_data.identification_type_id

            WHERE customer_status_dates.customer_id LIKE '%$request->customer_id%'
            AND customer_status_dates.married_status_id LIKE '%$request->married_status_id%'
            AND  customer_status_dates.religion_data_id LIKE '%$request->religion_data_id%'
            AND  customer_status_dates.expire_date LIKE '%$request->expire_date%'
            AND customer_basic_data.full_name LIKE '%$request->full_name%'
            AND customer_basic_data.identification_type_id LIKE '%$request->identification_type_id%'
            AND customer_basic_data.identification_number LIKE '%$request->identification_number%'

            ");

        }
        return response()->json($results);

    }

    public function VerificationSearch(Request $request){
        $results = DB::select("
            SELECT * FROM account_general_information
            LEFT JOIN customer_basic_data
            ON customer_basic_data.customer_id = account_general_information.customer_id
            LEFT JOIN iedentification_types
            ON iedentification_types.id = customer_basic_data.identification_type_id
            WHERE customer_basic_data.customer_id LIKE '%$request->customer_id%'
            AND customer_basic_data.full_name LIKE '%$request->full_name%'
            AND customer_basic_data.identification_type_id LIKE '%$request->identification_type_id%'
            AND account_general_information.account_number LIKE '%$request->account_number%'
            AND account_general_information.status LIKE '2'
            ");

        return response()->json($results);
    }


    public function create(){
         $share_amount = DB::table('setting_data')->where('setting_description', 'share_amount')->first()->setting_data;
        return view('members.member.create', compact('share_amount'));
    }

    public function member_creation(Request $request){

        //-------------------------------------request parameters
        // return $request->customer_id;
        // return $request->share_amount/share count;
        // return $request->share_value;
        return response()->json('Member created');


        $already_in = Member::where('customer_id', $request->customer_id)->first();

        if($already_in){
                return response()->json('Member already exists');
            }

            $mem = Member::create($request->all());
            $mem->is_enable= 1;

            $branch_id = CustomerBasicData::where('customer_id', $request->customer_id)->first();
            $branch_id->non_member=0;
            $branch_id->member=1;
            $branch_id->save();
            $mem->member_number= 'W-'.$request->customer_id;

            $mem->save();


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
            $transaction_shares['customer_id']=$branch_id->customer_id;
            $transaction_shares['branch_id']=$branch_id->branch_id;
            $transaction_shares['is_enable']=1;
            $transaction_shares['created_by']=Auth::user()->id;
            $transaction_shares['transaction_value']= $request->share_amount;
            $transaction_shares['balance_value']=$request->share_amount;
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
            return response()->json('Member created');

    }

    public function add_nominee_member_creation(Request $request){
        MemberCreationNominee::create($request->all());

        $data = MemberCreationNominee::where('member_id', $request->member_id)->get();

        return response()->json($data);
    }

    public function remove_nominee_member_creation(Request $request){
        MemberCreationNominee::find($request->id)->delete();

        return response()->json('Nominee Removed');
    }



}
