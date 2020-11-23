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
            <form method="POST" class="form-horizontal" action="{{ route('accountCategory.store') }}"  id="ACform" >
                @csrf

                <div class="row">
                    <label class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="account_category" name="account_category">
                            <span class="bmd-help">Account Category Name</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Category Code</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="account_category_code" name="account_category_code">
                            <span class="bmd-help">Account Category Code</span>
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
                                    <th>ACCOUNT CATEGORY</th>
                                    <th>ACCOUNT CATEGORY CODE</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </thead>
                                <tbody id="results_tbody">

                                   @isset($accCats)
                                   @foreach ($accCats as $accCat)
                                       <tr>
                                            <th>{{$accCat->id}}</th>
                                            <th>{{$accCat->account_category}} </th>
                                            <th>{{$accCat->account_category_code}} </th>
                                           @if(intval($accCat->is_enable) == 1)
                                                <th>ACTIVE</th>
                                           @else
                                               <th>INACTIVE</th>
                                           @endif
                                            <th><a href="{{ route('accountCategory.show', $accCat->id) }}" rel="tooltip" class="btn-sm btn-info btn-round" ><i class="material-icons">list</a>
                                                <a href="{{route('accountCategory.edit', $accCat->id)}}" rel="tooltip" class="btn-sm btn-primary btn-round" ><i class="material-icons">edit</i></a>
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
