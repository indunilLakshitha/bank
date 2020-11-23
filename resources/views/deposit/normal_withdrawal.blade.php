@extends('layouts.app')


@section('content')
{{-- <form method="get" action="/" class="form-horizontal"> --}}
    <div class="card ">
        <div class="card-body ">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Normal Withdrawal</h4>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Member</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="member" oninput="getCustomers(this.value)">

                    </div>
                </div>
                <button class="btn fa fa-search btn-info btn"> &nbspFind</button>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Account</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" oninput="getCustomersByAcoountId(this.value)">
                    </div>
                </div>
                <button class="btn fa fa-search btn-info btn-sm"></button>
            </div>
            <div class="row">
                <div class="col-sm-6 " style="margin-left: 260px" >
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
                        <input type="text" class="form-control" id="full_name">
                        <input type="text" class="form-control" name="customer_id" id="customer_id">
                        <input type="text" class="form-control" name="account_id" id="account_id">
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Payment Method</label>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <select name="payment_method_id" id="payment_method_id" class="form-control">
                                    <option value="">Select </option>
                                    @php
                                    $payment_methods = Illuminate\Support\Facades\DB::table('payment_methods')->where('is_enable',1)->get();
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
                <label class="col-sm-2 col-form-label">Value</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="transaction_value">
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
                <label class="col-sm-2 col-form-label">Balance</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="account_balance" name="account_balance" readonly>
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
            class="btn btn-rose col-4 text-white">WITHDRAW</a>
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

<script type="text/javascript">
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            function getCustomers(name){

                console.log(name)
               $.ajax({
                   type: 'GET',
                   url : '{{('/findmember')}}',
                   data: {
                       'name': name,
                    },
                    success: function(data){
                        // console.log(data)
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
               $.ajax({
                   type: 'GET',
                   url : '{{('/normalwithdraw')}}',
                   data: {
                       'transaction_value': amount,
                       'customer_id': customer_id,
                       'account_id': account_id,
                       'payment_method_id': payment_method_id,
                       'transaction_type': 'on_test',
                    },
                    success: function(data){

                        account_balance.value=data.balance_amount
                        return Swal.fire('Withdrawal Successful')
                    }
               })
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


</script>
@endsection
