<?php

namespace App\Http\Controllers;

use App\Models\AddressData;
use App\Models\Branch;
use App\Models\ContactType;
use App\Models\CustomerBasicData;
use App\Models\IedentificationType;
use Faker\Provider\ar_JO\Address;
use Illuminate\Http\Request;


class MainBranchController extends Controller
{
    public function index(){

        return view('newbranches.index');
    }
    public function add(){
         $branches=Branch::where('is_enable',1)->get();
        $contacttypes=ContactType::where('is_enable',1)->get();

        return view('newbranches.1_add',compact('branches','contacttypes'));
    }

    public function store(Request $request){
        $branche=  CustomerBasicData::create($request->all());
        $count=count(CustomerBasicData::all())+1;
        $cus_count = '0000' .$count ;
         $cus_id = substr($cus_count, -3);
        $branche->customer_id=$cus_id;
        $branche->is_enable=1;
        $branche->status=1;
        $branche->save();

        $address=$request;
        $address['customer_id']=$branche->customer_id;
         AddressData::create($address->all());
        return redirect()->route('newbranches.index');
    }


    public function view($id){

         $branch=CustomerBasicData::leftjoin('branches','branches.id','customer_basic_data.branch_id')
        ->leftjoin('account_categories','account_categories.id','customer_basic_data.account_category_id')
        ->leftjoin('address_data','address_data.customer_id','customer_basic_data.customer_id')
        ->where('customer_basic_data.customer_id',$id)
        ->select('customer_basic_data.*','branches.*','address_data.*')
        ->get();

        return view('newbranches.view',compact('branch'));

    }
}
