@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Member Verification</h4>
            </div>
        </div>
        <div class="card-body ">
            <form id="form">
                @csrf
                <div class="row">
                    <label class="col-sm-2 col-form-label">CIF</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" name="customer_id" id="customer_id">
                            <span class="bmd-help">Use Member Code To Search</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Client Name</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" name="full_name" id="full_name">
                            <span class="bmd-help">Use Client Full Name To Search</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">ID Number</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Identification No"
                                name="identification_number" id="identification_number">
                            <span class="bmd-help">Use Client ID Number To Search</span>
                        </div>
                    </div>
                </div>

            </form>
            <div class="card-footer ">
                <div class="row">
                    <div class="col-md-6">
                        <button onclick="search()" class="btn btn-fill btn-rose">SEARCH</button>
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
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <th>Customer Id </th>
                                    <th>Full Name</th>
                                    <th>Identification No</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="results_tbody">
                                    @isset($membrs)
                                    @foreach ($membrs as $membr)
                                    <tr>
                                        <th>{{$membr->customer_id }}</th>
                                        <th>{{$membr->full_name }}</th>
                                        <th>{{$membr->identification_number }}</th>
                                        <th>Non Member</th>
                                        <td class="td-actions text-right">
                                            <a href="{{url('/members/view/check/'.$membr->customer_id)}}" rel="tooltip"
                                                class="btn btn-info btn-round">
                                                <i class="material-icons">edit</i> <span class="mx-1">Check</span>
                                            </a>

                                            <a href="{{url('/members/view/verify/'.$membr->customer_id)}}" rel="tooltip"
                                                class="btn btn-primary btn-round">
                                                <i class="material-icons">check</i> <span class="mx-1">Verify</span>
                                            </a>
                                        </td>

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
"for_verify": 1,
},
}).done(function(data) {
//console.log(data);
return show_data(data);
});
}

function show_data(data){
results_tbody.innerHTML = ''
data.forEach(i => {
html = `
<tr>
<th>${i.customer_id} </th>
<th>${i.full_name}</th>
<th>${i.identification_number} </th>
<th>${i.status}</th>
<th>
<a href="/members/view/check/${i.customer_id}" class="btn btn-primary" >Check</a>
<a href="/members/view/verify/${i.customer_id}" class="btn btn-primary" >Verify</a>
</th>
</tr>
`
results_tbody.innerHTML += html
})
}
</script>

@endsection
