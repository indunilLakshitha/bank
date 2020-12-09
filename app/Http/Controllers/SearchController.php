<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function byNameForWnD(Request $request){
        //$branch_id = Auth::user()->branh_id;
        $sql = "
        SELECT DISTINCT
            customer_basic_data.customer_id,
            customer_basic_data.full_name,
            customer_basic_data.id,
            customer_basic_data.identification_number,
            customer_basic_data.non_member,
            customer_basic_data.sign_img,

            account_general_information.account_balance,
            account_general_information.account_number

        FROM customer_basic_data



                 JOIN account_general_information
        ON account_general_information.customer_id = customer_basic_data.customer_id


        WHERE customer_basic_data.full_name LIKE '%$request->text%'
        AND customer_basic_data.is_enable = 1
        AND customer_basic_data.status = 1
        AND account_general_information.status = 1
        AND account_general_information.is_enable = 1

        ";
        $user_role_id = intval(Auth::user()->roles[0]->id);
        $branch_id = Auth::user()->branh_id;
        if($user_role_id != 1) {
            $sql .= " AND customer_basic_data.branch_id = ". $branch_id;
        }
        $data = DB::select($sql);
        return response()->json($data);
    }

    public function byCustomerIdForWnD(Request $request)
    {
        $sql = "
        SELECT DISTINCT
            customer_basic_data.customer_id,
            customer_basic_data.full_name,
            customer_basic_data.id,
            customer_basic_data.identification_number,
            customer_basic_data.sign_img,
            customer_basic_data.non_member,
            account_general_information.account_balance,
            account_general_information.account_number

        FROM customer_basic_data



                 JOIN account_general_information
        ON account_general_information.customer_id = customer_basic_data.customer_id


        WHERE customer_basic_data.customer_id LIKE '%$request->text%'
        AND customer_basic_data.is_enable = 1
        AND customer_basic_data.status = 1
        AND account_general_information.status = 1
        AND account_general_information.is_enable = 1

        ";
        $user_role_id = intval(Auth::user()->roles[0]->id);
        $branch_id = Auth::user()->branh_id;
        if($user_role_id != 1) {
            $sql .= " AND customer_basic_data.branch_id = ". $branch_id;
        }
        $data = DB::select($sql);

        return response()->json($data);
    }
    public function byNicForWnD(Request $request)
    {
        $sql = "
        SELECT DISTINCT
            customer_basic_data.customer_id,
            customer_basic_data.full_name,
            customer_basic_data.id,
            customer_basic_data.identification_number,
            customer_basic_data.non_member,
            account_general_information.account_balance,
            account_general_information.account_number

        FROM customer_basic_data



                 JOIN account_general_information
        ON account_general_information.customer_id = customer_basic_data.customer_id


        WHERE customer_basic_data.identification_number LIKE '%$request->text%'
        AND customer_basic_data.is_enable = 1
        AND customer_basic_data.status = 1
        AND account_general_information.status = 1
        AND account_general_information.is_enable = 1

        ";
        $user_role_id = intval(Auth::user()->roles[0]->id);
        $branch_id = Auth::user()->branh_id;
        if($user_role_id != 1) {
            $sql .= " AND customer_basic_data.branch_id = ". $branch_id;
        }
        $data = DB::select($sql);

        return response()->json($data);
    }

}
