asdsadsad
@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body ">
                    <form id="form" class="form-horizontal">
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
                    </form>
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
                    <form id="form" class="form-horizontal">
                        @csrf
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

                                            <select name="account_category_id" id="account_category_id" class="selectpicker"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

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

                                            <select name="account_type_id" id="account_type_id" class="selectpicker"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

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
                                    <input type="text" class="form-control" id="max_age" name="max_age">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Number of Accounts Per Customer</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="number_account_customer" name="number_account_customer">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Parameter can Override at Account Level</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Signature Verification Required</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Internal Transaction SMS Allowed</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Non Resident Customers are Incoparating</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Gift Applicable</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Institution Own Bank Account</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">ATM Facility</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label">Dormant Period in Days</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Inactive Period in Days</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Frequency of Statement Generation </label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">

                                            <select name="" id="" class="selectpicker"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

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

                                            <select name="" id="" class="selectpicker"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

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

                                            <select name="" id="" class="selectpicker"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

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
