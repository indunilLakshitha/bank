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
                    ptd.`status`,IF(ptd.`status` = 1, 'Transaction Completed', IF(ptd.`status` = 0, 'Pending Transaction', 'Transaction Decliend')) AS 'status'
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

    public function addTransaction(Request $request) {
        try {
            $date = date('Y-m-d');
            $date_time = date('Y-m-d H:i:s');
            $branch_id= isset($request->branch_id)?intval($request->branch_id):0;
            $user_id = isset($request->user_id)?intval($request->user_id):0;
            $customer_id= isset($request->customer_id)?$request->customer_id:'';
            $account_id = isset($request->account_id)?$request->account_id:'';
            $deposit_type = isset($request->deposit_type)?$request->deposit_type:'';
            $amount = isset($request->amount)?doubleval($request->amount):0.00;
            $transaction_details = isset($request->narration)?$request->narration:'N/A';
            $payment_method_id = 1;
            //add palmtop transaction data
            $id = DB::table('palmtop_transaction_data')->insertGetId([
                    'payment_method_id' => $payment_method_id,
                    'branch_id' => $branch_id,
                    'customer_id' => $customer_id,
                    'account_id' => $account_id,
                    'transaction_type' => $deposit_type,
                    'transaction_value' => $amount,
                    'transaction_details' => $transaction_details,
                    'is_enable' => 1,
                    'status' => 0,
                    'created_by' => $user_id,
                    'updated_by' => $user_id,
                    'created_at' => $date_time,
                    'updated_at' => $date_time,
                ]);
            $invoice_number = 'INV'.sprintf('%04u', $user_id).sprintf('%06u', $id);
            //add palmtop transaction invoice number
            DB::table('palmtop_transaction_data')
            ->where('branch_id', $branch_id)
            ->where('customer_id', $customer_id)
            ->where('account_id', $account_id)
            ->where('id', $id)
            ->update(['invoice_number' => $invoice_number]);

            //Get last transaction balance
            $get_balance = DB::table('palmtop_payment_logs')
                            ->where('branch_id', $branch_id)
                            ->where('customer_id', $customer_id)
                            ->where('account_id', $account_id)
                            ->select('balance_amount')
                            ->latest()
                            ->limit(1)
                            ->get();
            $balance_amount = isset($get_balance[0])?doubleval($get_balance[0]->balance_amount):0.00;
            $new_balance_amount = number_format(($balance_amount + $amount),2,'.','');

            DB::table('palmtop_payment_logs')->insertGetId([
                'customer_id' => $customer_id,
                'branch_id' => $branch_id,
                'account_id' => $account_id,
                'transaction_data_id' => $id,
                'transaction_type' => $deposit_type,
                'transaction_value' => $amount,
                'balance_amount' => $new_balance_amount,
                'is_enable' => 1,
                'status' => 1,
                'created_by' => $user_id,
                'updated_by' => $user_id,
                'created_at' => $date_time,
                'updated_at' => $date,
            ]);

            $sql = "UPDATE `account_general_information`
                    SET `plam_top_balance` = (`plam_top_balance` + ".$amount.")
                    WHERE `customer_id` = ".$branch_id." AND `account_number` = ".$account_id." AND `branch_id` =".$branch_id;
            DB::update($sql);
            $transaction['status'] = 'succeed';
            $transaction['data'] = 'Customer transaction pass correctly.('.$invoice_number.')';
        } catch (\Exception $e) {
            dd($e);
            $transaction['status'] = 'failed';
            $transaction['data'] = 'Customer transaction pass error';
        }
        return response()->json($transaction);
    }

    public function getCustomerAccounts() {
        try {
            $branch_id= isset($request->branch_id)?intval($request->branch_id):0;
            $user_id = isset($request->user_id)?intval($request->user_id):0;
            $customer_id = isset($request->customer_id)?intval($request->customer_id):0;
            $sql = "SELECT agi.`account_number`, `account_balance`, `plam_top_balance`
                    FROM `account_general_information` AS agi
                    WHERE `branch_id` = ".$branch_id." AND `customer_id` = ".$customer_id;
            $account_data['status'] = 'succeed';
            $account_data['data'] = 'Customer account data pass correctly';
            $account_data['output'] = DB::select($sql);
        } catch (\Exception $e) {
            $account_data['status'] = 'failed';
            $account_data['data'] = 'Customer account data pass error';
            $account_data['output'] = array();
        }
        return response()->json($account_data);
    }
}
