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
<form action="/users/update/{{$user->id}}" method="POST">
    @csrf
        <div class="card">
            <div class="card-header">
                <h5>User Role</h5>
            </div>

            <div class="card-body">
                <table class="table">

                    {{-- {{$user->getRoleNames()->first()}} --}}
                    <tr>
                        @foreach ($all_roles as $r)
                        <th> <input class="role_checkboxes" type="radio" value="{{$r->name}}" name="roles[]"
                                id="checkbox_{{$r->name}}" onclick="get_role_perms(this, {{$r->permissions}})"
                                @if($user->getRoleNames()->first() == $r->name)
                                    checked
                                @endif
                                >
                            {{$r->name}}
                        </th>
                        @endforeach
                    </tr>
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
                    @foreach ($all_permissions as $p)
                        <tr>
                    <th> <input type="checkbox" value="{{$p->name}}" class="perm_checkboxes " name="permissions[]"
                            id="{{$p->name}}">
                            {{$p->name}}
                    </th>
                </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <tr>
            <button class="btn btn-danger" type="submit">Update User</button>
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
