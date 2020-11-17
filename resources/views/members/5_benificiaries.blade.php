@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
            <div class="card">
                <div class="card-body">
                    <form id="private_1" action="/member/add/benificiaris" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value={{$cus_id}}>
                        <div class="tab-pane active" id="private_1">
                            {{-- <h5 class="info-text"> Let's start with the basic information (with validation)</h5> --}}
                            <h5 class="">Beneficiaries</h5>
                            <div class="row">
                                <label class="col-sm-1 col-form-label">Add</label>
                                <div class="col-sm-2">
                                    <select name=""  class="form-control" id="select_bene">
                                        @foreach ($all_customers as $customer)
                                            <option value="{{$customer->customer_id}}">{{$customer->name_in_use}}</option>
                                        @endforeach
                                    </select> </div>
                                <div class="col-sm-2">
                                    <a class="btn btn-sm btn-primary"
                                    onclick="add_bene_guard('/bene', '{{$cus_id}}', select_bene.value)"
                                    >ADD</a>
                                </div>
                                {{-- <div class="col-sm-7">
                                    <input type="text" class="form-control">
                                </div> --}}
                            </div>
                            <div class="row">
                                <table class="table text-center d-none" id="bene_table">
                                   <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Beneficiary Name</th>
                                    </tr>
                                   </thead>
                                   <tbody id="bene_body">

                                   </tbody>
                                </table>
                            </div>

                            <br>
                            <h5 class="">Guardians</h5>
                            <div class="row">
                                <label class="col-sm-1 col-form-label">1st</label>
                                <div class="col-sm-2">
                                    <select name="" id="select_guard" class="form-control" >
                                        @foreach ($all_customers as $customer)
                                            <option value="{{$customer->customer_id}}">{{$customer->name_in_use}}</option>
                                        @endforeach
                                    </select> </div>
                                <div class="col-sm-2">
                                    <a class="btn btn-sm btn-primary"
                                    onclick="add_bene_guard('/guard', '{{$cus_id}}', select_guard.value)"
                                    >ADD</a>
                                </div>
                                {{-- <div class="col-sm-7">
                                    <input type="text" class="form-control">
                                </div> --}}
                            </div>
                            <div class="row">
                                <table class="table text-center d-none" id="guard_table">
                                   <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Guardian Name</th>
                                    </tr>
                                   </thead>
                                   <tbody id="guard_body">

                                   </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">NEXT</button>
                    </form>
                    {{-- Ends Private 1 --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function add_bene_guard(url, customer_id, id){

        $.ajax({
            type : 'GET',
            url,
            data : {
                customer_id, id
            },
            success : function(data) {
                if(data[0] === 'bene'){
                    bene_table.classList.remove('d-none')
                    bene_body.innerHTML = ''

                    let i = 1
                    data[1].forEach(r => {
                        html = `
                        <tr>
                            <th> ${i} </th>
                            <th> ${r.name_in_use} </th>
                        </tr>
                        `
                        i++
                        bene_body.innerHTML += html
                    })

                } else if (data[0] === 'guard'){
                    guard_table.classList.remove('d-none')
                    guard_body.innerHTML = ''

                    let i = 1
                    data[1].forEach(r => {
                        html = `
                        <tr>
                            <th> ${i} </th>
                            <th> ${r.name_in_use} </th>
                        </tr>
                        `
                        i++
                        guard_body.innerHTML += html
                    })
                }

            }
        })
    }
</script>

@endsection
