<?php

namespace App\Http\Controllers;

use App\Models\FdAccountGeneralInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchModalController extends Controller
{
    public function get_data_for_fd_withdrawal(Request $request){
        // return $request;
        $data = DB::select("
            SELECT DISTINCT
                fd_account_general_information.account_id,
                fd_account_general_information.deposite_amount,
                fd_account_general_information.close_date,
                fd_account_general_information.start_date,
                new_fd_account_rates.duration,
                new_fd_account_rates.interest,
                new_fd_account_rates.normal_rate


            FROM
                fd_account_general_information

            LEFT JOIN  new_fd_sub_accounts
                ON  new_fd_sub_accounts.id = fd_account_general_information.deposite_type_id

            LEFT JOIN  new_fd_account_rates
                ON  new_fd_account_rates.fd_id = new_fd_sub_accounts.id


            WHERE
                fd_account_general_information.account_id = '$request->account_id'
            AND
                new_fd_account_rates.duration = fd_account_general_information.deposite_period_id

        ");

        return response()->json($data[0]);
    }
}
