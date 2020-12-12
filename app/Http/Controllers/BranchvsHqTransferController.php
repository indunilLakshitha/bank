<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BranchvsHqTransferController extends Controller
{
    public function index(){
        return view('palmtop.branchvsheadoffice');
    }
    public function palmtop(){
        return view('palmtop.palmtoptransactions');
    }
}
