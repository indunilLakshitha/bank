@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body ">
                    <form id="form" action="{{url('/savinsschemasubmit')}}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Saving Scheme Parameters</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Scheme Code</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body ">
                    {{-- <form id="form" class="form-horizontal"> --}}
                    {{-- @csrf --}}
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">General Scheme Parameters</h4>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Acount Category</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        @php
                                        $account_categories =
                                        Illuminate\Support\Facades\DB::table('account_categories')->where('is_enable',1)->get();
                                        @endphp
                                        <select name="account_category_id"  class="selectpicker"
                                            data-style="select-with-transition">
                                            <option value="0">Select</option>
                                            @isset($account_categories)
                                            @foreach ($account_categories as $account_category)
                                            <option value="{{$account_category->id}}">
                                                {{$account_category->account_category}}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Acount Type</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        @php
                                        $account_types =
                                        Illuminate\Support\Facades\DB::table('account_types')->where('is_enable',1)->get();
                                        @endphp
                                        <select name="account_type_id" id="account_type_id" class="selectpicker"
                                            data-style="select-with-transition">
                                            <option value="">Select</option>
                                            @isset($account_types)
                                            @foreach ($account_types as $account_type)
                                            <option value="{{$account_type->id}}">
                                                {{$account_type->account_type}}</option>
                                            @endforeach
                                            @endisset

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Minimum Age</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="min_age" name="min_age">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Maximum Age</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="number" class="form-control" id="max_age" name="max_age">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Number of Accounts Per Customer</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="number" class="form-control" id="number_account_customer"
                                    name="number_account_customer">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Parameter can Override at Account Level</label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="checkbox" value="1" class="form-control" name="is_override_account_level"
                                    id="is_override_account_level">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Signature Verification Required</label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="checkbox"value="1" class="form-control" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Internal Transaction SMS Allowed</label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="checkbox"value="1" class="form-control" name="has_internal_transaction_sms"
                                    id="has_internal_transaction_sms">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Non Resident Customers are Incoparating</label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="checkbox"value="1" class="form-control" name="has_nonresident_incorparating"
                                    id="has_nonresident_incorparating">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Gift Applicable</label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="checkbox"value="1" class="form-control" name="has_gift_applicable"
                                    id="has_gift_applicable">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Institution Own Bank Account</label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="checkbox"value="1" class="form-control" name="has_own_bank_account"
                                    id="has_own_bank_account">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">ATM Facility</label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="checkbox"value="1" class="form-control" name="has_atm_facility"
                                    id="	has_atm_facility">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-4 col-form-label">Dormant Period in Days</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="number" class="form-control" id="domaint_period_days"
                                    name="domaint_period_days">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Inactive Period in Days</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="number" class="form-control" id="inactive_period_days"
                                    name="inactive_period_days">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Frequency of Statement Generation </label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        {{-- @php
                                        $account_types =
                                        Illuminate\Support\Facades\DB::table('account_types')->get();
                                        @endphp --}}
                                        <select name="statment_generate_frequently_id"
                                            id="statment_generate_frequently_id" class="selectpicker"
                                            data-style="select-with-transition">
                                            <option value="">Select</option>
                                            {{-- @isset($account_types)
                                            @foreach ($account_types as $account_type)
                                            <option value="{{$account_type->id}}">
                                                {{$account_type->account_type}}</option>
                                            @endforeach
                                            @endisset --}}

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Eligible Currency</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        @php
                                        $currencies =
                                        Illuminate\Support\Facades\DB::table('currencies')->where('is_enable',1)->get();
                                        @endphp
                                        <select name="	currency_idaccount_authorized_level"
                                            id="	currency_idaccount_authorized_level" class="selectpicker"
                                            data-style="select-with-transition">
                                            <option value="">Select</option>
                                            @isset($currencies)
                                            @foreach ($currencies as $currency)
                                            <option value="{{$currency->id}}">
                                                {{$currency->currency_code}}</option>
                                            @endforeach
                                            @endisset

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Number of Account Authorization Levels</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">

                                        <select name="account_authorized_level" id="account_authorized_level"
                                            class="selectpicker" data-style="select-with-transition">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>


                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <label class="col-sm-4 col-form-label">Number of Account Authorization Levels</label> --}}
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">

                                        <button class="btn btn-primary">NEXT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
