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
                                <h4 class="card-title">Tax</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Debit Tax Apply</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Debit Tax Apply Rate</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">WHT Deducation</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="checkbox" class="form-control" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">WHT Deducation</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <button class="btn btn-primary">SUMBIT</button> </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
