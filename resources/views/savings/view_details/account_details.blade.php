@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">

            <div class="card ">
                <div class="card-body ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">General Information</h4>
                        </div>
                    </div>

                    {{-- <div class="card-body "> --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">CIF</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"  >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Client Full Name</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="client_full_name"  readonly placeholder="{{ $data->client_full_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">ID Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" nme= "identification_type_id" readonly placeholder="{{$data->identification_type_id}}">
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" name="identification_number"  id="identification_number" readonly class="form-control" placeholder="{{$data->identification_number}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Lead source Identification</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="lead_source_identification"
                                            disabled value="{{$data->lead_source_identification}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Account Description</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="account_description" disabled
                                            value="{{$data->account_description}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Account Category</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" name="identification_number" id="identification_number"
                                            class="form-control" disabled value="{{$data->account_category}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Account Type</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" name="identification_number" id="identification_number"
                                            class="form-control" disabled value="{{$data->account_type}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Options</label>
                        <div class="col-sm-8">
                            <div class="col-10">
                                <div class="form-group">
                                    <div class="col"><input type="checkbox" class="form-control" name="has_atm"
                                            value="1" disabled @if ($data->has_atm == 1)
                                        checked
                                        @endif> ATM
                                    </div>
                                    <div class="col"><input type="checkbox" class="form-control" name="has_sms"
                                            value="1" disabled @if ($data->has_sms == 1)
                                        checked
                                        @endif> SMS
                                    </div>
                                    <div class="col"><input type="checkbox" class="form-control"
                                            name="has_internet_banking" value="1" disabled
                                            @if($data->has_internet_banking == 1)
                                        checked
                                        @endif>
                                        Internet Banking</div>
                                    <div class="col"><input type="checkbox" class="form-control"
                                            name="has_mobile_banking" value="1" disabled @if ($data->has_mobile_banking
                                        == 1)
                                        checked
                                        @endif>
                                        Mobile Banking</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Account Maintenance Via</label>
                        <div class="col-sm-8">
                            <div class="col-10">
                                <div class="form-group">
                                    <div class="col"><input type="checkbox" class="form-control" name="" value="1"
                                            disabled {{-- @if ($data->  == 1)
                                                checked
                                            @endif --}}>
                                        Account Statement</div>
                                    <div class="col"><input type="checkbox" class="form-control" name="has_passbook"
                                            value="1" disabled @if ($data->has_passbook == 1)
                                        checked
                                        @endif
                                        >Passbook</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="card ">
                <div class="card-body ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Product Details</h4>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Sub Product Type</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">

                                        <input type="text" name="product_type" id="product_type"
                                            class="form-control" disabled value="{{$data->product_type}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Interest Type</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" name="identification_number" id="identification_number"
                                            class="form-control" disabled value="{{$data->interest_type}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Interest Rate</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" name="identification_number" id="identification_number"
                                            class="form-control" disabled value="">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Currency</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" name="identification_number" id="identification_number"
                                            class="form-control" disabled value="{{$data->currency_name}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Account Level</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" name="identification_number" id="identification_number"
                                            class="form-control" disabled value="">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Initial Deposit Allow Mode</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" name="identification_number" id="identification_number"
                                            class="form-control" disabled value="">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Interest Credit Dated</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="date" name="interest_credit_date" class="form-control" disabled
                                            value="{{$data->interest_credit_date}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Minimum Balance to active the account</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="number" name="minimum_balance" disabled
                                            value="{{$data->minimum_balance}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card ">
                <div class="card-body ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Joint Acoount</h4>
                        </div>
                    </div>

                    {{-- <div class="row"> --}}
                    <table class="table ">
                        <tr>
                            <td>Customer ID</td>
                            <td>Ownsership Percentage</td>
                        </tr>

                    </table>
                    {{-- </div> --}}


                </div>
            </div>
            <div class="card ">
                <div class="card-body ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Operating Instructions</h4>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Minimum Authorization Required for a
                            Withdrawal</label>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" disabled value="{{$data->minimum_auth_count}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label"> Withdrawal Limit for Holder</label>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" disabled
                                    value="{{$data->withdrawal_limit_holder}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label"> Number of Holders</label>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" disabled value="{{$data->holders_count}}">
                            </div>
                        </div>
                    </div>


                </div>
            </div>



            <div class="card ">
                <div class="card-body ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Tax Details</h4>
                        </div>
                    </div>
                    <div class="row col-12 ">
                        <table class="table ">
                            <tr>
                                <td>Mandotory</td>
                                <td>Fee</td>
                                <td>Fee Type</td>
                                <td>Amount</td>
                                <td>Tax Applicable</td>
                                <td>Fee Payable Text</td>
                            </tr>
                            @foreach ($tax_dets as $item)
                            <tr>
                                <th>
                                        <div class="form-check ">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" disabled
                                                @if ($item->is_mandatory== 1 )
                                                checked
                                                @endif
                                                >
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                </th>
                                <th>{{$item->nominee_percentage}}</th>
                                <th>{{$item->fee_type}}</th>
                                <th>{{$item->amount}}</th>
                                <th>
                                    <div class="form-check ">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" disabled
                                            @if ($item->is_tax_applicable== 1 )
                                            checked
                                            @endif
                                            >
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                            </th>
                            <th>{{$item->fee_payable_text}}</th>
                            </tr>
                            @endforeach
                        </table>

                    </div>





                </div>
            </div>

            <div class="card ">
                <div class="card-body ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Nominee Instruction</h4>
                        </div>
                    </div>

                    <table class="table ">
                        <tr>
                            <td>Customer ID</td>
                            <td>Nomineee Percentage</td>
                        </tr>

                    </table>

                </div>
            </div>


            <div class="card ">
                <div class="card-body ">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title">Authorized Officer</h4>
                        </div>
                    </div>


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
