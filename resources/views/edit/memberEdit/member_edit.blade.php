@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-body  ">
        <div class="content ">
            <div class="container-fluid ">
                <div class="col-md-6 col-6 mr-auto ml-auto pull-left">
                    <div class="card">
                        <div class="card-body ">
                            <form id="private_1" action="/member/edit/1add" method="POST">
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
                                     <select name="customer_title_id" id=""  class="selectpicker" data-style="select-with-transition">
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
                                        <input name="name_in_use" type="text"  class="form-control" value="{{ $view_1->name_in_use'}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="full_name"  class="form-control" value="{{ $view_1->full_name}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Surname</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="surname"  class="form-control" value="{{ $view_1->surname}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Short Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="short_name" class="form-control"  value="{{ $view_1->short_name}}">
                                    </div>
                                </div>
                            </div>
                             <?php $branchesAll=\App\Models\Branch::all()?>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Branch</label>
                                <div class="col-sm-10">
                                    <select name="branch_id" "  class="selectpicker" data-style="select-with-transition">
                                            @isset($branchesAll,$view_1)
                                                @foreach ($branchesAll as $branch)
                                                    <option value="{{$branch->id}}" <?php echo($branch->id == $view_1->branch_id ? 'selected' : '' )?> >{{$branch->branch_name}}</option>
                                                @endforeach
                                            @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                @isset($view_1_1)
                                <label class="col-sm-2 col-form-label label-checkbox">Type(s)</label>
                                <div class="col-sm-10 checkbox-radios">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="1" type="checkbox" <?php echo(@isset($view_1_1->non_member) == 1 ? 'checked': '') ?>> Non
                                            Member
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="1"  type="checkbox" <?php echo(@isset($view_1_1->member) == 1 ? 'checked': '') ?>> Member
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="1" type="checkbox" <?php echo(@isset($view_1_1->guarantor)  == 1 ? 'checked': '') ?>>
                                            Guarantor
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="1" type="checkbox" <?php echo(@isset($view_1_1->supplier ) == 1 ? 'checked': '') ?>>
                                            Supplier
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="1" type="checkbox" <?php echo(@isset($view_1_1->customer)  == 1 ? 'checked': '') ?>>
                                            Customer
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="1" type="checkbox" <?php echo(@isset($view_1_1->child)  == 1 ? 'checked': '') ?>> Child
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" value="1" type="checkbox" <?php echo(@isset($view_1_1->introducer)  == 1 ? 'checked': '') ?>>
                                            Introducer
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            @endisset

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
                        <div class="row">
                             <div class="col-4">
                             <button type="submit"  class="btn btn-primary" >SAVE</button>
                             </div>
                         </div>
                         </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-6 mr-auto ml-auto pull-right">
            <div class="card">
                <div class="card-body  ">
                    <form id="private_2" action="/member/edit/1status" method="POST">
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
                                <?php $rels=\App\Models\RelegionData::all()?>
                                <div class="col-sm-10">
                                    @isset($rels,$view_2->religion_data_id)
                                    <select name="religion_data_id" id=""  class="selectpicker" id="married_status_id" data-style="select-with-transition">
                                            <option value="">Select</option>
                                            @foreach ($rels as $item)
                                                <option value="{{$item->id}}" <?php echo($item->id == $view_2->religion_data_id ? 'selected' : '' )?> >{{$item->religion_data}}</option>
                                            @endforeach
                                        </select>
                                    @endisset
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Married Status</label>
                                <?php $married_st=\App\Models\MarriedStatus::all()?>
                                <div class="col-sm-10">
                                    @isset($married_st,$view_2->married_status_id)
                                    <select name="married_status_id" id=""  class="selectpicker" id="married_status_id" data-style="select-with-transition">
                                        <option value="">Select</option>
                                        @foreach ($married_st as $item)
                                            <option value="{{$item->id}}" <?php echo($item->id == $view_2->married_status_id ? 'selected' : '' )?>>{{$item->married_status}}</option>
                                        @endforeach
                                    </select>
                                    @endisset
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Gender</label>
                                <?php $gen=\App\Models\Gender::all()?>
                                <div class="col-sm-10">
                                    @isset($gen,$view_2->gender_id)
                                    <select name="gender_id" id=""  class="selectpicker" id="gender_id" data-style="select-with-transition">
                                        <option value="">Select</option>
                                        @foreach ($gen as $item)
                                            <option value="{{$item->id}}" <?php echo($item->id == $view_2->gender_id ? 'selected' : '' )?>>{{$item->gender}}</option>
                                        @endforeach
                                    </select>
                                     @endisset
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Date Became Member</label>
                                <div class="col-sm-10">
                                    @isset($view_2->member_date)
                                    <div class="form-group">
                                        <input type="date" name="member_date" class="form-control"  value="{{$view_2->member_date}}" >
                                    </div>
                                    @endisset
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Joined Date</label>
                                <div class="col-sm-10">
                                    @isset($view_2->join_date)
                                    <div class="form-group">
                                        <input type="date" name="join_date" class="form-control"  value="{{$view_2->join_date}}">
                                    </div>
                                    @endisset
                                </div>
                            </div>
                        </div>
                        @endisset
                         <div class="row">
                             <div class="col-4">
                             <button type="submit"  class="btn btn-primary" >SAVE</button>
                             </div>
                         </div>
                    </form>
                    {{-- Ends Private 1 --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
