<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\ContactType;
use App\Models\CustomerBasicData;
use App\Models\IedentificationType;
use Illuminate\Http\Request;


class MainBranchController extends Controller
{
    public function index(){

        return view('newbranches.index');
    }
    public function add(){
         $branches=Branch::where('is_enable',1)->get();
        $contacttypes=ContactType::all();

        return view('newbranches.1_add',compact('branches','contacttypes'));
    }

    public function store(Request $request){
        $branche=  CustomerBasicData::create($request->all());
        $count=count(CustomerBasicData::all())+1;
        $cus_count = '0000' .$count ;
         $cus_id = substr($cus_count, -3);
        $branche->customer_id=$cus_id;
        $branche->is_enable=1;
        $branche->status=1;
        $branche->save();
        return redirect()->route('newbranches.index');
    }
}
