@extends('layouts.app')


@section('content')
<form method="get" action="/" class="form-horizontal">
    <div class="card ">
        <div class="card-body ">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">FD Withdrawal</h4>
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
                <div class="col-sm-12">
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
                <label class="col-sm-2 col-form-label">Account</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" oninput="getCustomersByAcoountId(this.value)">
                    </div>
                </div>
                <button class="btn fa fa-search btn-info btn-sm"></button>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Account Name</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control">
                        <input type="text" class="form-control" id="customer_id" >
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Payment Method</label>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <select name="identification_type_id" id="" class="form-control">
                                    <option value="">Select </option>
                                    @php
                                        $payment_methods = Illuminate\Support\Facades\DB::table('payment_methods')->get();
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
                        <input type="text" class="form-control">
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
                <label class="col-sm-2 col-form-label">Balence</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" readonly>
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



            <div class="row">

                <div class="col-6 text-right">
                    <button type="submit" class="btn btn-rose col-4">RECEIVED</button>
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
</form>

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
                        console.log(data)
                    }
               })
           }

           function showCustomers(data){
                results_tbody.innerHTML = ''
                data.forEach(i => {
                    html = `
                    <tr>
                        <th>${i.id}</th>
                        <th>${i.name_in_use}</th>
                        <th>${i.identification_number} </th>
                        <th>${i.is_enable}</th>
                        <th><a href="http://" class="btn btn-primary"  >GET</a></th>
                    </tr>
                    `
                    results_tbody.innerHTML += html
                })
           }

           function viewCustomer(name,account){

           }


</script>
@endsection
