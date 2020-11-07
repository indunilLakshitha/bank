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
                                <h4 class="card-title">General Information</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Lead source Category</label>
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
                            <label class="col-sm-2 col-form-label">Account Category</label>
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
                            <label class="col-sm-2 col-form-label">Account Type</label>
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
                        <label class="col-sm-2 col-form-label">Options</label>
                        <div class="row">

                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-8">
                                <div class="col-8">
                                    <div class="form-group">
                                        <div class="col"><input type="checkbox" class="form-control" name="" id=""> ATM
                                        </div>
                                        <div class="col"><input type="checkbox" class="form-control" name="" id=""> SMS
                                        </div>
                                        <div class="col"><input type="checkbox" class="form-control" name="" id="">
                                            Internet Banking</div>
                                        <div class="col"><input type="checkbox" class="form-control" name="" id="">
                                            Mobile Banking</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label class="col-sm-2 col-form-label">Account Maintenance Via</label>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-8">
                                <div class="col-10">
                                    <div class="form-group">
                                        <div class="col"><input type="checkbox" class="form-control" name="" id="">
                                            Account Statement</div>
                                        <div class="col"><input type="checkbox" class="form-control" name=""
                                                id="">Passbook</div>
                                    </div>
                                </div>
                            </div>
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
