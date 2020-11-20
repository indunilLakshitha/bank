@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <form method="get" action="/" class="form-horizontal">
            <div class="card ">
                    <div class="card-body ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Savings Account Parameter</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Sub Product Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="form-group">
                                            <select name="" id="" class="selectpicker" data-style="select-with-transition">
                                                <option value="">Select </option>

                                                <option value="">
                                            </select>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                    <a onclick="" id="" class="btn btn-info text-white">Scheme Dtails</a>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Interest Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <select name="" id="" class="selectpicker" data-style="select-with-transition">
                                                <option value="">Select </option>

                                                <option value="">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Interest Rate</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control col-12" name="" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Currency</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <select name="" id=""  class="selectpicker" data-style="select-with-transition">
                                                <option value=""  >Select </option>

                                                <option value="" >

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Initial Diposit Allow Mode</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <select name="" id="" class="selectpicker" data-style="select-with-transition">
                                                <option value="">Select </option>

                                                <option value="">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-sm-12 col-form-label">Parameter can override at Account Level</label>
                                    </div>
                                    <div class="form-group col-1 ">
                                        <input type="checkbox" class="form-control" name="" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <label class="col-sm-2 col-form-label">Interest Credit Dated</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control col-8" readonly name="" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <label class="col-sm-2 col-form-label">Minimum Balance to Active The Account</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control col-10" readonly name="" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <br>
                        <div class="col-6 text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
