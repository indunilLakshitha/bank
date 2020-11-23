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
                            <input type="text" class="form-control" name="customer_id">
                            <span class="bmd-help">Use Member Code To Search</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Client Name</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" name="full_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Identification Type</label>
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-3">
                            @php
                            $idtypes = Illuminate\Support\Facades\DB::table('iedentification_types')->get()
                            @endphp
                            <select name="oh_identification_type_id" id="oh_identification_type_id"
                                class="form-control">
                                <option value="">Select</option>
                                @isset($idtypes)
                                @foreach ($idtypes as $idtype)
                                <option value="{{$idtype->id}}">
                                    {{$idtype->identification_type}}
                                    @endforeach
                                    @endisset
                            </select>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-3 ml-5">
                            <input type="text" class="form-control" name="identification_number"
                                placeholder="Enter Identification No">

                        </div>
                    </div>

                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Account No</label>
                    <div class="col-lg-5 col-md-6 col-sm-3">
                        <input type="text" class="form-control" name="account_number">

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
                                    <th>Identification Type</th>
                                    <th>Identification No</th>
                                    <th> Comments</th>
                                    <th>Account Details</th>
                                    <th>Customer Details</th>
                                    <th>Signature Verification</th>
                                    <th>Document Verification</th>
                                    <th>Action</th>
                                    <th>Edit List</th>
                                </thead>
                                <tbody id="results_tbody">
                                    {{-- @foreach ($permissions as $perm)
                      <tr>
                        <th > {{$perm->name}} </th>
                                    <th> |
                                        @foreach ($perm->roles as $role)
                                        {{$role->name}} |
                                        @endforeach
                                    </th>
                                    <td class="td-actions text-right">
                                        @can('update_permissions')
                                        <a href="/permissions/edit/{{$perm->id}}" rel="tooltip"
                                            class="btn btn-success btn-round">
                                            <i class="material-icons">edit</i> <span class="mx-1">Edit</span>
                                        </a>
                                        @endcan
                                        @can('delete_permissions')
                                        <a href="/permissions/delete/{{$perm->id}}" rel="tooltip"
                                            class="btn btn-danger btn-round">
                                            <i class="material-icons">close</i> <span class="mx-1">Delete</span>
                                        </a>
                                    </td>
                                    @endcan
                                    </tr>
                                    @endforeach --}}


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
    $.ajax({
        type: 'POST',
        url: '{{('/verification/search')}}',
        data: new FormData(form) ,
        processData: false,
        contentType: false,
        success: function(data){
            console.log(data);
            return show_data(data)
        }
    })
    }



    function show_data(data){

        results_tbody.innerHTML = ''
        data.forEach(i => {

            html = `
            <tr>
                <td>${i.account_number}</td>
                <td>${i.customer_id}</td>
                <td>${i.full_name}</td>
                <td>${i.identification_type}</td>
                <td>${i.identification_number}</td>
                <td></td>
                <td><a href="/accountdetails/${i.account_number}" class="btn btn-sm btn-primary">View</a></td>
                <td><a href="/customer_details/${i.account_number}" class="btn btn-sm btn-primary">View</a></td>
                <td>
                <a href="/signature_verification/${i.account_number}" class="btn btn-sm btn-primary">Verify</a>
                </td>
                <td><a href="/document_verification/${i.account_number}" class="btn btn-sm btn-primary">Verify</a></td>
                <td>
                    <button class="btn btn-sm btn-primary " onclick="check_approve('${i.account_number}')" >Approve</button>
                    <button class="btn btn-sm btn-primary">Reject</button>
                </td>
                <td><button class="btn btn-sm btn-primary">Generate</button></td>
            </tr>
            `
            results_tbody.innerHTML += html
        })
    }

    function check_approve(account_number){
        $.ajax({
        type: 'GET',
        url: '{{('/approve_check')}}',
        data: {account_number} ,
        success: function(data){
            console.log(data);

            if(data == 'UNVERIFIED'){
                return Swal.fire('There are Unverified files')
            }else {

                return approve(account_number)
            }

        }
    })
    }

    function approve(account_number){
        $.ajax({
        type: 'GET',
        url: '{{('/approve_done')}}',
        data: {account_number} ,
        success: function(data){
            console.log(data);

        }
    })
    }
</script>

@endsection