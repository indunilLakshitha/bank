<?php

namespace App\Http\Controllers;

use App\Member;
use App\MemberCreationNominee;
use App\Models\Branch;
use App\Models\CustomerBasicData;
use App\Models\CustomerStatusDates;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function search(Request $request)
    {
        // return $request;
        if(
            $request->customer_id == null &&
            $request->married_status_id == null &&
            $request->religion_data_id == null &&
            $request->expire_date == null &&
            $request->race_id == null &&
            $request->full_name == null &&
            $request->identification_type_id == null &&
            $request->identification_number == null
        ){
            $results = DB::select("
            SELECT * FROM customer_status_dates

            LEFT JOIN customer_basic_data
            ON customer_basic_data.customer_id = customer_status_dates.customer_id

            LEFT JOIN iedentification_types
            ON iedentification_types.id = customer_basic_data.identification_type_id

            ");
        } else{

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
            AND  customer_status_dates.race_id LIKE '%$request->race_id%'
            AND customer_basic_data.full_name LIKE '%$request->full_name%'
            AND customer_basic_data.identification_type_id LIKE '%$request->identification_type_id%'
            AND customer_basic_data.identification_number LIKE '%$request->identification_number%'

            ");

        }
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
            AND account_general_information.status LIKE '2'
            ");

        return response()->json($results);
    }


    public function create(){
         $share_amount = DB::table('setting_data')->where('setting_description', 'share_amount')->first()->setting_data;
        return view('members.member.create', compact('share_amount'));
    }

    public function member_creation(Request $request){

        // return $request;

            $already_in = Member::where('customer_id', $request->customer_id)->first();

            if($already_in){
                return response()->json('Member already exists');
            }

            $mem = Member::create($request->all());
            $mem->is_enable= 1;

            $branch_id = CustomerBasicData::where('customer_id', $request->customer_id)->first()->branch_id;
            $mem->member_number= 'W'.Branch::find($branch_id)->branch_code.$request->customer_id;

            $mem->save();
            return response()->json('Member created');

    }

    public function add_nominee_member_creation(Request $request){
        MemberCreationNominee::create($request->all());

        $data = MemberCreationNominee::where('member_id', $request->member_id)->get();

        return response()->json($data);
    }

    public function remove_nominee_member_creation(Request $request){
        MemberCreationNominee::find($request->id)->delete();

        return response()->json('Nominee Removed');
    }

}
