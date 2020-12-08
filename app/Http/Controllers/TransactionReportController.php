<?php

namespace App\Http\Controllers;

use App\Models\AccountGeneralInformation;
use App\Models\CashierDailyTransaction;
use App\Models\TransactionData;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

        $users = User::where('branh_id',Auth::user()->branh_id)->get();
        return view('transaction_report.cashInHand',compact('users'));
    }

    public function reportOfTransactions(){

        $users = User::where('branh_id',Auth::user()->branh_id)->get();
        return view('transaction_report.reportOfMember',compact('users'));
    }

    public function cashInHandBranch(){

        return view('transaction_report.cashInHandBranch');
    }

    public function getUserRep(Request $request){


        $data = array(0,0,0,0,0,0,0);

        $t_in = TransactionData::where('created_by',$request->user)
                ->whereBetween('created_at',[date($request->from),date($request->to)])
                ->where('transaction_type','DEPOSITE')
                ->where('is_intern_transaction',1)
                ->sum('transaction_value');

        $t_out = TransactionData::where('created_by',$request->user)
                ->whereBetween('created_at',[date($request->from),date($request->to)])
                ->where('transaction_type','WITHDRAW')
                ->where('is_intern_transaction',1)
                ->sum('transaction_value');
        $reci = TransactionData::where('created_by',$request->user)
                ->whereBetween('created_at',[date($request->from),date($request->to)])
                ->where('transaction_type','DEPOSITE')
                ->where('is_intern_transaction',0)
                ->sum('transaction_value');
        $paym = TransactionData::where('created_by',$request->user)
                ->whereBetween('created_at',[date($request->from),date($request->to)])
                ->where('transaction_type','WITHDRAW')
                ->where('is_intern_transaction',0)
                ->sum('transaction_value');
        $depo = TransactionData::where('created_by',$request->user)
                ->whereBetween('created_at',[date($request->from),date($request->to)])
                ->where('transaction_type','DEPOSITE')
                ->where('is_intern_transaction',2)
                ->sum('transaction_value');
        $withd = TransactionData::where('created_by',$request->user)
                ->whereBetween('created_at',[date($request->from),date($request->to)])
                ->where('transaction_type','WITHDRAW')
                ->where('is_intern_transaction',2)
                ->sum('transaction_value');

        $bal = ($t_in + $reci +$depo ) - ($t_out + $paym +$withd);
        $data = [$t_in,$t_out,$reci,$paym,$depo,$withd,$bal];

        return response()->json(['DATA' => $data]);
        // return response()->json(['DATA' => $data]);
    }

    public function getBranchRep(Request $request){

        return response()->json($request);
    }

    public function getTransactions(Request $request){


        if($request->type == "ALL"){
        $trn = DB::table('transaction_data')
                ->leftJoin('customer_basic_data','transaction_data.customer_id','=','customer_basic_data.customer_id')
                ->leftJoin('account_general_information','transaction_data.customer_id','=','account_general_information.customer_id')
                ->leftJoin('account_types','account_general_information.account_type_id','=','account_types.id')
                ->leftJoin('users','transaction_data.created_by','=','users.id')
                ->whereBetween('transaction_data.created_at',[date($request->from),date($request->to)])
                ->get();
        return response()->json($trn);
        }else if($request->type == "DEPOSITED"){

             $trn = DB::table('transaction_data')
                ->leftJoin('customer_basic_data','transaction_data.customer_id','=','customer_basic_data.customer_id')
                ->leftJoin('account_general_information','transaction_data.customer_id','=','account_general_information.customer_id')
                ->leftJoin('account_types','account_general_information.account_type_id','=','account_types.id')
                ->leftJoin('users','transaction_data.created_by','=','users.id')
                ->where('transaction_data.transaction_type','DEPOSITE')
                ->whereBetween('transaction_data.created_at',[date($request->from),date($request->to)])
                ->get();
        return response()->json($trn);
        }else if($request->type == "WITHDRAWED"){

             $trn = DB::table('transaction_data')
                ->leftJoin('customer_basic_data','transaction_data.customer_id','=','customer_basic_data.customer_id')
                ->leftJoin('account_general_information','transaction_data.customer_id','=','account_general_information.customer_id')
                ->leftJoin('account_types','account_general_information.account_type_id','=','account_types.id')
                ->leftJoin('users','transaction_data.created_by','=','users.id')
                ->where('transaction_data.transaction_type','WITHDRAW')
                ->whereBetween('transaction_data.created_at',[date($request->from),date($request->to)])
                ->get();
        return response()->json($trn);
        }
    }

    public function findBtween(Request $request){


        if($request->from != 0){
            // $skip = $request->from - 1;
            // $take = $request->to - $skip;
            $select = TransactionData::where('account_id',$request->acId)->whereBetween('created_at',[date($request->from),date($request->to)])->get();
             return response()->json($select);
        }else{
            // $skip = $request->from;
            // $take = $request->to - $skip;
            $select = TransactionData::where('account_id',$request->acIdk)->whereBetween('created_at',[date($request->from),date($request->to)])->get();
             return response()->json($select);
        }

        // $select = TransactionData::where('account_id',"SPM001-00001-045")->skip(2)->take(5)->get();

        // return response()->json($select);
    }


}
