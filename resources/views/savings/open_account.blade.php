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
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Client Details</h4>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <label class="col-sm-2 col-form-label">CIF</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Client Full Name</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">ID Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <select name="identification_type_id" id="" class="form-control">
                                                <option value="">Select</option>
                                                @isset($idtypes)
                                                @foreach ($idtypes as $idtype)
                                                <option value="{{$idtype->id}}">
                                                    {{$idtype->identification_type}}
                                                    @endforeach
                                                    @endisset
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" name="identification_number" class="form-control">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <br>
                        <h5>Client Details</h5>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" name="identification_number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <select name="identification_type_id" id="" class="form-control">
                                                <option value="">Select Customer Type</option>
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
                            <label class="col-sm-2 col-form-label">CIF</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">DOB</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer FATCA Clearance Received</label>
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
                            <label class="col-sm-2 col-form-label">Customer PEP Clearance Received</label>
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

                        <br> <br>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Branch Code</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer Rating</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer Signature</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Options</label>
                            <div class="col-sm-8">
                                <div class="col-10">
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

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Account Maintenance Via</label>
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


                        <h5>Product Details</h5>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Sub Product Type</label>
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
                            <label class="col-sm-2 col-form-label">Interest Type</label>
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
                            <label class="col-sm-2 col-form-label">Currency</label>
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
                            <label class="col-sm-2 col-form-label">Currency</label>
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
                            <label class="col-sm-2 col-form-label">Account Level</label>
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
                            <label class="col-sm-2 col-form-label">Initial Deposit Allow Mode</label>
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
                            <label class="col-sm-2 col-form-label">Interest Credit Dated</label>
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
                            <label class="col-sm-2 col-form-label">Minimum Balance to active the account</label>
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


                    </div>
                </div>
                <div class="card ">
                    <div class="card-body ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Joint Acoount</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Main Holder</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="card" style="border: solid">
                            <div class="card-header">Other Holders</div>
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">ID Type</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <select name="identification_type_id" id="" class="form-control">
                                                        <option value="">Select</option>
                                                        @isset($idtypes)
                                                        @foreach ($idtypes as $idtype)
                                                        <option value="{{$idtype->id}}">
                                                            {{$idtype->identification_type}}
                                                            @endforeach
                                                            @endisset
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <input type="text" name="identification_number"
                                                        placeholder="Identoty No" class="form-control">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label"> Ownership Percentage</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"> Other Holder Signature</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div></div>
                    <div class="card ">
                        <div class="card-body ">
                            <div class="card-header card-header-rose card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Operating Instrictions</h4>
                                </div>
                            </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Minimum Authorization Required for a
                                Withdrawal</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Withdrawal Limit for Holder</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Number of Holders</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary">SUBMIT</a>

                    </div>
                </div>
            </form>
        </div>

    </div>
</div>


@endsection
