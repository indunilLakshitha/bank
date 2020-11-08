<?php

namespace App\Http\Controllers;

use App\Models\CustomerStatusDates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function search(Request $request){

     $results = DB::select("
        SELECT * FROM customer_status_dates
        WHERE  religion_data_id LIKE '%$request->religion_id%'
        OR married_status_id LIKE '%$request->marital_status_id%'
    ");
        return response()->json($results);
    }
}
