@extends('layouts.app')


@section('content')
{{-- <form method="get" action="/" class="form-horizontal"> --}}
<div class="card ">
    <div class="card-body ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Transaction Report</h4>
            </div>
        </div>

        {{-- <div class="row">
                <label class="col-sm-2 col-form-label">Member</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="member" oninput="getCustomers(this.value)">

                    </div>
                </div>
                <button class="btn fa fa-search btn-info btn"> &nbspFind</button>
            </div> --}}
        <div class="row">
            <label class="col-sm-2 col-form-label">Account</label>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" oninput="getCustomersByAcoountId(this.value)">
                </div>
            </div>
            <button class="btn fa fa-search btn-info btn-sm" data-toggle="modal" href="#transactionModal"></button>
        </div>
        <div class="row">
            {{-- <div class="col-sm-6 " style="margin-left: 260px">
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
            </div> --}}
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Customer Name</label>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="full_name">
                    <input type="text" hidden class="form-control" name="customer_id" id="customer_id">
                </div>
            </div>
            <button class="btn fa fa-search btn-info btn-sm" onclick="getCustomersByAcoountId()"></button>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Account Name</label>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="account_id" id="account_id">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">From</label>
            <div class="col-sm-2">
                <div class="form-group">
                    <input type="date" class="form-control" id="from">
                </div>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">To</label>
            <div class="col-sm-2">
                <div class="form-group">
                    <input type="date" class="form-control" id="to">
                </div>
            </div>
            <button class="btn fa fa-search btn-info btn-sm" onclick="findBetw()"></button>
        </div>
    </div>
</div>
<div class="card ">
    <div class="card-body ">
        <div class="card-header card-header-rose card-header-text">

        </div>

        {{-- <div class="row">
                <label class="col-sm-2 col-form-label">Member</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="member" oninput="getCustomers(this.value)">

                    </div>
                </div>
                <button class="btn fa fa-search btn-info btn"> &nbspFind</button>
            </div> --}}
        <div class="row">
            {{-- <label class="col-sm-2 col-form-label">Account</label> --}}
            <div class="col-sm-6">

            </div>

        </div>
        <div class="row">
            <div class="col-sm-8 " style="margin-left: 260px">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table">
                                <table id="table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <th>ID </th>
                                        <th>DATE</th>
                                        <th>DETAILS</th>
                                        <th>WITHDRAWED</th>
                                        <th>DEPOSITED</th>
                                        <th>BALANCE</th>
                                        <th><button class="btn fa fa-print btn-info btn-sm" onclick="printData()"></button></th>
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

    </div>
</div>
@include('layouts.transaction_model')


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function getCustomers(name) {

        // console.log(name)
        $.ajax({
            type: 'GET',
            url: '{{('/findmember')}}',
            data: {
                'name': name,
            },
            success: function(data) {
                // console.log(data)
                return showCustomers(data)
            }
        })
    }

    function getCustomersByAcoountId() {
        const c_id = document.querySelector('#customer_id');
        console.log(c_id.value)
        $.ajax({
            type: 'GET',
            url: '{{('/findmemberbyaccnoforreport')}}',
            data: {
                'c_id': c_id.value,
            },
            success: function(data) {
                console.log(data)
                full_name.value = data[0].full_name
                account_id.value = data[0].account_number

                return showCustomers(data)

            }
        })
    }

    function normalWithdraw(amount, customer_id, account_id, payment_method_id) {

        // console.log(amount)
        // console.log(customer_id)
        // console.log(account_id)
        $.ajax({
            type: 'GET',
            url: '{{(' / normaldeposite ')}}',
            data: {
                'transaction_value': amount,
                'customer_id': customer_id,
                'account_id': account_id,
                'payment_method_id': payment_method_id,
                'transaction_type': 'on_test',
            },
            success: function(data) {

                account_balance.value = data.balance_amount

                return Swal.fire('Withdrawal Successful')
            }
        })
    }

    function showCustomers(data) {
        var x = 0;
        results_tbody.innerHTML = ''
        data.forEach(i => {
            if (i.transaction_type == "WITHDRAW") {
                var w = i.transaction_value;
                var d = '-';
            } else if (i.transaction_type == "DEPOSITE") {
                var d = i.transaction_value;
                var w = '-';
            } else {}

            x++
            html = `
                    <tr>
                        <th>${x}</th>
                        <th>${i.created_at}</th>
                        <th>${i.payment_method} </th>
                        <th>${w}</th>
                        <th>${d}</th>
                        <th>${i.balance_value}</th>
                    </tr>
                    `
            results_tbody.innerHTML += html
        })
        // html_2 = `
        //     <tr>
        //         <th>total</th>
        //         <th>${data[0].updated_at}</th>
        //         <th></th>
        //         <th>${data[0].account_balance}</th>
        //     </tr>
        //     `
        //     results_tbody.innerHTML += html_2
    }

    function viewCustomer(name, account, id, balance) {
        full_name.value = name
        account_id.value = account
        customer_id.value = id
        account_balance.value = balance
    }

    function printData() {
        var divToPrint = document.getElementById("table");
        var win = window.open('', '', 'height=700,width=700');
        win.document.write(table.outerHTML);
        win.document.close();
        win.print();
    }

    function findBetw() {
        const a_id = document.querySelector('#account_id')
        const from = document.querySelector('#from')
        const to = document.querySelector('#to')
        console.log(from.value)
        console.log(to.value)
        console.log(a_id.value)
        $.ajax({
            type: 'GET',
            url: '{{('/findRange')}}',
            data: {
                'acId': a_id.value,
                'from': from.value,
                'to': to.value
            },
            success: function(data) {
                console.log(data)
                return showCustomers(data)

            }
        })
    }

    // $('button').on('click',function(){
    // printData();
    // })
</script>
@endsection
