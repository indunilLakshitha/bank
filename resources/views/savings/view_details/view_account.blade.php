@extends('layouts.app')


@section('content')
@isset($view_1)
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
                                    <input type="text" class="form-control" readonly value="{{$CIF}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Client Full Name</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="client_full_name"  readonly value="{{ isset($view_1_1->full_name ) ? $view_1_1->full_name : ''}}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                        </div>

                        <!-- <form action="/submit_all" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="branch_id" name="branch_id">
                            <input type="hidden" id="customer_id" name="customer_id">
                            <input type="hidden" id="account_number" name="account_number" value= > -->
                            <div class="row">
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
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">DOB</label>
                            <?php $dob=\App\Models\CustomerStatusDates::where('customer_id',$view_1_1->customer_id)->first()?>
                            <div class="col-sm-6">
                                @isset($dob)
                                <div class="form-group">
                                    <input type="text" name="dob"  id="dob" class="form-control" readonly valvalue="{{ $dob->date_of_birth }}">
                                </div>
                                @endisset
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer FATCA Clearance Received</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
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
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" name="identification_type_id"  id="identification_type_id" class="form-control" readonly value="{{ isset($view_1->PEP_clearance_received ) ? $view_1->PEP_clearance_received : ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br> <br>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Branch Code</label>
                            <?php $branch=\App\Models\Branch::where('id',$view_1->branch_id)->first()?>
                            <div class="col-sm-6">
                                @isset($branch)
                                <div class="form-group">
                                    <input type="text" class="form-control" id="branch_code" name="branch_code" readonly value="{{ $branch->branch_code}}">
                                </div>
                                @endisset
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Customer Rating</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">General Information</h4>
                            </div>
                        </div>
                        <div class="row">
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
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Options</label>
                            <div class="col-sm-8">
                                <div class="col-10">
                                    <div class="form-group">
                                        <!-- <input type="text" name="identification_number"  id="identification_number" class="form-control"> -->
                                        <div class="col"><input type="checkbox" class="form-control" disabled name="has_atm" <?php echo(@isset($view_1->has_atm) == 1 ? 'checked': '') ?>> ATM
                                        </div>
                                        <div class="col"><input type="checkbox" class="form-control" disabled name="has_sms" readonly <?php echo(@isset($view_1->has_sms) == 1 ? 'checked': '') ?>  > SMS
                                        </div>
                                        <div class="col"><input type="checkbox" class="form-control" disabled name="has_internet_banking"  readonly  <?php echo(@isset($view_1->has_internet_banking) == 1 ? 'checked': '') ?> >
                                            Internet Banking</div>
                                        <div class="col"><input type="checkbox" class="form-control" disabled name="has_mobile_banking" readonly  <?php echo(@isset($view_1->has_mobile_banking) == 1 ? 'checked': '') ?>  >
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
                                        @if(@isset($view_1->has_passbook) == 1)
                                        <input type="text" name="has_passbook"  id="has_passbook" class="form-control" readonly value="Pass Book" >
                                        @else
                                        <input type="text" name="has_passbook"  id="has_passbook" class="form-control" readonly value="No Pass Book" >
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endisset
@isset($view_2)

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

                                            <input type="text" name="product_type_id"  id="product_type_id" class="form-control" readonly value="">

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
                                            <input type="text" name="interest_type_id"  id="interest_type_id" class="form-control" readonly placeholder="{{ $view_2->interest_type_id}}">

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
                                            <input type="text" name="default_interest"  id="default_interest" class="form-control" readonly placeholder="{{ $view_2->default_interest}}">

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
                                            <input type="text" name="currency_id"  id="currency_id" class="form-control" readonly placeholder="{{ $view_2->currency_id}}">

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
                                            <input type="text" name="identification_number"  id="identification_number" class="form-control" readonly placeholder="{{ $view_1->identification_type_id}}">

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
                                            <input type="text" name="identification_number"  id="identification_number" class="form-control" readonly placeholder="{{ $view_1->identification_type_id}}">

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
                                            <input type="date" name="interest_credit_date" class="form-control" readonly placeholder="{{ $view_2->interest_credit_date}}">
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
                                            <input type="number" name="minimum_balance" readonly placeholder="{{ $view_2->minimum_balance}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                @endisset
                <div class="card ">
                    <div class="card-body ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Joint Acoount</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Main Holder</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="join_acc_main_holder" readonly value="{{ $view_1->customer_id}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">ID Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="text" name="identification_number"  id="identification_number" class="form-control"  readonly value="{{ $view_1->identification_number}}">

                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" id="oh_identification_number"
                                                placeholder="Identoty No" class="form-control">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Other Holder Name</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="oh_name">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <table class="table " id="search_by_name_results">

                            </table>
                        </div>

                        <div class="row">
                            <label for="" class="col-sm-2 col-form-label" >Selected Other Holder : </label>
                            <div class="col-sm-6">
                                <div class="form-control">
                            <input type="text" id="selected_oh" name="selected_oh" class="form-control" readonly>
                            </div>
                            </div>
                        </div>


                        <div class="card" style="border: solid">
                            <div class="card-header">Other Holders</div>
                            <div class="card-body">


                                <div class="row">
                                    <label class="col-sm-2 col-form-label"> Ownership Percentage</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="ownership_percentage">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"> Other Holder Signature</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <span class="btn btn-round btn-rose btn-file ">
                                                <span class="fileinput-new">Choose File</span>
                                                <input type="file" name="other_holder_sign_img" />
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a  class="btn btn-primary text-white float-right  btn-sm">Add</a>
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

                                </div>
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
                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-body ">
                                        <div class="card-header card-header-rose card-header-text">
                                            <div class="card-text">
                                                <h4 class="card-title">Documents</h4>
                                            </div>
                                        </div>
                                         <div class="row col-12 ">
                                        <div class="col-sm-12">
                                                  <label class="col-sm-2 col-form-label">Document Type</label>
                                                   <label class="col-sm-2 col-form-label">Mandotory</label>
                                                   <label class="col-sm-1 col-form-label">Availability</label>
                                                   <label class="col-sm-1 col-form-label"></label>
                                                   <label class="col-sm-1 col-form-label">Remark</label>
                                                   <label class="col-sm-3 col-form-label">Upload Document</label>
                                        </div>

                                    </div>
                                    <div class="row ">
                                        <label class="col-sm-2 col-form-label">Biling Proof</label>
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-1  checkbox">
                                            <div class="form-check ">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1  checkbox">
                                            <div class="form-check ">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="client_name" class="form-control">
                                            </div>
                                        </div>
                                        <span class="btn btn-round btn-rose btn-file ">
                                            <span class="fileinput-new">Choose File</span>
                                            <input type="file" name="..." />
                                        </span>
                                        <input type="button" class="btn btn-sm btn-fill " name="submit" value="Upload">
                                    </div>
                                    <div class="row ">
                                        <label class="col-sm-2 col-form-label">NIC Copy</label>
                                        <div class="col-sm-1">
                                        </div>

                                        <div class="col-sm-1  checkbox">
                                            <div class="form-check ">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1  checkbox">
                                            <div class="form-check ">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </div>
                                        <span class="btn btn-round btn-rose btn-file ">
                                            <span class="fileinput-new">Choose File</span>
                                            <input type="file" name="..." />
                                        </span>
                                        <input type="button" class="btn btn-sm btn-fill " name="submit" value="Upload">
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
                                        <div class="col-sm-12">
                                                  <label class="col-sm-1 col-form-label">Mandotory</label>

                                                   <label class="col-sm-1 col-form-label">Fee</label>

                                                   <label class="col-sm-2 col-form-label">Fee Type</label>

                                                   <label class="col-sm-2 col-form-label">Amount</label>

                                                   <label class="col-sm-2 col-form-label">Tax Applicable</label>

                                                   <label class="col-sm-2 col-form-label">Fee Payable</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                            <div class="form-check  ">
                                            <label class="form-check-label ">
                                                <input class="form-check-input " type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                            <label class=" col-form-label ">SMS Charges</label>
                                            <div class="col-sm-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <select name="fee_type"   class="form-control">
                                                                <option value="">Select </option>

                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <select name="fee_type"   class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                            <div class="form-check  ">
                                            <label class="form-check-label ">
                                                <input class="form-check-input " type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                            <label class=" col-form-label ">Closure Charges</label>
                                            <div class="col-sm-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <select name="fee_type"   class="form-control">
                                                                <option value="">Select </option>

                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <select name="fee_type"   class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                            <div class="form-check  ">
                                            <label class="form-check-label ">
                                                <input class="form-check-input " type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                            </label>
                                            </div>
                                            <label class=" col-form-label ">Activation Charges</label>
                                            <div class="col-sm-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <select name="fee_type"   class="form-control">
                                                                <option value="">Select </option>


                                                                <option value="">

                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" name="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <select name="fee_type"   class="form-control">
                                                                    <option value="">Select </option>

                                                                    <option value="">

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control">
                                            </div>
                                        </div>
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
                                    <div class="row">
                                            <label class="col-sm-2 col-form-label">Identification Type</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <select name=""   class="form-control">
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

                                            </div>
                                        </div>
                            </div>

                            <div class="card ">
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
                            </div>

                            <div class="card ">
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
                                    </div>
                                </form>
                        </div>



        </div>

    </div>
</div>


@endsection
