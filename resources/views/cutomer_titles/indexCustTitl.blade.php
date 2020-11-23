@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Customer Title</h4>
            </div>
        </div>
        <div class="card-body ">
            <form method="POST" class="form-horizontal" action="{{ route('cutomerTitle.store') }}"  id="ACform" >
                @csrf

                <div class="row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="customer_title" name="customer_title">
                            <span class="bmd-help">Customer Status</span>
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

                                   @isset($cust_titls)
                                   @foreach ($cust_titls as $cust_titl)
                                       <tr>
                                            <th>{{$cust_titl->id}}</th>
                                            <th>{{$cust_titl->customer_title}} </th>
                                           @if(intval($cust_titl->is_enable) == 1)
                                                <th>ACTIVE</th>
                                           @else
                                               <th>INACTIVE</th>
                                           @endif
                                            <th><a href="{{ route('cutomerTitle.show', $cust_titl->id) }}" rel="tooltip" class="btn-sm btn-view btn-round" ><i class="material-icons">list</a>
                                                <a href="{{route('cutomerTitle.edit', $cust_titl->id)}}" rel="tooltip" class="btn-sm btn-change btn-round" ><i class="material-icons">edit</i></a>
                                                <a href="{{route('cutomerTitle.destroy', $cust_titl->id)}}" rel="tooltip" class="btn-sm btn-delete btn-round" ><i class="material-icons">delete</i></a>
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
