<?php

namespace App\Http\Controllers;

use App\Member;
use App\Models\AccountGeneralInformation;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function load_saving_details(Request $request){

        $data =
        AccountGeneralInformation::leftjoin('members', 'members.customer_id','account_general_information.customer_id' )
        ->where('account_general_information.customer_id', $request->id)
        ->get();

        return response()->json($data);
    }
}
