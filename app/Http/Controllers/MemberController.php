<?php

namespace App\Http\Controllers;

use App\cash_in_hand_ledger;
use App\Member;
use App\MemberCreationNominee;
use App\Models\Branch;
use App\Models\CashierDailyTransaction;
use App\Models\CustomerBasicData;
use App\Models\CustomerStatusDates;
use App\Models\ExternalNomimies;
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
        //dd($request->input());
        $customer_id = $request->input('customer_id');
        $identification_number = $request->input('identification_number');
        $full_name = $request->input('full_name');
        $religion_data_id = $request->input('religion_data_id');
        $gender_id = $request->input('gender_id');
        $married_status_id= $request->input('married_status_id');
        $join_date= $request->input('join_date');
        $for_verify= intval($request->input('for_verify'));
        $sql = "SELECT cbd.`id`, cbd.`customer_id`, cbd.`customer_status_id`, cbd.`full_name`, cbd.`customer_status_id`,
                `status`, cbd.`identification_number`, IF(`member` = 1, 'Member', 'Non Member') AS 'status'
                FROM customer_status_dates AS csd
                LEFT JOIN customer_basic_data AS cbd ON cbd.customer_id = csd.customer_id
                WHERE ";
        if($for_verify > 0){
            $sql .= "  cbd.`status` = 2 ";
        } else {
            $sql .= "  cbd.`status` = 1 ";
        }
        if($customer_id != null && $customer_id != ''){
            $sql .= " AND cbd.`customer_id` LIKE '%".$customer_id."%'";
        }
        if($identification_number != null && $identification_number != ''){
            $sql .= " AND cbd.`identification_number` LIKE '%".$identification_number."%'";
        }
        if($full_name != null && $full_name != ''){
            $sql .= " AND cbd.`full_name` LIKE '%".$full_name."%'";
        }
        if($religion_data_id != null && $religion_data_id != ''){
            $sql .= " AND csd.`religion_data_id` LIKE '%".$religion_data_id."%'";
        }
        if($gender_id != null && $gender_id != ''){
            $sql .= " AND csd.`gender_id` LIKE '%".$gender_id."%'";
        }
        if($married_status_id != null && $married_status_id != ''){
            $sql .= " AND csd.`married_status_id` LIKE '%".$married_status_id."%'";
        }
        if($join_date != null && $join_date != ''){
            $sql .= " AND csd.`join_date` LIKE '%".$join_date."%'";
        }
        $user_data = Auth::user();
        if(intval($user_data->roles[0]->id) != 1) {
            $branch_id = $user_data->branh_id;
            $sql .= " AND cbd.branch_id = ". $branch_id;
        }
        $results = DB::select($sql);
        return response()->json($results);

    }

    public function VerificationSearch(Request $request){
        $customer_id = $request->input('customer_id');
        $identification_number = $request->input('identification_number');
        $full_name = $request->input('full_name');
        $account_number = $request->input('account_number');
        $for_verify= intval($request->input('for_verify'));
        $sql = "SELECT cbd.`id`, cbd.`customer_id`, cbd.`customer_status_id`, cbd.`full_name`, cbd.`customer_status_id`,
                agi.`status`, cbd.`identification_number`, IF(`member` = 1, 'Member', 'Non Member') AS 'status', agi.`account_number`
                FROM account_general_information AS agi
                INNER JOIN customer_status_dates AS csd ON csd.customer_id = agi.customer_id
                INNER JOIN customer_basic_data AS cbd ON cbd.customer_id = csd.customer_id
                WHERE cbd.`status` = 2";

        if($for_verify > 0){
            $sql .= " AND agi.`status` = 2 ";
        }
        if($customer_id != null && $customer_id != ''){
            $sql .= " AND cbd.`customer_id` LIKE '%".$customer_id."%'";
        }
        if($identification_number != null && $identification_number != ''){
            $sql .= " AND cbd.`identification_number` LIKE '%".$identification_number."%'";
        }
        if($full_name != null && $full_name != ''){
            $sql .= " AND cbd.`full_name` LIKE '%".$full_name."%'";
        }
        if($account_number != null && $account_number != ''){
            $sql .= " AND agi.`account_number` LIKE '%".$account_number."%'";
        }
        $user_data = Auth::user();
        if(intval($user_data->roles[0]->id) != 1) {
            $branch_id = $user_data->branh_id;
            $sql .= " AND cbd.branch_id = ". $branch_id;
        }
        $results = DB::select($sql);

        return response()->json($results);
    }


    public function create(){
         $share_amount = DB::table('setting_data')->where('setting_description', 'share_amount')->first()->setting_data;
        return view('members.member.create', compact('share_amount'));
    }

    public function member_creation(Request $request){

        //    return response()->json('Member created');

        $shareva=DB::table('setting_data')->where('id',2)->get();

        $already_in = Member::where('customer_id', $request->customer_id)->first();
        if($already_in){
                return response()->json('Member already exists');
            }

            $mem = Member::create($request->all());
            $mem->is_enable= 1;

            $branch_id = CustomerBasicData::where('customer_id', $request->customer_id)->first();
            $branch_id->non_member=0;
            $branch_id->member=1;

            $mem_date = CustomerStatusDates::where('customer_id', $request->customer_id)->first();
            $mem_date->member_date =Carbon::today()->toDateString();
            $mem_date->save();

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

            $last_payment_log = TransactionData::select('balance_value')->where('created_by',Auth::user()->id)->orderBy('id','desc')->first();
            $balance_payment_log = isset($last_payment_log)?$last_payment_log->balance_value:0.00;
            $payment_log['balance_value']=$balance_payment_log + ($request->share_amount *$shareva[0]->setting_data);

            $transaction_data=TransactionData::create($payment_log->all());

            $transaction_shares=$request;
            $transaction_shares['member_id']=$mem->member_number;
            $transaction_shares['transaction_type']="DEPOSITE";
            $transaction_shares['transaction_code']="ST";
            $transaction_shares['transaction_details']=$payment_log['transaction_details'];
            $transaction_shares['customer_id']=$branch_id->customer_id;
            $transaction_shares['is_enable']=1;
            $transaction_shares['created_by']=Auth::user()->id;
            $transaction_shares['transaction_value']= $request->share_amount*$shareva[0]->setting_data;

            $last_balance_of_cashie = TransactionShare::select('balance_value')->where('created_by',Auth::user()->id)->orderBy('id','desc')->first();
            $balance_of_cashie = isset($last_balance_of_cashie)?$last_balance_of_cashie->balance_value:0.00;
            $transaction_shares['balance_value']=$balance_of_cashie + ($request->share_amount *$shareva[0]->setting_data);

            TransactionShare::create($transaction_shares->all());


            $cash_in_hand_ledger=$request;
            $cash_in_hand_ledger['transaction_data_id']=$transaction_data->id;
            $cash_in_hand_ledger['customer_id']=$request->customer_id;
            $cash_in_hand_ledger['user_id']=Auth::user()->id;
            $cash_in_hand_ledger['transaction_type']="DEPOSITE";
            $cash_in_hand_ledger['transaction_value']=$request->transaction_value*$shareva[0]->setting_data;

            $last_cash_in_hand_branch_balance = cash_in_hand_ledger::select('branch_balance')->where('user_id',Auth::user()->id)->orderBy('id','desc')->first();
            $branch_balance_cash_in_hand_ledger = isset($last_cash_in_hand_branch_balance)?$last_cash_in_hand_branch_balance->branch_balance:0.00;
            $cash_in_hand_ledger['branch_balance']=$branch_balance_cash_in_hand_ledger;


            $last_cash_in_hand_ledger = cash_in_hand_ledger::select('balance_amount')->where('user_id',Auth::user()->id)->orderBy('id','desc')->first();
            $balance_cash_in_hand_ledger = isset($last_cash_in_hand_ledger)?$last_cash_in_hand_ledger->balance_amount:0.00;
            $cash_in_hand_ledger['balance_amount']=$balance_cash_in_hand_ledger + ($request->share_amount *$shareva[0]->setting_data);

            $cash_in_hand_ledger['is_enable']=1;
            cash_in_hand_ledger::create($cash_in_hand_ledger->all());


            $payment_log['transaction_data_id']=$transaction_data->id;
            // $payment_log['balance_amount']=$transaction_data->account_balance;
            $succsess=PaymentLog::create($payment_log->all());

            $cashie_daily_trancastion=$request;
            $cashie_daily_trancastion['user_id']=Auth::user()->id;
            $cashie_daily_trancastion['transaction_type']="DEPOSITE";
            $cashie_daily_trancastion['transaction_id']=$transaction_data->id;

            $cashie_daily_trancastion['transaction_amount']=$request->share_amount*$shareva[0]->setting_data;

            $last_cashie_daily_trancastion = CashierDailyTransaction::select('balance_value')->where('user_id',Auth::user()->id)->orderBy('id','desc')->first();
            $branch_balance_cashie_daily_trancastion = isset($last_cashie_daily_trancastion)?$last_cashie_daily_trancastion->balance_value:0.00;
            $cashie_daily_trancastion['balance_value']=$branch_balance_cashie_daily_trancastion + ($request->share_amount *$shareva[0]->setting_data);

            $cashie_daily_trancastion['is_enable']=1;
            $cashie_daily_trancastion['transaction_date']=Carbon::today()->toDateString();
            $cashie_daily_trancastion['branch_id']=Auth::user()->branh_id;


            $branch_last_cashie_daily_trancastion = CashierDailyTransaction::select('branch_balance')->where('branch_id',Auth::user()->branh_id)->orderBy('id','desc')->first();
            $branch_balance_cashie_daily_trancastion = isset($branch_last_cashie_daily_trancastion)?$branch_last_cashie_daily_trancastion->branch_balance:0.00;
            $cashie_daily_trancastion['branch_balance']=$branch_balance_cashie_daily_trancastion;

            CashierDailyTransaction::create($cashie_daily_trancastion->all());


            $saving_deposit_base_ledger=$request;
            $saving_deposit_base_ledger['transaction_data_id']=$transaction_data->id;
            $saving_deposit_base_ledger['acccount_id']=$request->account_id;
            $saving_deposit_base_ledger['transaction_type']="DEPOSITE";
            $saving_deposit_base_ledger['transaction_value']=$request->share_amount * $shareva[0]->setting_data;

            $last_saving_deposit_base_ledger = saving_deposit_base_ledger::select('balance_amount')->where('user_id',Auth::user()->id)->orderBy('id','desc')->first();
            $branch_balance_saving_deposit_base_ledger = isset($last_saving_deposit_base_ledger)?$last_saving_deposit_base_ledger->balance_amount:0.00;
            $saving_deposit_base_ledger['balance_amount']= $branch_balance_saving_deposit_base_ledger +($request->share_amount *$shareva[0]->setting_data);

            $branch_last_saving_deposit_base_ledger = saving_deposit_base_ledger::select('branch_balance')->where('user_id',Auth::user()->id)->orderBy('id','desc')->first();
            $branch_balance_saving_deposit_base_ledger = isset($branch_last_saving_deposit_base_ledger)?$branch_last_saving_deposit_base_ledger->branch_balance:0.00;
            $saving_deposit_base_ledger['branch_balance'] = $branch_balance_saving_deposit_base_ledger;

            $saving_deposit_base_ledger['is_enable']=1;
            saving_deposit_base_ledger::create($saving_deposit_base_ledger->all());
$msg='Member created'.$mem->member_number;
            return response()->json($msg);
           // return response()->json('Member created');

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
    public function close(Request $request){
        MemberCreationNominee::find($request->id)->delete();

        return redirect('/member');

    }

}
