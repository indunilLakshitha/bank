@extends('layouts.app')


@section('content')
<form method="get" action="/" class="form-horizontal">
    <div class="card ">
        <div class="card-body ">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Fix Deposit Account Creation 2</h4>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Deposit Value</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input  type="text" class="form-control" id="">
                    </div>
                </div>

            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Starting Date</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="date" class="form-control" >
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Deposit Type</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Int. Type</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">No. of Period </font></label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <select name="" id="" class="form-control" data-style="select-with-transition" >
                        <option value="">Select Title</option>
                        <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Expired Date</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="date" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Auto Renew</font></label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <select name="" id="" class="form-control" data-style="select-with-transition" >
                        <option value="">--Select--</option>
                        <option value="1">True</option>
                        <option value="0">False</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Saving Account</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" >
                    </div>
                </div>
                <button class="btn fa fa-search btn-info btn-sm"></button>
            </div>

            <!-- <div class="row">

                <div class="col-6 text-right">
                    <button type="submit" class="btn btn-rose col-4"></button>
                </div>

            </div> -->

        </div>


    </div>
    </div>
</form>


@endsection
