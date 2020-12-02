@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Add New Branch</h4>
            </div>
        </div>
        <div class="card-body ">
            <form method="POST" class="form-horizontal" action="{{route('branches.store')}}" id="Branchform">
                @csrf
                <div class="row">
                    <label class="col-sm-2 col-form-label">Branch Name</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="branch_name" name="branch_name">
                            <span class="bmd-help">Branch Name</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Branch Code</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="branch_code" name="branch_code">
                            <span class="bmd-help">Branch Code</span>
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
                                    <th>BRANCH</th>
                                    <th>BRANCH CODE</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </thead>
                                <tbody id="results_tbody">

                                    @isset($branches)
                                    @foreach ($branches as $b)
                                    <tr>
                                        <th>{{$b->id}}</th>
                                        <th>{{$b->branch_name}} </th>
                                        <th>{{$b->branch_code}} </th>
                                        @if(intval($b->is_enable) == 1)
                                        <th>ACTIVE</th>
                                        @else
                                        <th>INACTIVE</th>
                                        @endif
                                        <th>
                                            <form action="{{route('branches.destroy', $b->id)}}" method="POST">
                                                <a href="{{ route('branches.edit', $b->id) }}" rel="tooltip"
                                                    class="btn-sm btn-primary "><i class="material-icons">edit</i></a>
                                                {{ csrf_field() }}
                                                {{ method_field('Delete')}}
                                                <button type="submit" rel="tooltip" class="btn-es btn-danger "><i
                                                        class="material-icons">delete</i></button>
                                            </form>
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
