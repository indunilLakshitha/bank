@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
            <div class="card" style="border: solid">
                <div class="row">
                    <div class="col-3">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Step 04 - Assets Details</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                {{-- <h4 class="card-title">Member Creation</h4> --}}
                                <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="private_1" action="/member/add/special-and-assets" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value={{$cus_id}}>
                        <div class="tab-pane" id="special">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Special Information</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <textarea name="special_information" id="" cols="70" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Real Member</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="is_real_member" id="" class="form-control">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h5 class="text-center">Assets</h5>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Item</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="item" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Value</label>
                                <div class="col-sm-3">
                                    <input type="text" name="value" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">1</option>
                                        <option value="">2</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-primary">SUBMIT & FINISH </button>
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-primary">Remove</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
