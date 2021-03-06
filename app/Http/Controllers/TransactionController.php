<?php

namespace App\Http\Controllers;

use App\AccountGeneralInformation as AppAccountGeneralInformation;
use App\Models\AccountGeneralInformation;
use App\Models\CustomerBasicData;
use App\Models\PaymentLog;
use App\Models\TransactionData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function findMembers(Request $request){

        $customers= CustomerBasicData::leftjoin('account_general_information','account_general_information.customer_id','customer_basic_data.customer_id')
            ->where('customer_basic_data.name_in_use',$request->name)
            ->select('account_general_information.account_number','account_general_information.account_balance','customer_basic_data.*')
            ->get();
        return response()->json($customers);
    }
    public function findMembersById(Request $request){

        $customers= AccountGeneralInformation::where('account_number',$request->id)->get();
        return response()->json($customers);
    }

    public function normalWithdraw(Request $request){

        $payment_log=$request;
        // return response()->json($request);

        $general_account=AccountGeneralInformation::where('account_number',$request->account_id)->first();
        $general_account->account_balance -= $request->transaction_value;
        $general_account->save();

        $payment_log['created_by']=Auth::user()->id;
        $transaction_data=TransactionData::create($payment_log->all());

        $payment_log['transaction_data_id']=$transaction_data->id;
        $payment_log['balance_amount']=$general_account->account_balance;
        $succsess=PaymentLog::create($payment_log->all());

        return response()->json($succsess);



    }
    public function normalDeposite(Request $request){

        $payment_log=$request;
        // return response()->json($request);

        $general_account=AccountGeneralInformation::where('account_number',$request->account_id)->first();
        $general_account->account_balance += $request->transaction_value;
        $general_account->save();

        $payment_log['created_by']=Auth::user()->id;
        $transaction_data=TransactionData::create($payment_log->all());

        $payment_log['transaction_data_id']=$transaction_data->id;
        $payment_log['balance_amount']=$general_account->account_balance;
        $succsess=PaymentLog::create($payment_log->all());

        return response()->json($succsess);



    }
}
