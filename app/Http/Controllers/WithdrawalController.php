<?php

namespace App\Http\Controllers;

use App\Member;
use App\Models\AccountGeneralInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawalController extends Controller
{
    public function load_saving_details(Request $request){

        $accs = AccountGeneralInformation::where('customer_id', $request->id)->get();
        $shares = Member::where('customer_id',  $request->id)->first();
        $settings=DB::table('setting_data')->where('id',2)->get();
        $share_amount=$settings[0]->setting_data*$shares->share_amount;
        return response()->json($settings);
        return response()->json(compact('accs', 'shares','share_amount'));
    }
}
