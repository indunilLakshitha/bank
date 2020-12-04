@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">

                <div class="col-4">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Find Business Partner</h4>
                            </div>
                        </div>
                    </div>
                <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Member Code:</label>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input  type="text" class="form-control" id="">
                            </div>
                        </div>

                        <label class="col-sm-1 col-form-label"> </label>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <a type="button"  class="btn fa fa-search btn-info btn-sm">Search</a>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">

                        <div class="material-datatables">
                            <table id="datatables" class="table   table-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>A/C No</th>
                                    <th>A/C Name</th>

                                </thead>
                                <tbody id="datatables_body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                        <label class="col-sm-1 col-form-label"> </label>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <a type="button"  class="btn btn-block btn-sm btn-info">Ok</a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                            <a type="button"  class="btn btn-block btn-sm btn-border">Close</a>
                            </div>
                        </div>

                    </div>

        </div>
    </div>
</div>

@endsection
