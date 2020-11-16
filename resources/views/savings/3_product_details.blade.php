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
            <form method="post" action="/product_details" class="form-horizontal">
            <input type="hidden" name="account_id" value="{{$account_id}}">
                @csrf
                <div class="card ">
                    <div class="card-body ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Product Details</h4>
                            </div>
                        </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Sub Product Type</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        @php
                                            $prod_types = Illuminate\Support\Facades\DB::table('product_types')->get();
                                        @endphp
                                        <select name="product_type_id"   class="selectpicker" data-style="select-with-transition">
                                            <option value="">Select </option>
                                            @isset($prod_types)
                                            @foreach ($prod_types as $item)
                                            <option value="{{$item->id}}">
                                                {{$item->product_type}}
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
                                        <select name="interest_type_id"   class="selectpicker" data-style="select-with-transition">
                                            @php
                                                $interest_types = Illuminate\Support\Facades\DB::table('interest_types')->get();
                                            @endphp
                                            <option value="">Select </option>
                                            @isset($interest_types)
                                            @foreach ($interest_types as $item)
                                            <option value="{{$item->id}}">
                                                {{$item->interest_type}}
                                                @endforeach
                                                @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Interest Rate</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <select name="interest_rate"   class="selectpicker" data-style="select-with-transition"">
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
                                        <select name="currency_id"   class="selectpicker" data-style="select-with-transition">
                                            @php
                                                $currencies = Illuminate\Support\Facades\DB::table('currencies')->get();
                                            @endphp
                                            <option value="">Select </option>
                                            @isset($currencies)
                                            @foreach ($currencies as $item)
                                            <option value="{{$item->id}}">
                                                {{$item->currency_name}}
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
                                        <select name="account_level"   class="selectpicker" data-style="select-with-transition">
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
                                        <select name="initial_deposit_allow"   class="selectpicker" data-style="select-with-transition">
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
                                        <input type="date" name="interest_credit_date" class="form-control">
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
                                        <input type="number" name="minimum_balance">
                                    </div>
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
