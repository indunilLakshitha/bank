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
                                <h4 class="card-title"> Transfer Shares</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <form id="private_1" action="{{url('/member/add/private')}}" method="POST"> --}}
                    {{-- @csrf --}}
                    <div class="tab-pane active" id="private_1">
                        {{-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Name of Seller<font color="red">*</font></label>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <input name="name_in_use" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">No of Shares To Sell<font color="red">*</font>
                                </label>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <input type="text" name="full_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Name of Buyer<font color="red">*</font>
                                </label>
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <input type="text" name="surname" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">No of Shares To Buy<font color="red">*</font></label>
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <input type="text" name="short_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Total Transaction Amount<font color="red">*</font></label>
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <input type="text" name="short_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Balance Share Amount of Seller<font color="red">*</font></label>
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <input type="text" name="short_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Balance Share Amount of Buyer<font color="red">*</font></label>
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <input type="text" name="short_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-right">
                                <a class="btn btn-rose col-4 text-white">SUBMIT</a>
                            </div>
                            <div class="col-1 text-right">
                                <button type="submit" class="btn ">Clear</button>
                            </div>
                        </div> {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
