<?php

namespace App\Http\Controllers;

use App\Models\AccountGeneralInformation;
use App\Models\CustomerBasicData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchvsHqTransferController extends Controller
{
    public function index(){
         $branchoffices=CustomerBasicData::leftjoin('account_general_information','account_general_information.customer_id',
                                'customer_basic_data.customer_id')
                            ->where('customer_basic_data.is_branch','1')
                            ->where('customer_basic_data.branch_id',Auth::user()->branh_id)
                            ->select('account_general_information.account_number')
                            ->get();
         $headofices=CustomerBasicData::leftjoin('account_general_information','account_general_information.customer_id',
                                'customer_basic_data.customer_id')
                            ->where('customer_basic_data.is_branch','1')
                            ->where('customer_basic_data.is_hq','1')
                            ->select('account_general_information.account_number')
                            ->get();
        return view('palmtop.branchvsheadoffice',compact('branchoffices','headofices'));
    }
    public function palmtop(){
        return view('palmtop.palmtoptransactions');
    }

    public function transfer(Request $request){
        return response()->json($request);
    }
}
