<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SavingsSchemaParameterController extends Controller
{
    public function generalSchemaParameters(){

        return view('sub_accounts.savings_schema.general_schema');
        }
}
