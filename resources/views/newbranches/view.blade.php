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
                                <h4 class="card-title">Branch Member Details</h4>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="card-body">
                        <div class="tab-pane active" id="private_1">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Branch Name  <font color="red">*</font></label>
                                <div class="col-lg-6 col-md-4 col-sm-4">
                                    <div class="form-group">
                                    <input name="name_in_use" type="text" class="form-control" value="{{$branch[0]->name_in_use}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Address<font color="red">*</font></label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="address_line_1" class="form-control" value="{{$branch[0]->address_line_1}}">
                                        <input type="text" name="address_line_2" class="form-control" value="{{$branch[0]->address_line_2}}">
                                        <input type="text" name="address_line_3" class="form-control" value="{{$branch[0]->address_line_3}}">
                                        <input type="text" name="address_line_4" class="form-control" value="{{$branch[0]->address_line_4}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Branch</label>
                                <div class="col-sm-4">
                                    <div class="form-group">

                                        <input type="text" value="{{$branch[0]->branch_name}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Branch Code</label>
                                <div class="col-sm-4">
                                    <div class="form-group">

                                        <input type="text" value="{{$branch[0]->branch_code}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Telephone No</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <input type="text" value="{{$branch[0]->telephone_number}}" class="form-control">

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Fax</label>
                                <div class="col-lg-5 col-md-3 col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <input type="text" name="fax_number" value="{{$branch[0]->fax_number}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-lg-5 col-md-3 col-sm-2">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <input type="email" name="email_address" value="{{$branch[0]->email_address}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
