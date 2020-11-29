@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Account Category</h4>
            </div>
        </div>
        <div class="card-body ">
            <form class="form-horizontal" method="POST" action="{{ route('accountCategory.update', $accCats->id) }}"  id="ACeditform" >
                @csrf
                {{ method_field('PUT') }}
                <div class="row">
                    <label class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="account_category" name="account_category" value="{{ $accCats->account_category }}">
                            <span class="bmd-help">Account Category Name</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Category Code</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="account_category_code" name="account_category_code" value="{{ $accCats->account_category_code }}">
                            <span class="bmd-help">Account Category Code</span>
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
