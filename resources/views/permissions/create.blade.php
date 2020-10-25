@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
                <h4 class="card-title">Create Permission

                </h4>

            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <form action="/permissions/store" method="POST">
                                @csrf
                                <div class="from-group">
                                    <label for="">Permission Name</label>
                                    <input type="text" name="permission_name" class="form-control">
                                </div>
                                <table class="table">
                                    <tbody>
                                        {{-- @foreach ($roles as $r)
                                <tr>
                                    <th> {{$r->name}} </th>
                                        <td class="td-actions text-right">
                                            @can('create_permissions')
                                            <input type="checkbox" value=" {{$r->name}} " name="roles[]" id="">
                                            @endcan
                                        </td>
                                </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                                    <tr >
                                        <button class="btn btn-danger" type="submit">Create Permission</button>
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
