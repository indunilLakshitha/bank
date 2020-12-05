<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchCashInOutController extends Controller
{
    public function index(){
        return view('cashier.index');
    }

    public function index1(){
        $branches = Branch::where('id',Auth::user()->branh_id)->get();
        return view('deposit.branchCashInOut1',compact('branches'));
    }
    public function index2(){
        $branches = Branch::where('id',Auth::user()->branh_id)->get();
        return view('deposit.branchCashInOut2',compact('branches'));
    }

    public function submit1(Request $request){
        return response()->json("Success");
    }
    public function submit2(Request $request){
         return response()->json("Success");
    }
}
