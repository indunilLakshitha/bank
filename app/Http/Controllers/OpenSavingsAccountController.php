<?php

namespace App\Http\Controllers;

use App\AccountGeneralInformation;
use App\Models\Joinaccount;
use App\Models\JoinaccountMember;
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
        $acc = AccountGeneralInformation::create($request->all());

        if($request->file('cus_sign_img')){
            $image = $request->file('cus_sign_img');
            $path = '/images/';
            $acc->cus_sign_img = time().rand().'.'.$image->extension();
            $image->move(public_path($path), $acc->cus_sign_img);
        }
        $acc->save();

        $prod_data = ProductData::create($request->all());

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

    public function client_details(Request $request){
        $acc = AccountGeneralInformation::create($request->all());

        if($request->file('cus_sign_img')){
            $image = $request->file('cus_sign_img');
            $path = '/images/';
            $acc->cus_sign_img = time().rand().'.'.$image->extension();
            $image->move(public_path($path), $acc->cus_sign_img);
        }
        $acc->save();

        $account_id = $acc->id;

        return view('savings.3_product_details', compact('account_id') );
    }

    public function product_details(Request $request){
        // return $request;
        $prod_data = ProductData::create($request->all());

        $customer_id = AccountGeneralInformation::find($request->account_id)->customer_id;
        $prod_id = $prod_data->id;
        $account_id = $request->account_id;

        return view('savings.4_joint_acoount', compact('customer_id', 'prod_id', 'account_id'));
    }

    public function create_join_account(Request $request){

        $j_acc = Joinaccount::create($request->all());

        return response()->json($j_acc);
    }

    public function add_mem_join_account(Request $request){

        $mem = JoinaccountMember::create($request->all());

        if($request->file('other_holder_sign_img')){
            $image = $request->file('other_holder_sign_img');
            $path = '/images/';
            $mem->other_holder_sign_img = time().rand().'.'.$image->extension();
            $image->move(public_path($path), $mem->other_holder_sign_img);
        }
        $mem->save();

        $j_acc = Joinaccount::find($request->join_account_id);
        $j_acc->holders_count++;
        $j_acc->save();
    }
}
