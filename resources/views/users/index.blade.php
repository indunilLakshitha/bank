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
                    @can('create_users')
                    <a href="{{url('/users/add')}}" rel="tooltip" class="btn btn-sm btn-primary btn-round pull-right">
                        <i class="material-icons">add</i> <span class="mx-1">Add User</span>
                    </a>
                    @endcan
                </h4>

            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        @if(Session::has('message-error'))
                            <p class="alert alert-danger">{{ Session::get('message') }}</p>
                        @endif
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>Full Name </th>
                                    <th>Employee Number</th>
                                    <th>NIC Number</th>
                                    <th>Email</th>
                                    <th>Branch</th>
                                    <th>Mobile Number</th>
                                    <th>User Role</th>
                                    <th class="text-right">Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u)
                                    <tr>
                                        <th> {{$u->name}} </th>
                                        <th> {{$u->employee_no}} </th>
                                        <th> {{$u->nic}} </th>
                                        <th> {{$u->email}} </th>
                                        <th> {{$u->branch_code . ' - ' . $u->branch_name}} </th>
                                        <th> {{$u->mobile_number}} </th>
                                        <th>
                                            @foreach ($u->roles as $r)
                                                <span class="badge badge-pill badge-info">{{$r->name}}</span>
                                            @endforeach
                                        </th>
                                        <td class="td-actions text-right">
                                            @can('update_users')
                                            <a href="{{url('/users/edit/'.$u->id)}}" rel="tooltip"
                                                class="btn btn-success btn-round">
                                                <i class="material-icons">edit</i> <span class="mx-1">Edit</span>
                                            </a>
                                            @endcan
                                            @can('delete_users')
                                            <a href="{{url('/users/delete/'.$u->id)}}" rel="tooltip"
                                                class="btn btn-danger btn-round"
                                               onclick="return confirm('{{'Are you sure, You want delete User('.$u->name.')'}}')">
                                                <i class="material-icons">close</i> <span class="mx-1">Delete</span>
                                            </a>
                                        </td>
                                        @endcan
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
<script>
    function validate_form(nic){
        //e.preventDefault();
        // console.log(img_1.files[0]);
        /*Swal.fire({
            title: 'Are you sure?',
            text: "You want delete this user!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })*/
        return Swal.fire('Are you sure you want remove this user?')

    }


</script>
@endsection
