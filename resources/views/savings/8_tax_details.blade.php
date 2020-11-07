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
            <form method="get" action="/" class="form-horizontal">
            <div class="card ">
                                <div class="card-body ">
                                        <div class="card-header card-header-rose card-header-text">
                                            <div class="card-text">
                                                <h4 class="card-title">Tax Details</h4>
                                            </div>
                                        </div>
                                    <div class="row col-12 ">
                                        <div class="col-sm-12">
                                                  <label class="col-sm-1 col-form-label">Mandotory</label>

                                                   <label class="col-sm-1 col-form-label">Fee</label>

                                                   <label class="col-sm-2 col-form-label">Fee Type</label>

                                                   <label class="col-sm-2 col-form-label">Amount</label>

                                                   <label class="col-sm-2 col-form-label">Tax Applicable</label>

                                                   <label class="col-sm-2 col-form-label">Fee Payable</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                            <div class="form-check  ">
                                            <label class="form-check-label ">
                                                <input class="form-check-input " type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                            <label class=" col-form-label ">SMS Charges</label>
                                            <div class="col-sm-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <select name="fee_type" id="" class="form-control">
                                                                <option value="">Select </option>

                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <select name="fee_type" id="" class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                            <div class="form-check  ">
                                            <label class="form-check-label ">
                                                <input class="form-check-input " type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                            <label class=" col-form-label ">Closure Charges</label>
                                            <div class="col-sm-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <select name="fee_type" id="" class="form-control">
                                                                <option value="">Select </option>

                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <select name="fee_type" id="" class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                            <div class="form-check  ">
                                            <label class="form-check-label ">
                                                <input class="form-check-input " type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                            <label class=" col-form-label ">Activation Charges</label>
                                            <div class="col-sm-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <select name="fee_type" id="" class="form-control">
                                                                <option value="">Select </option>


                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <select name="fee_type" id="" class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                        <div class="col-6 text-right">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </div>
                                </div>
                            </div>
            </form>
        </div>
    </div>
</div>
@endsection
