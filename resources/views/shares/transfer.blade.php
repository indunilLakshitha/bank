@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
            <div class="card " style="border: solid">

                <div class="row">
                    <div class="col-3">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title"> Transfer Shares</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form" >
                    @csrf
                    <div class="tab-pane active" id="private_1">
                        {{-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Name of Seller<font color="red">*</font></label>
                            <div class="col-lg-4 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <input  id="full_name" type="text" class="form-control">
                                    <input name="seller_id" id="customer_id" type="hidden" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <button type="button" class="btn fa fa-search btn-info " data-toggle="modal"
                                href="#shareModal">  Seller</button>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <label class="col-sm-2 col-form-label">No of Shares To Sell<font color="red">*</font>
                                </label>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group">
                                    <input type="text" name="n_of_shares_to_sell" class="form-control">
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Name of Buyer<font color="red">*</font>
                                </label>
                            <div class="col-lg-4 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <input  id="buyer_name" type="text" class="form-control">
                                    <input name="buyer_id" id="buyer_id" type="hidden" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <button type="button" class="btn fa fa-search btn-info " data-toggle="modal"
                                href="#buyer_modal">  Buyer</button>
                            </div>
                        </div>
                        @php
                        $share_amount = DB::table('setting_data')->where('setting_description', 'share_amount')->first()->setting_data;
                    @endphp
                        <div class="row">
                            <label class="col-sm-2 col-form-label">No of Shares To Transfer<font color="red">*</font></label>
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <input type="number" name="n_of_shares_to_transfer" class="form-control"
                                oninput="total_transaction_amount.value = this.value*{{$share_amount}}"
                                    >
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-sm-2 col-form-label">Total Transaction Amount<font color="red">*</font></label>
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <input type="text" name="total_transaction_amount" id="total_transaction_amount" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Balance Share Amount of Seller<font color="red">*</font></label>
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <input type="text" name="balance_share_amount_seller" id="balance_share_amount_seller" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Balance Share Amount of Buyer<font color="red">*</font></label>
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <input type="text" name="balance_share_amount_buyer" id="balance_share_amount_buyer" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-right">
                                <button type="button" onclick="transfer_shares()" class="btn btn-rose col-4 text-white">SUBMIT</button>
                            </div>
                            <div class="col-1 text-right">
                                <button type="submit" class="btn ">Clear</button>
                            </div>
                        </div> {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <style>
    .modal-content{
        overflow-y: auto;
    }
</style> --}}
<div class="row">
    <div class="col-md-12 text-center">
        <!-- notice modal -->
        <div class="modal fade" id="buyer_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content " style="width: 800px;height: auto">
                    <div>
                        <div class="row mt-5">
                            <label class="col-sm-2 col-form-label"> Client Full Name</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input oninput="toCap(this.value, this.id), get_modal_search_by_full_name_buyer(this.value)"
                                            id="buyer_nameaaa"
                                                type="text" class="form-control js-example-data-ajax"
                                                placeholder="Enter Full Name"
                                                >
                                        </div>
                                    </div>
                                    <div class="col">
                                        {{-- <button class="btn fa fa-search btn-info btn"
                                            onclick="get_cus_details(client_full_name.value)">
                                            &nbspType in to search By Full Name</button> --}}
                                            <button class="btn  btn-info btn"
                                            onclick="modal_serach_by_name_results_tbody.innerHTML = null"
                                            >
                                            Clear Results </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <label class="col-sm-2 col-form-label"> Customer ID</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input
                                            oninput=
                                            "
                                            // toCap(this.value, this.id),
                                            get_modal_search_by_buyer_id(this.value)"
                                                type="text" class="form-control js-example-data-ajax"

                                                placeholder="Enter Customer ID"
                                                >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table">
                                <tbody id="modal_serach_by_name_results_tbody_buyer" class="d-none"></tbody>
                            </table>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">ID Type</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            @php
                                            $idtypes =
                                            Illuminate\Support\Facades\DB::table('iedentification_types')->get();
                                            @endphp
                                            <select name="identification_type_id" id="identification_type_id"
                                                class="selectpicker" data-style="select-with-transition">
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

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">ID Number</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="form-group">
                                            <input type="text" name="identification_number" id="identification_number"
                                                class="form-control" placeholder="">

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn fa fa-search btn-info btn"
                                            onclick="get_cus_details(identification_type_id.value, identification_number.value)">
                                            &nbspSearch By ID</button>
<input type="hidden" value="share_transfer" id="meth">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end notice modal -->
    </div>
</div>
@include('layouts.share_model')

<script>

    let buyer_data;

    function get_modal_search_by_full_name_buyer(value){
        console.log(value);
        if(value === ''){
            modal_serach_by_name_results_tbody_buyer.innerHTML = ''
        }
        $.ajax({
        type: 'GET',
        url: '{{('/search_by_full_name/3')}}',
        data: {text:value} ,
        success: function(data){
            console.log(data);
            return set_modal_serach_by_name_results_buyer(data)
        }
    })
    }

    function get_modal_search_by_buyer_id(value){
        console.log(value);
        if(value === ''){
            modal_serach_by_name_results_tbody_buyer.innerHTML = ''
        }
        $.ajax({
        type: 'GET',
        url: '{{('/search_by_customer_id')}}',
        data: {text:value} ,
        success: function(data){
            console.log(data);
            return set_modal_serach_by_name_results_buyer(data)
        }
    })
    }


function set_modal_serach_by_name_results_buyer(data){
    console.log('inside setter -modal', data);
    modal_serach_by_name_results_tbody_buyer.classList.remove('d-none')
    modal_serach_by_name_results_tbody_buyer.innerHTML = ''

    buyer_data = data

    data.forEach(i => {
        let member_status = 'Non-Member';
        if(parseInt(i.member) == 1) {
            member_status = 'member';
        let html = `
        <tr id='${i.id}' >
            <td>${i.customer_id}</td>
        <td>${i.full_name}</td>
        <td>${i.identification_number}</td>
        <td>${member_status}</td>
        <td>
            <button type="button"
            onclick=
            "
            this.parentElement.parentElement.parentElement.classList.add('d-none'),
            set_cus_details_from_modal_buyer('${i.id}')
            "
            class="btn btn-sm btn-primary">Select</button>
        </td>
        </tr>
        `
        modal_serach_by_name_results_tbody_buyer.innerHTML += html
    }
    })


}

function set_cus_details_from_modal_buyer(id){
    // console.log(buyer_data);

    buyer_data.filter(cus => {
        if(cus.id === parseInt(id)){

            buyer_name.value = cus.full_name
            buyer_id.value = cus.customer_id
            $('#buyer_modal').modal('hide');
             return console.log(cus);
            //  console.log(full_name);
        }
    })
}

function transfer_shares(){
    $.ajax({
            type: 'POST',
            url: '{{('/transfer_shares')}}',
            data: new FormData(form) ,
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data);
                if(data.msg=='Successfully Transfered'){
                    balance_share_amount_buyer.value=data.buyer_balance
                    balance_share_amount_seller.value=data.seller_balance
                    swal({
                        title: "Success!",
                        text: data.msg ,
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success",
                        type: "success"
                    }).catch(swal.noop)
                }else{
                    swal({
                        title: "Failed!",
                        text: data.msg ,
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success",
                        type: "error"
                    }).catch(swal.noop)
                }

            }
        })
}
</script>




    @endsection
