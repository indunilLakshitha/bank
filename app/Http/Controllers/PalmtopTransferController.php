<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PalmtopTransferController extends Controller
{
    public function submit_palmtop_data(Request $request){
        // return $request;

        $ids_arr = [];
        foreach($request->is_checked as $palmtop_transaction_id){
            array_push($ids_arr, ['palmtop_transaction_id' => $palmtop_transaction_id]) ;
        }

        foreach($ids_arr as $ids_ar){

            return response()->json($ids_ar);

        }

    }
}
