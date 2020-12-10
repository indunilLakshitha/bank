<?php

namespace App\Http\Controllers;

use App\Models\CustomerBasicData;
use Illuminate\Http\Request;

class CustomerApiController extends Controller
{
    public function __construct()
    {

        date_default_timezone_set('Asia/Colombo');

    }
    public function viewAllCustomer(Request $request){
        $branch_id = isset($request->branch_id)?intval($request->branch_id):0;
        $search_data = isset($request->search_data)?intval($request->search_data):'';

        $customer =CustomerBasicData::leftjoin('account_general_information','account_general_information.customer_id','customer_basic_data.customer_id')
                ->where('customer_basic_data.customer_id',$branch_id)->get();
        return response()->json($customer);
    }
    public function viewCustomer(Request $request){
        $customer_id = isset($request->customer_id)?intval($request->customer_id):0;
        $customer =CustomerBasicData::leftjoin('account_general_information','account_general_information.customer_id','customer_basic_data.customer_id')
                ->where('customer_basic_data.customer_id',$customer_id)->first();
        return response()->json($customer);
    }
}
