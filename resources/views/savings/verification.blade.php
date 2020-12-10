@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Account Verification</h4>
            </div>
        </div>
        <div class="card-body ">
            <form id="form">
                @csrf
                <div class="row">
                    <label class="col-sm-2 col-form-label">CIF</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" name="customer_id" id="customer_id">
                            <span class="bmd-help">Use Member Code To Search</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Client Name</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" name="full_name" id="full_name">
                            <span class="bmd-help">Use Client Full Name To Search</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Identification Number</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" name="identification_number"
                                id="identification_number">
                            <span class="bmd-help">Use Client ID Number To Search</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Account No</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" name="account_number" id="account_number">
                            <span class="bmd-help">Use Client Account Number To Search</span>
                        </div>
                    </div>
                </div>

            </form>
            <div class="card-footer ">
                <div class="row">
                    <div class="col-md-6">
                        <button onclick="search()" class="btn btn-fill btn-rose">SEARCH</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>Account No </th>
                                    <th>CIF</th>
                                    <th>Full Name</th>
                                    <th>Identification No</th>
                                    <th>Account Details</th>
                                    <th>Customer Details</th>
                                    <th>Signature Verification</th>
                                    <th>Document Verification</th>
                                    <th>Action</th>

                                </thead>
                                <tbody id="results_tbody">
                                    @foreach ($permissions as $perm)
                                    <tr>
                                        <td>{{$perm->account_number}}</td>
                                        <td>{{$perm->customer_id}}</td>
                                        <td>{{$perm->full_name}}</td>
                                        <td>{{$perm->identification_number}}</td>
                                        <td><a href="{{url('/accountdetails/'.$perm->customer_id)}}"
                                                class="btn btn-sm btn-info">View</a></td>
                                        <td><a href="{{url('/customer_details/'.$perm->customer_id.'?url=1')}}"
                                                class="btn btn-sm btn-info">View</a></td>
                                        <td><a href="{{url('/signature_verification/'.$perm->account_number)}}"
                                                class="btn btn-sm btn-primary">Verify</a></td>
                                        <td><a href="{{url('/document_verification/'.$perm->account_number)}}"
                                                class="btn btn-sm btn-primary">Verify</a></td>
                                        <td><button class="btn btn-sm btn-primary " id="{{$perm->account_number}}"
                                                onclick="check_approve(this.id)">Approve</button>
                                            <a class="btn btn-sm btn-danger"
                                                href="{{url('/accountreject/'.$perm->account_number)}}">Reject</a>
                                        </td>

                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<td></td>

<script>
    function search(){
        let customer_id = $("#customer_id").val();
        let identification_number = $("#identification_number").val();
        let full_name = $("#full_name").val();
        let account_number = $("#account_number").val();
        //alert(religion_data_id);
        $.ajax({
            type: 'POST',
            url: '{{('/verification/search')}}',
            data: {
                "customer_id": customer_id,
                "identification_number": identification_number,
                "full_name": full_name,
                "account_number": account_number,
                "for_verify": 1,
            },
        }).done(function(data) {
            //console.log(data);
            return show_data(data);
        });
    }



    function show_data(data){

        results_tbody.innerHTML = ''
        data.forEach(i => {

            html = `

            <tr>
                <td>${i.account_number}</td>
                <td>${i.customer_id}</td>
                <td>${i.full_name}</td>
                <td>${i.identification_number}</td>
                <td><a href="/accountdetails/${i.customer_id}" class="btn btn-sm btn-info">View</a></td>
                <td><a href="/customer_details/${i.customer_id}" class="btn btn-sm btn-info">View</a></td>
                <td>
                <a href="/signature_verification/${i.account_number}" class="btn btn-sm btn-primary">Verify</a>
                </td>
                <td><a href="/document_verification/${i.account_number}" class="btn btn-sm btn-primary">Verify</a></td>
                <td>
                    <button class="btn btn-sm btn-primary " onclick="check_approve('${i.account_number}')" >Approve</button>
                    <button class="btn btn-sm btn-danger">Reject</button>
                </td>

            </tr>
            `
            results_tbody.innerHTML += html
        })
    }

    function check_approve(account_number){
        console.log(account_number);
        $.ajax({
        type: 'GET',
        url: '{{('/approve_check')}}',
        data: {account_number} ,
        success: function(data){
            // console.log(data);

            if(data == 'UNVERIFIED'){
                return Swal.fire('There are Unverified files')
            }else {

                return approve(account_number)
            }

        }
    })
    }

    function approve(account_number){
        console.log(account_number);
        $.ajax({
        type: 'GET',
        url: '{{('/approve_done')}}',
        data: {account_number} ,
        success: function(data){
            // console.log(data);
            if(data == 'APPROVED'){

               window.location.reload();
               return Swal.fire('Account Approved')

            }else {

            }

        }
    })
    }
</script>
@endsection
