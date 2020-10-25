<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerModel extends Model
{
    protected $table="customer";

    public function getAllCustomer($input_data)
    {
        if(isset($input_data['assign_user_id'])) {
            $assign_user_id = $input_data['assign_user_id'];
            $sql = "SELECT c.`customer_id` , c.`customer_name` , c.`customer_mobile` , c.`customer_email` , c.`customer_address` , c.`customer_mode` , c.`assign_user_id` , u.`name` AS 'assign_user'
                FROM `customer` AS c
                INNER JOIN `users` AS u ON u.`id` = c.`assign_user_id`
                WHERE c.`is_enable` = 1 AND u.`id` = " .$assign_user_id . " ";
            if(isset($input_data['search_data']) && $input_data['search_data'] != null && $input_data['search_data'] != '') {
                $search_data = $input_data['search_data'];
                $sql .= "AND ((c.`customer_name` LIKE '%" . $search_data . "%') OR (c.`customer_mobile` LIKE '%" . $search_data . "%') OR (c.`customer_email` LIKE '%" . $search_data . "%')) ";
            }
            $sql .= "ORDER BY c.`customer_id` DESC";
            $output_data = DB::select($sql);
            $output['status'] = 'Succeed';
            $output['customer_data'] = $output_data;
            $output['description'] = "Customers data pass correctly";
            $output['status_code'] = 200;
        } else {
            $output['status'] = 'Failed';
            $output['customer_data'] = 0;
            $output['description'] = "Customer input data didn't pass correctly";
            $output['status_code'] = 400;
        }
        return $output;
    }

    public function addCustomer($data)
    {
        //default time zone set sri lanka colombo
        date_default_timezone_set('Asia/Colombo');
        $output = [];
        try {
            if(!isset($data['customer_name']) && !isset($data['customer_mobile']) && !isset($data['customer_email']) &&
                !isset($data['customer_address']) && !isset($data['customer_mode']) && !isset($data['is_active']) &&
                !isset($data['assign_user_id'])
            ){
                $output['status'] = 'Failed';
                $output['customer_id'] = 0;
                $output['description'] = "Customer input data didn't pass correctly";
                $output['status_code'] = 400;
            } else {
                $id = DB::table('customer')->insertGetId(
                    [
                        'customer_name' => $data['customer_name'],
                        'customer_mobile' => $data['customer_mobile'],
                        'customer_email' => $data['customer_email'],
                        'customer_address' => $data['customer_address'],
                        'customer_mode' => $data['customer_mode'],
                        'is_enable' => $data['is_active'],
                        'create_user_id' => $data['assign_user_id'],
                        'update_user_id' => $data['assign_user_id'],
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]
                );
                if (intval($id) > 0) {
                    $output['status'] = 'Succeed';
                    $output['customer_id'] = $id;
                    $output['description'] = 'Customer (' . $data['customer_name'] . ') insert successfully';
                    $output['status_code'] = 200;
                } else {
                    $output['status'] = 'Failed';
                    $output['customer_id'] = 0;
                    $output['description'] = 'Customer (' . $data['customer_name'] . ') insert failed';
                    $output['status_code'] = 400;
                }
            }
        } catch (\Exception $e) {
            $output['status'] = 'Failed';
            $output['customer_id'] = 0;
            $output['description'] = $e;
            $output['status_code'] = 400;
        }
        return $output;
    }

    public function updateCustomer($data){
        //default time zone set sri Lanka colombo
        date_default_timezone_set('Asia/Colombo');
        $output = [];
        try {
            if(!isset($data['customer_name']) && !isset($data['customer_mobile']) && !isset($data['customer_email']) &&
                !isset($data['customer_address']) && !isset($data['customer_mode']) && !isset($data['is_active']) &&
                !isset($data['assign_user_id'])
            ){
                $output['status'] = 'Failed';
                $output['customer_id'] = 0;
                $output['description'] = "Customer data didn't pass correctly";
                $output['status_code'] = 400;
            } else {
                DB::table('customer')
                    ->where('customer_id', $data['customer_id'])
                    ->update([
                        'customer_name' => $data['customer_name'],
                        'customer_mobile' => $data['customer_mobile'],
                        'customer_email' => $data['customer_email'],
                        'customer_address' => $data['customer_address'],
                        'customer_mode' => $data['customer_mode'],
                        'is_enable' => $data['is_active'],
                        'update_user_id' => $data['assign_user_id'],
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                $output['status'] = 'Succeed';
                $output['customer_id'] = $data['customer_id'];
                $output['description'] = 'Customer (' . $data['customer_name'] . ') update successfully';
                $output['status_code'] = 200;
            }

        } catch (\Exception $e) {
            $output['status'] = 'Failed';
            $output['customer_id'] = 0;
            $output['description'] = $e;
            $output['status_code'] = 400;
        }
        return $output;
    }
}
