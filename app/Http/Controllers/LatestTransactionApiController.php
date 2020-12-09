<?php

namespace App\Http\Controllers;

use App\Models\PalmtopTransactionData;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LatestTransactionApiController extends Controller
{
    public function __construct()
    {

        date_default_timezone_set('Asia/Colombo');

    }
    public function latestTransactions(Request $request){
        $latest_transactions = PalmtopTransactionData::where('customer_id',$request->customerr_id)
                                ->where('created_by',$request->user_id)
                                ->take(20)
                                ->get();
        return response()->json($latest_transactions);

    }
    public function todayTransactions($user_id){
        $yesterday=Carbon::yesterday();
        $latest_transactions = PalmtopTransactionData::where('created_by',$user_id)
                                ->where('created_at','>',$yesterday)
                                ->take(20)
                                ->get();

        return response()->json($latest_transactions);
      

    }
}
