@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Member Verification</h4>
            </div>
        </div>
        <div class="card-body ">
            <form id="form">
                @csrf
                <div class="row">
                    <label class="col-sm-2 col-form-label">CIF</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" name="customer_id">
                            <span class="bmd-help">Use Member Code To Search</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Client Name</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" name="full_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Identification Type</label>
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-3">
                            @php
                            $idtypes = Illuminate\Support\Facades\DB::table('iedentification_types')->get()
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
                        <div class="col-lg-5 col-md-6 col-sm-3 ml-5">
                            <input type="text" class="form-control" name="identification_number"
                                placeholder="Enter Identification No">

                        </div>
                    </div>

                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Account No</label>
                    <div class="col-lg-5 col-md-6 col-sm-3">
                        <input type="text" class="form-control" name="account_number">

                    </div>
                </div>

            </form>
            <div class="card-footer ">
                <div class="row">
                    <div class="col-md-6">
                        <button onclick="search()" class="btn btn-fill btn-rose">SEARCH</button>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>Customer Id  </th>
                                    <th>Name</th>
                                    <th>Full Name</th>
                                    <th>Identification No</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="results_tbody">
                                    @isset($membrs)
                                    @foreach ($membrs as $membr)
                                <tr>
                                    <th>{{$membr->customer_id }}</th>
                                    <th>{{$membr->name_in_use }}</th>
                                    <th>{{$membr->full_name }}</th>
                                    <th>{{$membr->identification_number }}</th>
                                    <td class="td-actions text-right">
                                        <a href="{{url('/members/view/check/'.$membr->customer_id)}}" rel="tooltip"
                                            class="btn btn-info btn-round">
                                            <i class="material-icons">edit</i> <span class="mx-1">Check</span>
                                        </a>
                    
                                        <a href="{{url('/members/view/verify/'.$membr->customer_id)}}" rel="tooltip"
                                            class="btn btn-primary btn-round">
                                            <i class="material-icons">check</i> <span class="mx-1">Verify</span>
                                        </a>
                                    </td>

                                    </tr>
                                    @endforeach
                                    @endisset


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
