<?php

namespace App\Http\Controllers;

use App\cash_in_hand_ledger;
use App\Models\AccountGeneralInformation;
use App\Models\CashierDailyTransaction;
use App\Models\CustomerBasicData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PalmtopTransactionData;
use App\Models\PaymentLog;
use App\Models\saving_deposit_base_ledger;
use App\Models\TransactionData;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Traits\HasRoles;
use Spatie\Permission\Contracts\Role;

class BranchvsHqTransferController extends Controller
{
    public function index(){
          $branchoffices=CustomerBasicData::leftjoin('account_general_information','account_general_information.customer_id',
                                'customer_basic_data.customer_id')
                            ->where('customer_basic_data.is_branch','1')
                            ->where('customer_basic_data.branch_id',Auth::user()->branh_id)
                            ->select('account_general_information.account_number')
                            ->get();
         $headofices=CustomerBasicData::leftjoin('account_general_information','account_general_information.customer_id',
                                'customer_basic_data.customer_id')
                            ->where('customer_basic_data.is_branch','1')
                            ->where('customer_basic_data.is_hq','1')
                            ->select('account_general_information.account_number')
                            ->get();
           $cashiers=User::all();

        //                     $branch_users = User::where('branh_id',Auth::user()->branh_id)->get();
        // $created_users = array();
        // $i =0;
        // foreach($branch_users as $branch_user){

        //     $created_users[$i] = $branch_user->id;
        //     $i++;
        // }
        return view('palmtop.branchvsheadoffice',compact('branchoffices','headofices','cashiers'));
    }
    public function palmtop(){

         $branch_id=Auth::user()->branh_id;
$data=PalmtopTransactionData::leftjoin('customer_basic_data','customer_basic_data.customer_id','palmtop_transaction_data.customer_id')
                            ->leftjoin('account_general_information','account_general_information.account_number','palmtop_transaction_data.account_id')
                            ->select('palmtop_transaction_data.id as idd','account_general_information.*','customer_basic_data.*')
                            ->where('palmtop_transaction_data.is_transfered','0')
                            ->where('customer_basic_data.branch_id',$branch_id)
                            ->get();

        return view('palmtop.palmtoptransactions', compact('data'));
    }

    public function transfer(Request $request){
        // $branch_account=AccountGeneralInformation::where('account_number',$request->branch_account_number)->first();
        // $hq_account=AccountGeneralInformation::where('account_number',$request->hq_account_number)->first();


        $payment_log=$request;
        $cashier=User::where('id',$request->user)->first();
        $general_account=AccountGeneralInformation::where('account_number',$request->branch_account_number)->first();
        $general_account->account_balance -= $request->transaction_value;
        $general_account->save();
        $general_account_branch=$general_account;
        $payment_log['created_by']=$cashier->id;
        $payment_log['transaction_type']="WITHDRAW";
        $payment_log['is_intern_transaction']=0;
        $payment_log['balance_value']= $general_account->account_balance;

        $transaction_data=TransactionData::create($payment_log->all());

        $payment_log['transaction_data_id']=$transaction_data->id;
        $payment_log['balance_amount']=$general_account->account_balance;
        $succsess=PaymentLog::create($payment_log->all());

        $cashie_daily_trancastion=$request;
        $cashie_daily_trancastion['user_id']=$cashier->id;
        $cashie_daily_trancastion['transaction_type']="WITHDRAW";
        $cashie_daily_trancastion['transaction_id']=$transaction_data->id;
        $cashie_daily_trancastion['account_number']=$request->account_id;
        $cashie_daily_trancastion['transaction_amount']=$request->transaction_value;
        $cashie_daily_trancastion['balance_value']=$general_account->account_balance;

        $cashie_daily_trancastion['transaction_code']="testing";
        $cashie_daily_trancastion['is_enable']=1;
        $cashie_daily_trancastion['branch_id']=$cashier->branh_id;
        $cashie_daily_trancastion['branch_balance']= $general_account_branch->account_balance;
        $cashie_daily_trancastion['transaction_date']=Carbon::today()->toDateString();

        CashierDailyTransaction::create($cashie_daily_trancastion->all());

        $cash_in_hand_ledger=$request;
        $cash_in_hand_ledger['transaction_data_id']=$transaction_data->id;
        $cash_in_hand_ledger['customer_id']=$transaction_data->id;
        $cash_in_hand_ledger['acccount_id']=$request->account_id;
        $cash_in_hand_ledger['user_id']=$cashier->id;
        $cash_in_hand_ledger['transaction_type']="WITHDRAW";
        $cash_in_hand_ledger['transaction_value']=$request->transaction_value;
        $total_cash_in_hand=cash_in_hand_ledger::where('user_id',$cashier->id)->orderBy('id','desc')
        ->select('balance_amount')->first();
        $balance_amount =isset($total_cash_in_hand)?$total_cash_in_hand->balance_amount:0.00;
        $cash_in_hand_ledger['balance_amount']=0;
        $cash_in_hand_ledger['balance_amount']=$balance_amount-$request->transaction_value;
        $cash_in_hand_ledger['branch_balance']= isset($general_account_branch)?$general_account_branch->account_balance:0.00;
        $cash_in_hand_ledger['is_enable']=1;

        cash_in_hand_ledger::create($cash_in_hand_ledger->all());
        $saving_deposit_base_ledger=$request;
        $saving_deposit_base_ledger['transaction_data_id']=$transaction_data->id;
        $saving_deposit_base_ledger['acccount_id']=$request->account_id;
        $saving_deposit_base_ledger['transaction_type']="DEPOSITE";
        $saving_deposit_base_ledger['transaction_value']=$request->transaction_value;
        $saving_deposit_base_ledger_in_hand=saving_deposit_base_ledger::where('user_id',$cashier->id)
                                        ->orderBy('id','desc')->first();
        $balance_amount1 =isset($saving_deposit_base_ledger_in_hand)?doubleval($saving_deposit_base_ledger_in_hand->balance_amount):0.00;
        $saving_deposit_base_ledger['balance_amount']=$balance_amount1-$request->transaction_value;
        $saving_deposit_base_ledger['is_enable']=1;
        $saving_deposit_base_ledger['user_id']=$cashier->id;
        $saving_deposit_base_ledger['transaction_date']=Carbon::today()->toDateString();

        $saving_deposit_base_ledger['branch_balance']= isset($general_account_branch)?$general_account_branch->account_balance:0.00;

        saving_deposit_base_ledger::create($saving_deposit_base_ledger->all());



        //-----------------------------------deposite to hq account---------------------

        $general_account_2=AccountGeneralInformation::where('account_number',$request->hq_account_number)->first();
        $general_account_2->account_balance += $request->transaction_value;
        $general_account_2->save();



        return response()->json("success");
    }


    // public function transfer(Request $request){


    //     $branch_account=AccountGeneralInformation::where('account_number',$request->branch_account_number)->first();
    //     $branch_account->account_balance-=$request->transaction_value;
    //     $branch_account->save();
    //     $hq_account=AccountGeneralInformation::where('account_number',$request->hq_account_number)->first();
    //     $hq_account->account_balance+=$request->transaction_value;
    //     $hq_account->save();



    //     return response()->json($request);
    // }
}
