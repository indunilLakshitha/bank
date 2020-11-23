@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body ">
                <form id="form" action="{{url('/interestschemasubmit')}}" method="POST" class="form-horizontal">
                        @csrf

                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Interest Scheme Parameters</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Interest Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">

                                            <select name="" id="" class="selectpicker"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Interest Rate</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="card" style="border: solid">
                            <br>
                            {{-- <table class=" table col-sm-2" readonly id="">
                                <thead>
                                    <tr>
                                        <th>Slab</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                            </table> --}}
                            <div class="row">
                                <div class="col-2">
                                    <select name="" id="" class="selectpicker col-12"
                                        data-style="select-with-transition">
                                        <option value="">One</option>
                                        <option value="">Two</option>
                                        <option value="">Three</option>


                                    </select> </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="" placeholder="From">

                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="" placeholder="To">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <select name="" id="" class="selectpicker col-12"
                                            data-style="select-with-transition">
                                            <option value="">Type</option>

                                            <option value="">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="" placeholder="amount">
                                    </div>
                                </div>
                                <div class="col-1">
                                    <a onclick="" id="" class="btn-info btn-sm ">ADD</a>
                                </div>
                            </div>



                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ">
                                    <div class="card-header card-header-success card-header-icon">
                                        {{-- <div class="card-icon">
                        <i class="material-icons"></i>
                    </div> --}}
                                        <h4 class="card-title">

                                        </h4>

                                    </div>
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="material-datatables">
                                                    <table id="datatables"
                                                        class="table table-striped table-no-bordered table-hover"
                                                        cellspacing="0" width="100%" style="width:100%">
                                                        <thead>
                                                            <th>Slab</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th>Type</th>
                                                            <th>Amoun</th>
                                                            <th>Actions</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th> </th>
                                                                <th> </th>
                                                                <th> </th>
                                                                <th> </th>
                                                                <th> </th>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-sm-2 col-form-label">Bonus Rate</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Interest Credit Frequency</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">

                                            <select name="" id="" class="selectpicker"
                                                data-style="select-with-transition">
                                                <option value="">Select</option>

                                                <option value="">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Interest Credit Dated</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Interest Credit Dated</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <button class="btn btn-primary">NEXT</button> </div>
                            </div>
                        </div>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>


@endsection
