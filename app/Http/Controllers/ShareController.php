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
}