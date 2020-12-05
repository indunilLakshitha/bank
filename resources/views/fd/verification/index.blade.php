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
                                    <th>ACCOUNT ID </th>
                                    <th>CODE</th>
                                    <th>BRANCH ID</th>
                                    <th>NAME</th>
                                    <th>ACTION</th>
                                </thead>
                                <tbody id="results_tbody">
                                    <?php
                                     $members=\App\Models\FdAccountGeneralInformation::leftjoin('customer_basic_data', 'customer_basic_data.customer_id', 'fd_account_general_information.customer_id')
                                     ->where('fd_account_general_information.status','2')

                                     ->get();
                                    ?>
                                    @isset($members)
                                    @foreach ($members as $member)
                                    <tr>
                                        <th>{{$member->account_id}}</th>
                                        <th>{{$member->customer_id}} </th>
                                        <!--th>{ {$member->customer_type} } </th-->
                                        <th>{{$member->branch_id}}</th>
                                        <th>{{$member->name_in_use}}</th>
                                        <th><a href="{{url('/fd/view/'.$member->account_id)}}" rel="tooltip"
                                                class="btn btn-sm btn-info btn-round">VIEW</a>
                                            <a href="{{url('/fd/verification/'.$member->account_id)}}" rel="tooltip"
                                                class="btn btn-sm btn-primary btn-round"><i class="material-icons">check</i> <span class="mx-1">Verify</span></a>
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
