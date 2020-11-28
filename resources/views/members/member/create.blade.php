@extends('layouts.app')


@section('content')
{{-- <form method="get" action="/" class="form-horizontal"> --}}
<div class="card " style="border: solid">
    <div class="card-body ">
        <div class="card-header card-header-rose card-header-text">
            <div class="card-text">
                <h4 class="card-title">Member Creation</h4>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Member Name</label>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="member" oninput="getCustomers(this.value)">

                </div>
            </div>
            {{-- <button class="btn fa fa-search btn-info btn"> &nbspFind</button> --}}
        </div>
        <div class="row ">
            <div class="col">
                <table class="table">
                    <tbody id="results_tbody" class="d-none"></tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Authorization Type</label>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" >
                </div>
            </div>
            {{-- <button class="btn fa fa-search btn-info btn-sm"></button> --}}
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Authantification Number</label>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control">
                </div>
            </div>
            <button class="btn fa fa-search btn-info btn-sm"></button>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Customer Name</label>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="full_name" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Allocated Shares</label>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">Payment Amount</label>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-6 text-right">
                <a
                    class="btn btn-rose col-4 text-white">SUBMIT</a>
            </div>
            <div class="col-1 text-right">
                <button type="submit" class="btn ">Clear</button>
            </div>
        </div>

    </div>
</div>

<script>
    function getCustomers(value){
        // console.log(value);
        $.ajax({
        type: 'GET',
        url: '{{('/search_by_full_name')}}',
        data: {name} ,
        success: function(data){
            console.log(data);
            return show_data(data)
        }
    })
    }

    function show_data(data){

        results_tbody.classList.remove('d-none')
        results_tbody.innerHTML = ''

data.forEach(i => {
    let html = `
    <tr id='${i.id}' >
        <td>${i.customer_id}</td>
    <td>${i.full_name}</td>
    <td>
        <button type="button" onclick="
        add_name('${i.full_name}'), this.parentElement.parentElement.parentElement.classList.add('d-none')" class="btn btn-sm btn-primary">Select</button>
    </td>
    </tr>
    `
    results_tbody.innerHTML += html
})

}

function add_name(name){
    // console.log(name);
    return full_name.value = name
}

</script>



@endsection
