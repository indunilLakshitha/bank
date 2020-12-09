@extends('layouts.app')


@section('content')
@isset($view_1)
<div class="col-9">
    <div class="card-text">
        <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
    </div>
</div>
<fieldset disabled="disabled">
    @if(!empty($view_1_1) && !empty($view_1))
    <div class="content">
        <div class="container-fluid">

            <div class="col-md-12">

                <div class="card col-12 " style="border: solid">

                    <div class="card ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Client Details</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <!-- <div class="row">
                            <label class="col-sm-2 col-form-label">CIF</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly value="{{$CIF}}">
                                </div>
                            </div>
                        </div> -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label"> Client Full Name</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="client_full_name" readonly
                                            value="{{ isset($view_1_1->full_name ) ? $view_1_1->full_name : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Date Of Birth</label>
                                <?php $dob=\App\Models\CustomerStatusDates::where('customer_id',$view_1_1->customer_id)->first()?>
                                <div class="col-sm-4">
                                    @isset($dob)
                                    <div class="form-group">
                                        <input type="text" name="dob" id="dob" class="form-control" readonly
                                            value="{{$dob->date_of_birth}}">
                                    </div>
                                    @endisset
                                </div>
                            </div>
                            <!-- <div class="row">
                            <label class="col-sm-2 col-form-label">Customer FATCA Clearance Received</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="text" name="identification_type_id"  id="identification_type_id" class="form-control" readonly value="{{ isset($view_1->FATCA_clearance_received ) ? $view_1->FATCA_clearance_received : ''}}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer PEP Clearance Received</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="text" name="identification_type_id"  id="identification_type_id" class="form-control" readonly value="{{ isset($view_1->PEP_clearance_received ) ? $view_1->PEP_clearance_received : ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                            <!-- <div class="row">
                            <label class="col-sm-2 col-form-label">ID Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <?php $id_types=\App\Models\IedentificationType::where('id',$view_1_1->identification_type_id )->first()?>
                                    <div class="col-4">
                                        @isset($id_types)
                                        <div class="form-group">
                                            <input type="text" class="form-control" nme= "identification_type_id" readonly value="{{ $id_types->identification_type }}">
                                        </div>
                                        @endisset
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" name="identification_number"  id="identification_number" readonly class="form-control" value="{{ isset($view_1_1->identification_number ) ? $view_1_1->identification_number : ''}}">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div> -->

                            <!-- <form action="/submit_all" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="branch_id" name="branch_id">
                            <input type="hidden" id="customer_id" name="customer_id">
                            <input type="hidden" id="account_number" name="account_number" value= > -->
                            <!-- <div class="row">
                            <label class="col-sm-2 col-form-label" >Full Name</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" name="full_name" class="form-control" id="full_name" readonly value="{{ isset($view_1_1->full_name ) ? $view_1_1->full_name : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="text" name="identification_type_id"  id="identification_type_id" class="form-control" readonly value="{{ $view_1->identification_type_id}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->



                            <div class="row">
                                <label class="col-sm-2 col-form-label">Branch Code</label>
                                <?php $branch=\App\Models\Branch::where('id',$view_1->branch_id)->first()?>
                                <div class="col-sm-2">
                                    @isset($branch)
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="branch_code" name="branch_code"
                                            readonly value="{{ $branch->branch_code}}">
                                    </div>
                                    @endisset
                                </div>
                            </div>

                            <!-- <div class="row">
                            <label class="col-sm-2 col-form-label">Customer Rating</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly value="">
                                </div>
                            </div>
                        </div> -->
                            <!-- <div class="row">
                            <label class="col-sm-2 col-form-label">Customer Signature</label>
                            <div class="col-sm-8">
                                <div class="col-10">
                                    <div class="form-group">
                                        @if(!empty(@isset($view_1->sign_img)))
                                        <img src="{{env('IMAGE_LOCATION').$view_1->sign_img}}" height="200px" width="300px" alt="">
                                        @else
                                        <img src="/bank/public/images/default.png" height="100px" width="100px" alt="">
                                        @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        </div>
                    </div>

                    <div class="card col-12 " style="border: solid">

                        <div class="card ">
                            <div class="card-body ">
                                <div class="card-header card-header-rose card-header-text">
                                    <div class="card-text">
                                        <h4 class="card-title">General Information</h4>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <!-- <div class="row">
                            <label class="col-sm-2 col-form-label">Lead source Category</label>
                            <?php $led_id=\App\Models\LeadSource::where('id',$view_1->lead_source_category_id)->first()?>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        @isset($led_id)
                                        <div class="form-group">
                                            <input type="text" name="lead_source_category_id"  id="lead_source_category_id" class="form-control" readonly value="{{ $led_id->lead_source_category}}">
                                        </div>
                                        @endisset
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
                                            <input type="text" class="form-control" name="lead_source_identification" readonly value="{{ isset($view_1->lead_source_identification ) ? $view_1->lead_source_identification : ''}}">

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
                                            <input type="text" class="form-control" name="account_description" readonly value="{{ isset($view_1->account_description ) ? $view_1->account_description : ''}}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Account Category</label>
                            <?php $acc_cat=\App\Models\AccountCategory::where('id',$view_1->account_category_id )->first()?>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        @isset($acc_cat)
                                        <div class="form-group">
                                            <input type="text" name="account_category_id"  id="account_category_id" class="form-control"  readonly value="{{ $acc_cat->account_category}}">
                                        </div>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Account Type</label>
                            <?php $acc_typ=\App\Models\AccountCategory::where('id',$view_1->account_type_id )->first()?>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        @isset($acc_typ)
                                        <div class="form-group">
                                            <input type="text" name="account_type_id"  id="account_type_id" class="form-control"   readonly value="{{ $acc_typ->account_type}}">
                                        </div>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div> -->
                                <div class="row">
                                    <label class="col-sm-1 col-form-label">Options</label>

                                    <div class="col-sm-10">
                                        <div class="col-10">
                                            <div class="form-group">
                                                <!-- <input type="text" name="identification_number"  id="identification_number" class="form-control"> -->
                                                @if($view_1->has_atm == 1)
                                                <div class="col">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <span style="font-size: 100%;"
                                                                class="badge badge badge-rose">ATM</span>
                                                        </div>
                                                        @else
                                                        @endif
                                                        <div class="form-group">
                                                            @if($view_1->has_sms == 1)
                                                            <span style="font-size: 100%;"
                                                                class="badge badge badge-rose">SMS</span>
                                                        </div>

                                                    </div>
                                                </div>

                                                @else
                                                @endif
                                                @if($view_1->has_internet_banking == 1)
                                                <div class="col">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <span style="font-size: 100%;"
                                                                class="badge badge badge-rose">Internet Banking</span>
                                                        </div>
                                                        @else
                                                        @endif
                                                        <div class="form-group">
                                                            @if($view_1->has_mobile_banking == 1)
                                                            <span style="font-size: 100%;"
                                                                class="badge badge badge-rose">
                                                                Mobile Bankin</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                @else
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Account Maintenance Via</label>
                                    <div class="col-sm-6">
                                        <div class="col-10">
                                            <div class="form-group">
                                                <!-- <input type="text" name="identification_number"  id="identification_number" class="form-control"> -->
                                                @if(!empty(@isset($view_1->has_passbook)))
                                                <div class="col">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <span style="font-size: 100%;"
                                                                class="badge badge badge-rose">Passbook</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    @endisset
                    @endif
                    @if(!empty($view_2))
                    @isset($view_2)
                    <div class="card col-12 " style="border: solid">

                        <div class="card ">
                            <div class="card-body ">
                                <div class="card-header card-header-rose card-header-text">
                                    <div class="card-text">
                                        <h4 class="card-title">Product Details</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Sub Product Type</label>
                                    <?php $pro_typ=\App\Models\SubAccount::where('id',$view_2->product_type_id)->first()?>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-5">
                                                @isset($pro_typ)
                                                <div class="form-group">
                                                    <input type="text" name="product_type_id" id="product_type_id"
                                                        class="form-control" readonly
                                                        value="{{$pro_typ->sub_account_description}}">
                                                </div>
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Interest Type</label>
                                    <?php $interestType=\App\Models\InterestType::where('id',$view_2->interest_type_id)->first()?>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-5">
                                                @isset($interestType)
                                                <div class="form-group">
                                                    <input type="text" name="interest_type_id" id="interest_type_id"
                                                        class="form-control" readonly
                                                        placeholder="{{ $interestType->interest_type}}">
                                                </div>
                                                @endisset
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
                                                    <input type="text" name="default_interest" id="default_interest"
                                                        class="form-control" readonly
                                                        value="{{ isset($view_2->interest_rate  ) ? $view_2->interest_rate  : ''}}">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Currency</label>
                                    <?php $currency=\App\Models\Currency::where('id',$view_2->currency_id)->first()?>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-5">
                                                @isset($currency)
                                                <div class="form-group">
                                                    <input type="text" name="" id="" class="form-control" readonly
                                                        placeholder="{{ $currency->currency_name}}">
                                                </div>
                                                @endisset
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
                                                    <input type="text" name="" id="" class="form-control" value="{{ isset($view_2->account_level  ) ? $view_2->account_level  : ''}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Initial Deposit Allow Mode</label>
                                    <?php $deposite_mode=\App\Models\DepositeMode::where('id',$view_2->deposite_mode_id)->first()?>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-5">
                                                @isset($deposite_mode)
                                                <div class="form-group">
                                                    <input type="text" name="deposite_mode_id" id="deposite_mode_id"
                                                        class="form-control" readonly
                                                        placeholder="{{ $deposite_mode->deposite_mode}}">
                                                </div>
                                                @endisset
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
                                                    <input type="text" name="interest_credit_date" class="form-control"
                                                        readonly
                                                        value="{{ isset($view_2->interest_credit_date  ) ? $view_2->interest_credit_date : ''}}">
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
                                                    <input type="number" class="form-control" name="minimum_balance" readonly
                                                        value="{{ isset($view_2->minimum_balance ) ? $view_2->minimum_balance : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    @endisset
                    @endif
                    <!-- Beneficiary -->

                    @foreach($view_5_1 as $v)
                    @foreach($view_5_2 as $v2)
                    @if(!empty($view_5_1) && !empty($view_5_2))
                    <div class="card col-12 " style="border: solid">

                        <div class="card ">
                            <div class="card-body ">
                                <div class="card-header card-header-rose card-header-text">
                                    <div class="card-text">
                                        <h4 class="card-title">Beneficiaries</h4>
                                    </div>
                                </div>


                                @isset($view_5_1)
                                <br>
                                <br>
                                @csrf
                                <h5 class="">Beneficiaries</h5>
                                <table class="table table-striped table-bordered" id="bene_table">
                                    <thead>
                                        <tr>
                                            <th>Customer ID</th>
                                            <th>Beneficiary ID</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bene_body">
                                        @foreach($view_5_1 as $view_5_11)
                                        <tr>
                                            <td>{{$view_5_11->customer_id}} </td>
                                            <td> {{$view_5_11->name_in_use}}</th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @endisset
                                <br>
                                <br>
                                <h5 class="">Guardians</h5>
                                @isset($view_5_2)
                                <table class="table table-striped table-bordered" id="guard_table">
                                    <thead>
                                        <tr>
                                            <th>Customer ID</th>
                                            <th>Guardian Name</th>
                                        </tr>
                                    </thead>
                                    <tbody id="guard_body">
                                        @foreach($view_5_2 as $view_5_22)
                                        <tr>
                                            <td>{{$view_5_22->customer_id}} </td>
                                            <td> {{$view_5_22->name_in_use}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @endisset

                                {{-- Ends Private 1 --}}
                            </div>
                        </div>

                    </div>
                    @endif
                    @break
                    @endforeach
                    @break
                    @endforeach

                    @foreach($view_8 as $v)
                    @foreach($view_8_1 as $v2)

                    @if(!empty($v) && !empty($v2))
                    @isset($view_8,$view_8_1)
                    <div class="card col-12 " style="border: solid">

                        <div class="card ">
                            <div class="card-body ">
                                <div class="card-header card-header-rose card-header-text">
                                    <div class="card-text">
                                        <h4 class="card-title">Joint Acoount</h4>
                                    </div>
                                </div>


                                <table class="table table-striped table-bordered" readonly id="joint_acc">
                                    <thead>
                                        <tr>
                                            <th>Main Holder</th>
                                            <th>Other Holder Name</th>
                                            <!-- <th>Fee Type</th>
                                        <th>Amount</th>
                                        <th>Tax Applicable</th>
                                        <th>Fee Payable</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="document_body">
                                        @foreach($view_8 as $view_88)
                                        @foreach($view_8_1 as $view_8_11)
                                        <?php $main=\App\Models\CustomerBasicData::where('customer_id',$view_88->customer_id)->first()?>
                                        <?php $Other=\App\Models\CustomerBasicData::where('id',$view_8_11->customer_id)->first()?>

                                        @isset($main,$Other)
                                        <tr>
                                            <td>{{$main->name_in_use}}</td>
                                            <td>{{$Other->name_in_use}}></th>
                                                <!-- <td><input type="checkbox" readonly ></td>
                                            <td>{{$ft->fee_type}}<td>
                                            <td>{{$view_66->amount}}</td>
                                            <td><input type="checkbox" readonly <?php echo(@isset($fd->is_tax_applicable) == 1 ? 'checked': '') ?>></td>
                                            <td>{{$view_66->fee_payble_text}}</td> -->
                                        </tr>
                                        @endisset
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endisset
                    @endif
                    @break
                    @endforeach
                    @break
                    @endforeach
                    <!-- <div class="card ">
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
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Withdrawal Limit for Holder</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Number of Holders</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary">SUBMIT</a>

                    </div>
                </div>

                <div class="card ">
                    <div class="card-body ">
                            <div class="card-header card-header-rose card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">Guardian Information</h4>
                                </div>
                            </div>
                            <div class="row">
                                    <label class="col-sm-2 col-form-label">Identification Type</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <select name="gaurdian_identification_type_id" id="gaurdian_identification_type_id" class="form-control">
                                                        <option value="">Select</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <input type="text" id="gaurdian_identification_id" name="gaurdian_identification_id"
                                                        placeholder="Iditification No" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label"> Client Name</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="client_name" class="form-control">
                                            </div>
                                        </div>

                                </div> -->
                    <!-- {{-- <div class="card" style="border: solid">
                                    <div class="row">
                                    <label class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <select name="title"   class="form-control">
                                                        <option value="">Select </option>
                                                        @isset($idtypes)
                                                        @foreach ($idtypes as $idtype)
                                                        <option value="{{$idtype->id}}">
                                                            {{$idtype->identification_type}}
                                                            @endforeach
                                                            @endisset
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="g_first_name">
                                            </div>
                                        </div>
                                    </div>
                                            <div class="row">
                                        <label class="col-sm-2 col-form-label">Initials</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                            <div class="row">
                                        <label class="col-sm-2 col-form-label">Name Denoted by Initials</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                            <div class="row">
                                        <label class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="g_last_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Idintification Type</label>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <select name=""   class="form-control">
                                                            <option value="">Select </option>

                                                            <option value="">

                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label"> Idintification No</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="g_id_no">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Relationship</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Address Type</label>
                                        <div class="col-sm-2">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <select name=""   class="form-control">
                                                            <option value="">Select </option>

                                                            <option value="">

                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Address Line 1" id="g_a_l_2">
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Address Line 2" id="g_a_l_1">
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="City">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Postal Code">
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Telephone No Type</label>
                                            <div class="col-sm-2">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <select name=""   class="form-control">
                                                                <option value="">Select </option>

                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">Telephone No</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <input type="text" name="" class="form-control">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Email Type</label>
                                            <div class="col-sm-2">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <select name=""   class="form-control">
                                                                <option value="">Select </option>

                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <input type="text" name="email" class="form-control">
                                                            </div>
                                                        </div>
                                                </div>
                                        </div>
                                    </div> --}} -->
                    <!-- </div>
                            </div> -->
                    @foreach($view_5 as $v5)
                    @if(!empty($v5))
                    @isset($view_5)
                    <div class="card col-12 " style="border: solid">

                        <div class="card ">
                            <div class="card-body ">
                                <div class="card-header card-header-rose card-header-text">
                                    <div class="card-text">
                                        <h4 class="card-title">Documents</h4>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered" readonly id="document">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Document Type</th>
                                            <th colspan="6">Document</th>
                                            <th colspan="2">Mandatory</th>
                                            <th colspan="2">Availability</th>
                                            <th colspan="2">Remark</th>

                                        </tr>
                                    </thead>
                                    <tbody id="document_body">
                                        @foreach($view_5 as $view_55)
                                        <?php $doc=\App\Models\Document::where('id',$view_55->document_id)->first()?>
                                        @isset($doc)
                                        <tr>
                                            <td colspan="2">{{$doc->document_name}} </td>
                                            @if(!empty($doc->img)))
                                            <td colspan="6"><img src="{{env('IMAGE_LOCATION').$doc->img}}"
                                                    height="200px" width="300px" alt=""></td>
                                            @else
                                            <td colspan="6"><img src="/bank/public/images/default.png" height="100px"
                                                    width="100px" alt=""></td>
                                            @endif</td>
                                            <td colspan="2"> <input type="checkbox" readonly
                                                    <?php echo(@isset($doc->is_mandatory) == 1 ? 'checked': '') ?>></th>
                                            <td colspan="2"><input type="checkbox" readonly></td>
                                            <td colspan="2"><input type="text" readonly>
                                            <td>
                                        </tr>
                                        @endisset
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    @endisset
                    @endif
                    @break
                    @endforeach

                    @foreach($view_6 as $v)
                    @if(!empty($v))
                    @isset($view_6)
                    <div class="card col-12 " style="border: solid">

                        <div class="card ">
                            <div class="card-body ">
                                <div class="card-header card-header-rose card-header-text">
                                    <div class="card-text">
                                        <h4 class="card-title">Tax Details</h4>
                                    </div>
                                </div>
                                <table class="table table-bordered" readonly id="t">
                                    <thead>
                                        <tr>

                                            <th>Mandotory</th>
                                            <th>Fee</th>
                                            <th>Fee Type</th>
                                            <th>Amount</th>
                                            <th>Tax <br>Applicable</th>
                                            <th>Fee <br> Payable</th>
                                        </tr>
                                    </thead>
                                    <tbody id="t_body">
                                        @foreach($view_6 as $view_66)
                                        <?php $fd=\App\Models\FeeDetails::where('id',$view_66->fee_details_id)->first()?>
                                        <?php $ft=\App\Models\FeeType::where('id',$view_66->fee_type_id)->first()?>
                                        @isset($ft,$fd)
                                        <tr>
                                            <td> <?php echo(@isset($fd->is_mandatory) == 1 ? 'Checked': '') ?></td>
                                            <td>{{$fd->id}}</td>
                                            <td>{{$ft->fee_type}}
                                            <td>
                                            <td>{{$view_66->amount}}</td>
                                            <td> <?php echo(@isset($fd->is_tax_applicable) == 1 ? 'Checked': '')?></td>
                                            <td>{{$view_66->fee_payble_text}}</td>
                                        </tr>
                                        @endisset
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endisset
                    @endif
                    @break
                    @endforeach

                    @foreach($view_7 as $v)
                    @if(!empty($v))
                    @isset($view_7)
                    <div class="card col-12 " style="border: solid">

                        <div class="card ">
                            <div class="card-body ">
                                <div class="card-header card-header-rose card-header-text">
                                    <div class="card-text">
                                        <h4 class="card-title">Nominee Instruction</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Identification Type</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input type="text" name="gaurdian_identification_type_id"
                                                        placeholder="Iditification No" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <input type="text" name="gaurdian_identification_type_id"
                                                        placeholder="Iditification No" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label"> Client Name</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="client_name" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endisset


                            <!-- <div class="card" style="border: solid">
                                            <div class="row">
                                            <label class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <select name="title"   class="form-control">
                                                                <option value="">Select </option>

                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">First NAme</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Initials</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Name Denoted by Initials</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Last Name</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Idintification Type</label>
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <div class="form-group">
                                                                <select name="identification_type_id"   class="form-control">
                                                                    <option value="">Select </option>
                                                                    @isset($idtypes)
                                                                    @foreach ($idtypes as $idtype)
                                                                    <option value="{{$idtype->id}}">
                                                                        {{$idtype->identification_type}}
                                                                        @endforeach
                                                                        @endisset
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label"> Idintification No</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Relationship</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Address Type</label>
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="form-group">
                                                                <select name="identification_type_id"   class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Address Line1">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Address Line1">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="City">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Postal COde">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Telephone No Type</label>
                                                    <div class="col-sm-2">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <select name=""   class="form-control">
                                                                        <option value="">Select </option>

                                                                        <option value="">

                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Telephone No</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="text" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Email Type</label>
                                                    <div class="col-sm-2">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <select name=""   class="form-control">
                                                                        <option value="">Select </option>

                                                                        <option value="">

                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">Email</label>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" name="email" class="form-control">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    <div class="col-5 text-right">
                                                        <button class="btn btn-rose">Add</button>
                                                    </div>
                                                </div>

                                            </div> -->
                        </div>
                    </div>
                    @endif
                    @break
                    @endforeach

                    <!-- <div class="card ">
                                <div class="card-body ">
                                        <div class="card-header card-header-rose card-header-text">
                                            <div class="card-text">
                                                <h4 class="card-title">Correspondance</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Address </label>
                                            <div class="col-sm-3">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="form-group">
                                                                <select name="identification_type_id"   class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                        <div class="row">
                                                <label class="col-sm-2 col-form-label">Address Type</label>
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="form-group">
                                                                <select name="identification_type_id"   class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Address Line1">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Address Line1">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="City">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Postal COde">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Telephone </label>
                                                    <div class="col-sm-3">
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <div class="form-group">
                                                                        <select name="identification_type_id"   class="form-control">
                                                                            <option value="">Select </option>

                                                                            <option value="">

                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Telephone No Type</label>
                                                    <div class="col-sm-2">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <select name="identification_type_id"   class="form-control">
                                                                        <option value="">Select </option>

                                                                        <option value="">

                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Telephone No</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="text" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                            <label class="col-sm-3 col-form-label">Email </label>
                                                            <div class="col-sm-3">
                                                                    <div class="row">
                                                                        <div class="col-8">
                                                                            <div class="form-group">
                                                                                <select name="identification_type_id"   class="form-control">
                                                                                    <option value="">Select </option>

                                                                                    <option value="">

                                                                                </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Email Type</label>
                                                    <div class="col-sm-2">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <select name=""   class="form-control">
                                                                        <option value="">Select </option>

                                                                        <option value="">

                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">Email</label>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" name="email" class="form-control">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    <div class="col-5 text-right">
                                                        <button     class="btn btn-rose">Add</button>
                                                    </div>
                                                </div>
                                </div>
                            </div> -->

                    <!-- <div class="card ">
                                <div class="card-body ">
                                    <div class="card-header card-header-rose card-header-text">
                                        <div class="card-text">
                                            <h4 class="card-title">Authorized Officer</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <label class="col-sm-2 col-form-label">Identification Type</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <select name="gaurdian_identification_type_id"   class="form-control">
                                                                <option value="">Select</option>
                                                                @isset($idtypes)
                                                                @foreach ($idtypes as $idtype)
                                                                <option value="{{$idtype->id}}">
                                                                    {{$idtype->identification_type}}
                                                                    @endforeach
                                                                    @endisset
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <input type="text" name="gaurdian_identification_type_id"
                                                                placeholder="Iditification No" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label"> Client Name</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" name="client_name" class="form-control">
                                                    </div>
                                                </div>
                                                <a href="" class="btn btn-primary">Search</a>
                                        </div>
                                        <div class="card" style="border: solid">
                                            <div class="row">
                                            <label class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <select name="title"   class="form-control">
                                                                <option value="">Select </option>

                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">First NAme</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Initials</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Name Denoted by Initials</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="row">
                                                <label class="col-sm-2 col-form-label">Last Name</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Idintification Type</label>
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <div class="form-group">
                                                                <select name="identification_type_id"   class="form-control">
                                                                    <option value="">Select </option>
                                                                    @isset($idtypes)
                                                                    @foreach ($idtypes as $idtype)
                                                                    <option value="{{$idtype->id}}">
                                                                        {{$idtype->identification_type}}
                                                                        @endforeach
                                                                        @endisset
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label"> Idintification No</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Relationship</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Address Type</label>
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="form-group">
                                                                <select name="identification_type_id"   class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Address Line1">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Address Line1">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="City">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Postal COde">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Telephone No Type</label>
                                                    <div class="col-sm-2">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <select name="identification_type_id"   class="form-control">
                                                                        <option value="">Select </option>

                                                                        <option value="">

                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Telephone No</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="text" name="" class="form-control">
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">Email Type</label>
                                                    <div class="col-sm-2">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <select name="identification_type_id"   class="form-control">
                                                                        <option value="">Select </option>

                                                                        <option value="">

                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-3 col-form-label">Email</label>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <input type="text" name="email" class="form-control">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    <div class="col-5 text-right">
                                                        <button  class="btn btn-rose">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

</fieldset>
@endsection
