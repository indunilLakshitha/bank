@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Members</h4>
            </div>
        </div>
        <div class="card-body ">
            <form method="get" class="form-horizontal" id="form">
                @csrf
                <div class="row">
                    <label class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="customer_id" name="customer_id">
                            <span class="bmd-help">Use Member Code To Search</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" id="full_name" name="full_name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Relegion</label>
                    <div class="col-lg-5 col-md-6 col-sm-3">
                        @php
                           $religions = Illuminate\Support\Facades\DB::table('relegion_data')->get();
                        @endphp
                        <select class="selectpicker" data-style="select-with-transition"  title="Select"
                            name="religion_data_id" id="religion_data_id"
                        >
                        <option value="">Select</option>
                            @foreach ($religions as $r)
                                <option value="{{$r->id}}">{{$r->religion_data}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-lg-5 col-md-6 col-sm-3">
                        <select class="selectpicker" data-style="select-with-transition" multiple title="Type"
                            data-size="7">
                            <option value="">Select</option>
                            <option  > type 1</option>
                            <option  > type 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Civil Status</label>
                    <div class="col-lg-5 col-md-6 col-sm-3">
                        @php
                           $marital_status = Illuminate\Support\Facades\DB::table('married_statuses')->get();
                        @endphp
                        <select name="married_status_id" class="selectpicker" id="married_status_id" data-style="select-with-transition" title="Select"
                            >
                            <option value="">Select</option>
                            @foreach ($marital_status as $ms)
                                <option value="{{$ms->id}}">{{$ms->married_status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Expiry</label>
                    <div class="col-lg-5 col-md-6 col-sm-3">
                        <input type="date" name="expire_date" id="expire_date" class="form-control">
                    </div>
                </div>


            </form>
                <div class="card-footer ">
                    <div class="row">
                        <div class="col-md-6">
                            <button onclick="search()" class="btn btn-fill btn-rose">SEARCH</button>
                        </div>

                        <div class="col-md-6">
                            <a href="/members/type" type="" class="btn btn-fill btn-rose">TYPE</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-success card-header-icon">
                {{-- <div class="card-icon">
            <i class="material-icons"></i>
          </div> --}}
                <h4 class="card-title">
                    <a href="/members/add" rel="tooltip" class="btn btn-sm btn-primary btn-round pull-right">
                        <i class="material-icons">add</i> <span class="mx-1">Add Member</span>
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
                                    <th>ID </th>
                                    <th>CODE</th>
                                    <th>NAME</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </thead>
                                <tbody id="results_tbody">
                                   <?php $members=\App\Models\CustomerBasicData::all()?>
                                   @isset($members)
                                   @foreach ($members as $member)
                                   <tr>
                                    <th>{{$member->id}}</th>
                                    <th>{{$member->customer_id}} </th>
                                    <th>{{$member->name_in_use}}</th>
                                    <th>{{$member->is_enable}}</th>
                                    <th><a href="/members/view/{{$member->customer_id}}" class="btn btn-primary" >VIEW</a></th>
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
