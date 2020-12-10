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
                    <input type="date" class="form-control" readonly id="open_date"
                        value="<?php echo date("Y-m-d"); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Member</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" readonly id="customer_id" name="customer_id">
                </div>
            </div>
            <a class="btn fa fa-search btn-info btn-sm" data-toggle="modal" href="#mmodel"></a>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Product</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" readonly name="sub_product" id="sub_product">
                    <input type="hodden" class="form-control" name="sub_product_id" id="sub_product_id">
                </div>
            </div>
            <a class="btn fa fa-search btn-info btn-sm" data-toggle="modal" href="#productSearchModel"></a>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Interest Rate</label>
            <div class="col-sm-2">
                <div class="form-group">
                    <input type="text" placeholder="Interest (%)" readonly class="form-control" id="set_interest"
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
                    <input type="hidden" class="form-control" name="introducer_id" id="introducer_id">
                    <input type="text" class="form-control" name="introducer_name" id="introducer_name">

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
                    <input type="date" class="form-control" id="start_date" name="start_date"
                        value="<?php echo date("Y-m-d"); ?>">
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
                    <select name="deposite_period_id" id="deposite_period_id" class="form-control"
                        oninput="calDuration(this.value)">
                        <option value="0" selected>Select </option>
                        @isset($deposite_periods)
                        @foreach ($deposite_periods as $deposite_period)

                        <option value="{{$deposite_period->deposite_period}}" selected>
                            {{$deposite_period->deposite_period}} </option>
                        @endforeach

                        @endisset


                    </select>
                </div>
            </div>

        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Expired Date</label>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" placeholder="" readonly id="close_date" name="close_date" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Auto Renew</label>
            <div class="col-sm-4">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" id="is_auto_renew"> --}}
                    <select name="is_auto_renew" id="is_auto_renew" class="form-control">
                        <option value="Yes" selected>Yes </option>
                        <option value="No">No </option>


                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Savings Account</label>
            <div class="col-sm-4">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" id="saving_account_id"> --}}
                    <select name="saving_account_id" id="saving_account_id" class="form-control">
                        <option value="0">Select </option>
                    </select>
                </div>
            </div>
            {{-- <a class="btn fa fa-search btn-info btn-sm" data-toggle="modal" href="#noticeModal"></a> --}}
            {{-- <a class="btn fa  btn-danger btn-sm form-control " id="create" onclick="createFd()">CREATE</a> --}}
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-4">
                <div class="form-group">
                    <a class="btn fa  btn-warning btn-sm form-control " id="create" onclick="createFd()">CREATE</a>

                </div>
            </div>
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
                    <label class="col-sm-2 col-form-label">Investor Name</label>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="inv" oninput="findInvester(this.value)">
                            <input type="text" class="form-control" id="account_id">
                        </div>
                    </div>
                    <a class="btn fa fa-plus btn-sm btn-info btn" data-toggle="modal" href="#ext_inv"></a>
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
                                    </thead>
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
                            <div class="material-datatables d-none" id=inv_table>
                                <table id="datatables" class="table   table-bordered table-hover" cellspacing="0"
                                    width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Fd Account Id</th>
                                            <th>Customer Id</th>
                                            <th>Action</th>
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
                    <label class="col-sm-2 col-form-label">Nominee Name</label>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nmn" oninput="findNominee(this.value)">
                        </div>
                    </div>
                    <a class="btn fa fa-plus btn-sm btn-info btn" data-toggle="modal" href="#ext_nmn"></a>
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
                                <div class="material-datatables " id="nomi_tble">
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
                                <div class="material-datatables d-none" id="nomi_data">
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
@include('fd.models.ext_inv')
@include('fd.models.ext_nom')
{{-- @include('layouts.search_modal') --}}


<script>
    function calDuration(period){
        var today = new Date();
var end=today.setDate(today.getDate() + (parseInt(period)*30));
var ts_ms = end;
var date_ob = new Date(ts_ms);

var date = ("0" + date_ob.getDate()).slice(-2);
var month = ("0" + (date_ob.getMonth() + 1)).slice(-2);
var year = date_ob.getFullYear();
var datee=  date+"/"+month+"/"+"/"+year
console.log(date_ob.toDateString())

close_date.value=datee

    }
    function getAccounts(cus_id){
console.log(cus_id)

saving_account_id.innerHTML = ''
        $.ajax({
        type: 'GET',
        url: '{{('/findsavingaccounts')}}',
        data: {text:cus_id} ,
        success: function(data){
            console.log(data);
            setSavings(data)
        }
    })
}
function setSavings(data){
    console.log('savings dropdown', data);
    saving_account_id.innerHTML = ''


    data.forEach(i => {

        let html = `
        <option value="${i.account_number}">${i.account_number}</option>

        `
        saving_account_id.innerHTML += html

    })


}

    function calInterest(interest){
     console.log(interest)
    let min=min_interest.value
    let max=max_interest.value
    // if(min<interest<max){
        //create.classList.remove('d-none')

    // }else{
        // create.classList.add('d-none')

    // }
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
                    'deposite_period_id' : document.querySelector('#deposite_period_id').value,
                    'close_date' : document.querySelector('#close_date').value,
                    'deposite_amount' : document.querySelector('#deposite_amount').value,
                    'is_auto_renew' : document.querySelector('#is_auto_renew').value,
                    // 'interest_amount' : document.querySelector('#interest_amount').value,
                    // 'num_of_renew' : document.querySelector('#num_of_renew').value,
                    'saving_account_id' : document.querySelector('#saving_account_id').value,
                },
                success: function(data){
                    console.log(data);
                    account_id.value=data.account_id
                    // idd.value=data.account_id
                    external_account_id.value=data.account_id
                    nominee_account_id.value=data.account_id
                    // inv.classList.remove('d-none')
                    swal({
                        title: "Success! FD Account Created",
                        text: "You Can Add Nominees and Investores for "+data.account_id,
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success",
                        type: "success"
                    }).catch(swal.noop)


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
    inv_table.classList.remove('d-none')
    inv_list.classList.remove('d-none')
    inv_list.innerHTML = ''


    data.forEach(i => {

        let html = `
        <tr><td> ${i.id}</td>
            <td>${i.fd_account_id}</td>
            <td>${i.customer_id}</td>
            <td>
                <button type="button"
                onclick=
                "
                this.parentElement.parentElement.parentElement.classList.add('d-none'),
                remove_investor('${i.id}')
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
    nomi_data.classList.remove('d-none')
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
                remove_nominees('${i.id}')
                "
                class="btn btn-sm btn-primary">REMOVE</button>
            </td>
        </tr>
        `
        nominees.innerHTML += html

    })


}

function remove_nominees(id){
    console.log(id);
    fdid=account_id.value
    $.ajax({
        type: 'GET',
        url: '{{('/removenominee')}}',
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
function remove_investor(id){
    console.log(id);
    fdid=account_id.value
    $.ajax({
        type: 'GET',
        url: '{{('/removeinvestor')}}',
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

</script>
@endsection
