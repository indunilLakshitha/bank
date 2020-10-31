@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
            <div class="card">
                <div class="card-body">
                    <form id="private_1" action="/member/add/benificiaris" method="POST">
                        @csrf
                        <div class="tab-pane active" id="private_1">
                            {{-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> --}}
                            <div class="row">
                                <label class="col-sm-1 col-form-label">Add</label>
                                <div class="col-sm-2">
                                    <select name="" id="" class="form-control">
                                        <option value="">Select</option>
                                        <option value="">2</option>
                                    </select> </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-primary">Select</button>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <br>
                            <h5 class="text-center">Guardians</h5>
                            <div class="row">
                                <label class="col-sm-1 col-form-label">1st</label>
                                <div class="col-sm-2">
                                    <select name="" id="" class="form-control">
                                        <option value="">Select</option>
                                        <option value="">2</option>
                                    </select> </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-primary">Select</button>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control">
                                </div>
                            </div>>
                        </div>
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </form>
                    {{-- Ends Private 1 --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
