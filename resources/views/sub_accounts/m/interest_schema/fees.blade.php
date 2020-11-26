@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body ">
                    <form id="form" action="{{url('/interestschemafeesubmit')}}" method="POST" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="sub_account_id" value="{{$id}}">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Fees</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Fee Description</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">

                                            <select name="fee_description_id" id="" class="selectpicker"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Fee Code</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="fee_code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Fee Category</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">

                                            <select name="fee_category_id" id="" class="selectpicker"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Fee Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">

                                            <select name="fee_type_id" id="" class="selectpicker"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Fee Amount</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="fee_amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Triggering Point</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">

                                            <select name="trigerring_point_id" id="" class="selectpicker"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Effective Date</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Tax Applicable</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">

                                            <select name="is_tax_appliable" id="" class="selectpicker"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Tax Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">

                                            <select name="tax_type_id" id="" class="selectpicker"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <button onclick="create_fee_data()" class="btn btn-primary float-right">Add</button>
                    <br>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Tax Rate/Amount</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="fee_rate">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ">
                                    <div class="card-header card-header-success card-header-icon">
                                        {{-- <div class="card-icon">
                        <i class="material-icons"></i>
                    </div> --}}
                                        <h4 class="card-title">

                                        </h4>

                                    </div>
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="material-datatables">
                                                    <table id="datatables"
                                                        class="table table-striped table-no-bordered table-hover"
                                                        cellspacing="0" width="100%" style="width:100%">
                                                        <thead>
                                                            <th>Fee Description</th>
                                                            <th>Fee Category</th>
                                                            <th>Fee Type</th>
                                                            <th>Fee Ammount</th>
                                                            <th>Maximum Amount</th>
                                                            <th>Minimum Amount</th>
                                                            <th>Action</th>
                                                        </thead>
                                                        <tbody id="fee_data_results_tbody">
                                                            <tr>
                                                                <th> </th>
                                                                <th> </th>
                                                                <th> </th>
                                                                <th> </th>
                                                                <th> </th>
                                                                <td></td>
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

                        <a href="/tax_n_docs/{{$id}}" id="btn2" class="btn btn-primary ">NEXT</a> </div>
                    </div>
                </div>
            </div>


    </div>
</div>


<script>
    function create_fee_data(){
        $.ajax({
        type: 'POST',
        url: '{{('/create_fee_data')}}',
        data: new FormData(form) ,
        processData: false,
        contentType: false,
        success: function(data){
            console.log(data);
            return set_fee_data_results(data)
        }
    })
    }

    function set_fee_data_results(data){

        fee_data_results_tbody.innerHTML = ''

        data.forEach(i => {

            html = `
            <tr>
                <th>${i.fee_description_id} </th>
                <th>${i.fee_category_id} </th>
                <th>${i.fee_type_id} </th>
                <th> ${i.type_id}</th>
                <th> ${i.amount}</th>
                <td></td>
            </tr>
            `
            fee_data_results_tbody.innerHTML += html
        })
    }
</script>
@endsection
