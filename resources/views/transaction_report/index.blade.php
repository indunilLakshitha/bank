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
            <button class="btn fa fa-search btn-info btn-sm"></button>
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
            <label class="col-sm-2 col-form-label">Account Name</label>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="full_name">
                    <input type="hidden" class="form-control" name="customer_id" id="customer_id">
                    <input type="hidden" class="form-control" name="account_id" id="account_id">
                </div>
            </div>
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
                                <table id="table" class="table table-striped table-no-bordered table-hover"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <th>ID </th>
                                        <th>DATE</th>
                                        <th>WITHDRAWED</th>
                                        <th>DEPOSITED</th>
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


<script type="text/javascript">
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
                        // console.log(data)
                        return showCustomers(data)
                    }
               })
           }
            function getCustomersByAcoountId(id){

                console.log(id)
               $.ajax({
                   type: 'GET',
                   url : '{{('/findmemberbyaccnoforreport')}}',
                   data: {
                       'id': id,
                    },
                    success: function(data){
                        console.log(data)
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
                   url : '{{('/normaldeposite')}}',
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
                        <th>${i.account_id}</th>
                        <th>${i.created_at}</th>
                        <th>${i.transaction_value} </th>
                        <th>${i.transaction_value}</th>
                    </tr>
                    `
                    results_tbody.innerHTML += html

                })
                html_2 = `
                    <tr>
                        <th>total</th>
                        <th>${data[0].updated_at}</th>
                        <th></th>
                        <th>${data[0].account_balance}</th>
                    </tr>
                    `
                    results_tbody.innerHTML += html_2
           }

           function viewCustomer(name,account,id,balance){
            full_name.value = name
            account_id.value = account
            customer_id.value = id
            account_balance.value = balance
           }
           function printData()
                {
                var divToPrint=document.getElementById("table");
                var win = window.open('', '', 'height=700,width=700');
            win.document.write(table.outerHTML);
            win.document.close();
            win.print();
        }

        // $('button').on('click',function(){
        // printData();
        // })

</script>
@endsection
