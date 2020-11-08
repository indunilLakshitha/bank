<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpenSavingsAccountController extends Controller
{
    public function get_cus_details(Request $request){

        $data = DB::table('customer_basic_data')
        ->where('customer_basic_data.identification_type_id', $request->identification_type_id)
        ->where('customer_basic_data.identification_number', $request->identification_number)
        ->leftJoin('branches', 'branches.id', 'customer_basic_data.branch_id')
        ->leftJoin('customer_status_dates', 'customer_status_dates.customer_id', 'customer_basic_data.customer_id')
        ->first();
        return response()->json($data);
    }

    public function get_guardian(Request $request){
        $customer_id = DB::table('customer_basic_data')
        ->where('customer_basic_data.identification_type_id', $request->identification_type_id)
        ->where('customer_basic_data.identification_number', $request->identification_number)
        ->first()
        ->customer_id;

        $guradian_id = DB::table('guardian_data')->where('customer_id', $customer_id)->first()->guardian_id;

        $data = DB::table('customer_basic_data')
        ->where('customer_basic_data.customer_id', $guradian_id)
        ->leftJoin('address_data', 'address_data.customer_id', 'customer_basic_data.customer_id')
        ->first()
        ;


        return response()->json($data);
    }
}
