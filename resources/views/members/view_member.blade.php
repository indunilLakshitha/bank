@extends('layouts.app')


@section('content')
<div class="card">
                <div class="card-body  ">
<div class="content ">
    <div class="container-fluid ">
        <div class="col-md-6 col-6 mr-auto ml-auto pull-left">
            <div class="card">
                <div class="card-body  ">
                        @csrf
                        @isset($view_1)
                        <div class="tab-pane active" id="private_1">
                            {{-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> --}}
                            <div class="row justify-content-center">

                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="form-group">
                                            <label for="">Code</label>
                                            <input class="form-control" name="customer_id" readonly type="text"  value="{{ isset($view_1->customer_id)?$view_1->customer_id:0}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row">

                                            <div class="col">
                                                <div class="form-group">
                                                <label for="c">STATUS</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                <input name="customer_status_id" id="c" readonly class="form-control" value="{{ isset($view_1->customer_status_id)?$view_1->customer_status_id:0}}">

                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="customer_title_id" readonly class="form-control"  value="{{isset($view_1->customer_title_id)? $view_1->customer_title_id: 0}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Name in Use</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input name="name_in_use" type="text" readonly class="form-control" value="{{ isset($view_1->name_in_use)?$view_1->name_in_use:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="full_name" readonly class="form-control" value="{{ isset($view_1->full_name) ? $view_1->full_name: ''}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Surname</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="surname" readonly class="form-control" value="{{ isset($view_1->surname) ? $view_1->surname: ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Short Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" readonly placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Branch</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="branch_id"  readonly class="form-control" value="{{ isset($view_1->branch_id)?$view_1->branch_id:0}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label label-checkbox">Type(s)</label>
                                <div class="col-sm-10 checkbox-radios">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" disabled type="checkbox" value=""> Non
                                            Member
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" disabled type="checkbox" value=""> Member
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" disabled type="checkbox" value="">
                                            Guarantor
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" disabled type="checkbox" value="">
                                            Supplier
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" disabled type="checkbox" value="">
                                            Customer
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" disabled type="checkbox" value=""> Child
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" disabled type="checkbox" value="">
                                            Introducer
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Account Category</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" name="account_category_id" readonly class="form-control" value="{{ isset($view_1->account_category_id)?$view_1->account_category_id:0}}">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Small Gr./ Acc.Off</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" name="small_group_id" readonly class="form-control" value="{{ isset($view_1->small_group_id)?$view_1->small_group_id:0}}">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Acc. Office Sub No.</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" name="sub_account_office_id" readonly class="form-control" value="{{ isset($view_1->sub_account_office_id)?$view_1->sub_account_office_id:0}}">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Sub Account Office</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  readonly value="">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">ID Type</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" name="identification_type_id " readonly class="form-control" value="{{ isset($view_1->identification_type_id)?$view_1->identification_type_id:0 }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" name="identification_number" readonly class="form-control" value="{{ isset($view_1->identification_number)?$view_1->identification_number:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Address </label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="address_data" readonly class="form-control" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Telephone No</label>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                        <input type="text" name="" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <input type="text" readonly class="form-control">

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Fax</label>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <input type="text" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <input type="text" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="col-sm-5">
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
        <div class="col-md-6 col-6 mr-auto ml-auto pull-right">
            <div class="card">
                <div class="card-body  ">
                        @csrf
                        @isset($view_2)
                        <div class="tab-pane active" id="status">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Birth Date / Nic Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="date_of_birth" class="form-control" readonly value="{{ isset($view_2->date_of_birth)?$view_2->date_of_birth:'' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Religion</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="religion_data_id" class="form-control" readonly value="{{ isset($view_2->religion_data_id)?$view_2->religion_data_id:'' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="married_status_id" class="form-control" readonly value="{{ isset($view_2->married_status_id)?$view_2->married_status_id:0 }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Date Became Member</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="member_date" class="form-control" readonly value="{{ isset($view_2->member_date)?$view_2->member_date:''}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Joined Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="join_date" class="form-control" readonly value="{{ isset($view_2->join_dat)?$view_2->join_date:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Expired Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="expire_date" class="form-control" readonly value="{{ isset($view_2->expire_date)?$view_2->expire_date:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Exit Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="exit_date" class="form-control" readonly value="{{ isset($view_2->exit_date)?$view_2->exit_date:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Death Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="death_date" class="form-control" readonly placeholder="{{ isset($view_2->death_date)?$view_2->death_date:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Neglection Starting Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="neglection_starting_date" readonly class="form-control" placeholder="{{ isset($view_2->neglection_starting_date)?$view_2->neglection_starting_date:''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endisset
                    {{-- Ends Private 1 --}}
                </div>
            </div>
        </div>

<div class="content">
    <div class="container-fluid">
        <div class="col-md-6 col-6 mr-auto ml-auto pull-left">
            <div class="card">
                <div class="card-body">


                        @csrf
                        @isset($idtypes)
                        <div class="tab-pane active" id="status">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Employee at Society</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="is_employee" readonly class="form-control" placeholder="{{ isset($view_3->is_employee)?$view_3->is_employee:0}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Designation</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="designation" readonly class="form-control" placeholder="{{ isset($view_3->designation)?$view_3->designation:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="address_line_1" readonly class="form-control" placeholder="{{ isset($view_3->address_line_1)?$view_3->address_line_1:''}}">
                                        <input type="text" name="address_line_2" readonly class="form-control" placeholder="{{ isset($view_3->address_line_2)?$view_3->address_line_2:''}}">
                                        <input type="text" name="address_line_3" readonly class="form-control" placeholder="{{ isset($view_3->address_line_3)?$view_3->address_line_3:''}}">
                                        <input type="text" name="address_line_4" readonly class="form-control" placeholder="{{ isset($view_3->address_line_4)?$view_3->address_line_4:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">EPF No</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" readonly name="epf_no" placeholder="{{ isset($view_3->epf_no)?$view_3->epf_no:''}}">

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
</div>
<div class="card">
    <div class="card-body  ">
<div class="content ">
    <div class="container-fluid ">
        <div class="col-md-6 col-6 mr-auto ml-auto pull-right">
            <div class="card">
                <div class="card-body">
                        @csrf
                        @isset($view_4)
                        <div class="tab-pane active" id="status">
                            <div class="tab-pane" id="other_societies">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Other Memberships</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <textarea name="other_memberships" id="" readonly cols="70" rows="8" placeholder="{{ isset($view_4->other_memberships)?$view_4->other_memberships:''}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Curr. Designation</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="text" class="form-control" readonly name="current_designation" placeholder="{{ isset($view_4->current_designation)?$view_4->current_designation:''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Previous Designation</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <textarea name="previous_designation" readonly id="" cols="70" rows="8" placeholder="{{ isset($view_4->previous_designation)?$view_4->previous_designation:''}}"></textarea>
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
</div>

<!-- Beneficiary -->

        <div class="col-md-6 col-6 mr-auto ml-auto pull-left">
            <div class="card">
                <div class="card-body">
                        @csrf
                        <div class="tab-pane active" id="private_1">
                            {{-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> --}}
                            <h5 class="">Beneficiaries</h5>
                            <div class="row">
                                <label class="col-sm-1 col-form-label">Add</label>
                                <div class="col-sm-2">
                                    <input name="" readonly class="form-control" id="select_bene" placeholder="">
                                </div>
                                    <div class="col-sm-2">
                                    </div>
                                {{-- <div class="col-sm-7">
                                    <input type="text" class="form-control">
                                </div> --}}
                            </div>
                            <div class="row">
                                <table class="table text-center d-none" readonly id="bene_table">
                                   <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Beneficiary Name</th>
                                    </tr>
                                   </thead>
                                   <tbody id="bene_body">
                                       <tr>
                                            <th>  </th>
                                            <th>  </th>
                                        </tr>

                                   </tbody>
                                </table>
                            </div>

                            <br>
                            <h5 class="">Guardians</h5>
                            <div class="row">
                                <label class="col-sm-1 col-form-label">1st</label>
                                <div class="col-sm-2">
                                    <input name="" id="select_guard" readonly class="form-control" placeholder="">
                                </div>
                                <div class="col-sm-2">
                                </div>
                                {{-- <div class="col-sm-7">
                                    <input type="text" readonly class="form-control">
                                </div> --}}
                            </div>
                            <div class="row">
                                <table class="table text-center d-none" readonly id="guard_table">
                                   <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Guardian Name</th>
                                    </tr>
                                   </thead>
                                   <tbody id="guard_body">
                                       <tr>
                                            <th> </th>
                                            <th>  </th>
                                        </tr>

                                   </tbody>
                                </table>
                            </div>
                        </div>

                    {{-- Ends Private 1 --}}
                </div>
            </div>
        </div>


<!-- End Beneficiary -->

        <div class="col-md-6 col-6 mr-auto ml-auto pull-left">
            <div class="card">
                <div class="card-body">
                        @csrf
                        @isset($view_6)
                        <div class="tab-pane" id="special">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Special Information</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <textarea name="special_information" readonly id="" cols="70" rows="10" placeholder="{{ isset($view_6->special_information)?$view_6->special_information:''}}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Real Member</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="is_real_member" readonly  id="" class="form-control" placeholder="{{ isset($view_6->is_real_member)?$view_6->is_real_member:0}}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h5 class="text-center">Assets</h5>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Item</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" readonly class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Value</label>
                                <div class="col-sm-3">
                                    <input type="text" readonly class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <input name="" id="" readonly class="form-control">

                                </div>

                            </div>
                        </div>
                        @endisset
                </div>
            </div>
        </div>

 </div>
            </div>

@endsection
