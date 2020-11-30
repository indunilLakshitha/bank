<?php

namespace App\Http\Controllers;

use App\Member;
use App\Models\AccountGeneralInformation;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function load_saving_details(Request $request){

        $accs = AccountGeneralInformation::where('customer_id', $request->id)->get();
        $shares = Member::where('customer_id',  $request->id)->first();
        return response()->json(compact('accs', 'shares'));
    }
}
