@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
                <h4 class="card-title">Create User

                </h4>

            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <form action="/users/store" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="from-group col-6">
                                        <label for="">Userame</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="from-group col-6">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="from-group col-6">
                                        <label for="">Mobile Number</label>
                                        <input type="text" name="mobile_number" class="form-control">
                                    </div>
                                    <div class="from-group col-6">
                                        <label for="">Password</label>
                                        <input type="text" name="password" class="form-control" required>
                                    </div>
                                </div>
                                <br>
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
                    {{-- {{$r->permissions}} --}}
                    <tr>
                        <th>{{$r->name}}</th>
                        <th> <input class="role_checkboxes" type="checkbox" value="{{$r->name}}" name="roles[]"
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
                <table class="table">
                    {{-- <tr> --}}
                    @foreach ($permissions as $p)
                    <tr>
                        <th>{{$p->name}}</th>
                        <th> <input type="checkbox" value="{{$p->name}}" class="perm_checkboxes" name="permissions[]"
                                id="{{$p->name}}"></th>
                    </tr>
                    @endforeach
                    {{-- </tr> --}}
                </table>
            </div>
        </div>

        <tr>
            <button class="btn btn-danger" type="submit">Create User</button>
        </tr>
    </div>
</form>


<script>
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

        // perm_checkboxes.forEach(pcb => {
        //     pcb.checked = false
        // })

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
