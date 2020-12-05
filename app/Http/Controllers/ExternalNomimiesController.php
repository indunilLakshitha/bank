<?php

namespace App\Http\Controllers;

use App\Member;
use App\Models\ExternalNomimies;
use Illuminate\Http\Request;

class ExternalNomimiesController extends Controller
{
    public function add(Request $request){

        $nominie=$request;

        $mem=Member::where('customer_id',$request->customer_id)->first();
        $nominie['member_id']=$mem->member_number;
        $nominie['contact_no']=$request->contact_no;
        $nominie['nic']=$request->nic;
        $nominie['address']=$request->address;

        ExternalNomimies::create($nominie->all());
        $nominies=ExternalNomimies::where('member_id',$nominie['member_id'])->get();
        return response()->json($nominies);

    }
}
