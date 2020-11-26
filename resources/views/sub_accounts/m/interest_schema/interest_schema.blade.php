@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body ">
                <form id="form" action="{{url('/interestschemasubmit')}}" method="POST" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="sub_account_id" value="{{$sub_account_id}}">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Interest Scheme Parameters</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Interest Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            @php
                                            $interest_types =
                                            Illuminate\Support\Facades\DB::table('interest_types')->where('is_enable',1)->get();
                                            @endphp
                                            <select name="interest_type_id"  class="selectpickerX form-control"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>
                                                @isset($interest_types)
                                                @foreach ($interest_types as $item)
                                                <option value="{{$item->id}}">
                                                    {{$item->interest_type}}</option>
                                                @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <label class="col-sm-2 col-form-label">Interest Rate</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>
                        </div> --}}





                        <div class="row">
                            <label class="col-sm-2 col-form-label">Bonus Rate</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" name="bonus_date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Interest Credit Frequency</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">

                                            <select name="" id="" class="selectpicker"
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
                            <label class="col-sm-2 col-form-label">Interest Credit Dated</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" name="interest_credit_dated">
                                </div>
                            </div>
                        </div>

                </div>
            </div>
            </form>

            <form id="intereset_type_data_form">
                @csrf
            <div class="card d-none" style="border: solid" id="type_data">
                <br>
                <input type="hidden" name="interest_schema_id" id="interest_schema_id">
                <div class="row">
                    <div class="col-2">
                        <select name="slab" id="" class="selectpicker col-12"
                            data-style="select-with-transition">
                            <option value="One">One</option>
                            <option value="Two">Two</option>
                            <option value="Three">Three</option>


                        </select> </div>
                    <div class="col-2">
                        <div class="form-group">
                            <input type="number" class="form-control" name="from_value" placeholder="From">

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-group">
                                <input type="number" class="form-control" name="to_value" placeholder="To">

                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <select name="type_id" id="" class="selectpicker col-12"
                                data-style="select-with-transition">
                                <option value="">Type</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <input type="number" class="form-control" name="amount" placeholder="amount">
                        </div>
                    </div>
                </form>
                    <div class="col-1">
                        <a onclick="create_intereset_type_data()" id="" class="btn-info btn-sm " >ADD</a>
                    </div>
                </div>
            </div>

            <div class="row d-none" id="type_data_results">
                <div class="col-md-12">
                    <div class="card " >
                        <div class="card-header card-header-success card-header-icon">
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
                                                <th>Slab</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody id="type_data_results_tbody">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <button type="button" onclick="create_int_schema()" id="btn1" class="btn btn-primary">NEXT</button> </div>
                        <a href="/interestschemasubmit/{{$sub_account_id}}" id="btn2" class="btn btn-primary d-none">NEXT</a> </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function create_int_schema(){
        $.ajax({
        type: 'POST',
        url: '{{('/create_int_schema')}}',
        data: new FormData(form) ,
        processData: false,
        contentType: false,
        success: function(data){
            // console.log(data);
            interest_schema_id.value = data
            type_data.classList.remove('d-none')
            btn1.classList.add('d-none')
            btn2.classList.remove('d-none')
            return
        }
    })
    }

    function create_intereset_type_data(){
        $.ajax({
        type: 'POST',
        url: '{{('/create_intereset_type_data')}}',
        data: new FormData(intereset_type_data_form) ,
        processData: false,
        contentType: false,
        success: function(data){
            console.log(data);
            type_data_results.classList.remove('d-none')
            return set_type_data_results(data)
            // btn1.classList.add('d-none')
            // btn2.classList.remove('d-none')
        }
    })
    }

    function set_type_data_results(data){

        type_data_results_tbody.innerHTML = ''

        data.forEach(i => {

            html = `
            <tr>
                <th>${i.slab} </th>
                <th>${i.from_value} </th>
                <th>${i.to_value} </th>
                <th> ${i.type_id}</th>
                <th> ${i.amount}</th>
                <td></td>
            </tr>
            `
            type_data_results_tbody.innerHTML += html
        })
    }


</script>

@endsection
