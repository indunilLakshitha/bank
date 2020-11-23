<?php

namespace App\Http\Controllers;

use App\Models\AccountCategory;
use App\Models\BeneficiaryData;
use App\Models\Branch;
use App\Models\ContactType;
use App\Models\CustomerBasicData;
use App\Models\CustomerStatusDates;
use App\Models\CutomerMainType;
use App\Models\CutomerTitle;
use App\Models\GuardianData;
use App\Models\IedentificationType;
use App\Models\OccupationData;
use App\Models\OtherSocietyData;
use App\Models\SmallGroup;
use App\Models\SpecialData;
use App\Models\SubAccountOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CustomerBasicDataController extends Controller
{

    // public function __construct(CustomerBasicDataReporitaryInterface $customerBasicDataRepository)
    // {
    //     $this->customerBasicDataRepository = $customerBasicDataRepository;
    // }
    public function insert(Request $request)
    {

// return $request;

        $br_code = Branch::find($request->branch_id)->branch_code;
        $cus_count = '0000000' . count(CustomerBasicData::all());
        $cus_count = substr($cus_count, -6);
        $cus_id = $br_code . '-' . $cus_count;

        $cbs = CustomerBasicData::create($request->all());
        $cbs->customer_id = $cus_id;
        $cbs->is_enable = 1;
        $cbs->created_by = Auth::user()->name;
        if ($request->file('sign_img')) {
            $image = $request->file('sign_img');
            $path = '/images/';
            $cbs->sign_img = time() . rand() . '.' . $image->extension();
            $image->move(public_path($path), $cbs->sign_img);
        }

        $cbs->save();

        $main_type = CutomerMainType::create($request->all());
        $main_type->customer_id = $cus_id;
        $main_type->is_enable = 1;
        $main_type->created_by = Auth::user()->name;
        $main_type->save();

        $contact_data = MainType::create($request->all());
        $contact_data->customer_id = $cus_id;
        $contact_data->is_enable = 1;
        $contact_data->created_by = Auth::user()->name;
        $contact_data->save();
        return view('members.2_statusanddated', compact('cus_id'))->with('success', 'Details submitted');

    }

    public function insertStatus(Request $request)
    {

        $status_dates = $request;
        $status_dates['is_enable'] = 1;
        $status_dates['created_by'] = Auth::user()->id;
        $status_dates['updated_by'] = Auth::user()->id;
        CustomerStatusDates::create($status_dates->all());
        $cus_id = $request->customer_id;

        return view('members.3_occupation', compact('cus_id'))->with('success', 'Details submitted');

    }
    public function insertOccupation(Request $request)
    {
        $occupation_data = $request;
        $occupation_data['is_enable'] = 1;
        $occupation_data['is_employee'] = 1;
        $occupation_data['created_by'] = Auth::user()->id;
        $occupation_data['updated_by'] = Auth::user()->id;
        OccupationData::create($occupation_data->all());
        $cus_id = $request->customer_id;
        return view('members.4_othersocieties', compact('cus_id'))->with('success', 'Details submitted');

    }
    public function insertOthersociety(Request $request)
    {
        $other_society_data = $request;
        $other_society_data['is_enable'] = 1;
        $other_society_data['created_by'] = Auth::user()->id;
        $other_society_data['updated_by'] = Auth::user()->id;
        OtherSocietyData::create($other_society_data->all());
        $cus_id = $request->customer_id;
        $all_customers = CustomerBasicData::all();

        return view('members.5_benificiaries', compact('cus_id', 'all_customers'))->with('success', 'Details submitted');

    }

    public function insertBeneficiaries(Request $request)
    {
        // BeneficiaryData::create($request->all());

        $cus_id = $request->customer_id;
        return view('members.6_special_and_assets', compact('cus_id'))->with('success', 'Details submitted');

    }

    public function insertSpecialAndAssets(Request $request)
    {
        $special = $request;
        $special['is_enable'] = 1;
        $special['is_real_member'] = 1;
        $special['created_by'] = Auth::user()->id;
        $special['updated_by'] = Auth::user()->id;
        SpecialData::create($special->all());

        return redirect('/');
    }

    public function add()
    {

        // $cus_id = 'U'.Auth::user()->id.'CBD'.(count(CustomerBasicData::all())+1);
        $cus_id = null;
        $branches = Branch::all();
        $accountcategories = AccountCategory::all();
        $smallgroups = SmallGroup::all();
        $subaccountoffices = SubAccountOffice::all();
        $idtypes = IedentificationType::all();
        $contacttypes = ContactType::all();
        $titles = CutomerTitle::all();
        return view('members.1_add', compact([
            'branches',
            'accountcategories',
            'smallgroups',
            'subaccountoffices',
            'idtypes',
            'contacttypes',
            'cus_id',
            'titles',
        ]));
    }

    public function beneficiariesAjax(Request $request)
    {
        $benificiary = $request;
        $benificiary['is_enable'] = 1;
        $benificiary['created_by'] = Auth::user()->id;
        $benificiary['updated_by'] = Auth::user()->id;
        $row = BeneficiaryData::create($benificiary->all());
        $row->beneficiary_id = $request->id;
        $row->save();

        $data = DB::table('beneficiary_data')
            ->where('beneficiary_data.customer_id', $request->customer_id)
            ->leftjoin('customer_basic_data', 'customer_basic_data.customer_id', 'beneficiary_data.beneficiary_id')
            ->get();

        return response()->json(['bene', $data]);
    }

    public function guardianAjax(Request $request)
    {
        $guardian = $request;
        $guardian['is_enable'] = 1;
        $guardian['created_by'] = Auth::user()->id;
        $guardian['updated_by'] = Auth::user()->id;
        $row = GuardianData::create($guardian->all());
        $row->guardian_id = $request->id;
        $row->save();

        $data = DB::table('guardian_data')
            ->where('guardian_data.customer_id', $request->customer_id)
            ->leftjoin('customer_basic_data', 'customer_basic_data.customer_id', 'guardian_data.guardian_id')
            ->get();
        return response()->json(['guard', $data]);
    }

    public function viewMember(Request $request)
    {

        $view_1 = CustomerBasicData::where('customer_id', $request->id)->first();
        $view_1_1 = CutomerMainType::where('customer_id', $request->id)->first();
        $view_2 = CustomerStatusDates::where('customer_id', $request->id)->first();
        $view_3 = OccupationData::where('customer_id', $request->id)->first();
        $view_4 = OtherSocietyData::where('customer_id', $request->id)->first();
        $view_5_1 = BeneficiaryData::where('customer_id', $request->id)->get();
        $view_5_2 = GuardianData::where('customer_id', $request->id)->get();
        $view_6 = SpecialData::where('customer_id', $request->id)->first();
        return view('members.view_member', compact('view_1', 'view_1_1', 'view_2', 'view_3', 'view_4', 'view_5_1', 'view_5_2', 'view_6'));
    }

    public function editMember(Request $request)
    {

        $cus = $request->id;
        $view_1 = CustomerBasicData::where('customer_id', $request->id)->first();
        $view_1_1 = CutomerMainType::where('customer_id', $request->id)->first();
        $view_2 = CustomerStatusDates::where('customer_id', $request->id)->first();
        $view_3 = OccupationData::where('customer_id', $request->id)->first();
        $view_4 = OtherSocietyData::where('customer_id', $request->id)->first();
        $view_5_1 = BeneficiaryData::where('customer_id', $request->id)->get();
        $view_5_2 = GuardianData::where('customer_id', $request->id)->get();
        $view_6 = SpecialData::where('customer_id', $request->id)->first();
        return view('edit.memberEdit.member_edit', compact('cus', 'view_1', 'view_1_1', 'view_2', 'view_3', 'view_4', 'view_5_1', 'view_5_2', 'view_6'));

    }

    public function editCustomerBasic(Request $request)
    {

        $customer = CustomerBasicData::where('customer_id', $request->customer_id)->first();

        $customer->update($request->all());

        return Redirect::to('/members/edit/' . $request->customer_id);

    }

    public function editStatus(Request $request)
    {

        $customer = CustomerStatusDates::where('customer_id', $request->customer_id)->first();

        $customer->update($request->all());

        return Redirect::to('/members/edit/' . $request->customer_id);

    }

    public function editOccupati(Request $request)
    {

        $customer = OccupationData::where('customer_id', $request->customer_id)->first();

        $customer->update($request->all());

        return Redirect::to('/members/edit/' . $request->customer_id);

    }

    public function editOthersociety(Request $request)
    {

        $customer = OtherSocietyData::where('customer_id', $request->customer_id)->first();

        $customer->update($request->all());

        return Redirect::to('/members/edit/' . $request->customer_id);

    }

    public function editSpecialAndAssets(Request $request)
    {

        $customer = SpecialData::where('customer_id', $request->customer_id)->first();

        $customer->update($request->all());

        return Redirect::to('/members/edit/' . $request->customer_id);

    }

}
