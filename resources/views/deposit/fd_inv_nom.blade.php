@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col">
        <div class="card ">
            <div class="card-body ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Investor</h4>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Investor</label>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="meber" >

                        </div>
                    </div>
                    <button class="btn fa fa-search btn-sm btn-info btn"></button>
                </div>
                <div class="row">

                    <div class="col-5 text-right">
                        <a class="btn btn-rose btn-sm text-white" style="text-align: center">Insert</a>
                    </div>
                    <div class="col-1 text-right">
                        <button type="submit" class="btn btn-sm">Remove</button>
                    </div>
                </div>

                <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">

                        <div class="material-datatables">
                            <table id="datatables" class="table   table-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>Code</th>

                                </thead>
                                <tbody id="datatables_body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>





            </div>
        </div>
    </div>
    <div class="col">
        <div class="card ">
            <div class="card-body ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Nominee</h4>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Member</label>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="meber" >

                        </div>
                    </div>
                    <button class="btn fa fa-search btn-sm btn-info btn"></button>
                </div>
                <div class="row">

                    <div class="col-5 text-right">
                        <a class="btn btn-rose btn-sm text-white" style="text-align: center">Insert</a>
                    </div>
                    <div class="col-1 text-right">
                        <button type="submit" class="btn btn-sm">Remove</button>
                    </div>
                </div>
                <div>
                     <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>

                                <th>Code</th>

                            </thead>
                            <tbody id="">

                            </tbody>
                        </table>
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
