@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Create Role</h4>
                    </div>
                </div>

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
                                        <div class="row">
                                            @foreach ($permissions as $p)

                                                <div class="col-3">
                                                    {{-- <tr> --}}
                                                    {{-- <th> --}}
                                                    <input type="checkbox" value="{{$p->name}}" class="perm_checkboxes "
                                                           name="permissions[]" id="{{$p->name}}">
                                                    {{$p->view_name}}
                                                    {{-- </th> --}}
                                                    {{-- </tr> --}}
                                                </div>

                                            @endforeach
                                        </div>
                                    </tbody>
                                </table>
                                <tr>
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
