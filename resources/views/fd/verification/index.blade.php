@extends('layouts.app')

@section('content')


<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">FD Accounts Verification</h4>
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
                                    <th>ID </th>
                                    <th>CODE</th>
                                    <!--th>IDENTIFICATION TYPE</th-->
                                    <th>IDENTIFICATION NUMBER</th>
                                    <th>NAME</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </thead>
                                <tbody id="results_tbody">
                                    <?php
                                     $members=\App\Models\CustomerBasicData::leftjoin('iedentification_types', 'iedentification_types.id', 'customer_basic_data.identification_type_id')
                                     ->where('customer_basic_data.status','1')
                                     ->where('branch_id',Auth::user()->branh_id)

                                     ->get();
                                    ?>
                                    @isset($members)
                                    @foreach ($members as $member)
                                    <tr>
                                        <th>{{$member->id}}</th>
                                        <th>{{$member->customer_id}} </th>
                                        <!--th>{ {$member->customer_type} } </th-->
                                        <th>{{$member->identification_number}}</th>
                                        <th>{{$member->name_in_use}}</th>
                                        @if(intval($member->is_enable) == 1)
                                        <th>ACTIVE</th>
                                        @else
                                        <th>INACTIVE</th>
                                        @endif
                                        <th><a href="{{url('/members/view/'.$member->customer_id)}}" rel="tooltip"
                                                class="btn-sm btn-info btn-round">VIEW</a>
                                            <a href="{{url('/members/edit/'.$member->customer_id)}}" rel="tooltip"
                                                class="btn-sm btn-primary btn-round"><i
                                                    class="material-icons">edit</i></a>
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

<script>
    function search(){
    $.ajax({
        type: 'POST',
        url: '{{('/members/search')}}',
        data: new FormData(form) ,
        processData: false,
        contentType: false,
        success: function(data){
            console.log(data);
            return show_data(data)
        }
    })
    }

    function show_data(data){
        results_tbody.innerHTML = ''
        data.forEach(i => {
            html = `
            <tr>
                <th>${i.id}</th>
                <th>${i.customer_id} </th>
                <th>${i.identification_type} </th>
                <th>${i.identification_number} </th>
                <th>${i.name_in_use}</th>
                <th>${i.is_enable}</th>
                <th><a href="http:/members/view/${i.customer_id}" class="btn btn-primary" >VIEW</a></th>
            </tr>
            `
            results_tbody.innerHTML += html
        })
    }
</script>

@endsection
