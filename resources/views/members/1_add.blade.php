@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
            <div class="card " style="border: solid">
                <div class="row">
                    <div class="col-3">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Step 01 - Customer Creation</h4>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-8">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text"> --}}
                    {{-- <h4 class="card-title">Member Creation</h4> --}}
                    {{-- <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a> --}}
                    {{-- </div>
                        </div>
                    </div> --}}
                </div>


                <div class="card-body">
                    <form id="form" action="{{url('/member/add/private')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="tab-pane active" id="private_1">
                            {{-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> --}}


                            <div class="row">
                                <label class="col-sm-2 col-form-label">STATUS</label>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select name="customer_status_id" id="c" class="form-control"
                                            data-style="select-with-transition">
                                            {{-- <option value="1">ACTIVE</option> --}}
                                            <option value="0" selected>INACTIVE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Title <font color="red">*</font></label>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <?php $titles=\App\Models\CutomerTitle::all()?>
                                        <select name="customer_title_id" id="" class="form-control"
                                            data-style="select-with-transition" required>
                                            <option value="">Select Title</option>
                                            @isset($titles)
                                            @foreach ($titles as $title)
                                            @if(intval($title->is_enable) == 1)
                                            <option value="{{$title->id}}">{{$title->customer_title}}</option>
                                            @endif
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Name in Use <font color="red">*</font></label>
                                <div class="col-lg-6 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input name="name_in_use" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Full Name<font color="red">*</font></label>
                                <div class="col-lg-6 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="full_name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Surname<font color="red">*</font></label>
                                <div class="col-lg-6 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="surname" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Name With Initials<font color="red">*</font>
                                    </label>
                                <div class="col-lg-6 col-md-2 col-sm-2">
                                    <div class="form-group">
                                        <input type="text" name="short_name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Address<font color="red">*</font></label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="address_line_1" class="form-control" required>
                                        <input type="text" name="address_line_2" class="form-control">
                                        <input type="text" name="address_line_3" class="form-control">
                                        <input type="text" name="address_line_4" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">EPF No</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="epf_no">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Branch<font color="red">*</font></label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select name="branch_id" id="" class="form-control"
                                            data-style="select-with-transition" required>
                                            <option value="">Select Branch</option>
                                            @isset($branches)
                                            @foreach ($branches as $branch)
                                            @if(intval($branch->is_enable) == 1)
                                            <option value="{{$branch->id}}">
                                                {{$branch->branch_code.' - '.$branch->branch_name}}</option>
                                            @endif
                                            @endforeach
                                            @endisset

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label label-checkbox">Type(s)</label>
                                <div class="col-sm-10 checkbox-radios">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" disabled checked type="checkbox"
                                                id="non_member" name="non_member" value="1">
                                            Non
                                            Member
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    {{-- <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="1" name="member">
                                            Member
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="1" name="guarantor">
                                            Guarantor
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="1" name="supplier">
                                            Supplier
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="1" name="customer">
                                            Customer
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="1" name="child">
                                            Child
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="1" name="introducer">
                                            Introducer
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div> --}}

                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Account Category<font color="red">*</font>
                                    </label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select name="account_category_id" id="" class="form-control"
                                            data-style="select-with-transition" required>
                                            <option value="">Select Account Category</option>
                                            @isset($accountcategories)
                                            @foreach ($accountcategories as $account_category)
                                            @if(intval($account_category->is_enable) == 1)
                                            <option value="{{$account_category->id}}">
                                                {{$account_category->account_category}}
                                            </option>
                                            @endif
                                            @endforeach
                                            @endisset

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Small Gr./ Acc.Off</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select name="small_group_id" id="" class="form-control"
                                            data-style="select-with-transition">
                                            <option value="">Select Small Group</option>
                                            @isset($smallgroups)
                                            @foreach ($smallgroups as $small_group)
                                            @if(intval($small_group->is_enable) == 1)
                                            <option value="{{$small_group->id}}">
                                                {{$small_group->small_group}}
                                            </option>
                                            @endif
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Acc. Office Sub No.</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select name="sub_account_office_id" id="" class="form-control"
                                            data-style="select-with-transition">
                                            <option value="">Select Sub Office</option>
                                            @isset($subaccountoffices)
                                            @foreach ($subaccountoffices as $sub_account_office)
                                            @if(intval($sub_account_office->is_enable) == 1)
                                            <option value="{{$sub_account_office->id}}">
                                                {{$sub_account_office->sub_account_office}}
                                            </option>
                                            @endif
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Sub Account Office
                                    </label>
                                <div class="col-lg-4 col-md-2 col-sm-2">
                                    <div class="form-group">
                                        <input type="text" name="office_sub_id" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">ID Type<font color="red">*</font></label>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <select name="identification_type_id" id="id_type" class="form-control"
                                                    data-style="select-with-transition">
                                                    <option value="">Identification Type</option>
                                                    @isset($idtypes)
                                                    @foreach ($idtypes as $id_type)
                                                    @if(intval($id_type->is_enable) == 1)
                                                    <option value="{{$id_type->id}}">
                                                        {{$id_type->identification_type}}
                                                    </option>
                                                    @endif
                                                    @endforeach
                                                    @endisset
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-2 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="identification_number" class="form-control" oninput="check_nic(this.value,guradian_nic_message)"
                                                    >
                                                    <a id="guradian_nic_message" class="d-none btn btn-danger">Already registered</a>

                                            </div>
                                        </div>
                                        {{-- <div class="col">
                                            <div class="form-group">
                                                <a onclick="submit_id(id_type.value, )"  class="btn btn-sm btn-primary">Add</a>
                                            </div>
                                        </div> --}}
                                    </div>


                                </div>
                            </div>
                            {{-- <div class="row">
                                <label class="col-sm-2 col-form-label">Address </label>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <textarea type="text" name="address_data"  class="form-control"></textarea>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Telephone No</label>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <select name="contact_type_id" id="contact_type_id" class="form-control"
                                                data-style="select-with-transition">
                                                <option value="">Select Type</option>
                                                @isset($contacttypes)
                                                @foreach ($contacttypes as $contact_type)
                                                @if(intval($contact_type->is_enable) == 1)
                                                <option value="{{$contact_type->id}}">
                                                    {{$contact_type->contact_type}}
                                                </option>
                                                @endif
                                                @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <input type="number" name="contact_data" class="form-control"
                                                placeholder="Enter contact Number" id="contact_no" name="contact_no" oninput="validate_contact(this.value,contact_er)">
                                                <a id="contact_er" class="d-none btn btn-danger">Invalid Contact Number</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Fax</label>
                                <div class="col-lg-5 col-md-3 col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <input type="text" name="fax_number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-lg-5 col-md-3 col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <input type="email" name="email_address" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Signature</label>
                            <div class="col-lg-6 col-md-4 col-sm-3">
                                <span class="btn btn-round btn-rose btn-file ">
                                    <span class="fileinput-new">Choose File</span>
                                    <input type="file" name="sign_img" id="sign_img" />
                                </span>
                            </div>

                        </div>
                        <button onclick="validate_form()" id="sub_btn" type="button" class="btn btn-primary">NEXT</button>
                    </form>
                    {{-- Ends Private 1 --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validate_form(){

            if(!sign_img.files[0]) {
                // console.log(img_1.files[0]);
                return Swal.fire('Please upload Signature Image')
            }
            return form.submit()
        }


</script>

@endsection
