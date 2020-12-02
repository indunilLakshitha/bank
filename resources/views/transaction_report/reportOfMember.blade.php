@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">

                <div class="col-3">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Report</h4>
                            </div>
                        </div>
                    </div>
                <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <label >FROM:</label>
                            <div class="pull-right col-2">
                                <input type="date" class="form-control datepicke">
                            </div>
                            <label for="">TO:</label>
                            <div class="pull-right col-2" value="">
                                <input type="date" class="form-control datepicke">
                            </div>
                            <label for="">USER:</label>
                            <div class="pull-right col-2">
                                <select name="select_branch1" class="form-control" id="select_branch1">
                                    <option value="" >--Select--</option>
                                </select>
                            </div>
                            <label for="">BRANCH:</label>
                            <div class="col-1">
                                <input class="form-check" type="checkbox" value="">
                                <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                            </div>
                            <div class=" col-1 ">
                                <button type="button"  onclick="search(this)" class="btn btn-info" id="search_btn1">Search</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>BP. Code</th>
                                    <th>BP. Name </th>
                                    <th>ACC. Code</th>
                                    <th>ACC. Name</th>
                                    <th>Capital</th>
                                    <th>Interest</th>
                                    <th>Fine</th>
                                    <th>Excess</th>
                                    <th>Other</th>
                                    <th>Subtotal</th>
                                    <th>User</th>


                                </thead>
                                <tbody>
                                    <tr>
                                        <th>  </th>
                                        <th> </th>
                                        <th>  </th>
                                        <th> </th>
                                        <th> </th>



                                    </tr>


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

    function change_user_status(id, status){
        // console.log(id);
        $.ajax({
            type: 'GET',
            url: '{{('/change_user_status')}}',
            data: {id, status},
            success: function(data){
                // console.log(data)
                // return set_cus_details(data)
                return location.reload()
            },
            error: function(data){
                console.log(data)
            }

        })
    }

</script>
@endsection
