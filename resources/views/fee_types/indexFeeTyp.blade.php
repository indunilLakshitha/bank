@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Fee Type</h4>
            </div>
        </div>
        <div class="card-body ">
            <form method="POST" class="form-horizontal" action="{{ route('feeType.store') }}"  id="ACform" >
                @csrf

                <div class="row">
                    <label class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="fee_type" name="fee_type">
                            <span class="bmd-help">Fee Type</span>
                        </div>
                    </div>
                </div>



                <div class="card-footer ">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-fill btn-rose">ADD</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>ID </th>
                                    <th>CUSTOMER STATUS</th>
                                    <th>ACTION</th>
                                </thead>
                                <tbody id="results_tbody">

                                   @isset($fee_typs)
                                   @foreach ($fee_typs as $fee_typ)
                                       <tr>
                                            <th>{{$fee_typ->id}}</th>
                                            <th>{{$fee_typ->fee_type}} </th>
                                           @if(intval($fee_typ->is_enable) == 1)
                                                <th>ACTIVE</th>
                                           @else
                                               <th>INACTIVE</th>
                                           @endif
                                            <th><a href="{{ route('feeType.show', $fee_typ->id) }}" rel="tooltip" class="btn-sm btn-view btn-round" ><i class="material-icons">list</a>
                                                <a href="{{route('feeType.edit', $fee_typ->id)}}" rel="tooltip" class="btn-sm btn-change btn-round" ><i class="material-icons">edit</i></a>
                                                <a href="{{route('feeType.destroy', $fee_typ->id)}}" rel="tooltip" class="btn-sm btn-delete btn-round" ><i class="material-icons">delete</i></a>
                                            </th>
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
