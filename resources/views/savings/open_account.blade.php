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
                    </div>
                </div>

                <div class="card ">
                    <div class="card-body ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h5>Product Details</h5>
                            </div>
                        </div>
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

                    </div>
                </div>
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
                <form method="get" action="/" class="form-horizontal">
                <div class="card ">
                    <div class="card-body ">
                            <div class="card-header card-header-rose card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Guardian Information</h4>
                                </div>
                            </div>
                            <div class="row">
                                    <label class="col-sm-2 col-form-label">Identification Type</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <select name="gaurdian_identification_type_id" id="" class="form-control">
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
                                                    <input type="text" name="gaurdian_identification_type_id"
                                                        placeholder="Iditification No" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label"> Client Name</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="client_name" class="form-control">
                                            </div>
                                        </div>
                                         <a href="" class="btn btn-primary">Search</a>
                                </div>
                                <div class="card" style="border: solid">
                                    <div class="row">
                                    <label class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <select name="title" id="" class="form-control">
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
                                        <label class="col-sm-2 col-form-label">First NAme</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                            <div class="row">
                                        <label class="col-sm-2 col-form-label">Initials</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                            <div class="row">
                                        <label class="col-sm-2 col-form-label">Name Denoted by Initials</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                            <div class="row">
                                        <label class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Idintification Type</label>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <select name="" id="" class="form-control">
                                                            <option value="">Select </option>

                                                            <option value="">

                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label"> Idintification No</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Relationship</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Address Type</label>
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
                                            <label class="col-sm-2 col-form-label">Telephone No Type</label>
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
                                                <label class="col-sm-4 col-form-label">Telephone No</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <input type="text" name="" class="form-control">
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
                                    </div>
                                </div>
                            </div>
                            </form>

                            <div class="card ">
                                <div class="card-body ">
                                        <div class="card-header card-header-rose card-header-text">
                                            <div class="card-text">
                                                <h4 class="card-title">Documents</h4>
                                            </div>
                                        </div>
                                         <div class="row col-12 ">
                                        <div class="col-sm-12">
                                                  <label class="col-sm-2 col-form-label">Document Type</label>

                                                   <label class="col-sm-2 col-form-label">Mandotory</label>

                                                   <label class="col-sm-1 col-form-label">Availability</label>
                                                   <label class="col-sm-1 col-form-label"></label>

                                                   <label class="col-sm-1 col-form-label">Remark</label>

                                                   <label class="col-sm-3 col-form-label">Upload Document</label>

                                        </div>

                                    </div>
                                    <div class="row ">
                                        <label class="col-sm-2 col-form-label">Biling Proof</label>
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-1  checkbox">
                                            <div class="form-check ">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1  checkbox">
                                            <div class="form-check ">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                        </div>


                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="client_name" class="form-control">
                                            </div>
                                        </div>

                                        <span class="btn btn-round btn-rose btn-file ">
                                            <span class="fileinput-new">Choose File</span>
                                            <input type="file" name="..." />
                                        </span>

                                        <input type="button" class="btn btn-sm btn-fill " name="submit" value="Upload">
                                    </div>
                                    <div class="row ">
                                        <label class="col-sm-2 col-form-label">NIC Copy</label>
                                        <div class="col-sm-1">
                                        </div>

                                        <div class="col-sm-1  checkbox">
                                            <div class="form-check ">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1  checkbox">
                                            <div class="form-check ">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </div>
                                        <span class="btn btn-round btn-rose btn-file ">
                                            <span class="fileinput-new">Choose File</span>
                                            <input type="file" name="..." />
                                        </span>
                                        <input type="button" class="btn btn-sm btn-fill " name="submit" value="Upload">
                                    </div>


                                </div>
                            </div>

                        <form method="get" action="/" class="form-horizontal">
                            <div class="card ">
                                <div class="card-body ">
                                        <div class="card-header card-header-rose card-header-text">
                                            <div class="card-text">
                                                <h4 class="card-title">Tax Details</h4>
                                            </div>
                                        </div>
                                    <div class="row col-12 ">
                                        <div class="col-sm-12">
                                                  <label class="col-sm-1 col-form-label">Mandotory</label>

                                                   <label class="col-sm-1 col-form-label">Fee</label>

                                                   <label class="col-sm-2 col-form-label">Fee Type</label>

                                                   <label class="col-sm-2 col-form-label">Amount</label>

                                                   <label class="col-sm-2 col-form-label">Tax Applicable</label>

                                                   <label class="col-sm-2 col-form-label">Fee Payable</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                            <div class="form-check  ">
                                            <label class="form-check-label ">
                                                <input class="form-check-input " type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                            <label class=" col-form-label ">SMS Charges</label>
                                            <div class="col-sm-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <select name="fee_type" id="" class="form-control">
                                                                <option value="">Select </option>

                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <select name="fee_type" id="" class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                            <div class="form-check  ">
                                            <label class="form-check-label ">
                                                <input class="form-check-input " type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                            <label class=" col-form-label ">Closure Charges</label>
                                            <div class="col-sm-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <select name="fee_type" id="" class="form-control">
                                                                <option value="">Select </option>

                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <select name="fee_type" id="" class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                            <div class="form-check  ">
                                            <label class="form-check-label ">
                                                <input class="form-check-input " type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                            <label class=" col-form-label ">Activation Charges</label>
                                            <div class="col-sm-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <select name="fee_type" id="" class="form-control">
                                                                <option value="">Select </option>


                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <select name="fee_type" id="" class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="get" action="/" class="form-horizontal">
                            <div class="card ">
                            <div class="card-body ">
                                    <div class="card-header card-header-rose card-header-text">
                                        <div class="card-text">
                                            <h4 class="card-title">Nominee Instruction</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <label class="col-sm-2 col-form-label">Identification Type</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <select name="" id="" class="form-control">
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
                                                            <input type="text" name="gaurdian_identification_type_id"
                                                                placeholder="Iditification No" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label"> Client Name</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" name="client_name" class="form-control">
                                                    </div>
                                                </div>
                                                <a href="" class="btn btn-primary">Search</a>
                                        </div>
                                        <div class="card" style="border: solid">
                                            <div class="row">
                                            <label class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <select name="title" id="" class="form-control">
                                                                <option value="">Select </option>

                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">First NAme</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Initials</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Name Denoted by Initials</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Last Name</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Idintification Type</label>
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
                                                <label class="col-sm-2 col-form-label"> Idintification No</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Relationship</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
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
                                                    <label class="col-sm-2 col-form-label">Telephone No Type</label>
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
                                                        <label class="col-sm-4 col-form-label">Telephone No</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="text" name="" class="form-control">
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
                                                    <div class="col-5 text-right">
                                                        <button type="submit" class="btn btn-rose">Add</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                            </div>
                        </form>
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
                                                    <div class="col-5 text-right">
                                                        <button type="submit" class="btn btn-rose">Add</button>
                                                    </div>
                                                </div>
                                </div>
                            </div>
                             </form>
                              <form method="get" action="/" class="form-horizontal">
                            <div class="card ">
                                <div class="card-body ">
                                    <div class="card-header card-header-rose card-header-text">
                                        <div class="card-text">
                                            <h4 class="card-title">Authorized Officer</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <label class="col-sm-2 col-form-label">Identification Type</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <select name="gaurdian_identification_type_id" id="" class="form-control">
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
                                                            <input type="text" name="gaurdian_identification_type_id"
                                                                placeholder="Iditification No" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label"> Client Name</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" name="client_name" class="form-control">
                                                    </div>
                                                </div>
                                                <a href="" class="btn btn-primary">Search</a>
                                        </div>
                                        <div class="card" style="border: solid">
                                            <div class="row">
                                            <label class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <select name="title" id="" class="form-control">
                                                                <option value="">Select </option>

                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">First NAme</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Initials</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Name Denoted by Initials</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Last Name</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Idintification Type</label>
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
                                                <label class="col-sm-2 col-form-label"> Idintification No</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Relationship</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
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
                                                    <label class="col-sm-2 col-form-label">Email Type</label>
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
                                                            <label class="col-sm-3 col-form-label">Email</label>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" name="email" class="form-control">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    <div class="col-5 text-right">
                                                        <button type="submit" class="btn btn-rose">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </form>
                        </div>



        </div>

    </div>
</div>


@endsection
