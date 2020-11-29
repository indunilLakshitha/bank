@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card col-10 ">
            <div class="card-header card-header-success card-header-icon">

                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Create User</h4>
                    </div>
                </div>

            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        @if(Session::has('message'))
                            <p class="alert alert-danger">{{ Session::get('message') }}</p>
                        @endif
                        <div class="table-responsive">
                            <form action="{{url('/users/store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="from-group col-6">
                                        <label for="">Full Name </label>
                                        <font color="red">*</font>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="from-group col-6">
                                        <label for="">Email</label>
                                        <font color="red">*</font>
                                        <input type="email" name="email" class="form-control" pattern="^([0-9]{9}[x|X|v|V]|[0-9]{12})$" required>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="from-group col-6">
                                        <label for="">Employee Number</label>
                                        <font color="red">*</font>
                                        <input type="text" name="employee_no" class="form-control" required>
                                    </div>
                                    <div class="from-group col-6">
                                        <label for="">Branch</label>
                                        <font color="red">*</font>
                                        <?php $branches=Illuminate\Support\Facades\DB::table('branches')->get(); ?>
                                        <select name="branh_id" id="branh_id" class="ml-3 selectpicker"
                                            data-style="select-with-transition">
                                            <option value="">Select</option>
                                            @isset($branches)
                                                @foreach ($branches as $branch)
                                                    <option value="{{$branch->id}}">{{$branch->branch_code .' - '.$branch->branch_name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="from-group col-6">
                                        <label for="">Mobile Number</label>
                                        <font color="red">*</font>
                                        <input type="text" name="mobile_number" class="form-control" required>
                                    </div>

                                    <div class="from-group col-6">
                                        <label for="">NIC</label>
                                        <input type="text" name="nic" class="form-control">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="from-group col-6">
                                        <label for="">Password</label>
                                        <font color="red">*</font>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="from-group col-6">
                                        <label for="">Confirm Password</label>
                                        <font color="red">*</font>
                                        <input type="password" name="confirm_password" class="form-control" required>
                                    </div>
                                </div>
                                <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>User Roles</h5>
            </div>

            <div class="card-body">
                <table class="table">
                    {{-- <tr> --}}
                    {{-- @foreach ($roles as $r)
                                         {{$r->permissions}}
                    @endforeach --}}
                    @foreach ($roles as $r)
                    <tr>
                        {{-- {{$r->permissions}} --}}
                        <th>{{$r->name}}</th>
                        <th> <input class="role_checkboxes" type="radio" value="{{$r->name}}" name="roles[]"
                                id="checkbox_{{$r->name}}" onclick="get_role_perms(this, {{$r->permissions}})"></th>
                        <th>
                            @foreach ($r->permissions as $perm)
                            <span class="badge badge-pill badge-rose"> {{$perm->name}} </span>
                            @endforeach
                        </th>
                    </tr>
                    @endforeach
                    {{-- </tr> --}}
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>User Permissions</h5>
            </div>
            <div class="card-body">
                {{-- <table class="table"> --}}
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
            </div>
            {{-- </table> --}}
        </div>

        <tr>
            <button class="btn btn-danger" type="submit" onclick="return Validate()">Create User</button>
        </tr>
    </div>
    </form>


    <script>
        function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            Swal.fire('Passwords do not match.');
            return false;
        }
        return true;
    }
        function get_role_perms(role_checkbox, perms){
        // console.log(this_checkbox);
        // console.log(perms['perms']);
        // console.log(role_checkbox.checked);

        let perm_checkboxes = document.querySelectorAll('.perm_checkboxes');
        let role_checkboxes = document.querySelectorAll('.role_checkboxes');
        let active_role_cbxs = [];

        // role_checkboxes.forEach(cb => {
        //     if(cb.checked){
        //         active_role_cbxs.push(cb)
        //     }
        // })
        // console.log(active_role_cbxs);

        // active_role_cbxs.forEach(active_role_cb => {
        //     console.log(active_role_cb.perms);
        //     // perm_checkboxes.forEach(checkbox => {
        //     //     perms.forEach(perm => {
        //     //         // console.log(checkbox.value);
        //     //         if(perm.name == checkbox.value){
        //     //             checkbox.checked = true;
        //     //         // } else {
        //     //         //     perm_checkboxes.forEach(checkbox => {
        //     //         //         checkbox.checked = false
        //     //         //     })
        //     //         }
        //     //     })
        //     // })
        // })

        perm_checkboxes.forEach(pcb => {
            pcb.checked = false
        })

        if(role_checkbox.checked){
            // console.log(perm_checkboxes);
            perm_checkboxes.forEach(checkbox => {
                perms.forEach(perm => {
                    // console.log(checkbox.value);
                    if(perm.name == checkbox.value){
                        checkbox.checked = true;
                    }
                })
            })
        } else {
            perm_checkboxes.forEach(checkbox => {
                checkbox.checked = false
            })
        }

        // if(role_checkbox.checked){
        //     // console.log(perm_checkboxes);
        //     perm_checkboxes.forEach(checkbox => {
        //         perms.forEach(perm => {
        //             // console.log(checkbox.value);
        //             if(perm.name == checkbox.value){
        //                 checkbox.checked = true;
        //             }
        //         })
        //     })
        // } else {
        //     perm_checkboxes.forEach(checkbox => {
        //         checkbox.checked = false
        //     })
        // }
    }
    </script>

    @endsection
