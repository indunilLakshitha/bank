@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                <h4 class="card-title">Edit Role

                </h4>

            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <form action="/roles/update/{{$role->id}}" method="POST">
                                @csrf
                                <div class="from-group">
                                    <label for="">Role Name</label>
                                    <input type="text" name="role_name" class="form-control" value="{{$role->name}}">
                                </div>

                                <table class="table">
                                    <tbody>
                                    <div class="row">
                                        @foreach ($all_permissions as $p)
                                            <div class="col-3">
                                                @can('update_roles')
                                                    <input type="checkbox" value="{{$p->name}}" class="perm_checkboxes "
                                                           name="permissions[]" id="{{$p->name}}"
                                                           @foreach($this_role_permissions as $trp)
                                                               @if($p->name == $trp->name)
                                                                   checked
                                                                @endif
                                                            @endforeach
                                                    >
                                                    {{$p->view_name}}
                                                @endcan
                                            </div>

                                        @endforeach
                                    </div>
                                    </tbody>
                                </table>
                                    <tr >
                                        <button class="btn btn-danger" type="submit">Update Role</button>
                                    </tr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

