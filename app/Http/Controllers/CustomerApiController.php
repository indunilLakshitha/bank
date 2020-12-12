<?php

namespace App\Http\Controllers;

use App\Models\CustomerBasicData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerApiController extends Controller
{
    public function __construct()
    {

        date_default_timezone_set('Asia/Colombo');

    }
    public function viewAllCustomer(Request $request){
        try {
            $branch_id = isset($request->branch_id)?intval($request->branch_id):0;
            $search_data = isset($request->search_data)?intval($request->search_data):'';

            $sql = "SELECT cbd.`id`, cbd.`customer_id`,cbd.`full_name`, cbd.`identification_number`, agi.`account_number`,agi.`account_balance`,
                    agi.`plam_top_balance`
                    FROM `customer_basic_data` AS cbd
                    INNER JOIN `account_general_information` AS agi ON agi.`customer_id` = cbd.`customer_id`
                    WHERE cbd.`branch_id` = ".$branch_id." AND cbd.`is_enable` = 1 AND cbd.`status` < 2 AND agi.`status` = 1 AND agi.`is_enable` = 1";
            if($search_data != '' && $search_data != null){
                $sql .= "(cbd.`full_name` LIKE '%".$search_data."%' OR agi.`account_number` LIKE '%".$search_data."%' )";
            }
            $sql .= " ORDER BY agi.`updated_at` DESC
                 LIMIT 20";
            $customer['status'] = 'succeed';
            $customer['data'] = 'Customer data pass correctly';
            $customer['output'] = DB::select($sql);
        } catch (\Exception $e) {
            $customer['status'] = 'failed';
            $customer['data'] = 'Customer data pass error';
            $customer['output'] = array();
        }
        return response()->json($customer);
    }
    public function viewCustomer(Request $request){
        try {
            $customer_id = isset($request->customer_id)?intval($request->customer_id):0;
            $customer['status'] = 'succeed';
            $customer['data'] = 'Customer data pass correctly';
            $customer['output'] =CustomerBasicData::leftjoin('account_general_information','account_general_information.customer_id','customer_basic_data.customer_id')
                                    ->where('customer_basic_data.customer_id',$customer_id)->first();
        return response()->json($customer);
        } catch (\Exception $e) {
            $customer['status'] = 'failed';
            $customer['data'] = 'Customer data pass error';
            $customer['output'] = array();
        }
        return response()->json($customer);
    }
}
