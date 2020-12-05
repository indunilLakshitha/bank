@extends('layouts.app')
@section('content')
{{-- <form method="get" action="/" class="form-horizontal"> --}}
<div class="card ">
    <div class="card-body ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Fix Deposit Account Creation</h4>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Branch</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input readonly type="text" class="form-control" id="" value="{{$branch->branch_name}}">
                    <input type="hidden" class="form-control" id="branch_code" name="branch_code"
                        value="{{$branch->branch_code}}">
                    <input type="hidden" class="form-control" id="branch_id" name="branch_id" value="{{$branch->id}}">
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
                    <input type="text" class="form-control" id="customer_id" name="customer_id">
                </div>
            </div>
            <a class="btn fa fa-search btn-info btn-sm" data-toggle="modal" href="#memberSearchModel"></a>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Product</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="sub_product" id="sub_product">
                    <input type="text" class="form-control" name="sub_product_id" id="sub_product_id">
                </div>
            </div>
            <a class="btn fa fa-search btn-info btn-sm" data-toggle="modal" href="#productSearchModel"></a>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Interest Rate</label>
            <div class="col-sm-2">
                <div class="form-group">
                    <input type="text" placeholder="Interest (%)" class="form-control" id="set_interest"
                        name="set_interest" oninput="calInterest(this.value)">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <input type="text" readonly placeholder="Int Min." id="min_interest" name="min_interest"
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
                    <input type="text" readonly placeholder="Int Max." class="form-control" name="max_interest"
                        id="max_interest">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-6">
                <div class="form-group">
                    <textarea name="account_description" id="account_description" cols="70" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Introducer</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="introducer_id" id="introducer_id">
                </div>
            </div>
            <a class="btn fa fa-search btn-info btn-sm" data-toggle="modal" href="#introducerSearchModel"></a>
        </div>
    </div>
</div>
{{-- </form> --}}
{{-- <form method="get" action="/" class="form-horizontal"> --}}
<div class="card col-6">
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
                    <input type="text" class="form-control" id="deposite_amount" name="deposite_amount">
                </div>
            </div>
        </div>
        <div class="row">

            <label class="col-sm-2 col-form-label">Starting Date</label>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="date" readonly class="form-control" id="start_date" name="start_date">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Deposit Type</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="deposite_type_id" id="deposite_type_id">
                    <input type="text" readonly class="form-control" name="deposite_type" id="deposite_type">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Int Type</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="fd_interest_type_id" id="fd_interest_type_id">
                    <input type="text" readonly class="form-control" name="fd_interest_type" id="fd_interest_type">
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
                    <input type="date" readonly placeholder="Int Min." class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Auto Renew</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Savings Account</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control">
                </div>
            </div>
            <a class="btn fa fa-search btn-info btn-sm" data-toggle="modal" href="#introducerSearchModel"></a>
            <a class="btn fa  btn-danger btn-sm form-control d-none" id="create" >CREATE</a>
        </div>
    </div>
</div>
{{-- </form> --}}
<div class="row d-none">
    <div class="col">
        <div class="card ">
            <div class="card-body ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Investor</h4>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Investor</label>
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
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card ">
            <div class="card-body ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Nominee</h4>
                    </div>
                </div>
                <div class="row">
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
                </div>
            </div>
        </div>
    </div>
</div>
@include('fd.models.member_search')
@include('fd.models.product_search')
@include('fd.models.introducer')


<script>

 function calInterest(interest){
     console.log(interest)
    let min=min_interest.value
    let max=max_interest.value
    if(min<interest<max){
        create.classList.remove('d-none')

    }else{
        create.classList.add('d-none')

    }
}

</script>
@endsection