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
                                                <h4 class="card-title">Correspondance</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Address </label>
                                            <div class="col-sm-3">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="form-group">
                                                                <select name="identification_type_id" id="" class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                        <div class="row">
                                                <label class="col-sm-2 col-form-label">Address Type</label>
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="form-group">
                                                                <select name="identification_type_id" id="" class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Address Line1">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Address Line1">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="City">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Postal COde">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Telephone </label>
                                                    <div class="col-sm-3">
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <div class="form-group">
                                                                        <select name="identification_type_id" id="" class="form-control">
                                                                            <option value="">Select </option>

                                                                            <option value="">

                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Telephone No Type</label>
                                                    <div class="col-sm-2">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <select name="identification_type_id" id="" class="form-control">
                                                                        <option value="">Select </option>

                                                                        <option value="">

                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Telephone No</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="text" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                            <label class="col-sm-3 col-form-label">Email </label>
                                                            <div class="col-sm-3">
                                                                    <div class="row">
                                                                        <div class="col-8">
                                                                            <div class="form-group">
                                                                                <select name="identification_type_id" id="" class="form-control">
                                                                                    <option value="">Select </option>

                                                                                    <option value="">

                                                                                </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Email Type</label>
                                                    <div class="col-sm-2">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <select name="" id="" class="form-control">
                                                                        <option value="">Select </option>

                                                                        <option value="">

                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                <div class="row">
                                                            <label class="col-sm-3 col-form-label">Email</label>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" name="email" class="form-control">
                                                                    </div>
                                                                </div>
                                                        </div>

                                                </div>
                                                <br>
                        <div class="col-6 text-right">
                        <button type="submit" class="btn btn-primary">NEXT</button>
                        </div>
                                </div>
                            </div>
            </form>
        </div>
    </div>
</div>
@endsection
