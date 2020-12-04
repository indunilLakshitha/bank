<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FdAccountController extends Controller
{
    public function index(){
         $branch=Branch::where('id',Auth::user()->branh_id)->first();
        return view('fd.index',compact('branch'));
    }
}
