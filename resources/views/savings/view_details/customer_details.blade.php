@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Client Details</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">CIF</label>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" disabled value="{{$data->customer_id}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label"> Client Full Name</label>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" disabled value="{{$data->full_name}}" class="form-control"
                                    id="client_full_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">ID Type</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="identification_type_id" disabled
                                            value="{{$data->identification_type}}">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" name="identification_number" id="identification_number"
                                            class="form-control" disabled value="{{$data->identification_number}}">

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <form action="/submit_all" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="branch_id" name="branch_id">
                        <input type="hidden" id="customer_id" name="customer_id">
                        <input type="hidden" id="account_number" name="account_number" value=>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">DOB</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="date" name="identification_number" disabled
                                        value="{{$data->date_of_birth}}" id="identification_number"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer FATCA Clearance Received</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" name="identification_number" id="identification_number"
                                                class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer PEP Clearance Received</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" name="identification_number" id="identification_number"
                                                class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br> <br>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Branch Code</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="branch_code" name="branch_code" disabled
                                        value="{{$data->branch_code}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer Rating</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                </div>
            </div>


            <div class="card ">
                <div class="card-body ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Guardian Information</h4>
                        </div>
                    </div>

                    <table class="table ">
                        <tr>
                            <td>Customer ID</td>
                            <td>Full Name</td>
                        </tr>
                        @foreach ($g_arr as $item)
                        <tr>
                            <th>{{$item->customer_id}}</th>
                            <th>{{$item->full_name}}</th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>





    </div>

</div>
</div>

<script>
    function verify_image(id, btn){
        console.log(id);
        $.ajax({
        type: 'GET',
        url: '{{('/verify_image')}}',
        data: {id} ,
        success: function(data){
            console.log(data);
            btn.classList.add('d-none')
            // return show_data(data)
        }
    })
    }
</script>

@endsection
