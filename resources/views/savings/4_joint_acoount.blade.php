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
            <form id="form" class="form-horizontal" >
                @csrf
                <input type="hidden" name="product_data_id" value={{$prod_id}}>
                <input type="hidden" name="account_id" value={{$account_id}}>
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
                                    <input type="text" class="form-control" value={{$customer_id}} readonly id="join_acc_main_holder" name="customer_id">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">ID Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            @php
                                                $idtypes = Illuminate\Support\Facades\DB::table('iedentification_types')->get()
                                            @endphp
                                            <select name="oh_identification_type_id"  id="oh_identification_type_id" class="selectpicker" data-style="select-with-transition">
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
                                    <a
                                    onclick="get_other_holder(oh_identification_type_id.value,oh_identification_number.value,  oh_name.value)"

                                     class="btn btn-primary text-white">SEARCH</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <table class="table " id="search_by_name_results">

                            </table>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Minimum Authorization Required for a
                                Withdrawal</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="minimum_auth_count">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Withdrawal Limit for Holder</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="withdrawal_limit_holder">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Number of Holders</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="holders_count">
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="col-6 text-right">
                        <a
                        onclick="create_joint_account(this)"
                         class="btn btn-primary text-white">Create Join Account</a>
                        </div>

                    <form id="add_j_mem_form">
                        @csrf
                        {{-- <input type="hidden" name="customer_id" id="mem_cus_id"> --}}
                        <input type="hidden" name="join_account_id" id="mem_j_acc_id">
                        <div class="row">
                            <label for="" class="col-sm-2 col-form-label" >Selected Other Holder : </label>
                            <div class="col-sm-6">
                                <div class="form-control">
                            <input type="text" id="selected_oh" name="customer_id" class="form-control" readonly>
                            </div>
                            </div>
                        </div>



                        <div class="card d-none" style="border: solid" id="oh_card">
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
                                        <a
                                        onclick="add_to_join_account()"
                                         class="btn btn-primary text-white float-right  btn-sm">Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                    </div>
                </div>
            </form>

            <div class="col-6 text-right">
                {{-- <form action="/guradian-information" method="POST"> --}}
                <form action="/documents" method="POST">
                    @csrf
                    <input type="hidden" name="product_data_id" value={{$prod_id}}>
                    <input type="hidden" name="account_id" value={{$account_id}}>
                    <input type="hidden" name="customer_id" value={{$customer_id}}>
                    <button type="submit" class="btn btn-primary">NEXT</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    
    function create_joint_account(btn){
        // return console.log(1);
        $.ajax({
            type: 'POST',
            url: '{{('/create_join_account')}}',
            data: new FormData(form),
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data)
                btn.classList.add('d-none')
                oh_card.classList.remove('d-none')
                mem_j_acc_id.value = data.id
                // mem_cus_id.value = data.customer_id
            },
            error: function(data){
                console.log(data)
            }

        })
    }

    function add_to_join_account(){
        $.ajax({
            type: 'POST',
            url: '{{('/add_mem_join_account')}}',
            data: new FormData(add_j_mem_form),
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data)

            },
            error: function(data){
                console.log(data)
            }

        })
    }
</script>
@endsection
