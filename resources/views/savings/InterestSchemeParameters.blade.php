@extends('layouts.app')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                    <div class="card-body ">
            <form id="form" class="form-horizontal" >
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

                                            <select name=""  id="" class="selectpicker" data-style="select-with-transition">
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
                        <table class=" table col-sm-2" readonly id="">
                            <thead>
                                <tr>
                                    <th>Slab</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th >Type</th>
                                    <th >Amount</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="row">
                            <div class="col-2">
                            <label class="col-sm-4 col-form-label ">One</label>
                            </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <select name=""  id=""  class="selectpicker col-12" data-style="select-with-transition">
                                            <option value="">From</option>

                                            <option value="">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <select name=""  id=""  class="selectpicker col-12" data-style="select-with-transition">
                                            <option value="">To</option>

                                            <option value="">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <select name=""  id="" class="selectpicker col-12" data-style="select-with-transition">
                                            <option value="">Type</option>

                                            <option value="">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                            <label class="col-sm-4 col-form-label ">Two</label>
                            </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <select name=""  id=""  class="selectpicker col-12" data-style="select-with-transition">
                                            <option value="">From</option>

                                            <option value="">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <select name=""  id=""  class="selectpicker col-12" data-style="select-with-transition">
                                            <option value="">To</option>

                                            <option value="">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <select name=""  id="" class="selectpicker col-12" data-style="select-with-transition">
                                            <option value="">Type</option>

                                            <option value="">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-1">
                                <a onclick="" id="" class="btn-info btn-sm " ></a>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                            <label class="col-sm-5 col-form-label ">Three</label>
                            </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <select name=""  id=""  class="selectpicker col-12" data-style="select-with-transition">
                                            <option value="">From</option>

                                            <option value="">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <select name=""  id=""  class="selectpicker col-12" data-style="select-with-transition">
                                            <option value="">To</option>

                                            <option value="">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <select name=""  id="" class="selectpicker col-12" data-style="select-with-transition">
                                            <option value="">Type</option>

                                            <option value="">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-1">
                                <a onclick="" id="" class="btn-info btn-sm " ></a>
                            </div>
                    </div>

                </div>
            </form>

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
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                            cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <th>Slab</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Type</th>
                                                <th>Amoun</th>
                                                <th >Actions</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>  </th>
                                                    <th>  </th>
                                                    <th>  </th>
                                                    <th>  </th>
                                                    <th> </th>
                                                    <td ></td>
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

                                <select name=""  id="" class="selectpicker" data-style="select-with-transition">
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
            </div>
                </div>
        </div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
             <div class="card ">
                <div class="card-body ">
                    <form id="form" class="form-horizontal" >
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

                                                    <select name=""  id="" class="selectpicker" data-style="select-with-transition">
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

                                                    <select name=""  id="" class="selectpicker" data-style="select-with-transition">
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

                                                    <select name=""  id="" class="selectpicker" data-style="select-with-transition">
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

                                                    <select name=""  id="" class="selectpicker" data-style="select-with-transition">
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

                                                    <select name=""  id="" class="selectpicker" data-style="select-with-transition">
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

                                                    <select name=""  id="" class="selectpicker" data-style="select-with-transition">
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
                    </form>
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
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                            cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <th>Fee Description</th>
                                                <th>Fee Category</th>
                                                <th>Fee Type</th>
                                                <th>Fee Ammount</th>
                                                <th>Maximum Amount</th>
                                                <th >Minimum Amount</th>
                                                <th >Action</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>  </th>
                                                    <th>  </th>
                                                    <th>  </th>
                                                    <th>  </th>
                                                    <th> </th>
                                                    <td ></td>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------- -->
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
             <div class="card ">
                <div class="card-body ">
                    <form id="form" class="form-horizontal" >
                        @csrf

                            <div class="card-header card-header-rose card-header-text">
                                <div class="card-text">
                                     <h4 class="card-title">Tax</h4>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Debit Tax Apply</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="checkbox" class="form-control" name="" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Debit Tax Apply Rate</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">WHT Deducation</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="checkbox" class="form-control" name="" id="">
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
             </div>
        </div>
    </div>
</div>

@endsection
