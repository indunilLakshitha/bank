<?php

namespace App\Http\Controllers;

use App\Models\PalmtopTransactionData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LatestTransactionApiController extends Controller
{
    public function __construct()
    {

        date_default_timezone_set('Asia/Colombo');

    }
    public function latestTransactions(Request $request){
        try {
            $user_id = isset($request->user_id)?intval($request->user_id):0;
            $search_data = isset($request->search_data)?intval($request->search_data):'';

            $sql = "SELECT cbd.`full_name`, ptd.`customer_id`, ptd.`account_id`, ptd.`transaction_value`,  ptd.`created_at`, ptd.`invoice_number`,
                    IF(ptd.`status` = 1, 'Transaction Completed', IF(ptd.`status` = 0, 'Pending Transaction', 'Transaction Decliend')) AS 'status'
                    FROM `palmtop_transaction_data` AS ptd
                    INNER JOIN `customer_basic_data` AS cbd ON cbd.`customer_id` = ptd.`customer_id`
                    WHERE ptd.`is_enable` = 1 AND ptd.`created_by` = ".$user_id;
            if($search_data != '' && $search_data != null){
                $sql .= " (cbd.`full_name` LIKE '%".$search_data."%' OR ptd.`customer_id` LIKE '%".$search_data."%' OR
                            ptd.`account_id` LIKE '%".$search_data."%' OR ptd.`invoice_number` LIKE '%".$search_data."%' )";
            }
            $sql .= " ORDER BY ptd.`id` DESC
                 LIMIT 50";
            $transaction['status'] = 'succeed';
            $transaction['data'] = 'Latest transaction pass correctly';
            $transaction['output'] = DB::select($sql);
        } catch (\Exception $e) {
            $transaction['status'] = 'failed';
            $transaction['data'] = 'Latest transaction pass error';
            $transaction['output'] = array();
        }
        return response()->json($transaction);

    }
    public function customerTransactions(Request $request){
        try {
            $user_id = isset($request->user_id)?intval($request->user_id):0;
            $customer_id = isset($request->customer_id)?intval($request->customer_id):0;
            $search_data = isset($request->search_data)?intval($request->search_data):'';

            $sql = "SELECT cbd.`full_name`, ptd.`customer_id`, ptd.`account_id`, ptd.`transaction_value`,  ptd.`created_at`, ptd.`invoice_number`,
                    IF(ptd.`status` = 1, 'Transaction Completed', IF(ptd.`status` = 0, 'Pending Transaction', 'Transaction Decliend')) AS 'status'
                    FROM `palmtop_transaction_data` AS ptd
                    INNER JOIN `customer_basic_data` AS cbd ON cbd.`customer_id` = ptd.`customer_id`
                    WHERE ptd.`is_enable` = 1 AND ptd.`created_by` = ".$user_id." AND ptd.`customer_id` = ".$customer_id;
            if($search_data != '' && $search_data != null){
                $sql .= " (cbd.`full_name` LIKE '%".$search_data."%' OR ptd.`customer_id` LIKE '%".$search_data."%' OR
                            ptd.`account_id` LIKE '%".$search_data."%' OR ptd.`invoice_number` LIKE '%".$search_data."%' )";
            }
            $sql .= " ORDER BY ptd.`id` DESC
                 LIMIT 50";
            $transaction['status'] = 'succeed';
            $transaction['data'] = 'Customer transaction pass correctly';
            $transaction['output'] = DB::select($sql);
        } catch (\Exception $e) {
            $transaction['status'] = 'failed';
            $transaction['data'] = 'Customer transaction pass error';
            $transaction['output'] = array();
        }
        return response()->json($transaction);

    }
    public function todayTransactions($user_id){
        $yesterday=Carbon::yesterday();
        $latest_transactions = PalmtopTransactionData::where('created_by',$user_id)
                                ->where('created_at','>',$yesterday)
                                ->take(20)
                                ->get();

        return response()->json($latest_transactions);


    }
    public function getCollectionSummary(Request $request){
        try {
            $branch_id= isset($request->branch_id)?intval($request->branch_id):0;
            $user_id = isset($request->user_id)?intval($request->user_id):0;
            $sql = "SELECT ptd.`updated_at` AS 'transaction_date', SUM(ptd.`transaction_value`) AS 'total_value', COUNT(ptd.`id`) AS 'count_value', CONCAT(b.`branch_code`, ' - ', b.`branch_name` ) AS 'branch'
                    FROM `palmtop_transaction_data` AS ptd
                    INNER JOIN `branches` AS b ON b.`id` = ptd.`branch_id`
                    WHERE ptd.`branch_id` = ".$branch_id." AND ptd.`created_by` = ".$user_id."
                    GROUP BY ptd.`updated_at`, b.`branch_code`, b.`branch_name` ";
            $transaction['status'] = 'succeed';
            $transaction['data'] = 'Customer transaction pass correctly';
            $transaction['output'] = DB::select($sql);
        } catch (\Exception $e) {
            $transaction['status'] = 'failed';
            $transaction['data'] = 'Customer transaction pass error';
            $transaction['output'] = array();
        }
        return response()->json($transaction);
    }
}
