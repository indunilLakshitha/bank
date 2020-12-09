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
   public function viewCustomer($customer_id){

    $customer =CustomerBasicData::leftjoin('account_general_information','account_general_information.customer_id','customer_basic_data.customer_id')
                ->where('customer_basic_data.customer_id',$customer_id)->first();
    return response()->json($customer);
   }
}
