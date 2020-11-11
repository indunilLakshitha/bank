@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
                <h4 class="card-title">Create Role

                </h4>

            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <form action="/roles/store" method="POST">
                                @csrf
                                <div class="from-group">
                                    <label for="">Role Name</label>
                                    <input type="text" name="role_name" class="form-control">
                                </div>
                                <table class="table">
                                    <tbody>
                                        @foreach ($permissions as $p)
                                <tr>
                                    <th> {{$p->view_name}} </th>
                                        <td class="td-actions text-right">
                                            @can('create_roles')
                                            <input type="checkbox" value=" {{$p->name}} " name="permissions[]" id="">
                                            @endcan
                                        </td>
                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                    <tr >
                                        <button class="btn btn-danger" type="submit">Create Role</button>
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
