<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Repositories\RepositoryInterfaces\CustomerBasicDataReporitaryInterface;
use App\Models\Branch;
use App\Models\AccountCategory;
use App\Models\SmallGroup;
use App\Models\SubAccountOffice;
use App\Models\IedentificationType;
use App\Models\ContactType;
class CustomerBasicDataController extends Controller
{
    // private $customerBasicDataRepository;

    // public function __construct(CustomerBasicDataReporitaryInterface $customerBasicDataRepository)
    // {
    //     $this->customerBasicDataRepository = $customerBasicDataRepository;
    // }
    public function insert(Request $request){
        return $request;
        // $input_data = $request->input();
        // $this->$customerBasicDataRepository->insert($input_data);

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
