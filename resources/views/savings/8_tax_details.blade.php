@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="row">
                    <div class="col-3">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Step 05 - Savings Account Opening</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        {{-- <div class="card-header card-header-rose card-header-text"> --}}
                        <div class="card-text">
                            <!-- <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a> -->
                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>

            {{-- <form method="get" action="/" class="form-horizontal"> --}}
            <div class="card " style="border: solid">
                <div class="card ">
                    <div class="card-body ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Tax Details</h4>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered" id="bene_table">
                        <thead>
                            <tr>
                                <th colspan="1">Mandotory</th>
                                <th  colspan="1">Fee</th>
                                <th colspan="4">Fee Type &nbsp; &nbsp; &nbsp; </th>
                                <th colspan="6" >Amount&nbsp; &nbsp; </th>
                                <th colspan="1">Tax <br> Applicable</th>
                                <th colspan="4">Fee Payable</th>
                                <th colspan="2">Add</th>
                            </tr>
                        </thead>
                        <!-- <tbody id="bene_body">

                             @foreach($f_details as $fd)
                            <tr>
                                <th hidden>{{$prod_id}} </th>
                                <th hidden>{{$account_id}}</th>
                                <th hidden>{{$customer_id}}</th>
                                <th> <input class="form-check-input " name="is_mandatory" type="checkbox" value="1" @if ($fd->is_mandatory == 1) checked @endif>
                                <span class="form-check-sign">
                                        <span class="check"></span>
                                </span></td>
                                </th>
                                <th><input type="text" value="{{$fd->id}}" readonly class="form-control" name="fee_details_id" ></th>
                                <th><select  id="" class="form-control" name="fee_type_id">
                                        <option value="">Select </option>
                                            @foreach ($f_types as $ft)
                                                 <option value="{{$ft->id}}">{{$ft->fee_type}}</option>
                                            @endforeach
                                        </select>
                                </th>
                                <th><input type="number" name="amount" class="form-control"></th>
                                <th><input class="form-check-input " name="is_tax_applicable" type="checkbox" value="1" @if ($fd->is_tax_applicable == 1) checked @endif>
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span></td>
                                <th> <input type="text" name="fee_payble_text" class="form-control"></th>
                                <th><input onclick="add('form_{{$fd->id}}', this)" type="button" value="Add" class="btn btn-primary btn-sm"></th>
                            </tr>
                            @endforeach


                        </tbody> -->
                        </table>
                        @foreach($f_details as $fd)
                        <form id="form_{{$fd->id}}">
                            @csrf
                            <input type="hidden" name="product_data_id" value={{$prod_id}}>
                            <input type="hidden" name="account_id" value={{$account_id}}>
                            <input type="hidden" name="customer_id" value={{$customer_id}}>
                        <div class="row">
                            <div class="col-sm-2">
                            <div class="col-2 pull-right">
                                <div class="form-check ">
                                    <input class="form-check-input" name="is_mandatory"
                                    type="checkbox" value="1"
                                    @if ($fd->is_mandatory == 1) checked @endif>
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <input type="text" value="{{$fd->id}}" readonly class="form-control" name="fee_details_id" >
                                </div>
                            </div>
                            <div class="col-sm-2">
                                        <div class="form-group">
                                            <select  id="" class="form-control" name="fee_type_id">
                                                <option value="">Select </option>

                                                @foreach ($f_types as $ft)
                                                    <option value="{{$ft->id}}">{{$ft->fee_type}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                            </div>

                             <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="text" name="amount" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                    <div class="col-4">
                                        <div class="form-check  ">
                                            <label class="form-check-label ">
                                                <input class="form-check-input " name="is_tax_applicable" type="checkbox" value="1"
                                                @if ($fd->is_tax_applicable == 1)
                                                checked
                                                @endif
                                                >
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-sm-2" >
                                <div class="form-group ">
                                    <input type="text" name="fee_payble_text" class="form-control pull-left"">
                                </div>
                            </div>
                             <input
                            onclick="add('form_{{$fd->id}}', this)"
                            type="button" value="Add" class="btn btn-primary btn-sm">
                        </div>

                    </form>
                    @endforeach


                        <!-- @foreach($f_details as $fd)
                        <form id="form_{{$fd->id}}">
                            @csrf
                            <input type="hidden" name="product_data_id" value={{$prod_id}}>
                            <input type="hidden" name="account_id" value=>
                            <input type="hidden" name="customer_id" value={{$customer_id}}>
                        <div class="row">
                            <div class="col-sm-1">
                            </div>
                            <div class="form-check  ">
                                <label class="form-check-label ">
                                    <input class="form-check-input " name="is_mandatory"
                                    type="checkbox" value="1"
                                    @if ($fd->is_mandatory == 1)
                                    checked
                                    @endif

                                    >
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>

                        <input type="text" value="{{$fd->id}}" readonly class="form-control" name="fee_details_id" >
                            <div class="col-sm-2">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <select  id="" class="form-control" name="fee_type_id">
                                                <option value="">Select </option>

                                                @foreach ($f_types as $ft)
                                                    <option value="{{$ft->id}}">{{$ft->fee_type}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="text" name="amount" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check  ">
                                            <label class="form-check-label ">
                                                <input class="form-check-input " name="is_tax_applicable" type="checkbox" value="1"
                                                @if ($fd->is_tax_applicable == 1)
                                                checked
                                                @endif
                                                >
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>`

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="text" name="fee_payble_text" class="form-control">
                                </div>
                            </div>
                             <input
                            onclick="add('form_{{$fd->id}}', this)"
                            type="button" value="Add" class="btn btn-primary btn-sm">
                        </div>

                    </form> -->

                        <!-- @endforeach -->

                        <br>
                        <form action="/finish_open_account_saving" method="POST" id="final_form">
                            @csrf
                            <input type="hidden" name="product_data_id" value={{$prod_id}}>
                            <input type="hidden" name="account_id" value={{$account_id}}>
                            <input type="hidden" name="customer_id" value={{$customer_id}}>
                            <input type="hidden" name="account_number" value={{$acc_no}}>
                            <div class="row">
                            <div class="col">
                                <div class="col-11">
                        <button type="button" class="btn btn-primary float-right"
                        onclick="Swal.fire({title: `Created Account {{$acc_no}}`,confirmButtonText: `View Savings Account Page`}).then(() => {final_form.submit()})
                        ">SUBMIT & FINISH</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </div>
</div>

<script>
    function add(id, btn){
        let form =  document.querySelector(`#${id}`)
        $.ajax({
            type: 'POST',
            url: '{{('/add_tax')}}',
            data: new FormData(form),
            contentType: false,
            processData: false,
            success: function(data){
                console.log(data)
                // return set_search_by_name_results(data)
                btn.classList.add('d-none')
            },
            error: function(data){
                console.log(data)
            }

        })
    }
</script>
@endsection
