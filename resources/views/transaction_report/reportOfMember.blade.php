@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">

                <div class="col-3">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Report</h4>
                            </div>
                        </div>
                    </div>
                <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <label for="">TYPE:</label>
                            <div class="pull-right col-2">
                                <select name="type" class="form-control" id="type">
                                    <option value="" >--Select--</option>
                                </select>
                            </div>
                            <label >FROM:</label>
                            <div class="pull-right col-2">
                                <input type="date" class="form-control datepicke" id="dateFrom">
                            </div>
                            <label for="">TO:</label>
                            <div class="pull-right col-2" value="">
                                <input type="date" class="form-control datepicke" id="dateTo">
                            </div>
                            <label for="">USER:</label>
                            <div class="pull-right col-2">
                                <select name="select_branch1" class="form-control" id="user">
                                    <option value="" >--Select--</option>
                                </select>
                            </div>
                            <!-- <label for="">BRANCH:</label>
                            <div class="col-1">
                                <input class="form-check" type="checkbox" value="">
                                <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                            </div> -->
                            <div class=" col-1 ">
                                <button type="button"  onclick="search(this)" class="btn btn-info" id="search">Search</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>BP. Code</th>
                                    <th>BP. Name </th>
                                    <th>ACC. Code</th>
                                    <th>ACC. Name</th>
                                    <th>Capital</th>
                                    <th>Interest</th>
                                    <th>Fine</th>
                                    <th>Excess</th>
                                    <th>Other</th>
                                    <th>Subtotal</th>
                                    <th>User</th>


                                </thead>
                                <tbody>
                                    <tr>
                                        <th>  </th>
                                        <th> </th>
                                        <th>  </th>
                                        <th> </th>
                                        <th> </th>



                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   function search(){
        const from = document.querySelector('#dateFrom');
        const to = document.querySelector('#dateTo');
        const user = document.querySelector('#user');
        const type = document.querySelector('#type');

        console.log(from.value);
        console.log(dateTo.value);
        console.log(user.value);
        console.log(type.value);
        $.ajax({
            type: 'GET',
            url: '{{('/ReportOfTransactions/transactions')}}',
            data: {'from':from.value,'to':to.value,'user':user.value,'type':type.value},
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data)

            },
            error: function(data){
                console.log(data)
            }

        })
    }

</script>
@endsection
