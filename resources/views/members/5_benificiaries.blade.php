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
                                <h4 class="card-title">Step 03 - Savings Account Opening</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-text">
                            <!-- <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card " style="border: solid">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Beneficiaries</h4>
                            </div>
                        </div>
                        <br>
                        <br>
                        <form id="private_1" action="/benificiaries" method="POST">
                            @csrf
                            <input type="hidden" name="product_data_id" value={{$prod_id}}>
                            <input type="hidden" name="account_id" value={{$account_id}}>
                            <input type="hidden" name="customer_id" id="customer_id" value={{$cus_id}}>
                            <input type="hidden" name="account_number" value={{$acc_no}}>
                            <input type="hidden" name="$guard " value={{$guard}}>
                            <input type="hidden" name="nomin" value={{$nomin}}>
                            <input type="hidden" name="docum" value={{$docum}}>
                            <input type="hidden" name="benef" value={{$benef}}>
                            <div class="tab-pane active" id="private_1">
                                @if($benef == 1)
                                <h5 class="">Beneficiaries</h5>
                                <div class="row">
                                </div>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label">Add</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="customer_id" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-sm btn-primary"
                                            onclick="add_bene_guard('/bene', '{{$cus_id}}', customer_id.value)">ADD</button>
                                    </div>
                                    <div class="col">
                                        <a class="btn fa fa-search btn-info btn-sm float-right" data-toggle="modal"
                                            onclick="is_customer_id = false" href="#noticeModal">Search
                                            Beneficiaries</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table text-center d-none" id="bene_table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Customer ID</th>
                                                <th>Beneficiary Name</th>
                                                <th>NIC</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bene_body">
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                @endif
                                @if($guard == 1)
                                <h5 class="">Guardians</h5>
                                <div class="row">
                                    <label class="col-sm-1 col-form-label">Add</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="customer_id_2" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button"  class="btn btn-sm btn-primary"
                                            onclick="add_bene_guard('/guard', customer_id_2.value)">ADD</button>
                                    </div>
                                    <div class="col">
                                        <a class="btn fa fa-search btn-info btn-sm float-right" data-toggle="modal"
                                            onclick="is_customer_id_2 = true" href="#noticeModal">Search Guardians</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table text-center d-none" id="guard_table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Guardian Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="guard_body">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif
                            @if($docum == 1)
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary float-right">NEXT</button>
                                </div>
                            </div>
                            @elseif(@$nomin == 0)
                            <form action="/finish_open_account_saving" method="POST" id="final_form">
                                @csrf
                                <input type="hidden" name="product_data_id" value={{$prod_id}}>
                                <input type="hidden" name="account_id" value={{$account_id}}>
                                <input type="hidden" name="customer_id" value={{$cus_id}}>
                                <input type="hidden" name="account_number" value={{$acc_no}}>
                                <div class="row">
                                    <div class="col">
                                        <div class="col-11">
                                            <button type="button" class="btn btn-primary float-right" onclick="Swal.fire({title: `Created Account {{$acc_no}}`,confirmButtonText: `View Savings Account Page`}).then(() => {window.location = '/savings/open'})
                        ">SUBMIT & FINISH</button>
                                        </div>
                                    </div>
                            </form>
                            @elseif(@$nomin == 1)
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary float-right">NEXT</button>
                                </div>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.search_modal')
<script>
    const c = document.querySelector('#customer_id').value;

    function add_bene_guard(url,  id){
        $( "#foo" ).one( "click", function() {
onsole.log(c);
console.log(id);

        $.ajax({
            type : 'GET',
            url,
            data : {
                c, id
            },
            success : function(data) {
                console.log(data)
                if(data[0] === 'bene'){
                    bene_table.classList.remove('d-none')
                    bene_body.innerHTML = ''

                    let i = 1
                    data[1].forEach(r => {
                        html = `
                        <tr>
                            <th> ${i} </th>
                            <th> ${r.customer_id} </th>
                            <th> ${r.full_name} </th>
                            <th> ${r.identification_number} </th>
                            <th> <button type="button" onclick="
                delete_bene('${r.id}'), this.parentElement.parentElement.classList.add('d-none')" class="btn btn-sm btn-primary">Remove</button> </th>
                        </tr>
                        `
                        i++
                        bene_body.innerHTML += html
                    })

                } else if (data[0] === 'guard'){
                    guard_table.classList.remove('d-none')
                    guard_body.innerHTML = ''

                    let i = 1
                    data[1].forEach(r => {
                        html = `
                        <tr>
                            <th> ${i} </th>
                            <th> ${r.customer_id} </th>
                            <th> ${r.full_name} </th>
                            <th> ${r.identification_number} </th>
                            <th> <button type="button" onclick="
                delete_gurd('${r.id}'), this.parentElement.parentElement.classList.add('d-none')" class="btn btn-sm btn-primary">Remove</button> </th>
                        </tr>
                        `
                        i++
                        guard_body.innerHTML += html
                    })
                }

            }
        })
    }

    function delete_bene(id){
        // console.log(id);
        $.ajax({
        type: 'GET',
        url: '{{('/delete_bene')}}',
        data: {id} ,
        success: function(data){
            console.log(data);
            return
        }
    })
    }

    function delete_gurd(id){
        // console.log(id);
        $.ajax({
        type: 'GET',
        url: '{{('/delete_gurd')}}',
        data: {id} ,
        success: function(data){
            console.log(data);
            return
        }
    })
    }


</script>

@endsection
