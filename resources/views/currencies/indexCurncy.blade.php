@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Currency</h4>
            </div>
        </div>
        <div class="card-body ">
            <form method="POST" class="form-horizontal" action="{{ route('currency.store') }}"  id="ACform" >
                @csrf

                <div class="row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="currency_name" name="currency_name">
                            <span class="bmd-help">Currency Name</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="currency_code" name="currency_code">
                            <span class="bmd-help">Currency Code</span>
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
                                    <th>CURRENCY NAME</th>
                                    <th>CURRENCY CODE</th>
                                    <th>ACTION</th>
                                </thead>
                                <tbody id="results_tbody">

                                   @isset($curncs)
                                   @foreach ($curncs as $curnc)
                                       <tr>
                                            <th>{{$curnc->id}}</th>
                                            <th>{{$curnc->currency_name}} </th>
                                            <th>{{$curnc->currency_code}} </th>
                                           @if(intval($curnc->is_enable) == 1)
                                                <th>ACTIVE</th>
                                           @else
                                               <th>INACTIVE</th>
                                           @endif
                                            <th><a href="{{ route('currency.show', $curnc->id) }}" rel="tooltip" class="btn-sm btn-view btn-round" ><i class="material-icons">list</a>
                                                <a href="{{route('currency.edit', $curnc->id)}}" rel="tooltip" class="btn-sm btn-change btn-round" ><i class="material-icons">edit</i></a>
                                                <a href="{{route('currency.destroy', $curnc->id)}}" rel="tooltip" class="btn-sm btn-delete btn-round" ><i class="material-icons">delete</i></a>
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
