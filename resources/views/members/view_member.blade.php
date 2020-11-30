@extends('layouts.app')


@section('content')

<fieldset disabled="disabled">
    @if(!empty($view_1))

    <div class="card col-10 " style="border: solid">
        <div class="card col-12 set-center ">
            <div class="card-body ">
                <div class="row">
                    <div class="col-9">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Customer Details</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card-text">
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                </div>


                <br>
                <br>
                <div class="container-fluid ">
                    <div class="col-md-12 col-12 mr-auto ml-auto">
                        @csrf
                        @isset($view_1)
                        <div class="tab-pane active" id="private_1">
                            {{-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> --}}
                            <div class="row ">

                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <br>
                                                <div class="form-group">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Member/Non-Member</label>
                                <div class="col-sm-2">
                                    <label class="form-check-label-bold"
                                                        style="background-color: #ffff00;">
                                                        @if(@isset($view_1_1->non_member) == 1)
                                                        <input name="customer_status_id" id="c" class="form-control"
                                                            value="NON MEMBER">
                                                        @else
                                                        <input name="customer_status_id" id="c" class="form-control"
                                                            value="MEMBER">
                                                        @endif
                                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Customer ID</label>
                                <div class="col-sm-2">
                                    <input class="form-control" name="customer_id" type="text"
                                    value="{{ isset($view_1->customer_id)?$view_1->customer_id:0}}">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-2">
                                    <br>
                                    @if(@isset($view_1->customer_status_id) == 1)
                                    <input name="customer_status_id" id="c" class="form-control" value="ACTIVE">
                                    @else
                                    <input name="customer_status_id" id="c" class="form-control" value="INACTIVE">
                                    @endif
                                </div>
                            </div>
                            <?php $titles=\App\Models\CutomerTitle::where('id',$view_1->customer_title_id)->first()?>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-2">
                                    @isset($titles)
                                    <div class="form-group">
                                        <input type="text" name="customer_title_id" class="form-control"
                                            value="{{$titles->customer_title}}">
                                    </div>
                                    @endisset
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Name in Use</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="name_in_use" type="text" class="form-control"
                                            value="{{ isset($view_1->name_in_use)?$view_1->name_in_use:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" name="full_name" class="form-control"
                                            value="{{ isset($view_1->full_name) ? $view_1->full_name: ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Surname</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="surname" class="form-control"
                                            value="{{ isset($view_1->surname) ? $view_1->surname: ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Name With Initials</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="short_name" class="form-control"
                                            value="{{ isset($view_1->short_name) ? $view_1->short_name: ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php $address=\App\Models\AddressData::where('customer_id',$view_1->customer_id )->first()?>
                                <label class="col-sm-2 col-form-label">Address </label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="address_line_1" class="form-control"
                                            value="{{ isset($address->address_line_1)?$address->address_line_1:'' }}">

                                        <input type="text" name="address_line_2" class="form-control"
                                            value="{{ isset($address->address_line_2)?$address->address_line_2:'' }}">

                                        <input type="text" name="address_line_3" class="form-control"
                                            value="{{ isset($address->address_line_3)?$address->address_line_3:'' }}">

                                        <input type="text" name="address_line_4" class="form-control"
                                            value="{{ isset($address->address_line_4)?$address->address_line_4:'' }}">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">EPF No</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="short_name" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <?php $branches=\App\Models\Branch::where('id',$view_1->branch_id)->first()?>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Branch</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        @isset($branches)
                                        <input type="text" name="branch_id" class="form-control"
                                            value="{{ $branches->branch_name}}">
                                        @endisset
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row">
                                    <label class="col-sm-2 col-form-label label-checkbox">Type(s)</label>
                                    <div class="col-sm-4 checkbox-radios">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" disabled type="checkbox"
                                                    <?php echo(@isset($view_1_1->non_member) == 1 ? 'checked': '') ?>>
                                                Non
                                                Member
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" disabled type="checkbox"
                                                    <?php echo(@isset($view_1_1->member) == 1 ? 'checked': '') ?>>
                                                Member
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" disabled type="checkbox"
                                                    <?php echo(@isset($view_1_1->guarantor)  == 1 ? 'checked': '') ?>>
                                                Guarantor
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" disabled type="checkbox"
                                                    <?php echo(@isset($view_1_1->supplier ) == 1 ? 'checked': '') ?>>
                                                Supplier
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" disabled type="checkbox"
                                                    <?php echo(@isset($view_1_1->customer)  == 1 ? 'checked': '') ?>>
                                                Customer
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" disabled type="checkbox"
                                                    <?php echo(@isset($view_1_1->child)  == 1 ? 'checked': '') ?>> Child
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" disabled type="checkbox"
                                                    <?php echo(@isset($view_1_1->introducer)  == 1 ? 'checked': '') ?>>
                                                Introducer
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>

                                    </div>
                                </div> -->

                            {{-- <div class="row">
                                <label class="col-sm-2 col-form-label">Account Category</label>
                                <div class="col-sm-4">
                                    @isset($acc_cats)
                                    <div class="form-group">
                                        <input type="text" name="account_category_id" class="form-control"
                                            value="{{ $acc_cats->account_category}}">
                                    </div>
                                    @endisset
                                </div>

                            </div> --}}

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Small Gr./ Acc.Off</label>
                                <?php $small_g=\App\Models\SmallGroup::where('id',$view_1->small_group_id )->first()?>
                                <div class="col-sm-4">
                                    @isset($small_g)
                                    <div class="form-group">
                                        <input type="text" name="small_group_id" class="form-control"
                                            value="{{ $small_g->small_group}}">
                                    </div>
                                    @endisset
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Acc. Office Sub No.</label>
                                <?php $sub_o=\App\Models\SubAccountOffice::where('id',$view_1->sub_account_office_id )->first()?>
                                <div class="col-sm-4">
                                    @isset($sub_o)
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $sub_o->sub_account_office}}">
                                    </div>
                                    @endisset
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Sub Account Office</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="office_sub_id"
                                            value="{{ isset($view_1->office_sub_id)?$view_1->office_sub_id:0}}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">ID Type</label>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <?php $id_types=\App\Models\IedentificationType::where('id',$view_1->identification_type_id )->first()?>
                                        <div class="col">
                                            @isset($id_types)
                                            <div class="form-group">
                                                <input type="text" name="identification_type_id " class="form-control"
                                                    value="{{ $id_types->identification_type}}">
                                            </div>
                                            @endisset
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" name="identification_number" class="form-control"
                                                    value="{{ isset($view_1->identification_number)?$view_1->identification_number:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-2 col-form-label">Telephone No</label>

                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <?php $cnt=\App\Models\ContactData::where('customer_id',$view_1->customer_id )->first()?>
                                            <input type="text" name="telephone_number" class="form-control"
                                                value="{{ isset($cnt->contact_data)?$cnt->contact_data:'' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Fax</label>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <input type="text" name="fax_number" class="form-control"
                                                value="{{ isset($view_1->fax_number)?$view_1->fax_number:'' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <input type="text" name="email_address" class="form-control"
                                                value="{{ isset($view_1->email_address)?$view_1->email_address:'' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Signature</label>
                                <div class="col-sm-8">
                                    <div class="col-10">
                                        <div class="form-group">
                                            @if(!empty(@isset($view_1->sign_img)))
                                            <img src="{{env('IMAGE_LOCATION').$view_1->sign_img}}" height="200px"
                                                width="300px" alt="">
                                            @else
                                            <img src="/bank/public/images/default.png" height="100px" width="100px"
                                                alt="">
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endisset

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(!empty($view_2))

    <div class="card col-10 " style="border: solid">

        <div class="card col-12 ">
            <div class="card-body  ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">States and Dates</h4>
                    </div>
                </div>
                <div class="col-md-12 col-12 mr-auto ml-auto ">

                    @csrf
                    @isset($view_2)
                    <div class="tab-pane active" id="status">
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Birth Date / Nic Date</label>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="text" name="date_of_birth" class="form-control"
                                        value="{{ isset($view_2->date_of_birth)?$view_2->date_of_birth:'' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Religion</label>
                            <?php $religons=\App\Models\RelegionData::where('id',$view_2->religion_data_id )->first()?>
                            <div class="col-sm-3">
                                @isset($religons)
                                <div class="form-group">
                                    <input type="text" name="religion_data_id" class="form-control"
                                        value="{{ $religons->religion_data }}">
                                </div>
                                @endisset
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Married Status</label>
                            <?php $married_st=\App\Models\MarriedStatus::where('id',$view_2->married_status_id)->first()?>
                            <div class="col-sm-3">
                                @isset($married_st)
                                <div class="form-group">
                                    <input type="text" name="married_status_id" class="form-control"
                                        value="{{ $married_st->married_status}}">
                                </div>
                                @endisset
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Gender</label>
                            <?php $gen=\App\Models\Gender::where('id',$view_2->gender_id)->first()?>
                            <div class="col-sm-3">
                                @isset($gen)
                                <div class="form-group">
                                    <input type="text" name="gender_id " class="form-control"
                                        value="{{ $gen->gender }}">
                                </div>
                                @endisset
                            </div>
                        </div>
                        <!-- <div class="row">
                            <label class="col-sm-2 col-form-label">Race</label>
                            <?php $race=\App\Models\Race::where('id',$view_2->race_id)->first()?>
                            <div class="col-sm-3">
                                @isset($race)
                                <div class="form-group">
                                    <input type="text" name="race " class="form-control"
                                        value="{{ $race->race }}">
                                </div>
                                @endisset
                            </div>
                        </div> -->

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Joined Date</label>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="text" name="join_date" class="form-control"
                                        value="{{ isset($view_2->join_date)?$view_2->join_date:''}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Date Became Member</label>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="text" name="member_date" class="form-control"
                                        value="{{ isset($view_2->member_date)?$view_2->member_date:''}}">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                                <label class="col-sm-2 col-form-label">Expired Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="expire_date" class="form-control"  value="{{ isset($view_2->expire_date)?$view_2->expire_date:''}}">
                                    </div>
                                </div>
                            </div> -->
                        <!-- <div class="row">
                                <label class="col-sm-2 col-form-label">Exit Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="exit_date" class="form-control"  value="{{ isset($view_2->exit_date)?$view_2->exit_date:''}}">
                                    </div>
                                </div>
                            </div> -->
                        <!-- <div class="row">
                                <label class="col-sm-2 col-form-label">Death Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="death_date" class="form-control"  value="{{ isset($view_2->death_date)?$view_2->death_date:''}}">
                                    </div>
                                </div>
                            </div> -->
                        <!-- <div class="row">
                                <label class="col-sm-2 col-form-label">Neglection Starting Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="neglection_starting_date"  class="form-control" value="{{ isset($view_2->neglection_starting_date)?$view_2->neglection_starting_date:''}}">
                                    </div>
                                </div>
                            </div> -->
                    </div>
                    @endisset
                    {{-- Ends Private 1 --}}

                </div>
            </div>
        </div>
        <!-- <div class="content">
            <div class="container-fluid">
                <div class="col-md-6 col-6 mr-auto ml-auto pull-left">
                    <div class="card">
                        <div class="card-body">


                            @csrf
                            @isset($view_3)
                            <div class="tab-pane active" id="status">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Employee at Society</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="text" name="is_employee" class="form-control"
                                                value="{{ isset($view_3->is_employee)?$view_3->is_employee:0}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Designation</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="text" name="designation" class="form-control"
                                                value="{{ isset($view_3->designation)?$view_3->designation:''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="text" name="address_line_1" class="form-control"
                                                value="{{ isset($view_3->address_line_1)?$view_3->address_line_1:''}}">
                                            <input type="text" name="address_line_2" class="form-control"
                                                value="{{ isset($view_3->address_line_2)?$view_3->address_line_2:''}}">
                                            <input type="text" name="address_line_3" class="form-control"
                                                value="{{ isset($view_3->address_line_3)?$view_3->address_line_3:''}}">
                                            <input type="text" name="address_line_4" class="form-control"
                                                value="{{ isset($view_3->address_line_4)?$view_3->address_line_4:''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">EPF No</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="epf_no"
                                                value="{{ isset($view_3->epf_no)?$view_3->epf_no:''}}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endisset
                            {{-- Ends Private 1 --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
    </div>
    @endif
    @if(!empty($view_4))

    <div class="card col-10 " style="border: solid">

        <div class="card col-12 ">
            <div class="card-body  ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Designation Details</h4>
                    </div>
                </div>
                <div class="col-md-12 col-12 mr-auto ml-auto pull-left">

                    @csrf
                    @isset($view_4)
                    <div class="tab-pane active" id="status">
                        <div class="tab-pane" id="other_societies">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Other Memberships</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="other_memberships" id=""
                                            value="{{ isset($view_4->other_memberships)?$view_4->other_memberships:''}}"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Curr. Designation</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="current_designation"
                                            value="{{ isset($view_4->current_designation)?$view_4->current_designation:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Previous Designation</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="previous_designation" id=""
                                            cols="30" rows="8"
                                            value="{{ isset($view_4->previous_designation)?$view_4->previous_designation:''}}"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endisset
                    {{-- Ends Private 1 --}}

                </div>
            </div>
        </div>
    </div>
    @endif
    @foreach($view_6 as $view_6_1)
    @if(!empty($view_6))
    <div class="card col-10 " style="border: solid">

        <div class="card col-12 ">
            <div class="card-body  ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Assets Details</h4>
                    </div>
                </div>
                <div class="col-md-12 col-12 mr-auto ml-auto pull-right">

                    @csrf

                    <table class="table table-striped table-bordered" id="bene_table">
                        <thead>
                            <tr>
                                <th>Asset Description</th>
                                <th>Asset Quantity</th>
                            </tr>
                        </thead>
                        <tbody id="bene_body">
                            @isset($view_6)

                            @foreach($view_6 as $view_6_1)
                            <tr>
                                <td>{{$view_6_1->asset_description}} </td>
                                <td> {{$view_6_1->asset_qty}}</th>
                            </tr>
                            @endforeach
                            @endisset


                        </tbody>
                    </table>
                    <!-- <div class="tab-pane" id="special">
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Special Information</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control""  id="" cols=" 30" rows="12"
                                        value="{{ isset($view_6->asset_description)}}"></textarea>
                                </div>
                            </div>
                        </div> -->
                    <!-- <div class="row">
                            <label class="col-sm-2 col-form-label">Real Member</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input name="is_real_member" id="" class="form-control"
                                        value="{{ isset($view_6->is_real_member)?$view_6->is_real_member:0}}">
                                </div>
                            </div>
                        </div> -->
                    <!-- <br>
                        <h5 class="text-center">Assets</h5>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Item</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="{{ isset($view_6->asset_qty)}}">
                                </div>
                            </div>
                        </div> -->
                    <!-- <div class="row">
                            <label class="col-sm-2 col-form-label">Value</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"
                                    value="{{ isset($view_6->value)?$view_6->value:0}}">
                            </div>
                            <div class="col-sm-3">
                                <input name="" id="" class="form-control">

                            </div>

                        </div> -->
                    <!-- </div> -->


                </div>
            </div>
        </div>
        <!-- Beneficiary -->

        <!-- <div class="col-md-6 col-6 mr-auto ml-auto pull-left">
            <div class="card">
                <div class="card-body">
                    @csrf
                    <h5 class="">Beneficiaries</h5>

                    @isset($view_5_1)

                    <table class="table table-striped table-bordered" id="bene_table">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Beneficiary ID</th>
                            </tr>
                        </thead>
                        <tbody id="bene_body">

                            @foreach($view_5_1 as $view_5_11)
                            <tr>
                                <td>{{$view_5_11->customer_id}} </td>
                                <td> {{$view_5_11->name_in_use}}</th>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    @endisset

                    <br>
                    <h5 class="">Guardians</h5>

                    @isset($view_5_2)
                    <table class="table table-striped table-bordered" id="guard_table">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Guardian Name</th>
                            </tr>
                        </thead>
                        <tbody id="guard_body">
                            @foreach($view_5_2 as $view_5_22)
                            <tr>
                                <td>{{$view_5_22->customer_id}} </td>
                                <td> {{$view_5_22->name_in_use}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @endisset

                    {{-- Ends Private 1 --}}
                </div>
            </div>
        </div> -->


        <!-- End Beneficiary -->



    </div>

    @endif
    @break
    @endforeach
</fieldset>

@endsection
