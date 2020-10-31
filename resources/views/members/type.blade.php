@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Member Types</h4>
            </div>
        </div>
        <div class="card-body ">
            <form method="get" action="/" class="form-horizontal">
                <div class="row">
                    <label class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control">
                            <span class="bmd-help">USe Member Code To Search</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Type</label>
                    <div class="col-lg-5 col-md-6 col-sm-3">
                        <select class="selectpicker" data-style="select-with-transition" multiple title="Type"
                            data-size="7">
                            <option disabled> type 1</option>
                            <option disabled> type 2</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-lg-5 col-md-6 col-sm-3">
                        <select class="selectpicker" data-style="select-with-transition" multiple title="Type"
                            data-size="7">
                            <option disabled> type 1</option>
                            <option disabled> type 2</option>
                        </select>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
                <h4 class="card-title">
                    @can('add_member_type')
                    <a href="/permissions/add" rel="tooltip" class="btn btn-sm btn-primary btn-round pull-right">
                        <i class="material-icons">add</i> <span class="mx-1">Add</span>
                    </a>
                    @endcan
                    @can('modify_member_type')
                    <a href="/permissions/add" rel="tooltip" class="btn btn-sm btn-primary btn-round pull-right">
                        <i class="material-icons">update</i> <span class="mx-1">Modify</span>
                    </a>
                    @endcan
                    <a href="/members" rel="tooltip" class="btn btn-sm btn-primary btn-round pull-right">
                        <i class="material-icons">close</i> <span class="mx-1">Exit</span>
                    </a>
                </h4>

            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>No </th>
                                    <th>CODE</th>
                                    <th>DESCRIPTION</th>
                                </thead>
                                <tbody>
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



@endsection
