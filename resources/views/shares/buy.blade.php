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
                                <h4 class="card-title"> Buy Shares</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <button class="btn fa fa-search btn-info float-right" data-toggle="modal"
                            href="#noticeModal"> SEARCH</button>
                        </div>
                    </div>
                    {{-- <form id="private_1" action="{{url('/member/add/private')}}" method="POST"> --}}
                        {{-- @csrf --}}
                        <div class="tab-pane active" id="private_1">
                            {{-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> --}}
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Member Name<font color="red">*</font></label>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <input name="name_in_use" type="text" class="form-control" id="full_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Authentification Type<font color="red">*</font>
                                </label>
                                <div class="col-lg-3 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="full_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Authentification Number<font color="red">*</font>
                                </label>
                                <div class="col-lg-3 col-md-2 col-sm-2">
                                    <div class="form-group">
                                        <input type="text" name="surname" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">No of Sharess<font color="red">*</font></label>
                                <div class="col-lg-3 col-md-2 col-sm-2">
                                    <div class="form-group">
                                        <input type="text" name="short_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Cost Per Sharess<font color="red">*</font></label>
                                <div class="col-lg-3 col-md-2 col-sm-2">
                                    <div class="form-group">
                                        <input type="text" name="short_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-2 col-form-label">Total Share Value<font color="red">*</font></label>
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


    @include('layouts.search_modal')
    @endsection
