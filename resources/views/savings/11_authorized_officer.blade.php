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
            <form id="form" class="form-horizontal">
                @csrf
                <div class="card ">
                    <div class="card-body ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Authorized Officer</h4>
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
                                            Illuminate\Support\Facades\DB::table('users')->get()
                                            @endphp
                                            <select name="user_id" id="user_id" class="form-control">
                                                <option value="">Select</option>
                                                @isset($idtypes)
                                                @foreach ($idtypes as $idtype)
                                                <option value="{{$idtype->id}}">
                                                    {{$idtype->name}}
                                                    @endforeach
                                                    @endisset
                                            </select>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Authorized Level</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">

                                            <select name="authorized_level" id="authorized_level" class="form-control">
                                                <option value="">Select</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="card " style="border: solid" id="oh_card">
                            <div class="card-body">


                                <div class="row">
                                    <label class="col-sm-2 col-form-label"> Withdrawal Limit</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="withdrawal_limit">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <a onclick="add_officer()"
                                            class="btn btn-primary text-white float-right  btn-sm">Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                    </div>
                </div>
            </form>

            <form action="/finish_open_account_saving" method="POST">
                @csrf
                <input type="hidden" name="product_data_id" value={{$prod_id}}>
                <input type="hidden" name="account_id" value={{$account_id}}>
                <input type="hidden" name="customer_id" value={{$customer_id}}>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>
        </div>
    </div>
</div>

<script>
    function add_officer(){
        $.ajax({
            type: 'POST',
            url: '{{('/add_officer')}}',
            data: new FormData(form),
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
