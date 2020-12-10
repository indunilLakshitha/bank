@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
                <h4 class="card-title">
                    <a href="/savings/open" rel="tooltip" class="btn btn-sm btn-primary btn-round pull-right">
                        <i class="material-icons">add</i> <span class="mx-1">Add Savings</span>
                    </a>
                </h4>
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    {{-- <th >ID </th> --}}
                                    <th>CIF</th>
                                    <th>Full Name</th>
                                    <th>Identification No</th>
                                    <th>Account No </th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="results_tbody">
                                   @foreach ($account as $member)
                                       <tr>
                                            {{-- <th>{{$member->id}}</th> --}}
                                            <th>{{$member->customer_id}} </th>
                                            <th>{{$member->full_name}}</th>
                                            <th>{{$member->identification_number}}</th>
                                            <th>{{$member->account_number}}</th>
                                            <th>
                                                <a href="/passbook-front/{{$member->account_number}}" class="btn fa fa-print btn-info btn-sm" ></a>
                                                <a href="/passbook-back" class="btn fa fa-print btn-info btn-sm" ></a>
                                                <a href="/savings/account/{{$member->customer_id}}" class="btn btn-primary" >ACCOUNT</a>
                                                <a href="/members/view/{{$member->customer_id}}" class="btn btn-primary" >General</a>
                                            </th>
                                       </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>


</script>

@endsection
