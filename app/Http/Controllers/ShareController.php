<?php

namespace App\Http\Controllers;

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
        return response()->json($request);
    }
    public function transfer_shares(Request $request){
        return response()->json($request);
    }
}
