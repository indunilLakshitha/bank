@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                <h4 class="card-title">Create Role

                </h4>

            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <form action="/permissions/update/{{$perm->id}}" method="POST">
                                @csrf
                                <div class="from-group">
                                    <label for="">Permission Name</label>
                                    <input type="text" name="role_name" class="form-control" value="{{$perm->name}}">
                                </div>
                                <table class="table">
                                    <tbody>
                                        @foreach ($perm->roles as $r)
                                <tr>
                                    <th> {{$r->name}} </th>
                                        <td class="td-actions text-right">
                                            @can('update_roles')
                                            {{-- <input type="checkbox" value=" {{$p->name}} " name="roles[]" id="" --}}

                                            {{-- @foreach($this_role_permissions as $trp)
                                                @if($p->name == $trp->name)
                                                    checked
                                                @endif
                                            @endforeach --}}
                                            >
                                            @endcan
                                        </td>
                                </tr>
                                        @endforeach
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

