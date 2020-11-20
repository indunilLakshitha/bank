@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body ">
                    <form id="form" class="form-horizontal" >
                        @csrf
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">If the Fee type is Precentage</h4>
                            </div>
                        </div>
                        <div class="row">
                                <label class="col-sm-4 col-form-label">Fee Type</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">

                                                    <select name=""  id="" class="selectpicker" data-style="select-with-transition">
                                                        <option value="">Select</option>

                                                        <option value="">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Fee Rate</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Calculation Basics</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">

                                                    <select name=""  id="" class="selectpicker" data-style="select-with-transition">
                                                        <option value="">Select</option>

                                                        <option value="">

                                                    </select>
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
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body ">
                    <form id="form" class="form-horizontal" >
                        @csrf
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">If the Fee Category is Variable</h4>
                            </div>
                        </div>
                        <div class="row">
                                <label class="col-sm-4 col-form-label">Fee Category</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">

                                                    <select name=""  id="" class="selectpicker" data-style="select-with-transition">
                                                        <option value="">Select</option>

                                                        <option value="">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Fee Type</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">

                                                    <select name=""  id="" class="selectpicker" data-style="select-with-transition">
                                                        <option value="">Select</option>

                                                        <option value="">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Minimum Amount</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Maximum Amount</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Fee Amount</label>
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
                    <form id="form" class="form-horizontal" >
                        @csrf
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">If the Fee Category is Variable & Fee Type is Precentage </h4>
                            </div>
                        </div>
                        <div class="row">
                                <label class="col-sm-4 col-form-label">Minimum Amount</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                                <label class="col-sm-4 col-form-label">Maximum Amount</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                                <label class="col-sm-4 col-form-label">Fee Rate</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                                <label class="col-sm-4 col-form-label">Calculation Basics</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">

                                                    <select name=""  id="" class="selectpicker" data-style="select-with-transition">
                                                        <option value="">Select</option>

                                                        <option value="">

                                                    </select>
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
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body ">
                    <form id="form" class="form-horizontal" >
                        @csrf
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">If the Acount Type is Joint</h4>
                            </div>
                        </div>
                        <div class="row">
                                <label class="col-sm-4 col-form-label">Maximum Number of Joint Account Holders</label>
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
                    <form id="form" class="form-horizontal" >
                        @csrf
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">If the Acount Category is Minor</h4>
                            </div>
                        </div>
                        <div class="row">
                                <label class="col-sm-4 col-form-label">Account Transfer Process</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">

                                                    <select name=""  id="" class="selectpicker" data-style="select-with-transition">
                                                        <option value="">Select</option>

                                                        <option value="">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Product to be Transferred</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">

                                                    <select name=""  id="" class="selectpicker" data-style="select-with-transition">
                                                        <option value="">Select</option>

                                                        <option value="">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <div class="row">
                                <label class="col-sm-4 col-form-label">Guardian Required</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                                <label class="col-sm-4 col-form-label">Minor Account Withdrawal Allowed</label>
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
@endsection
