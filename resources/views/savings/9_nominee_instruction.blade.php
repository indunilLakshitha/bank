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
                                <h4 class="card-title">Step 06 - Savings Account Opening</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        {{-- <div class="card-header card-header-rose card-header-text"> --}}
                        <div class="card-text">
                            <!-- <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a> -->
                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
            <div class="card " style="border: solid">
            <form id="form" class="form-horizontal">
                @csrf
                <input type="hidden" name="product_data_id" value={{$prod_id}}>
                <input type="hidden" name="account_id" value={{$account_id}}>
                <div class="card ">
                    <div class="card-body ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Nominee Instruction</h4>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">ID Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            @php
                                            $idtypes =
                                            Illuminate\Support\Facades\DB::table('iedentification_types')->get()
                                            @endphp
                                            <select name="oh_identification_type_id" id="oh_identification_type_id"
                                                class="form-control">
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
                                            <input type="text" id="oh_identification_number" placeholder="Identity No"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Client Name</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="oh_name">
                                    <a onclick="get_other_holder(oh_identification_type_id.value,oh_identification_number.value,  oh_name.value)"
                                        class="btn btn-primary text-white">SEARCH</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <table class="table " id="search_by_name_results">

                            </table>
                        </div>



            </form>



            <form id="add_j_mem_form">
                @csrf
                {{-- <input type="hidden" name="customer_id" id="mem_cus_id"> --}}
                <input type="hidden" name="product_data_id" value={{$prod_id}}>
                <input type="hidden" name="account_id" value={{$account_id}}>





                <div class="card " style="border: solid" id="oh_card">
                    {{-- <div class="card-header">Nominees</div> --}}
                    <div class="card-body">

                        <div class="row">
                            <label for="" class="col-sm-2 col-form-label">Selected Nominee : </label>
                            <div class="col-sm-6">
                                <div class="form-control">
                                    <input type="text" id="selected_oh" name="customer_id" class="form-control" readonly>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label"> Nominee Percentage</label>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nominee_percentage">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <a onclick="add_nominee()"
                                    class="btn btn-primary text-white float-right  btn-sm">Add</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

        </div>
    </div>
    </form>

    {{-- <form action="/autorized_officers" method="POST"> --}}
    <form action="/tax_details_view" method="POST" >
        @csrf
        <input type="hidden" name="product_data_id" value={{$prod_id}}>
        <input type="hidden" name="account_id" value={{$account_id}} id="account_id">
        <input type="hidden" name="customer_id" value={{$customer_id}}>
        <button type="submit" class="btn btn-primary">NEXT</button>
        <div class="row">

    </div>
        </div>
    </form>
    </div>

</div>
</div>
</div>

<script>
    function add_nominee(){
        $.ajax({
            type: 'POST',
            url: '{{('/add_nominee')}}',
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
