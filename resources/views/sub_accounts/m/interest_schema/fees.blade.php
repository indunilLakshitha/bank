@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body ">
                    <form id="form" action="{{url('/interestschemafeesubmit')}}" method="POST" class="form-horizontal">
                        @csrf

                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Fees</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Fee Description</label>
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
                            <label class="col-sm-2 col-form-label">Fee Code</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Fee Category</label>
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
                            <label class="col-sm-2 col-form-label">Fee Type</label>
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
                            <label class="col-sm-2 col-form-label">Fee Amount</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Triggering Point</label>
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
                            <label class="col-sm-2 col-form-label">Effective Date</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Tax Applicable</label>
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
                            <label class="col-sm-2 col-form-label">Tax Type</label>
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
                            <label class="col-sm-2 col-form-label">Tax Rate/Amount</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="date" class="form-control" id="">
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
                                                            <th>Fee Description</th>
                                                            <th>Fee Category</th>
                                                            <th>Fee Type</th>
                                                            <th>Fee Ammount</th>
                                                            <th>Maximum Amount</th>
                                                            <th>Minimum Amount</th>
                                                            <th>Action</th>
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

                        <button class="btn btn-primary">NEXT</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection
