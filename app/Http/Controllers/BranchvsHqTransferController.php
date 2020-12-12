<?php

namespace App\Http\Controllers;

use App\Models\PalmtopTransactionData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchvsHqTransferController extends Controller
{
    public function index(){
        return view('palmtop.branchvsheadoffice');
    }
    public function palmtop(){

        $data = DB::select("
        SELECT
            palmtop_transaction_data.id, palmtop_transaction_data.created_at,palmtop_transaction_data.transaction_value,
            customer_basic_data.full_name, customer_basic_data.customer_id,
            account_general_information.account_number
        FROM
            palmtop_transaction_data

        LEFT JOIN
            customer_basic_data ON customer_basic_data.id = palmtop_transaction_data.customer_id
        LEFT JOIN
            account_general_information ON account_general_information.id = palmtop_transaction_data.account_id
        WHERE
            palmtop_transaction_data.transferred = 0
        ");
        return view('palmtop.palmtoptransactions', compact('data'));
    }
}
