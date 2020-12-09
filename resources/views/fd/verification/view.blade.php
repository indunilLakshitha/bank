@extends('layouts.app')
@section('content')
@isset($fD)
<div class="card col-10 ">
    <div class="card-body ">
         <div class="card-body mt-2 mb-2" style="border: solid">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Fix Deposit Details</h4>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Branch</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input readonly type="text" class="form-control" id="" value="{{$fD->branch_name}}">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Opaning Date</label>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="date" readonly class="form-control" id="">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Member</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{$fD->customer_id}}">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Product</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="sub_product" id="sub_product" value="{{$fD->sub_product}}">
                    <input type="text" class="form-control" name="sub_product_id" id="sub_product_id" value="{{$fD->sub_product_id}}">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Interest Rate</label>
            <div class="col-sm-2">
                <div class="form-group">
                    <input type="text" placeholder="Interest (%)" class="form-control" id="set_interest"
                      value="{{$fD->set_interest}}%"  name="set_interest" >
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <input type="text" readonly placeholder="Int Min." id="min_interest" value="{{$fD->min_interest}}%" name="min_interest"
                        class="form-control">
                </div>
            </div>
            <label class="col-sm-1 col-form-label">(Yearly)</label>
        </div>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <input type="text" readonly placeholder="Int Max." class="form-control" value="{{$fD->max_interest}}%" name="max_interest"
                        id="max_interest">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-6">
                <div class="form-group">
                    <textarea name="account_description" id="account_description" value="{{$fD->account_description}}" cols="70" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Introducer</label>
            <div class="col-sm-4">
                <?php $introducer = \App\Models\CustomerBasicData::where('customer_id',$fD->introducer_id)->first(); ?>
                @isset($introducer)
                <div class="form-group">
                    <input type="text" class="form-control" name="introducer_id" value="{{$introducer->full_name}}" id="introducer_id">
                </div>
                @endisset
            </div>

        </div>
    </div>
    </div>
</div>
<div class="card col-10 ">
    <div class="card-body ">
    <div class="card-body mt-2 mb-2" style="border: solid">
        {{-- <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Fix Deposit Account Creation</h4>
                </div>
            </div> --}}

        <div class="row">
            <label class="col-sm-2 col-form-label">Deposit Value</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="deposite_amount" value="{{$fD->deposite_amount}}" name="deposite_amount">
                </div>
            </div>
        </div>
        <div class="row">

            <label class="col-sm-2 col-form-label">Starting Date</label>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="date" readonly class="form-control" value="{{$fD->start_date}}" id="start_date" name="start_date">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Deposit Type</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <?php $depType = \App\Models\DepositeType::where('id',$fD->deposite_type_id)->first(); ?>
                    <input type="hidden" class="form-control" name="deposite_type_id" value="{{$fD->deposite_type_id}}" id="deposite_type_id">
                    @isset($depType)
                    <input type="text" readonly class="form-control" name="deposite_type" value="{{$depType->deposite_type}}" id="deposite_type">
                    @endisset
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Int Type</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <?php $intType = \App\Models\FdInterestType::where('id',$fD->fd_interest_type_id)->first(); ?>
                    <input type="hidden" class="form-control" name="fd_interest_type_id" value="{{$fD->fd_interest_type_id}}" id="fd_interest_type_id">
                    @isset($intType)
                    <input type="text" readonly class="form-control" name="fd_interest_type" value="{{$intType->fd_interest_type}}" id="fd_interest_type">
                    @endisset
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">No of Period</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" placeholder="Interest (%)" class="form-control">
                </div>
            </div>

        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Expired Date</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="date" readonly placeholder="Int Min." class="form-control" vlue="{{$fD->close_date }}">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Auto Renew</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" vlue="{{$fD->num_of_renew}}">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Savings Account</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" vlue="{{$fD->saving_account_id}}">
                </div>
            </div>

        </div>
    </div>
</div>
</div>
@foreach($fd_ins as $fd_in)
    @if(!empty($fd_in))
<div class="card col-10 ">
    <div class="card-body ">
         <div class="card-body mt-2 mb-2" style="border: solid">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Investor</h4>
                    </div>
                </div>
                 <table class="table table-striped table-bordered" id="bene_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fd Account Id</th>
                                <th>Customer Id</th>

                            </tr>
                        </thead>
                        <tbody id="bene_body">
                            @isset($fd_ins)

                            @foreach($fd_ins as $fd_in)
                            <tr>
                                <td>{{$fd_in->id}}</td>
                                <td>{{$fd_in->fd_account_id}} </td>
                                <td>{{$fd_in->customer_id}}</td>
                            </tr>
                            @endforeach
                            @endisset


                        </tbody>
                    </table>
                <!-- <div class="row">
                    <label class="col-sm-2 col-form-label">Investor</label>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="meber">
                        </div>
                    </div>
                    <button class="btn fa fa-search btn-sm btn-info btn"></button>
                </div> -->
                <!-- <div class="row">

                    <div class="col-5 text-right">
                        <a class="btn btn-rose btn-sm text-white" style="text-align: center">Insert</a>
                    </div>
                    <div class="col-1 text-right">
                        <button type="submit" class="btn btn-sm">Remove</button>
                    </div>
                </div> -->
                <!-- <div class="card-body ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="material-datatables">
                                <table id="datatables" class="table   table-bordered table-hover" cellspacing="0"
                                    width="100%" style="width:100%">
                                    <thead>
                                        <th>Code</th>
                                    </thead>
                                    <tbody id="datatables_body">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    @endif
    @break
    @endforeach
    @foreach($fd_ns as $fd_n)
    @if(!empty($fd_n))
<div class="card col-10 ">
    <div class="card-body ">
         <div class="card-body mt-2 mb-2" style="border: solid">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Nominee</h4>
                    </div>
                </div>
                <table class="table table-striped table-bordered" id="bene_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fd Account Id</th>
                                <th>Customer Id</th>

                            </tr>
                        </thead>
                        <tbody id="bene_body">
                            @isset($fd_ns)

                            @foreach($fd_ns as $fd_n)
                            <tr>
                                <td>{{$fd_n->id}}</td>
                                <td>{{$fd_n->fd_account_id}} </td>
                                <td>{{$fd_n->customer_id}}</td>
                            </tr>
                            @endforeach
                            @endisset


                        </tbody>
                    </table>
                <!-- <div class="row">
                    <label class="col-sm-2 col-form-label">Member</label>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="meber">
                        </div>
                    </div>
                    <button class="btn fa fa-search btn-sm btn-info btn"></button>
                </div>
                <div class="row">
                    <div class="col-5 text-right">
                        <a class="btn btn-rose btn-sm text-white" style="text-align: center">Insert</a>
                    </div>
                    <div class="col-1 text-right">
                        <button type="submit" class="btn btn-sm">Remove</button>
                    </div>
                </div>
                <div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="material-datatables">
                                    <table id="datatables" class="table   table-bordered table-hover" cellspacing="0"
                                        width="100%" style="width:100%">
                                        <thead>
                                            <th>Code</th>
                                        </thead>
                                        <tbody id="datatables_body">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endif
    @break
    @endforeach
@endisset


@endsection
