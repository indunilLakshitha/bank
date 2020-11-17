@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
                <h4 class="card-title">Permissions
                    @can('create_users')
                    <a href="/users/add" rel="tooltip" class="btn btn-sm btn-primary btn-round pull-right">
                        <i class="material-icons">add</i> <span class="mx-1">Add User</span>
                    </a>
                    @endcan
                </h4>

            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>Full Name </th>
                                    <th>Email</th>
                                    <th>Branch</th>
                                    <th>Mobile Number</th>
                                    <th>User Role</th>
                                    <th class="text-right">Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u)
                                    <tr>
                                        <th> {{$u->name}} </th>
                                        <th> {{$u->email}} </th>
                                        <th> {{$u->branch_id}} </th>
                                        <th> {{$u->mobile_number}} </th>
                                        <th>
                                            @foreach ($u->roles as $r)
                                            <span class="badge badge-pill badge-info">{{$r->name}}</span>
                                            @endforeach
                                        </th>
                                        <td class="td-actions text-right">
                                            @can('update_users')
                                            <a href="/users/edit/{{$u->id}}" rel="tooltip"
                                                class="btn btn-success btn-round">
                                                <i class="material-icons">edit</i> <span class="mx-1">Edit</span>
                                            </a>
                                            @endcan
                                            @can('delete_users')
                                            <a href="/users/delete/{{$u->id}}" rel="tooltip"
                                                class="btn btn-danger btn-round">
                                                <i class="material-icons">close</i> <span class="mx-1">Delete</span>
                                            </a>
                                        </td>
                                        @endcan
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



@endsection
