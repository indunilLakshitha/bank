@extends('layouts.app')


@section('content')
<form method="get" action="/" class="form-horizontal">
    <div class="card ">
        <div class="card-body ">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Fix Deposit Account Creation</h4>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Branch</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input readonly type="text" class="form-control" id="">
                    </div>
                </div>
                <label class="col-sm-2 col-form-label">Opaning Date</label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input type="date" readonly class="form-control" id="">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Certificate No</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" >
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Member</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" >
                    </div>
                </div>
                <button class="btn fa fa-search btn-info btn-sm"></button>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Product</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" >
                    </div>
                </div>
                <button class="btn fa fa-search btn-info btn-sm"></button>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Interest Rate</label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input type="text"  placeholder="Interest (%)" class="form-control">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input type="text" readonly placeholder="Int Min." class="form-control">
                    </div>
                </div>
                <label class="col-sm-1 col-form-label">(Yearly)</label>
            </div>
            <div class="row">
                <div class="col-sm-5">

                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input type="text" readonly placeholder="Int Max." class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <textarea name="" id="" cols="70" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Introducer</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" >
                    </div>
                </div>
                <button class="btn fa fa-search btn-info btn-sm"></button>
            </div>

            <div class="row">

                <div class="col-6 text-right">
                    <button type="submit" class="btn btn-rose col-4"></button>
                </div>
                <div class="col-1 text-right">
                    <button type="submit" class="btn "></button>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
</form>


@endsection
