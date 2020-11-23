<?php

namespace App\Http\Controllers;

use App\Models\InteresetSchema;
use App\Models\InteresetTypeData;
use App\Models\SubAccount;
use App\Models\TransactionSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavingsSchemaParameterController extends Controller
{
    public function generalSchemaParameters(){

        return view('sub_accounts.m.savings_schema.general_schema');
    }

    public function generalSchemaParametersSave(Request $request){
        // return $request;
          $sub_account=SubAccount::create($request->all());
          $sub_account->created_by = Auth::user()->name;
          $sub_account->save();

          $sub_acc_id = $sub_account->id;
        return view('sub_accounts.m.savings_schema.transaction_schema', compact('sub_acc_id'));
    }

    public function transaction_scheme_params(Request $request){
        // return $request;

        $ts = TransactionSchema::create($request->all());
        $ts->created_by = Auth::user()->name;
        $ts->save();
        $sub_account_id =  $request->sub_account_id;
        $success = 'Created Sub Account'.$request->sub_account_id;
        // return redirect('/')->with('success', 'Created Sub Account'.$request->sub_account_id);
        return view('sub_accounts.m.interest_schema.interest_schema', compact('sub_account_id', 'success'));
    }

    public function create_int_schema(Request $request){

        $in_sch = InteresetSchema::create($request->all());
        $in_sch->created_by = Auth::user()->name;
        $in_sch->save();
        $interest_schema_id = $in_sch->id;
        return response()->json($interest_schema_id);
    }
    public function create_intereset_type_data(Request $request){

        $int_type = InteresetTypeData::create($request->all());
        $int_type->created_by = Auth::user()->name;
        $int_type->save();

        $data = InteresetTypeData::where('interest_schema_id', $request->interest_schema_id)->get();
        return response()->json($data);
    }
}
