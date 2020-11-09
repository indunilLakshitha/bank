@extends('layouts.app')


@section('content')
<form method="get" action="/" class="form-horizontal">
                        <div class="card ">
                            <div class="card-body ">
                                    <div class="card-header card-header-rose card-header-text">
                                        <div class="card-text">
                                            <h4 class="card-title">FD Withdrawal</h4>
                                        </div>
                                    </div>

                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Member</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                                <button class="btn fa fa-search btn-info btn"> &nbspFind</button>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Account</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <button class="btn fa fa-search btn-info btn-sm"></button>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Account Name</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Payment Method</label>
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <div class="form-group">
                                                                <select name="identification_type_id" id="" class="form-control">
                                                                    <option value="">Select </option>
                                                                    @isset($idtypes)
                                                                    @foreach ($idtypes as $idtype)
                                                                    <option value="{{$idtype->id}}">
                                                                        {{$idtype->identification_type}}
                                                                        @endforeach
                                                                        @endisset
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <label class="col-sm-2 col-form-label">Value</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label"> Total Amount </label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Balence</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Naration</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>



                                                <div class="row">

                                                    <div class="col-6 text-right">
                                                        <button type="submit" class="btn btn-rose col-4">WITHDRAW</button>
                                                    </div>
                                                    <div class="col-1 text-right">
                                                        <button type="submit" class="btn ">Clear</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                            </div>


                            </div>
                        </div>
                        </form>
@endsection
