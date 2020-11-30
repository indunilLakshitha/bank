<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class ShareController extends Controller
{

    public function buyview(){
        return view('shares.buy');
    }

    public function transferview(){
        return view('shares.transfer');
    }

    public function historyview(){
        return view('shares.history');
    }

    public function buy_shares(Request $request){

        $member=Member::where('customer_id',$request->customer_id)->first();
        $member->share_amount+=$request->n_of_shares;
        $member->save();
        return response()->json($member);
    }
    public function transfer_shares(Request $request){
        return response()->json($request);
    }
}
