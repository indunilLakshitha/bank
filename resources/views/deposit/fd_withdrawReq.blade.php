@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col">
        <div class="card ">
            <div class="card-body ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">FD Premature Request</h4>
                    </div>
                </div>
                <form id="withreqform">
                    @csrf
                    <div class="row">
                        <label class="col-sm-3 col-form-label">Member:</label>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="customer_id" name="customer_id">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">FD Account Number</label>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="account_id" name="account_id">
                            </div>
                        </div>
                        <button type="button" class="btn fa fa-search btn-sm btn-info btn" data-toggle="modal"
                            href="#depositeModel"></button>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">FD Amount</label>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="fd_amount" name="fd_amount">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-5 text-right">
                            <a class="btn btn-rose btn-sm text-white" style="text-align: center"
                                onclick="req()">Reqest</a>
                        </div>
                        <div class="col-1 text-right">
                            <button type="submit" class="btn btn-sm">Clear</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card ">
            <div class="card-body ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Saving Details</h4>
                    </div>
                </div>
                <div class="row">

                    <div class="col-6 text-right">
                        <a class="btn btn-info btn-sm text-white" style="text-align: center">Load Saving Details</a>
                    </div>
                </div>
                <div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                        cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <th>Code</th>
                                            <th>A/C No</th>
                                            <th>A/c Name</th>
                                            <th>Balence (Cap)</th>
                                            <th>Balence (Int)</th>
                                        </thead>
                                        <tbody id="">
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
</div>

@include('deposit.models.fd_with_req')

<script>
    function req(){


     $.ajax({
          type: 'POST',
          url: '{{('/withdrawalreqq')}}',
          data: new FormData(withreqform),
          contentType: false,
          processData: false,
          success: function(data){
              console.log(data)
              Swal.fire({
                    title: 'Withdrawal Request Sent Successfully',
                    text: data.success,
                    icon: 'success',
                    timer: 20000
                })
                customer_id.value=''
                fd_acccount_id.value=''
                fd_amount.value=''



          },
          error: function(data){
          }

      })
    }
</script>

@endsection
