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
                                <h4 class="card-title">Step 02 - Savings Account Opening</h4>
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
                            <label class="col-sm-2 col-form-label">Interest Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" name="interest_type" id="interest_type" readonly
                                                class="form-control">
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
                                        <input type="text" name="interest_rate" id="interest_rate" readonly
                                            class="form-control">
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

                                            <input type="hidden" name="currency_id" id="currency_id" readonly
                                                class="form-control">
                                            <input type="text" id="currency" readonly class="form-control">
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

                                            <input type="text" name="account_level" id="account_level" readonly
                                                class="form-control">
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

                                            <input type="hidden" name="deposite_mode_id" id="deposite_mode_id" readonly
                                                class="form-control">
                                            <input type="text" id="deposite_mode" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <label class="col-sm-2 col-form-label">Interest Credit Dated</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="date" name="interest_credit_date" id="interest_credit_date"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Minimum Balance to active the account</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="number" id="minimum_balance" name="minimum_balance" readonly
                                                class="form-control">
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
    const prod_types = {!! json_encode($prod_types, JSON_HEX_TAG) !!}

    function getData(id){
        console.log(id)
        $.ajax({

type: 'GET',
url: '{{('/savings/getsubdetails')}}',
data:{'id':id},
dataType: 'JSON',
success: function (data) {
    console.log(data);
    interest_type.value=data[0].interest_type
    interest_rate.value=data[0].amount
    currency.value=data[0].currency_name
    currency_id.value=data[0].currency_id
    account_level.value=data[0].account_authorized_level
    // interest_credit_date.value=data[0].interest_credit_dated
    minimum_balance.value=data[0].minimum_balance_activate
    deposite_mode.value=data[0].deposite_mode
    deposite_mode_id.value=data[0].deposite_mode_id


}
})
}

function set_min_max(id){
    if(id === ''){return}
    console.log(prod_types, id);

    prod_types.forEach(i => {
        // console.log(i.id, id);
        if(i.id === parseInt(id)){
            interest_rate.value = i.default_interest
            interest_rate.max = i.max_interest
        }
    })
}

(function (global) {

if(typeof (global) === "undefined") {
    throw new Error("window is undefined");
}

var _hash = "!";
var noBackPlease = function () {
    global.location.href += "#";

    // Making sure we have the fruit available for juice (^__^)
    global.setTimeout(function () {
        global.location.href += "!";
    }, 50);
};

global.onhashchange = function () {
    if (global.location.hash !== _hash) {
        global.location.hash = _hash;
    }
};

global.onload = function () {
    noBackPlease();

    // Disables backspace on page except on input fields and textarea..
    document.body.onkeydown = function (e) {
        var elm = e.target.nodeName.toLowerCase();
        if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
            e.preventDefault();
        }
        // Stopping the event bubbling up the DOM tree...
        e.stopPropagation();
    };
}
})(window);

</script>


@endsection
