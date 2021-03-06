@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Savings Account Opening</h4>
                    </div>
                </div>
            </div>
            {{-- <form method="get" action="/" class="form-horizontal"> --}}
                <div class="card ">
                    <div class="card-body ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Tax Details</h4>
                            </div>
                        </div>
                        <div class="row col-12 ">
                            <div class="col-sm-12">
                                <label class="col-sm-1 col-form-label">Mandotory</label>

                                <label class="col-sm-1 col-form-label">Fee</label>

                                <label class="col-sm-2 col-form-label">Fee Type</label>

                                <label class="col-sm-2 col-form-label">Amount</label>

                                <label class="col-sm-2 col-form-label">Tax Applicable</label>

                                <label class="col-sm-2 col-form-label">Fee Payable</label>
                            </div>
                        </div>
                        @foreach($f_details as $fd)
                        <form id="form_{{$fd->id}}">
                            @csrf
                            <input type="hidden" name="product_data_id" value={{$prod_id}}>
                            <input type="hidden" name="account_id" value={{$account_id}}>
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

                        <input type="text" value={{$fd->id}} readonly class="form-control" name="fee_details_id">
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

                    </form>

                        @endforeach

                        <br>
                        <form action="/nominee" method="POST">
                            @csrf
                            <input type="hidden" name="product_data_id" value={{$prod_id}}>
                            <input type="hidden" name="account_id" value={{$account_id}}>
                            <input type="hidden" name="customer_id" value={{$customer_id}}>
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </form>
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
