<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IedentificationType;
use App\Models\SubAccount;

class SavingsController extends Controller
{
    public function clientDetails(Request $request){

        $idtypes = IedentificationType::all();
        return view('savings.1_client_details',compact('idtypes'));

    }

    public function generalInformation(Request $request){

        $idtypes = IedentificationType::all();
        return view('savings.2_general_information',compact('idtypes'));

    }

    public function productDetails(Request $request){

        $idtypes = IedentificationType::all();
        return view('savings.3_product_details',compact('idtypes'));

    }

    public function jointAcoount(Request $request){

        $idtypes = IedentificationType::all();
        return view('savings.4_joint_acoount',compact('idtypes'));

    }

    public function operatingInstrictions(Request $request){

        $idtypes = IedentificationType::all();
        return view('savings.5_operating_instrictions',compact('idtypes'));

    }

    public function guardianInformation(Request $request){

        $idtypes = IedentificationType::all();
        return view('savings.6_guardian_information',compact('idtypes'));

    }

    public function documents(Request $request){

        $idtypes = IedentificationType::all();
        return view('savings.7_documents',compact('idtypes'));

    }

    public function taxDetails(Request $request){

        $idtypes = IedentificationType::all();
        return view('savings.8_tax_details',compact('idtypes'));

    }

    public function nomineeInstruction(Request $request){

        $idtypes = IedentificationType::all();
        return view('savings.9_nominee_instruction',compact('idtypes'));

    }

    public function correspondance(Request $request){

        $idtypes = IedentificationType::all();
        return view('savings.10_correspondance',compact('idtypes'));

    }

    public function authorizedOfficer(Request $request){

        $idtypes = IedentificationType::all();
        return view('savings.11_authorized_officer',compact('idtypes'));

    }


    public function getSubDetails(Request $request){

        $subaccountdetails=SubAccount::leftjoin('intereset_schemas','intereset_schemas.sub_account_id','sub_accounts.id')
        ->leftjoin('intereset_type_data','intereset_type_data.interest_schema_id','intereset_schemas.id')
        ->leftjoin('interest_types','interest_types.id','intereset_schemas.interest_type_id')
        ->leftjoin('transaction_schemas','transaction_schemas.sub_account_id','sub_accounts.id')
        ->leftjoin('currencies','currencies.id','sub_accounts.currency_id')
        ->leftjoin('deposite_modes','deposite_modes.id','transaction_schemas.deposite_mode_id')
        ->where('sub_accounts.id',$request->id)
        ->select('intereset_schemas.*','intereset_type_data.*','sub_accounts.*','interest_types.*','currencies.*','transaction_schemas.*','deposite_modes.*')
        ->get();
        return response()->json($subaccountdetails);
    }
}
