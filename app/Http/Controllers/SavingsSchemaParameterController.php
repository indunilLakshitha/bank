<?php

namespace App\Http\Controllers;

use App\Models\SubAccount;
use Illuminate\Http\Request;

class SavingsSchemaParameterController extends Controller
{
    public function generalSchemaParameters(){

        return view('sub_accounts.m.savings_schema.general_schema');
    }

    public function generalSchemaParametersSave(Request $request){
        // return $request;
          $sub_account=SubAccount::create($request->all());
        return view('sub_accounts.m.savings_schema.transaction_schema');
    }
}
