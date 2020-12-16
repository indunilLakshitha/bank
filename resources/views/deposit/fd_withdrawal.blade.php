@extends('layouts.app')


@section('content')
@include('deposit.models.search_model_for_fd')

<form class="form-horizontal" id="form_fdw">
    <div class="card ">
        <div class="card-body ">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">FD Withdrawal</h4>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">FD Account</label>
                <div class="col-sm-6">
                    <input type="text" id="fd_acc_fdw" name="fd_acc_fdw" readonly class="form-control">
                </div>
                <a class="btn fa fa-search btn-info btn-sm" data-toggle="modal" href="#depositeModel"></a>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Amount</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" id="amount_fdw" name="amount_fdw" readonly class="form-control"> </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Period</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" id="period_fdw" name="period_fdw" readonly class="form-control"> </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Start Date</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" id="start_date_fdw" name="start_date_fdw" readonly class="form-control">
                        <input type="hidden" id="start_date_index_fdw" name="start_date_index_fdw" readonly
                            class="form-control">
                        <input type="hidden" id="today_date_index_fdw" name="today_date_index_fdw" readonly
                            class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Closing Date</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" id="closing_date_fdw" name="closing_date_fdw" readonly class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Today</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" id="today_fdw" name="today_fdw" readonly class="form-control"> </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" id="status_fdw" name="status_fdw" readonly class="form-control"> </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Interest</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" id="interest_fdw" name="interest_fdw" readonly class="form-control"> </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Normal Interest</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" id="normal_interest_fdw" name="normal_interest_fdw" readonly
                            class="form-control"> </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label"> Interest Amount</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" id="interest_amount_fdw" name="interest_amount_fdw" readonly
                            class="form-control"> </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label"> Paid Amount</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" id="paid_amount_fdw" name="paid_amount_fdw" readonly class="form-control">
                    </div>
                </div>
            </div>
</form>

<div class="row">

    <div class="col-6 text-right">
        <button type="button" onclick="ponga()" class="btn btn-rose col-4">WITHDRAW</button>
    </div>
    <div class="col-1 text-right">
        <button type="button" class="btn ">Clear</button>
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

           function ponga(){
            $.ajax({
                   type: 'POST',
                   url : '{{('/ponga')}}',
                   data: new FormData(form_fdw),
                   contentType: false,
                   processData: false,
                    success: function(data){
                        console.log(data)
                    }
               })
           }


</script>
@endsection
