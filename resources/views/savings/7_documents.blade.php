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
                                                <h4 class="card-title">Documents</h4>
                                            </div>
                                        </div>
                                         <div class="row col-12 ">
                                        <div class="col-sm-12">
                                                  <label class="col-sm-2 col-form-label">Document Type</label>

                                                   <label class="col-sm-2 col-form-label">Mandotory</label>

                                                   <label class="col-sm-1 col-form-label">Availability</label>
                                                   <label class="col-sm-1 col-form-label"></label>

                                                   <label class="col-sm-1 col-form-label">Remark</label>

                                                   <label class="col-sm-3 col-form-label">Upload Document</label>

                                        </div>

                                    </div>
                                    <div class="row ">
                                        <label class="col-sm-2 col-form-label">Biling Proof</label>
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-1  checkbox">
                                            <div class="form-check ">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1  checkbox">
                                            <div class="form-check ">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                        </div>


                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="client_name" class="form-control">
                                            </div>
                                        </div>

                                        <span class="btn btn-round btn-rose btn-file ">
                                            <span class="fileinput-new">Choose File</span>
                                            <input type="file" name="..." />
                                        </span>

                                        <input type="button" class="btn btn-sm btn-fill " name="submit" value="Upload">
                                    </div>
                                    <div class="row ">
                                        <label class="col-sm-2 col-form-label">NIC Copy</label>
                                        <div class="col-sm-1">
                                        </div>

                                        <div class="col-sm-1  checkbox">
                                            <div class="form-check ">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1  checkbox">
                                            <div class="form-check ">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </div>
                                        <span class="btn btn-round btn-rose btn-file ">
                                            <span class="fileinput-new">Choose File</span>
                                            <input type="file" name="..." />
                                        </span>
                                        <input type="button" class="btn btn-sm btn-fill " name="submit" value="Upload">
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
