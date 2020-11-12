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
            @can('create_permissions')
            <a href="{{url('/permissions/add')}}" rel="tooltip" class="btn btn-sm btn-primary btn-round pull-right">
                <i class="material-icons">add</i> <span class="mx-1">Add Permission</span>
                </a>
            @endcan
          </h4>

        </div>
        <div class="card-body ">
          <div class="row">
            <div class="col-md-12">
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead >
                            <th>Permission </th>
                            <th>Roles with this Permission</th>
                            <th >Actions</th>
                        </thead>
                        <tbody>
                          @foreach ($permissions as $perm)
                            <tr>
                                <th > {{$perm->view_name}} </th>
                                <th > |
                                    @foreach ($perm->roles as $role)
                                         {{$role->name}}  |
                                    @endforeach
                                </th>
                                <td class="td-actions text-right">
                                    @can('update_permissions')
                                        <a href="{{url('/permissions/edit/'.$perm->id)}}" rel="tooltip" class="btn btn-success btn-round">
                                            <i class="material-icons">edit</i> <span class="mx-1">Edit</span>
                                        </a>
                                    @endcan
                                    @can('delete_permissions')
                                        <a href="{{url('/permissions/delete/'.$perm->id)}}" rel="tooltip" class="btn btn-danger btn-round">
                                          <i class="material-icons">close</i> <span class="mx-1">Delete</span>
                                        </a>
                                    @endcan
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



@endsection
