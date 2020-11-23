<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterestSchemaParameterController extends Controller
{
    public function interestSchema(){

        return view('sub_accounts.m.interest_schema.interest_schema');

    }
    public function interestSchemaSubmit(Request $request){

        return view('sub_accounts.m.interest_schema.fees');

    }
    public function interestSchemaFeeSubmit(Request $request){

        return view('sub_accounts.m.interest_schema.tax_n_documents');

    }
}
