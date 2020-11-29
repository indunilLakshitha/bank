@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
                <h4 class="card-title">Roles
                    @can('create_roles')
                    <a href="/roles/add" rel="tooltip" class="btn btn-sm btn-primary btn-round pull-right">
                        <i class="material-icons">add</i> <span class="mx-1">Add Role</span>
                    </a>
                    @endcan
                </h4>

            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                        @if(Session::has('error'))
                            <p class="alert alert-danger">{{ Session::get('error') }}</p>
                        @endif
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>Role Name</th>
                                    <th>Status</th>
                                    <th class="text-right">Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <th> {{$role->name}} </th>
                                        <th>
                                            @if ($role->status == 1)
                                            <button onclick="chnage_role_status({{$role->id}}, 0)"
                                                rel="tooltip" title="Click to change Status" class="btn btn-sm btn-success btn-round">
                                                <span class="mx-1">Active</span>
                                            </button>
                                            @elseif($role->status == 0)
                                            <button onclick="chnage_role_status({{$role->id}}, 1)"
                                                rel="tooltip" title="Click to change Status"  class="btn btn-sm btn-danger btn-round">
                                                <span class="mx-1">Inactive</span>
                                            </button>
                                            @endif
                                        </th>
                                        <td class="td-actions text-right">
                                            @can('update_roles')
                                            <a href="/roles/edit/{{$role->id}}" rel="tooltip"
                                                class="btn btn-success btn-round">
                                                <i class="material-icons">edit</i> <span class="mx-1">Edit</span>
                                            </a>
                                            @endcan
                                            @can('delete_roles')
                                            <a href="/roles/delete/{{$role->id}}" rel="tooltip"
                                               onclick="return confirm('{{'Are you sure, You want delete this role('.$role->name.')'}}')"
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

<script>
    function chnage_role_status(id, status){
        // console.log(id);
        $.ajax({
            type: 'GET',
            url: '{{('/chnage_role_status')}}',
            data: {id, status},
            success: function(data){
                // console.log(data)
                // return set_cus_details(data)
                return location.reload()
            },
            error: function(data){
                console.log(data)
            }

        })
    }
</script>

@endsection
