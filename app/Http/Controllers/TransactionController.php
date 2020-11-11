<?php

namespace App\Http\Controllers;

use App\Models\AccountGeneralInformation;
use App\Models\CustomerBasicData;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function findMembers(Request $request){
        
        $customers= CustomerBasicData::where('name_in_use',$request->name)->get();
        return response()->json($customers);
    }
    public function findMembersById(Request $request){

        $customers= AccountGeneralInformation::where('account_number',$request->id)->get();
        return response()->json($customers);
    }
}
