<?php

namespace App\Http\Controllers;

use App\Models\CustomerBasicData;
use App\Models\CustomerStatusDates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function search(Request $request)
    {
        // return $request;
        $results = DB::select("
            SELECT * FROM customer_status_dates
            LEFT JOIN customer_basic_data
            ON customer_basic_data.customer_id = customer_status_dates.customer_id
            LEFT JOIN iedentification_types
            ON iedentification_types.id = customer_basic_data.identification_type_id
            WHERE customer_status_dates.customer_id LIKE '%$request->customer_id%'
            AND customer_status_dates.married_status_id LIKE '%$request->married_status_id%'
            AND  customer_status_dates.religion_data_id LIKE '%$request->religion_data_id%'
            AND  customer_status_dates.expire_date LIKE '%$request->expire_date%'
            AND customer_basic_data.full_name LIKE '%$request->full_name%'
            ");

        return response()->json($results);

    }

    public function VerificationSearch(Request $request){
        $results = DB::select("
            SELECT * FROM account_general_information
            LEFT JOIN customer_basic_data
            ON customer_basic_data.customer_id = account_general_information.customer_id
            LEFT JOIN iedentification_types
            ON iedentification_types.id = customer_basic_data.identification_type_id
            WHERE customer_basic_data.customer_id LIKE '%$request->customer_id%'
            AND customer_basic_data.full_name LIKE '%$request->full_name%'
            AND customer_basic_data.identification_type_id LIKE '%$request->identification_type_id%'
            AND account_general_information.account_number LIKE '%$request->account_number%'
            ");

        return response()->json($results);
    }
}
