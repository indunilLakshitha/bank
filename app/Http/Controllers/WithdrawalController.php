<?php

namespace App\Http\Controllers;

use App\Member;
use App\Models\AccountGeneralInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawalController extends Controller
{
    public function load_saving_details(Request $request){

         $accs = AccountGeneralInformation::leftjoin('product_data','product_data.account_id','account_general_information.id')
        ->leftjoin('sub_accounts','sub_accounts.id','product_data.product_type_id')
                ->where('customer_id', $request->id)
                ->select('account_general_information.*','sub_accounts.sub_account_description')
                ->get();
        $shares = Member::where('customer_id',  $request->id)->first();
        $settings=DB::table('setting_data')->where('id',2)->get();
        $share_val = 0;
        if(isset($shares->share_amount)) {
            $share_val = $shares->share_amount;
        }
        $share_amount=$settings[0]->setting_data*$share_val;
        return response()->json(compact('accs', 'shares','share_amount'));
    }
}
