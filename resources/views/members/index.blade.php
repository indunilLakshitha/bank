@extends('layouts.app')

@section('content')


<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Customer</h4>
            </div>
        </div>
        <div class="card-body ">
            <form method="get" class="form-horizontal" id="form">
                @csrf

                <div class="row">
                    <label class="col-sm-2 col-form-label">Code</label>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="customer_id" name="customer_id">
                            <span class="bmd-help">Use Member Code To Search</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">ID Number</label>
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="identification_number" id="identification_number" class="form-control"
                                        placeholder="900000000V">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" id="full_name" name="full_name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Religion</label>
                    <div class="col-lg-5 col-md-6 col-sm-3">
                        @php
                        $religions = Illuminate\Support\Facades\DB::table('relegion_data')->get();
                        @endphp
                        <select class="selectpicker" data-style="select-with-transition" title="Select"
                            name="religion_data_id" id="religion_data_id">
                            <option value="">Select Religion</option>
                            @foreach ($religions as $r)
                                <option value="{{$r->id}}">{{$r->religion_data}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
<<<<<<< HEAD

=======
>>>>>>> d3384bf60878e6b882fe4768b45ee6620d18a8de
                <div class="row">
                    <label class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-lg-5 col-md-6 col-sm-3">
                        @php
                            $gender = Illuminate\Support\Facades\DB::table('genders')->get();
                        @endphp
                        <select class="selectpicker" data-style="select-with-transition" title="Select"
                                name="gender_id" id="gender_id">
                            <option value="">Select Gender</option>
                            @foreach ($gender as $g)
                                <option value="{{$g->id}}">{{$g->gender}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Civil Status</label>
                    <div class="col-lg-5 col-md-6 col-sm-3">
                        @php
                        $marital_status = Illuminate\Support\Facades\DB::table('married_statuses')->get();
                        @endphp
                        <select name="married_status_id" class="selectpicker" id="married_status_id"
                            data-style="select-with-transition" title="Select">
                            <option value="">Select civil status</option>
                            @foreach ($marital_status as $ms)
                                <option value="{{$ms->id}}">{{$ms->married_status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Join Date</label>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <input type="date" name="join_date" id="join_date" class="form-control">
                    </div>
                </div>
            </form>
            <div class="card-footer ">
                <div class="row">
                    <div class="col-md-6">
                        <button onclick="search()" class="btn btn-fill btn-rose">SEARCH</button>
                    </div>

                    <!--div class="col-md-6">
                        <a href="/members/type" type="" class="btn btn-fill btn-rose">TYPE</a>
                    </div-->
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
                @can('add_member')
                    <h4 class="card-title">
                        <a href="/members/add" rel="tooltip" class="btn btn-sm btn-primary btn-round pull-right">
                            <i class="material-icons">add</i> <span class="mx-1">Add Member</span>
                        </a>
                    </h4>
                @endcan
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <!--th>ID </th-->
                                    <th>CODE</th>
                                    <!--th>IDENTIFICATION TYPE</th-->
                                    <th>IDENTIFICATION NUMBER</th>
                                    <th>FULL NAME</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </thead>
                                <tbody id="results_tbody">
                                    <?php
                                    $sql = "SELECT cbd.`id`, cbd.`customer_id`, cbd.`customer_status_id`, cbd.`full_name`, cbd.`customer_status_id`,
                                            `status`, cbd.`identification_number`, IF(`member` = 1, 'Member', 'Non Member') AS 'status'
                                            FROM customer_status_dates AS csd
                                            LEFT JOIN customer_basic_data AS cbd ON cbd.customer_id = csd.customer_id
                                            LEFT JOIN iedentification_types AS it ON it.id = cbd.identification_type_id
                                            WHERE `status` != 3 ";
                                    $user_data = Auth::user();
                                    if(intval($user_data->roles[0]->id) != 1) {
                                        $branch_id = $user_data->branh_id;
                                        $sql .= " AND cbd.branch_id = ". $branch_id;
                                    }
                                    $members = DB::select($sql);
                                     /*$members=\App\Models\CustomerBasicData::leftjoin('iedentification_types', 'iedentification_types.id', 'customer_basic_data.identification_type_id')
                                     ->where('customer_basic_data.status','1')
                                     ->where('branch_id',Auth::user()->branh_id)

                                     ->get();*/
                                    ?>
                                   @isset($members)
                                       @foreach ($members as $member)
                                           <tr>
                                                <!--th>{ {$member->id} }</th-->
                                                <th>{{$member->customer_id}} </th>
                                                <!--th>{ {$member->customer_type} } </th-->
                                                <th>{{$member->identification_number}}</th>
                                                <th>{{$member->full_name}}</th>
                                                <th>{{$member->status}}</th>
                                                <th>
                                                    <a href="{{url('/members/view/'.$member->customer_id)}}" rel="tooltip" class="btn-sm btn-info btn-round" >VIEW</a>
                                                    <a href="{{url('/members/edit/'.$member->customer_id)}}" rel="tooltip" class="btn-sm btn-primary btn-round" >EDIT</a>
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
        let customer_id = $("#customer_id").val();
        let identification_number = $("#identification_number").val();
        let full_name = $("#full_name").val();
        let religion_data_id = $("#religion_data_id").val();
        let gender_id = $("#gender_id").val();
        let married_status_id = $("#married_status_id").val();
        let expire_date = $("#expire_date").val();
        let join_date = $("#join_date").val();
        //alert(religion_data_id);
        $.ajax({
            type: 'POST',
            url: '{{('/members/search')}}',
            data: {
                "customer_id": customer_id,
                "identification_number": identification_number,
                "full_name": full_name,
                "religion_data_id": religion_data_id,
                "gender_id": gender_id,
                "married_status_id": married_status_id,
                "expire_date": expire_date,
                "join_date": join_date,
                "for_verify": 0,
            },
        }).done(function(data) {
            console.log(data);
            return show_data(data);
        });
    }

    function show_data(data){
        results_tbody.innerHTML = ''
        data.forEach(i => {
            html = `
            <tr>
                <th>${i.customer_id} </th>
                <th>${i.identification_number} </th>
                <th>${i.full_name}</th>
                <th>${i.status}</th>
                <th><a href="/members/view/${i.customer_id}" class="btn btn-primary" >VIEW</a></th>
            </tr>
            `
            results_tbody.innerHTML += html
        })
    }
</script>

@endsection
