<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\AccountCategory;
use App\Models\SmallGroup;
use App\Models\SubAccountOffice;
use App\Models\IedentificationType;
use App\Models\ContactType;
use App\Models\CustomerBasicData;

class CustomerBasicDataController extends Controller
{

    public function insertPrivate(){
        // return $request;
        // CustomerBasicData::create($request->all());

        // return $request;
        // $input_data = $request->input();
        // $this->$customerBasicDataRepository->insert($input_data);
        $this->customerBasicDataRepository->insert();

    }

    public function insertStatus(Request $request){
        return $request;

    }
    public function insertOccupation(Request $request){
        return $request;


    }
    public function insertOthersociety(Request $request){
        return $request;


    }

    public function add(){

        $branches=Branch::all();
        $accountcategories=AccountCategory::all();
        $smallgroups=SmallGroup::all();
        $subaccountoffices=SubAccountOffice::all();
        $idtypes=IedentificationType::all();
        $contacttypes=ContactType::all();
        return view('members.add',([
                    'branches'=>$branches,
                    'accountcategories'=>$accountcategories,
                    'smallgroups'=>$smallgroups,
                    'subaccountoffices'=>$subaccountoffices,
                    'idtypes'=>$idtypes,
                    'contacttypes'=>$contacttypes,
        ]));
    }
}
