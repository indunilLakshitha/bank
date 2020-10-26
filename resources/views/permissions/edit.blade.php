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
                                    <input type="text" name="permission_name" class="form-control" value="{{$perm->name}}">
                                </div>
                                <table class="table">
                                    <tbody>
                                        @foreach ($roles as $r)
                                        {{-- $prem->roles worked too..... no need of roles_with_this_perm with it--}}
                                <tr>
                                    <th> {{$r->name}} </th>
                                        <td class="td-actions text-right">
                                            @can('update_permissions')
                                            <input type="checkbox" value=" {{$r->name}} " name="roles[]" id=""

                                            @foreach($roles_with_this_perm as $rwtp)
                                                @if($r->name == $rwtp)
                                                    checked
                                                @endif
                                            @endforeach
                                            >
                                            @endcan
                                        </td>
                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                    <tr >
                                        <button class="btn btn-danger" type="submit">Update Permission</button>
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

