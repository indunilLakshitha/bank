@extends('layouts.app')


@section('content')
<form method="get" action="/" class="form-horizontal">
    <div class="card ">
        <div class="card-body ">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Branch Cash In-Out 1</h4>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Branch</label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input  type="text" class="form-control" id="">
                    </div>
                </div>

            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Branch Name</font></label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select name="" id="" class="form-control" data-style="select-with-transition" >
                        <option value="">Select</option>
                        <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>


             <div class="row">
                <label class="col-sm-2 col-form-label">Branch Account</font></label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select name="" id="" class="form-control" data-style="select-with-transition" >
                        <option value="">Select</option>
                        <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Cashiar Select</font></label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select name="" id="" class="form-control" data-style="select-with-transition" >
                        <option value="">Select</option>
                        <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Tansaction Type</font></label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select name="" id="" class="form-control" data-style="select-with-transition" >
                        <option value="">Select</option>
                        <option value="1">IN</option>
                        <option value="0">OUT</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="row">
                <label class="col-sm-2 col-form-label">Tansaction Amount</label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input type="text" class="form-control" >
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-4 text-right">
                    <button type="submit" class="btn btn-rose col-4">Submit</button>
                </div>

            </div>

        </div>


    </div>
    </div>
</form>


@endsection
