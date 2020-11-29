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
                                <h4 class="card-title"> Buy Shares</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <button class="btn fa fa-search btn-info float-right" data-toggle="modal"
                            href="#noticeModal"> SEARCH</button>
                        </div>
                    </div>
                    <form id="form"  method="POST">
                         @csrf
                        {{-- <div class="tab-pane active" id="private_1"> --}}
                            {{-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> --}}
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Customer ID<font color="red">*</font></label>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <input name="customer_id" type="text" class="form-control" id="customer_id">
                                    </div>
                                </div>
                            </div>

                            @php
                                $share_amount = DB::table('setting_data')->where('setting_description', 'share_amount')->first()->setting_data;
                            @endphp

                            <div class="row">
                                <label class="col-sm-2 col-form-label">No of Shares<font color="red">*</font></label>
                                <div class="col-lg-3 col-md-2 col-sm-2">
                                    <div class="form-group">
                                        <input type="number" name="n_of_shares"  class="form-control"
                                        oninput="share_cost.value = this.value*{{$share_amount}}"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Cost For Shares<font color="red">*</font></label>
                                <div class="col-lg-3 col-md-2 col-sm-2">
                                    <div class="form-group">
                                        <input type="text"   value="{{$share_amount}}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-2 col-form-label">Total Share Value<font color="red">*</font></label>
                            <div class="col-lg-3 col-md-2 col-sm-2">
                                <div class="form-group">
                                    <input type="text" id="share_cost" name="total_share_cost" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-right">
                                <button type="button" onclick="buy_shares()" class="btn btn-rose col-4 text-white">SUBMIT</button>
                            </div>
                            <div class="col-1 text-right">
                                <button type="button"  class="btn ">Clear</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('layouts.search_modal')

    <script>
        function buy_shares(){
            $.ajax({
            type: 'POST',
            url: '{{('/buy_shares')}}',
            data: new FormData(form) ,
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data);

            }
        })
        }
    </script>
    @endsection
