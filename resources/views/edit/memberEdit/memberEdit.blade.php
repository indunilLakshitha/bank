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
                                            <label for="c">CODE</label>
                                            <input class="form-control" name="customer_id" readonly type="text"  value="{{ isset($view_1->customer_id)?$view_1->customer_id:0}}">

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                            <div class="col">
                                                <label for="c">STATUS</label>
                                            </div>
                                            <div class="form"">

                                                <select name="customer_status_id" id="c" value="{{$view_1->customer_status_id}}" class="selectpicker col" data-style="select-with-transition">
                                                    <option value="1">ACTIVE</option>
                                                    <option value="0">INACTIVE</option>
                                                </select>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <?php $titlesAll=\App\Models\CutomerTitle::all()?>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                     <select name="customer_title_id" id="" placeholder="{{isset($titles->customer_title)}}" class="selectpicker" data-style="select-with-transition">
                                            @isset($titlesAll,$view_1)
                                                @foreach ($titlesAll as $title)
                                                        <option  value="{{$title->id}}" <?php echo($title->id == $view_1->customer_title_id ? 'selected' : '' )?> >{{$title->customer_title}}</option>
                                                @endforeach
                                            @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label" >Name in Use</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input name="name_in_use" type="text"  class="form-control" value="{{ isset($view_1->name_in_use)?$view_1->name_in_use:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="full_name"  class="form-control" value="{{ isset($view_1->full_name) ? $view_1->full_name: ''}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Surname</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="surname"  class="form-control" value="{{ isset($view_1->surname) ? $view_1->surname: ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Short Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="short_name" class="form-control"  value="{{ isset($view_1->short_name) ? $view_1->short_name: ''}}">
                                    </div>
                                </div>
                            </div>
                             <?php $branchesAll=\App\Models\Branch::all()?>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Branch</label>
                                <div class="col-sm-10">
                                    <select name="customer_title_id" id="" placeholder="{{isset($branches->branch_name)}}" class="selectpicker" data-style="select-with-transition">
                                            @isset($branchesAll,$view_1)
                                                @foreach ($branchesAll as $branch)
                                                        <option value="{{$branch->id}}" <?php echo($branch->id == $view_1->branch_id ? 'selected' : '' )?> >{{$branch->branch_name}}</option>
                                                @endforeach
                                            @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label label-checkbox">Type(s)</label>
                                <div class="col-sm-10 checkbox-radios">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="{{$view_1_1->non_member}}" type="checkbox" <?php echo(@isset($view_1_1->non_member) == 1 ? 'checked': '') ?>> Non
                                            Member
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="{{$view_1_1->member}}"  type="checkbox" <?php echo(@isset($view_1_1->member) == 1 ? 'checked': '') ?>> Member
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="{{$view_1_1->guarantor}}" type="checkbox" <?php echo(@isset($view_1_1->guarantor)  == 1 ? 'checked': '') ?>>
                                            Guarantor
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="{{$view_1_1->supplier}}" type="checkbox" <?php echo(@isset($view_1_1->supplier ) == 1 ? 'checked': '') ?>>
                                            Supplier
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="{{$view_1_1->customer}}" type="checkbox" <?php echo(@isset($view_1_1->customer)  == 1 ? 'checked': '') ?>>
                                            Customer
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="{{$view_1_1->child}}" type="checkbox" <?php echo(@isset($view_1_1->child)  == 1 ? 'checked': '') ?>> Child
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="{{$view_1_1->introducer}}" type="checkbox" <?php echo(@isset($view_1_1->introducer)  == 1 ? 'checked': '') ?>>
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
                                <?php $acc_catsAll=\App\Models\AccountCategory::all()?>
                                <div class="col-sm-8">
                                    <select name="account_category_id"   class="selectpicker" data-style="select-with-transition">
                                            @isset($acc_catsAll,$view_1)
                                                @foreach ($acc_catsAll as $acc_cat)
                                                    @if(intval($acc_cat->is_enable) == 1)
                                                        <option value="{{$acc_cat->id}}" <?php echo($acc_cat->id == $view_1->account_category_id ? 'selected' : '' )?>>{{$acc_cat->account_category}}</option>
                                                    @endif
                                                @endforeach
                                            @endisset
                                    </select>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Small Gr./ Acc.Off</label>
                                <?php $smallgroups=\App\Models\SmallGroup::all()?>
                                <div class="col-sm-8">
                                     <select name="small_group_id" id=""  class="selectpicker" data-style="select-with-transition">
                                            @isset($smallgroups,$view_1->small_group_id)
                                                @foreach ($smallgroups as $small_group)
                                                    @if(intval($small_group->is_enable) == 1)
                                                        <option value="{{$small_group->id}}" <?php echo($small_group->id == $view_1->small_group_id ? 'selected' : '' )?>>
                                                                {{$small_group->small_group}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endisset
                                        </select>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Acc. Office Sub No.</label>
                                <?php $subaccountoffices=\App\Models\SubAccountOffice::all()?>
                                <div class="col-sm-8">
                                    <select name="sub_account_office_id" id="" class="selectpicker" data-style="select-with-transition">
                                            @isset($subaccountoffices,$view_1->sub_account_office_id)
                                                @foreach ($subaccountoffices as $sub_account_office)
                                                    @if(intval($sub_account_office->is_enable) == 1)
                                                        <option value="{{$sub_account_office->id}}" <?php echo($sub_account_office->id == $view_1->sub_account_office_id ? 'selected' : '' )?>>
                                                                {{$sub_account_office->sub_account_office}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endisset
                                        </select>

                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Sub Account Office</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        @isset($view_1->office_sub_id)
                                        <input type="text" class="form-control" name="office_sub_id"   value="{{ $view_1->office_sub_id}}">
                                        @endisset
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">ID Type</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <?php $idtypes=\App\Models\IedentificationType::all()?>
                                        <select name="identification_type_id" id="id_type" class="selectpicker" data-style="select-with-transition">
                                                    @isset($idtypes,$view_1->identification_type_id)
                                                        @foreach ($idtypes as $id_type)
                                                            @if(intval($id_type->is_enable) == 1)
                                                                <option value="{{$id_type->id}}" <?php echo($id_type->id == $view_1->identification_type_id ? 'selected' : '' )?>>
                                                                        {{$id_type->identification_type}}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    @endisset
                                                </select>
                                        @isset($view_1->identification_number)
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" name="identification_number"  class="form-control" value="{{$view_1->identification_number}}">
                                            </div>
                                        </div>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Address </label>
                                <div class="col-sm-10">
                                    @isset($view_1->address_data)
                                    <div class="form-group">
                                        <input type="text" name="address_data"  class="form-control" value="{{ $view_1->address_data}}">
                                    </div>
                                    @endisset
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Telephone No</label>
                                <div class="col-sm-5">
                                    <?php $contacttypes=\App\Models\ContactType::all()?>
                                    <select name="contact_type_id" id="contact_type_id" class="selectpicker" data-style="select-with-transition">
                                                <option value="">Select Type</option>
                                                @isset($contacttypes,$view_1->telephone_no_type)
                                                    @foreach ($contacttypes as $contact_type)
                                                        @if(intval($contact_type->is_enable) == 1)
                                                            <option value="{{$contact_type->id}}" <?php echo($contact_type->id == $view_1->telephone_no_type ? 'selected' : '' )?>>
                                                                    {{$contact_type->contact_type}}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endisset
                                            </select>
                                </div>
                                <div class="col-sm-5">
                                    @isset($view_1->telephone_number)
                                    <div class="form-group">
                                        <div class="col-sm-11">
                                            <input type="text" name="telephone_number"  class="form-control" value="{{$view_1->telephone_number }}">

                                        </div>
                                    </div>
                                    @endisset
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Fax</label>
                                <div class="col-sm-10">
                                    @isset($view_1->fax_number)
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="text" name="fax_number"  class="form-control" value="{{ $view_1->fax_number}}">
                                        </div>
                                    </div>
                                    @endisset
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    @isset($view_1->email_address)
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="text" name="email_address"  class="form-control" value="{{ $view_1->email_address }}">
                                        </div>
                                    </div>
                                    @endisset
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
                                    @isset($view_2->date_of_birth)
                                    <div class="form-group">
                                        <input type="date" name="date_of_birth" class="form-control"  value="{{ $view_2->date_of_birth}}">
                                    </div>
                                    @endisset
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Religion</label>
                                <?php $religons=\App\Models\RelegionData::where('id',$view_2->religion_data_id )->first()?>
                                <div class="col-sm-10">
                                    @isset($religons)
                                    <div class="form-group">
                                        <input type="text" name="religion_data_id" class="form-control" readonly value="{{ $religons->religion_data }}">
                                    </div>
                                    @endisset
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Married Status</label>
                                <?php $married_st=\App\Models\MarriedStatus::where('id',$view_2->married_status_id)->first()?>
                                <div class="col-sm-10">
                                    @isset($married_st)
                                    <div class="form-group">
                                        <input type="text" name="married_status_id" class="form-control" readonly value="{{ $married_st->married_status}}">
                                    </div>
                                    @endisset
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Gender</label>
                                <?php $gen=\App\Models\Gender::where('id',$view_2->gender_id)->first()?>
                                <div class="col-sm-10">
                                    @isset($gen)
                                    <div class="form-group">
                                        <input type="text" name="gender_id " class="form-control" readonly value="{{ $gen->gender }}">
                                    </div>
                                     @endisset
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
                                        <input type="text" name="join_date" class="form-control" readonly value="{{ isset($view_2->join_date)?$view_2->join_date:''}}">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <label class="col-sm-2 col-form-label">Expired Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="expire_date" class="form-control" readonly value="{{ isset($view_2->expire_date)?$view_2->expire_date:''}}">
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="row">
                                <label class="col-sm-2 col-form-label">Exit Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="exit_date" class="form-control" readonly value="{{ isset($view_2->exit_date)?$view_2->exit_date:''}}">
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="row">
                                <label class="col-sm-2 col-form-label">Death Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="death_date" class="form-control" readonly value="{{ isset($view_2->death_date)?$view_2->death_date:''}}">
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="row">
                                <label class="col-sm-2 col-form-label">Neglection Starting Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="neglection_starting_date" readonly class="form-control" value="{{ isset($view_2->neglection_starting_date)?$view_2->neglection_starting_date:''}}">
                                    </div>
                                </div>
                            </div> -->
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
                        @isset($view_3)
                        <div class="tab-pane active" id="status">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Employee at Society</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="is_employee" readonly class="form-control" value="{{ isset($view_3->is_employee)?$view_3->is_employee:0}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Designation</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="designation" readonly class="form-control" value="{{ isset($view_3->designation)?$view_3->designation:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="address_line_1" readonly class="form-control" value="{{ isset($view_3->address_line_1)?$view_3->address_line_1:''}}">
                                        <input type="text" name="address_line_2" readonly class="form-control" value="{{ isset($view_3->address_line_2)?$view_3->address_line_2:''}}">
                                        <input type="text" name="address_line_3" readonly class="form-control" value="{{ isset($view_3->address_line_3)?$view_3->address_line_3:''}}">
                                        <input type="text" name="address_line_4" readonly class="form-control" value="{{ isset($view_3->address_line_4)?$view_3->address_line_4:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">EPF No</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" readonly name="epf_no" value="{{ isset($view_3->epf_no)?$view_3->epf_no:''}}">

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
                                            <textarea name="other_memberships" id="" readonly cols="30" rows="8" placeholder="{{ isset($view_4->other_memberships)?$view_4->other_memberships:''}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Curr. Designation</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="text" class="form-control" readonly name="current_designation" value="{{ isset($view_4->current_designation)?$view_4->current_designation:''}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Previous Designation</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <textarea name="previous_designation" readonly id="" cols="30" rows="8" placeholder="{{ isset($view_4->previous_designation)?$view_4->previous_designation:''}}"></textarea>
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
                            <h5 class="">Beneficiaries</h5>

                            @isset($view_5_1)

                                <table class="table table-striped table-bordered" readonly id="bene_table">
                                   <thead>
                                    <tr>
                                        <th>Customer ID</th>
                                        <th>Beneficiary ID</th>
                                    </tr>
                                   </thead>
                                   <tbody id="bene_body">

                                       @foreach($view_5_1 as $view_5_11)
                                        <?php $benes=\App\Models\CustomerBasicData::where('customer_id',$view_5_11->beneficiary_id)->first()?>
                                       <tr>
                                            <td>{{$benes->customer_id}} </td>
                                            <td> {{$benes->name_in_use}}</th>
                                        </tr>
                                        @endforeach


                                   </tbody>
                                </table>

                                @endisset

                            <br>
                            <h5 class="">Guardians</h5>

                            @isset($view_5_2)
                                <table class="table table-striped table-bordered" readonly id="guard_table">
                                   <thead>
                                    <tr>
                                        <th>Customer ID</th>
                                        <th>Guardian Name</th>
                                    </tr>
                                   </thead>
                                   <tbody id="guard_body">
                                         @foreach($view_5_2 as $view_5_22)
                                        <?php $gudrs=\App\Models\CustomerBasicData::where('customer_id',$view_5_22->guardian_id)->first()?>
                                       <tr>
                                             <td>{{$gudrs->customer_id}} </td>
                                            <td> {{$gudrs->name_in_use}}</td>
                                        </tr>
                                        @endforeach

                                   </tbody>
                                </table>
                                @endisset

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
                                        <textarea name="special_information" readonly id="" cols="30" rows="10" placeholder="{{ isset($view_6->special_information)?$view_6->special_information:''}}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Real Member</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="is_real_member" readonly  id="" class="form-control" value="{{ isset($view_6->is_real_member)?$view_6->is_real_member:0}}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h5 class="text-center">Assets</h5>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Item</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" readonly class="form-control" value="{{ isset($view_6->item)?$view_6->item:0}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Value</label>
                                <div class="col-sm-3">
                                    <input type="text" readonly class="form-control" value="{{ isset($view_6->value)?$view_6->value:0}}">
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
