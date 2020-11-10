<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountVerificationController extends Controller
{
    public function accountDetails($id){

        return view('savings.view_details.account_details');
    }
}
