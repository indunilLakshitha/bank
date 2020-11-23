<?php

namespace App\Http\Controllers;

use App\Models\SubAccount;
use App\Models\TransactionSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavingsSchemaParameterController extends Controller
{
    public function generalSchemaParameters(){

        return view('sub_accounts.m.savings_schema.general_schema');
    }

    public function generalSchemaParametersSave(Request $request){
        // return $request;
          $sub_account=SubAccount::create($request->all());
          $sub_account->created_by = Auth::user()->name;
          $sub_account->save();

          $sub_acc_id = $sub_account->id;
        return view('sub_accounts.m.savings_schema.transaction_schema', compact('sub_acc_id'));
    }

    public function transaction_scheme_params(Request $request){
        // return $request;

        $ts = TransactionSchema::create($request->all());
        $ts->created_by = Auth::user()->name;
        $ts->save();
        return redirect('/')->with('success', 'Created Sub Account'.$request->sub_account_id);
    }
}
