<?php

namespace App\Http\Controllers;

use App\Models\FeeData;
use App\Models\TaxData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestSchemaParameterController extends Controller
{
    public function interestSchema(){

        return view('sub_accounts.m.interest_schema.interest_schema');

    }
    public function interestSchemaSubmit($id){

        return view('sub_accounts.m.interest_schema.fees', compact('id'));

    }
    public function tax_n_docs( $id){

        return view('sub_accounts.m.interest_schema.tax_n_documents', compact('id'));

    }

    public function create_fee_data(Request $request){
        // return $request;
        $fee_data = FeeData::create($request->all());
        $fee_data->created_by = Auth::user()->name;
        $fee_data->save();

        $data = FeeData::where('sub_account_id', $request->sub_account_id)->get();
        return response()->json($data);
    }

    public function store_tax_n_docs(Request $request){
        // return $request;
        $tnd = TaxData::create($request->all());
        $tnd->created_by = Auth::user()->name;
        $tnd->save();

        return redirect('/');

    }
}
