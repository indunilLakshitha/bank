@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="row">
                    <div class="col-10">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Paalmtop Transfer</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="card-text">
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <form method="post" action="/product_details" class="form-horizontal">
                <input type="hidden" name="account_id" value="">
                @csrf
                <div class="card ">
                    <div class="card-body ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Fill Details</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Head Office Account Number</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            @php
                                            $prod_types = Illuminate\Support\Facades\DB::table('sub_accounts')->get();
                                            @endphp
                                            <select oninput="getData(this.value)" required name="product_type_id"
                                                class="form-control" data-style="select-with-transition">
                                                <option value="">Select </option>
                                                @isset($prod_types)
                                                @foreach ($prod_types as $item)
                                                <option value="{{$item->id}}">
                                                    {{$item->sub_account_description}}
                                                    @endforeach
                                                    @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Branch Office  Number</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            @php
                                            $prod_types = Illuminate\Support\Facades\DB::table('sub_accounts')->get();
                                            @endphp
                                            <select oninput="getData(this.value)" required name="product_type_id"
                                                class="form-control" data-style="select-with-transition">
                                                <option value="">Select </option>
                                                @isset($prod_types)
                                                @foreach ($prod_types as $item)
                                                <option value="{{$item->id}}">
                                                    {{$item->sub_account_description}}
                                                    @endforeach
                                                    @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Transaction Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            @php
                                            $prod_types = Illuminate\Support\Facades\DB::table('sub_accounts')->get();
                                            @endphp
                                            <select oninput="getData(this.value)" required name="product_type_id"
                                                class="form-control" data-style="select-with-transition">
                                                <option value="">Select </option>
                                                @isset($prod_types)
                                                @foreach ($prod_types as $item)
                                                <option value="{{$item->id}}">
                                                    {{$item->sub_account_description}}
                                                    @endforeach
                                                    @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-sm-2 col-form-label">Transaction Amount</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">

                                            <input type="hidden" name="currency_id" id="currency_id" readonly
                                                class="form-control">
                                            <input type="text" id="currency" readonly class="form-control">
                                        </div>
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
        </div>
    </div>
    </form>

</div>
</div>
</div>

<script>

</script>


@endsection
