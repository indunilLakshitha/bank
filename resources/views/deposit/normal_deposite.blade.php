@extends('layouts.app')


@section('content')
{{-- <form method="get" action="/" class="form-horizontal"> --}}
<div class="row">
    <div class="col">
        <div class="card ">
            <div class="card-body ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Normal Deposit</h4>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Member</label>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="member" oninput="getCustomers(this.value)">

                        </div>
                    </div>
                    <a class="btn fa fa-search btn-info btn-sm" data-toggle="modal" href="#depositeModel"></a>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Account</label>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" oninput="getCustomersByAcoountId(this.value)">
                        </div>
                    </div>
                    {{-- <button class="btn fa fa-search btn-info btn-sm"></button> --}}
                </div>
                <div class="row">
                    <div class="col-sm-8 " style="margin-left: 90px">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table">
                                        <table id="table" class="table table-striped table-no-bordered table-hover"
                                            cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <th>ID </th>
                                                <th>NAME</th>
                                                <th>NIC</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                            </thead>
                                            <tbody id="results_tbody">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Account Name</label>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" readonly id="full_name">
                            <input type="hidden" class="form-control" name="customer_id" id="customer_id">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Account Number</label>
                    <div class="col-sm-6">
                        <div class="form-group">

                            <input type="text" class="form-control" readonly name="account_id" id="account_id">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Deposite Method</label>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <select name="payment_method_id" id="payment_method_id" class="form-control">
                                        <!--option value="">Select </option-->
                                        @php
                                        $payment_methods =
                                        Illuminate\Support\Facades\DB::table('payment_methods')->where('is_enable',1)->get();
                                        @endphp
                                        @isset($payment_methods)
                                        @foreach ($payment_methods as $payment_method)
                                        <option value="{{$payment_method->id}}">
                                            {{$payment_method->payment_method}}
                                            @endforeach
                                            @endisset
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Deposit Amount</label>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="transaction_value" oninput="difCal()">
                            {{-- oninput="caltotal(this.value)" --}}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label"> Re-enter Amount </label>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="tot">
                            <input type="text" class="form-control" id="re_c"
                                oninput="validateaount(this.value),difCal()">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Balance</label>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="account_balance" name="account_balance"
                                readonly>
                            <input type="text" class="form-control" id="dif" name="dif" readonly>
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


                {{-- </form> --}}

                <div class="row">

                    <div class="col-6 text-right">
                        <a onclick="normalWithdraw(transaction_value.value,customer_id.value,account_id.value,payment_method_id.value)"
                            class="btn btn-rose col-4 text-white d-none" id="dep_btn">DEPOSIT</a>
                    </div>
                    <div class="col-1 text-right">
                        <button type="submit" class="btn ">Clear</button>
                        <a class="btn fa fa-print btn-info btn-sm"
                            onclick="window.location = '/receipt/'+account_id.value"></a>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col">
        <div class="row">
            <div class="card ">
                <div class="card-body ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Saving Details</h4>
                        </div>
                    </div>
                    <div class="ml-3">
                        <button type="button" onclick="load_saving_details(customer_id.value)" href=""
                            class="btn btn-warning"> Load Saving Details</button>
                    </div>
                    <div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th style="text-align:center"># </th>
                                    <th style="text-align:center">A/C No </th>
                                    <th style="text-align:center">A/C Name </th>
                                    <th>Balance(Cap.) </th>
                                    <th>Balance </th>
                                </thead>
                                <tbody id="saving_details_tbody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card ">
                <div class="card-body ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Signature Details</h4>
                        </div>
                    </div>
                    <div class="ml-3">
                        <button type="button" onclick="show_image()" class="btn btn-warning" id="btn_img"> Load
                            Signature
                        </button>
                    </div>
                    <div>
                        <input type="hidden" id="img_loc">
                        <div class="col-sm-8">
                            <div class="col-10" id="imgg">
                                {{-- <div class="form-group">
                                    @if(!empty(@isset($view_1->sign_img)))
                                    <img src="{{env('IMAGE_LOCATION').$view_1->sign_img}}" height="300px"
                                width="300px" alt="">
                                @else
                                <img src="/bank/public/images/default.png" height="100px" width="300px" alt="">
                                @endif--}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('deposit.models.search_model_for_wnd')

{{-- </div>
</div>
</div> --}}

<script type="text/javascript">
    function difCal(){
    var first=parseInt(re_c.value)
    var sec=parseInt(transaction_value.value)
    var difff=first-sec
    console.log(difff)
    dif.value=difff

}
    function show_image() {
        document.getElementById("btn_img").disabled = true;
        let elem = document.createElement("img");
        let im=img_loc.value
        elem.setAttribute("src",im);
        elem.setAttribute("height", "300");
        elem.setAttribute("width", "300");
        elem.setAttribute("alt", "signature");
        document.getElementById("imgg").appendChild(elem);
    }

    function validateaount(amount){
    let dep_amount= transaction_value.value
    if(amount != dep_amount){
        dep_btn.classList.add('d-none')
    }else{
        dep_btn.classList.remove('d-none')

    }
}

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            function getCustomers(name){

                // console.log(name)
               $.ajax({
                   type: 'GET',
                   url : '{{('/findmember')}}',
                   data: {
                       'name': name,
                    },
                    success: function(data){
                        console.log(data)
                        return showCustomers(data)
                    }
               })
           }
            function getCustomersByAcoountId(id){

                console.log(id)
               $.ajax({
                   type: 'GET',
                   url : '{{('/findmemberbyaccno')}}',
                   data: {
                       'id': id,
                    },
                    success: function(data){
                        // console.log(data)
                        return showCustomers(data)

                    }
               })
           }
            function normalWithdraw(amount,customer_id,account_id,payment_method_id){

                // console.log(amount)
                // console.log(customer_id)
                // console.log(account_id)
                if(parseFloat(amount) > 0 ){
               $.ajax({
                   type: 'GET',
                   url : '{{('/normaldeposite')}}',
                   data: {
                       'transaction_value': amount,
                       'customer_id': customer_id,
                       'account_id': account_id,
                       'payment_method_id': payment_method_id,
                       'transaction_type': 'on_test',
                    },
                    success: function(data){
                        console.log(data)
                        account_balance.value=data.balance_amount
                        transaction_value.value=""
                        re_c.value=""
                        return Swal.fire('Deposit Successful Slip No',data.transaction_data_id.toString())
                    }
               })
            }
           }

           function showCustomers(data){
                results_tbody.innerHTML = ''
                data.forEach(i => {
                    html = `
                    <tr>
                        <th>${i.id}</th>
                        <th>${i.full_name}</th>
                        <th>${i.identification_number} </th>
                        <th>${i.is_enable}</th>
                        <th><a  onclick="viewCustomer('${i.full_name}','${i.account_number}','${i.customer_id}','${i.account_balance}')" class="btn btn-primary"  >GET</a></th>
                    </tr>
                    `
                    results_tbody.innerHTML += html
                })
           }

           function viewCustomer(name,account,id,balance){
            full_name.value = name
            account_id.value = account
            customer_id.value = id
            account_balance.value = balance
           }

           function caltotal(amout){
               console.log(amout)
               tota=parseFloat(account_balance.value)+parseFloat(amout)
               console.log(tota)
               tot.value=tota
           }
           function load_saving_details(id){
        // console.log(id);
        $.ajax({
            type: 'GET',
            url : '{{('/load_saving_details')}}',
            data: {
                id
            },
            success: function(data){
                console.log(data);

                let i=1
                saving_details_tbody.innerHTML = ''

                data.accs.forEach(acc => {
                    html =
                    `
                    <tr>
                        <th>${i}</th>
                        <th>${acc.account_number}</th>
                        <th>Normal Savings</th>
                        <th></th>
                        <th>${acc.account_balance}</th>
                    </tr>
                    `

                    i++
                    saving_details_tbody.innerHTML += html
                })

                html =
                `
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Shares Amount</th>
                        <th>${data.shares.share_amount}</th>
                        <th>${data.share_amount}</th>
                    </tr>
                `
                saving_details_tbody.innerHTML += html
            }
        })
    }

</script>
@endsection
