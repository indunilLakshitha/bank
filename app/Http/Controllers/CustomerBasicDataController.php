<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\AccountCategory;
use App\Models\BeneficiaryData;
use App\Models\SmallGroup;
use App\Models\SubAccountOffice;
use App\Models\IedentificationType;
use App\Models\ContactType;
use App\Models\CustomerBasicData;
use App\Models\CustomerStatusDates;
use App\Models\GuardianData;
use App\Models\OccupationData;
use App\Models\OtherSocietyData;
use App\Models\SpecialData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerBasicDataController extends Controller
{

    // public function __construct(CustomerBasicDataReporitaryInterface $customerBasicDataRepository)
    // {
    //     $this->customerBasicDataRepository = $customerBasicDataRepository;
    // }
    public function insert(Request $request){

// return $request;
        $cus_id = $request->customer_id;
        CustomerBasicData::create($request->all());
        return view('members.2_statusanddated',compact('cus_id'))->with('success', 'Details submitted');


    }

    public function insertStatus(Request $request){

        CustomerStatusDates::create($request->all());
        $cus_id = $request->customer_id;

        return view('members.3_occupation',compact('cus_id'))->with('success', 'Details submitted');


    }
    public function insertOccupation(Request $request){

        OccupationData::create($request->all());
        $cus_id = $request->customer_id;
        return view('members.4_othersocieties',compact('cus_id'))->with('success', 'Details submitted');


    }
    public function insertOthersociety(Request $request){
        OtherSocietyData::create($request->all());
        $cus_id = $request->customer_id;
        $all_customers = CustomerBasicData::all();

        return view('members.5_benificiaries',compact('cus_id', 'all_customers'))->with('success', 'Details submitted');

    }

    public function insertBeneficiaries(Request $request){
        // BeneficiaryData::create($request->all());

        $cus_id = $request->customer_id;
        return view('members.6_special_and_assets',compact('cus_id'))->with('success', 'Details submitted');

    }

    public function insertSpecialAndAssets(Request $request){
        SpecialData::create($request->all());

        return redirect('/');
    }

    public function add(){

        $cus_id = 'U'.Auth::user()->id.'CBD'.(count(CustomerBasicData::all())+1);
        $branches=Branch::all();
        $accountcategories=AccountCategory::all();
        $smallgroups=SmallGroup::all();
        $subaccountoffices=SubAccountOffice::all();
        $idtypes=IedentificationType::all();
        $contacttypes=ContactType::all();
        return view('members.1_add', compact([
                    'branches',
                    'accountcategories',
                    'smallgroups',
                    'subaccountoffices',
                    'idtypes',
                    'contacttypes',
                    'cus_id'
        ]));
    }

    public function beneficiariesAjax(Request $request){

        $row = BeneficiaryData::create($request->all());
        $row->beneficiary_id = $request->id;
        $row->save();

        $data = DB::table('beneficiary_data')
        ->where('beneficiary_data.customer_id', $request->customer_id)
        ->leftjoin('customer_basic_data', 'customer_basic_data.customer_id', 'beneficiary_data.beneficiary_id')
        ->get();

        return response()->json(['bene',$data]);
    }

    public function guardianAjax(Request $request){

        $row = GuardianData::create($request->all());
        $row->guardian_id = $request->id;
        $row->save();

        $data = DB::table('guardian_data')
        ->where('guardian_data.customer_id', $request->customer_id)
        ->leftjoin('customer_basic_data', 'customer_basic_data.customer_id', 'guardian_data.guardian_id')
        ->get();
        return response()->json(['guard',$data]);
    }



    public function viewMember(Request $request){

        $view_1 = CustomerBasicData::where('customer_id',$request->id)->first();
        $view_2 = CustomerStatusDates::where('customer_id',$request->id)->first();
        $view_3 = OccupationData::where('customer_id',$request->id)->first();
        $view_4 = OtherSocietyData::where('customer_id',$request->id)->first();
        $view_5 = BeneficiaryData::where('customer_id',$request->id)->first();
        $view_6 = SpecialData::where('customer_id',$request->id)->first();
        return view('members.view_member',compact('view_1','view_2','view_3','view_4','view_5','view_6'));
    }

}
