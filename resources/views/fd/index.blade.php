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
                    <input type="date" placeholder="" id="close_date" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Auto Renew</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="is_auto_renew">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Savings Account</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="saving_account_id">
                </div>
            </div>
            <a class="btn fa fa-search btn-info btn-sm" data-toggle="modal" href="#noticeModal"></a>
            <a class="btn fa  btn-danger btn-sm form-control d-none" id="create" onclick="createFd()">CREATE</a>
        </div>
    </div>
</div>
{{-- </form> --}}
{{-- <div class="row d-none" id="inv"> --}}
<div class="row " id="inv">
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
                            <input type="text" class="form-control" id="meber" oninput="findInvester(this.value)">
                            <input type="text" class="form-control" id="account_id">
                        </div>
                    </div>
                    {{-- <button class="btn fa fa-search btn-sm btn-info btn"></button> --}}
                </div>
                <div class="row">

                    {{-- <div class="col-5 text-right">
                        <a class="btn btn-rose btn-sm text-white" style="text-align: center">Insert</a>
                    </div>
                    <div class="col-1 text-right">
                        <button type="submit" class="btn btn-sm">Remove</button>
                    </div> --}}
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="material-datatables">
                                <table id="datatables" class="table   table-bordered table-hover" cellspacing="0"
                                    width="100%" style="width:100%">
                                    <thead>
                                        = </thead>
                                    <tbody id="investor_data">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="material-datatables">
                                <table id="datatables" class="table   table-bordered table-hover" cellspacing="0"
                                    width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Fd Account Id</th>
                                            <th>Customer Id</th>
                                        </tr>
                                    </thead>
                                    <tbody id="inv_list">
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
                            <input type="text" class="form-control" id="meber" oninput="findNominee(this.value)">
                        </div>
                    </div>
                    {{-- <button class="btn fa fa-search btn-sm btn-info btn"></button> --}}
                </div>
                {{-- <div class="row">
                    <div class="col-5 text-right">
                        <a class="btn btn-rose btn-sm text-white" style="text-align: center">Insert</a>
                    </div>
                    <div class="col-1 text-right">
                        <button type="submit" class="btn btn-sm">Remove</button>
                    </div>
                </div> --}}
                <div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="material-datatables">
                                    <table id="datatables" class="table   table-bordered table-hover" cellspacing="0"
                                        width="100%" style="width:100%">
                                        <thead>

                                        </thead>
                                        <tbody id="nominee_data">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="material-datatables">
                                    <table id="datatables" class="table   table-bordered table-hover" cellspacing="0"
                                        width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Nominee Id</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="nominees">
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
@include('layouts.search_modal')


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


function createFd(){
    $.ajax({
                type: 'POST',
                url: '{{('/createfd')}}',
                data: {
                    'customer_id' : document.querySelector('#customer_id').value,
                    'branch_id' : document.querySelector('#branch_id').value,
                    'sub_product_id' : document.querySelector('#sub_product_id').value,
                    'deposite_type_id' : document.querySelector('#deposite_type_id').value,
                    'fd_interest_type_id' : document.querySelector('#fd_interest_type_id').value,
                    'max_interest' : document.querySelector('#max_interest').value,
                    'min_interest' : document.querySelector('#min_interest').value,
                    'introducer_id' : document.querySelector('#introducer_id').value,
                    'account_description' : document.querySelector('#account_description').value,
                    'start_date' : document.querySelector('#start_date').value,
                    'set_interest' : document.querySelector('#set_interest').value,
                    // 'deposite_period_id' : document.querySelector('#deposite_period_id').value,
                    'close_date' : document.querySelector('#close_date').value,
                    'deposite_amount' : document.querySelector('#deposite_amount').value,
                    // 'is_auto_renew' : document.querySelector('#is_auto_renew').value,
                    // 'interest_amount' : document.querySelector('#interest_amount').value,
                    // 'num_of_renew' : document.querySelector('#num_of_renew').value,
                    'saving_account_id' : document.querySelector('#saving_account_id').value,
                },
                success: function(data){
                    console.log(data);
                    account_id.value=data.account_id
                    inv.classList.remove('d-none')


                }

    });
}


function findInvester(invester){
console.log(invester)

        if(invester === ''){
            investor_data.innerHTML = ''
        }
        $.ajax({
        type: 'GET',
        url: '{{('/findinvester')}}',
        data: {text:invester} ,
        success: function(data){
            console.log(data);
            get_invester(data)
        }
    })
}
function get_invester(data){
    console.log('inside setter -modal', data);
    investor_data.classList.remove('d-none')
    investor_data.innerHTML = ''


    data.forEach(i => {

        let member_status = i.non_member===1 ? 'Member' : 'Non-member'
        let html = `
        <tr id='${i.id}'>
            <td>${i.customer_id}</td>
            <td>${i.full_name}</td>
            <td>${i.identification_number}</td>
            <td>${member_status}</td>
            <td>
                <button type="button"
                onclick=
                "
                this.parentElement.parentElement.parentElement.classList.add('d-none'),
                set_investers('${i.customer_id}')
                "
                class="btn btn-sm btn-primary">Select</button>
            </td>
        </tr>
        `
        investor_data.innerHTML += html

    })


}

function set_investers(id){
    console.log(id);
    fdid=account_id.value
    $.ajax({
        type: 'GET',
        url: '{{('/addinvester')}}',
        data: {
            text:id,
            fdod:fdid
        } ,
        success: function(data){
            console.log(data);
            view_invester(data)
        }
    })

}
function view_invester(data){
    console.log('inside setter invester', data);
    inv_list.classList.remove('d-none')
    inv_list.innerHTML = ''


    data.forEach(i => {

        let html = `
        <tr id='${i.id}'>
            <td>${i.fd_account_id}</td>
            <td>${i.customer_id}</td>
            <td>
                <button type="button"
                onclick=
                "
                this.parentElement.parentElement.parentElement.classList.add('d-none'),
                set_investers('${i.id}')
                "
                class="btn btn-sm btn-primary">REMOVE</button>
            </td>
        </tr>
        `
        inv_list.innerHTML += html

    })


}
// --------------------------------------------------------------nominee
function findNominee(nominee){
console.log(nominee)

        if(nominee === ''){
            nominee_data.innerHTML = ''
        }
        $.ajax({
        type: 'GET',
        url: '{{('/findnominee')}}',
        data: {text:nominee} ,
        success: function(data){
            console.log(data);
            get_nominee(data)
        }
    })
}
function get_nominee(data){
    console.log('inside setter -modal', data);
    nominee_data.classList.remove('d-none')
    nominee_data.innerHTML = ''


    data.forEach(i => {

        let member_status = i.non_member===1 ? 'Member' : 'Non-member'
        let html = `
        <tr id='${i.id}'>
            <td>${i.customer_id}</td>
            <td>${i.full_name}</td>
            <td>${i.identification_number}</td>
            <td>${member_status}</td>
            <td>
                <button type="button"
                onclick=
                "
                this.parentElement.parentElement.parentElement.classList.add('d-none'),
                set_nominees('${i.customer_id}')
                "
                class="btn btn-sm btn-primary">Select</button>
            </td>
        </tr>
        `
        nominee_data.innerHTML += html

    })


}

function set_nominees(id){
    console.log(id);
    fdid=account_id.value
    $.ajax({
        type: 'GET',
        url: '{{('/addnominee')}}',
        data: {
            text:id,
            fdod:fdid
        } ,
        success: function(data){
            console.log(data);
            view_nominee(data)
        }
    })

}
function view_nominee(data){
    console.log('inside setter nominee', data);
    nominees.classList.remove('d-none')
    nominees.innerHTML = ''


    data.forEach(i => {

        let html = `
        <tr id='${i.id}'>
            <td>${i.fd_account_id}</td>
            <td>${i.customer_id}</td>
            <td>
                <button type="button"
                onclick=
                "
                this.parentElement.parentElement.parentElement.classList.add('d-none'),
                set_investers('${i.id}')
                "
                class="btn btn-sm btn-primary">REMOVE</button>
            </td>
        </tr>
        `
        nominees.innerHTML += html

    })


}

</script>
@endsection
