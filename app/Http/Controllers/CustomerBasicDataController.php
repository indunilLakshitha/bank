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
use App\Models\OccupationData;
use App\Models\OtherSocietyData;
use Illuminate\Support\Facades\Auth;

class CustomerBasicDataController extends Controller
{

    // public function __construct(CustomerBasicDataReporitaryInterface $customerBasicDataRepository)
    // {
    //     $this->customerBasicDataRepository = $customerBasicDataRepository;
    // }
    public function insert(Request $request){


        CustomerBasicData::create($request->all());
        return view('members.2_statusanddated')->with('success', 'Details submitted');


    }

    public function insertStatus(Request $request){
        // return $request;

        CustomerStatusDates::create($request->all());

        return view('members.3_occupation')->with('success', 'Details submitted');


    }
    public function insertOccupation(Request $request){
        // return $request;
        OccupationData::create($request->all());
        return view('members.4_othersocieties')->with('success', 'Details submitted');


    }
    public function insertOthersociety(Request $request){
        OtherSocietyData::create($request->all());

        return view('members.5_benificiaries')->with('success', 'Details submitted');

    }

    public function insertBeneficiaries(Request $request){
        // BeneficiaryData::create($request->all());

        return view('members.6_special_and_assets')->with('success', 'Details submitted');

    }

    public function add(){

        $cus_id = 'U'.Auth::user()->id.'CBD'.(count(CustomerBasicData::all())+1);
        // return $cus_id;

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
}
