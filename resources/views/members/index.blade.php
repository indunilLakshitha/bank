@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header card-header-success card-header-icon">
          {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
          <h4 class="card-title">Members
            {{-- @can('create_permissions') --}}
            <a href="/permissions/add" rel="tooltip" class="btn btn-sm btn-primary btn-round pull-right">
                <i class="material-icons">add</i> <span class="mx-1">Add Member</span>
                </a>
            {{-- @endcan --}}
          </h4>

        </div>
        <div class="card-body ">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Permission </th>
                        <th>Roles with this Permission</th>
                        <th class="text-right">Actions</th>
                    </thead>
                  <tbody>
                      {{-- @foreach ($permissions as $perm) --}}
                      <tr>
                        {{-- <th> {{$perm->name}} </th>
                        <th> |
                            @foreach ($perm->roles as $role)
                                 {{$role->name}}  |
                            @endforeach
                        </th>
                        <td class="td-actions text-right">
                        @can('update_permissions')
                            <a href="/permissions/edit/{{$perm->id}}" rel="tooltip" class="btn btn-success btn-round">
                            <i class="material-icons">edit</i> <span class="mx-1">Edit</span>
                            </a>
                        @endcan
                        @can('delete_permissions')
                            <a href="/permissions/delete/{{$perm->id}}" rel="tooltip" class="btn btn-danger btn-round">
                              <i class="material-icons">close</i> <span class="mx-1">Delete</span>
                            </a>
                          </td>
                        @endcan --}}
                      </tr>
                      {{-- @endforeach --}}


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
