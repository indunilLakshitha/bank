@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
            <div class="card" style="border: solid">
                <div class="row">
                    <div class="col-10">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Step 04 - Assets Details</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                {{-- <h4 class="card-title">Member Creation</h4> --}}
                                <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="private_1" action="/member/add/special-and-assets" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value={{$cus_id}}>
                        <div class="tab-pane" id="special">
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Special Information</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <textarea name="special_information" id="" cols="70" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <label class="col-sm-2 col-form-label">Real Member</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="is_real_member" id="" class="form-control">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <br>
                        </form>

                            <form id="assets_form">
                                @csrf
                                <input type="hidden" name="customer_id" value={{$cus_id}}>
                            <h5 class="text-center">Assets</h5>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Item</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="asset_description" id="item" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Value(Rs.)</label>
                                <div class="col-sm-3">
                                    <input type="number" name="asset_qty" id="value" class="form-control">
                                </div>
                                {{-- <div class="col-sm-3">
                                    <select name="" id="" class="form-control">
                                        <option value="">1</option>
                                        <option value="">2</option>
                                    </select>
                                </div> --}}
                                <hr>
                            </form>

                                <div class="col-sm-2">
                                    <button type="button" onclick="add_asset()" class="btn btn-sm btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-6">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                    <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody id="assets_tbody"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <button onclick="
                                Swal.fire('Click OK to Submit  Customer {{$cus_id}} ').then(() => window.location = '/members')
                                " class="btn btn-sm btn-primary">SUBMIT & FINISH </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function add_asset(){
        // let rnd = Math.random()
        // assets_tbody.innerHTML += `
        // <tr id='row_${rnd}'>
        //     <td>${item.value}</td>
        // <td>${value.value}</td>
        // <td>
        //     <button type="button" onclick="this.parentElement.parentElement.classList.add('d-none')" class="btn btn-sm btn-primary">Remove</button>
        // </td>
        // </tr>
        // `

        $.ajax({
        type: 'POST',
        url: '{{('/add_asset')}}',
        data: new FormData(assets_form) ,
        processData: false,
        contentType: false,
        success: function(data){
            console.log(data);
            return show_data(data)
        }
    })
    }

    function show_data(data){

        assets_tbody.innerHTML = ''

        data.forEach(i => {
            let html = `
            <tr id='${i.id}' >
                <td>${i.asset_description}</td>
            <td>${i.asset_qty}</td>
            <td>
                <button type="button" onclick="
                delete_asset('${i.id}'), this.parentElement.parentElement.classList.add('d-none')" class="btn btn-sm btn-primary">Remove</button>
            </td>
            </tr>
            `
            assets_tbody.innerHTML += html
        })

    }

    function delete_asset(id){
        // console.log(id);
        $.ajax({
        type: 'GET',
        url: '{{('/delete_asset')}}',
        data: {id} ,
        success: function(data){
            console.log(data);
            return
        }
    })
    }

</script>

@endsection
