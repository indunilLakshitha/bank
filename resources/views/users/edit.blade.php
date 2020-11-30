@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
        <div class="card-header card-header-success card-header-icon">
                {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
                <h4 class="card-title">Edit User

                </h4>
                <br>
                <br>


        </div>
            <form action="/users/update/{{$user->id}}" method="POST">
                @csrf
                        <div class="col-10">
            <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Full Name <font color="red">*</font></label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="hidden" name="status"  class="form-control" value="{{ $user->status}}" required >
                                <input type="text" name="name"  class="form-control" value="{{ $user->name}}" required >
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Email <font color="red">*</font></label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" value="{{ isset($user->email) ? $user->email: ''}}" required readonly>
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-2 col-form-label">Branch <font color="red">*</font></label>

                        <div class="col-sm-5">
                        <?php $branches=Illuminate\Support\Facades\DB::table('branches')->get(); ?>
                            <select name="branh_id" id="branh_id" class="ml-3 selectpicker"
                                    data-style="select-with-transition" required>
                                <option value="">Select</option>
                                @isset($branches)
                                    @foreach ($branches as $branch)
                                        @if($branch->id == $user->branh_id)
                                            <option value="{{$branch->id}}" selected>
                                                {{$branch->branch_code." - ".$branch->branch_name}}
                                            </option>
                                        @else
                                            <option value="{{$branch->id}}">
                                                {{$branch->branch_code." - ".$branch->branch_name}}
                                            </option>
                                        @endif
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                     <div class="row">
                        <label class="col-sm-2 col-form-label">Phone Number <font color="red">*</font></label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" name="mobile_number"  class="form-control" value="{{ isset($user->mobile_number) ? $user->mobile_number: ''}}" required>
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Employee Number <font color="red">*</font></label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" name="employee_no"  class="form-control" value="{{ isset($user->employee_no) ? $user->employee_no: ''}}" required readonly>
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">NIC</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" name="nic"  class="form-control" value="{{ isset($user->nic) ? $user->nic: ''}}" readonly>
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
                        @foreach ($all_roles as $r)
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
                    @foreach ($all_permissions as $p)

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

        // function validate_form(){

        //     if(!email.[0]) {
        //         // console.log(img_1.files[0]);
        //         return Swal.fire('Please upload Signature Image')
        //     }
        //     return form.submit()
        // }
    }
    </script>

    @endsection
