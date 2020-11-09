<?php

namespace App\Http\Controllers;

use App\AccountGeneralInformation;
use App\Models\ProductData;
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

    public function get_cus_details_by_name(Request $request){
        $data = DB::table('customer_basic_data')
        ->where('customer_basic_data.full_name', $request->full_name)
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

    public function submitAll(Request $request){

        // return $request;
        $rec = AccountGeneralInformation::create($request->all());

        if($request->file('cus_sign_img')){
            $image = $request->file('cus_sign_img');
            $path = '/images/';
            $rec->cus_sign_img = time().rand().'.'.$image->extension();
            $image->move(public_path($path), $rec->cus_sign_img);
        }
        $rec->save();

        ProductData::create($request->all());

        return 123;
    }

    public function search_by_name(Request $request){
        // $data = DB::table('customer_basic_data')
        // ->where('full_name', 'LIKE', '%$request->other_holder_name%')
        // ->get();
        $data = DB::select("
        SELECT * FROM customer_basic_data
        WHERE full_name LIKE '%$request->other_holder_name%'
        OR name_in_use LIKE '%$request->other_holder_name%'
        OR surname LIKE '%$request->other_holder_name%'
        ");
        return response()->json($data);
    }
}
