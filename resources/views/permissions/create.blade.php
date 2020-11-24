@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10 container">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Create Permission</h4>
                    </div>
                </div>

            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <form action="/permissions/store" method="POST">
                                @csrf
                                <div class="from-group col-6">
                                    <label for="">Permission Name</label>
                                    <input type="text" name="permission_name" class="form-control">
                                </div>
                                <div class="from-group col-6 mb-3">
                                    <label for="">Permission Name to View</label>
                                    <input type="text" name="view_name" class="form-control">
                                </div>
                                <table class="table-bordered">
                                    <tbody>
                                        @foreach ($roles as $r)
                                        <tr>
                                            <th> {{$r->name}} </th>
                                            <td class="td-actions text-right">
                                                @can('create_roles')
                                                <input type="checkbox" value=" {{$r->name}} " name="roles[]" id="">
                                                @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <tr>
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