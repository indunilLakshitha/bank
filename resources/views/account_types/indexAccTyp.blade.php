@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Account Type</h4>
            </div>
        </div>
        <div class="card-body ">
            <form method="POST" class="form-horizontal" action="{{ route('accountType.store') }}"  id="ACform" >
                @csrf

                <div class="row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="account_type" name="account_type">
                            <span class="bmd-help">Account Type Name</span>
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
                                    <th>ACCOUNT TYPE</th>
                                    <th>ACTION</th>
                                </thead>
                                <tbody id="results_tbody">

                                   @isset($accTyps)
                                   @foreach ($accTyps as $accTyp)
                                       <tr>
                                            <th>{{$accTyp->id}}</th>
                                            <th>{{$accTyp->account_type}} </th>
                                           @if(intval($accTyp->is_enable) == 1)
                                                <th>ACTIVE</th>
                                           @else
                                               <th>INACTIVE</th>
                                           @endif
                                            <th><a href="{{ route('accountType.show', $accTyp->id) }}" rel="tooltip" class="btn-sm btn-info " ><i class="material-icons">list</i></a>
                                                <a href="{{route('accountType.edit', $accTyp->id)}}" rel="tooltip" class="btn-sm btn-primary " ><i class="material-icons">edit</i></a>
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
