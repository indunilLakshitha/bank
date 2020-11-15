@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Savings Account Opening</h4>
                    </div>
                </div>
            </div>
            <form method="post" action="/savings/open" class="form-horizontal">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Client Details</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <label class="col-sm-2 col-form-label">CIF</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" value={{$CIF}} disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Client Full Name</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @php
                                    $basic_data = Illuminate\Support\Facades\DB::table('customer_basic_data')->get();
                                @endphp
                                 <select  id="client_full_name" class="form-control">
                                    <option value="">Select</option>
                                    @isset($basic_data)
                                    @foreach ($basic_data as $basic_dat)
                                    <option value="{{$basic_dat->full_name}}">
                                        {{$basic_dat->full_name}}
                                        @endforeach
                                        @endisset
                                </select>
                                    {{-- <input
                                    oninput="toCap(this.value, this.id)"
                                    type="text" class="form-control" id="client_full_name"> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">ID Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <select name="identification_type_id" id="identification_type_id" class="selectpicker" data-style="select-with-transition">
                                                <option value="">Select</option>
                                                @isset($idtypes)
                                                @foreach ($idtypes as $idtype)
                                                <option value="{{$idtype->id}}">
                                                    {{$idtype->identification_type}}
                                                    @endforeach
                                                    @endisset
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" name="identification_number"  id="identification_number" class="form-control">
                                            <a
                                            onclick="get_cus_details(identification_type_id.value, identification_number.value, client_full_name.value)"
                                            class="btn btn-primary text-white" >SEARCH</a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                            <input type="hidden" id="branch_id" name="branch_id">
                            <input type="hidden" id="customer_id" name="customer_id">
                            <input type="hidden" id="account_number" name="account_number" value={{$acc_no}} >
                            <div class="row">
                            <label class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" name="full_name" class="form-control" id="full_name">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <select name="identification_type_id"   class="selectpicker" data-style="select-with-transition">
                                                <option value="">Select Customer Type</option>
                                                @isset($idtypes)
                                                @foreach ($idtypes as $idtype)
                                                <option value="{{$idtype->id}}">
                                                    {{$idtype->identification_type}}
                                                    @endforeach
                                                    @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-sm-2 col-form-label">CIF</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">DOB</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="date" id="dob" name="dob" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer FATCA Clearance Received</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <select name="identification_type_id"   class="selectpicker" data-style="select-with-transition">
                                                <option value="">Select </option>
                                               <option value="">Yes</option>
                                               <option value="">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer PEP Clearance Received</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <select name="identification_type_id"   class="selectpicker" data-style="select-with-transition">
                                                <option value="">Select </option>
                                                    <option value="">Yes</option>
                                                    <option value="">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br> <br>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Branch Code</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="branch_code" name="branch_code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer Rating</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer Signature</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <span class="btn btn-round btn-rose btn-file ">
                                        <span class="fileinput-new">Choose File</span>
                                        <input type="file" name="cus_sign_img" />
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">General Information</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Lead source Category</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            @php
                                                $lead_src_cts = Illuminate\Support\Facades\DB::table('lead_sources')->get();
                                            @endphp
                                            <select name="lead_source_category_id"  class="form-control">
                                                <option value="">Select </option>
                                                @isset($lead_src_cts)
                                                @foreach ($lead_src_cts as $ls)
                                                <option value="{{$ls->id}}">
                                                    {{$ls->lead_source_category}}
                                                    @endforeach
                                                    @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Lead source Identification</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="lead_source_identification">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Account Description</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="account_description">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Account Category</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            @php
                                            $acc_cats = Illuminate\Support\Facades\DB::table('account_categories')->get();
                                        @endphp
                                            <select name="account_category_id"   class="selectpicker" data-style="select-with-transition">
                                                <option value="">Select </option>
                                                @isset($acc_cats)
                                                @foreach ($acc_cats as $ac_cat)
                                                <option value="{{$ac_cat->id}}">
                                                    {{$ac_cat->account_category}}
                                                    @endforeach
                                                    @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Account Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            @php
                                                $acc_types = Illuminate\Support\Facades\DB::table('account_types')->get();
                                            @endphp
                                            <select name="account_type_id"   class="selectpicker" data-style="select-with-transition">
                                                <option value="">Select </option>
                                                @isset($acc_types)
                                                @foreach ($acc_types as $ac_type)
                                                <option value="{{$ac_type->id}}">
                                                    {{$ac_type->account_type}}
                                                    @endforeach
                                                    @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Options</label>
                            <div class="col-sm-8">
                                <div class="col-10">
                                    <div class="form-group">
                                        <div class="col"><input type="checkbox" class="form-control" name="has_atm" value="1" > ATM
                                        </div>
                                        <div class="col"><input type="checkbox" class="form-control" name="has_sms" value="1"  > SMS
                                        </div>
                                        <div class="col"><input type="checkbox" class="form-control" name="has_internet_banking"  value="1" >
                                            Internet Banking</div>
                                        <div class="col"><input type="checkbox" class="form-control" name="has_mobile_banking" value="1"  >
                                            Mobile Banking</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Account Maintenance Via</label>
                            <div class="col-sm-8">
                                <div class="col-10">
                                    <div class="form-group">
                                        <div class="col"><input type="checkbox" class="form-control" name=""  value="1" >
                                            Account Statement</div>
                                        <div class="col"><input type="checkbox" class="form-control" name="has_passbook" value="1"
                                                 >Passbook</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-rose float-right" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
