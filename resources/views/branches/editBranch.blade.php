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
            <form method="POST" class="form-horizontal" action="{{route('branches.update',$branch->id)}}"  id="Branchform" >
                @csrf
                {{ method_field('PUT') }}
                <div class="row">
                    <label class="col-sm-2 col-form-label">Branch Name</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="branch_name" name="branch_name" value="{{$branch->branch_name}}">
                            <span class="bmd-help">Branch Name</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Branch Code</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="branch_code" name="branch_code" value="{{$branch->branch_code}}">
                            <span class="bmd-help">Branch Code</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-fill btn-rose">SAVE</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
