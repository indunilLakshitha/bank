<button id="nominee_modal_trigger_btn" type="button" class="btn btn-primary d-none" data-toggle="modal"
    data-target="#nominees_modal">
    Launch demo modal
</button>
<!-- Modal -->
<div class="modal fade" id="nominees_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 800px;height: auto">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Nominees</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                {{-- <div class="row align-content-center">
                <div class="col">
                    <button type="button" class="btn fa fa-search btn-info " data-toggle="modal"
            href="#noticeModal"> SEARCH Nominees</button>
                </div>
            </div> --}}
                <div class="row mt-5">
                    <label class="col-sm-2 col-form-label"> Client Full Name</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input
                                        oninput="toCap(this.value, this.id), nominees_get_modal_search_by_full_name(this.value)"
                                        type="text" class="form-control js-example-data-ajax" id="nominee_full_name"
                                        placeholder="Enter Full Name">
                                </div>
                            </div>
                            <div class="col">
                                {{-- <button class="btn fa fa-search btn-info btn"
                                            onclick="get_cus_details(client_full_name.value)">
                                            &nbspType in to search By Full Name</button> --}}
                                <button class="btn  btn-info btn"
                                    onclick="nominees_modal_serach_by_name_results_tbody.innerHTML = null">
                                    Clear Results </button>

                            </div>
                            <div class="col">
                                {{-- <button class="btn fa fa-search btn-info btn"
                                            onclick="get_cus_details(client_full_name.value)">
                                            &nbspType in to search By Full Name</button> --}}
                                <a class="btn  btn-info btn" data-toggle="modal" href="#exxternal_nominee">
                                    External </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <label class="col-sm-2 col-form-label"> Customer ID</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input oninput="
                                            // toCap(this.value, this.id),
                                            nominees_get_modal_search_by_customer_id(this.value)" type="text"
                                        class="form-control js-example-data-ajax" placeholder="Enter Customer ID">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <tbody id="nominees_modal_serach_by_name_results_tbody" class="d-none"></tbody>
                    </table>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">ID Type</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    @php
                                    $idtypes =
                                    Illuminate\Support\Facades\DB::table('iedentification_types')->get();
                                    @endphp
                                    <select name="identification_type_id" id="nominee_identification_type_id"
                                        class="selectpicker" data-style="select-with-transition">
                                        <option value="">Select</option>
                                        @isset($idtypes)
                                        @foreach ($idtypes as $idtype)
                                        <option value="{{$idtype->id}}">
                                            {{$idtype->identification_type}}
                                            @endforeach
                                            @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">ID Number</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group">
                                    <input type="text" name="identification_number" id="nominee_identification_number"
                                        class="form-control" placeholder="">

                                </div>
                            </div>
                            <div class="col-4">
                                <button class="btn fa fa-search btn-info btn"
                                    onclick="get_cus_details(nominee_identification_type_id.value, nominee_identification_number.value)">
                                    &nbspSearch By ID</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">Slected Nominee</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group">
                                    <input type="text" required readonly id="nominee_id" class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                    <label class="col-sm-2 col-form-label">Relationship</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <select name="relation_type" id="relation_type" class="form-control"
                                        data-style="select-with-transition" required>
                                        <option value="">select</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Father">Father</option>
                                        <option value="Wife">Wife</option>
                                        <option value="Husband">Husband</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Son">Son</option>
                                        <option value="Daughter">Daughter</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
 <div class="col-4">
                                <button class="btn btn-primary btn"
                                    onclick="add_nominee(nominee_id.value, customer_id.value,relation_type.value)">
                                    Add Nominee</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <tbody id="show_nominees_tbody" class="d-none"></tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <a type="button" onclick="close()" class="btn btn-rose" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
@include('layouts.external_nominies')

<script>
    let nominees;

    function nominees_get_modal_search_by_full_name(value){
        console.log(value);
        if(value === ''){
            modal_serach_by_name_results_tbody.innerHTML = ''
        }
        $.ajax({
        type: 'GET',
        url: '{{('/search_by_full_name')}}',
        data: {text:value} ,
        success: function(data){
            console.log(data);
            return nominees_set_modal_serach_by_name_results(data)
        }
    })
    }

    function nominees_get_modal_search_by_customer_id(value){
        console.log(value);
        if(value === ''){
            modal_serach_by_name_results_tbody.innerHTML = ''
        }
        $.ajax({
        type: 'GET',
        url: '{{('/search_by_customer_id')}}',
        data: {text:value} ,
        success: function(data){
            console.log(data);
            return nominees_set_modal_serach_by_name_results(data)
        }
    })
    }

function nominees_set_modal_serach_by_name_results(data){
    console.log('inside setter -modal', data);
    nominees_modal_serach_by_name_results_tbody.classList.remove('d-none')
    nominees_modal_serach_by_name_results_tbody.innerHTML = ''

    nominees = data

    data.forEach(i => {
        let html = `
        <tr id='${i.id}' >
            <td>${i.customer_id}</td>
        <td>${i.full_name}</td>
        <td>
            <button type="button"
            onclick=
            "
            this.parentElement.parentElement.parentElement.classList.add('d-none'),
            nominees_set_cus_details_from_modal('${i.id}')
            "
            class="btn btn-sm btn-primary">Select</button>
        </td>
        </tr>
        `
        nominees_modal_serach_by_name_results_tbody.innerHTML += html
    })


}

function nominees_set_cus_details_from_modal(id){
    // console.log(123);

    nominees.filter(cus => {
        if(cus.id === parseInt(id)){
            nominee_id.value = cus.customer_id
             return console.log('nominee', cus);
            //  console.log(full_name);
        }
    })
}

function add_nominee(nominee_id, member_id,relation_type){
     console.log(relation_type);
        $.ajax({
            type: 'GET',
            url: '{{('/add_nominee_member_creation')}}',
            data: {
                nominee_id,
                member_id,
                relation_type
            },
            success: function(data){
                console.log(data)
                return show_nominees(data)

            },
            error: function(data){
                console.log(data)
            }

        })
    }

    function show_nominees(data){
        show_nominees_tbody.classList.remove('d-none')
        show_nominees_tbody.innerHTML = ''

        data.forEach(i => {
        let html = `
        <tr id='${i.id}' >
            <td>${i.nominee_id}</td>
            <td>${i.relation_type}</td>
        <td>
            <button type="button"
            onclick=
            "
            this.parentElement.parentElement.classList.add('d-none'),
            remove_nominee('${i.id}')
            "
            class="btn btn-sm btn-primary">Remove</button>
        </td>
        </tr>
        `
        show_nominees_tbody.innerHTML += html

    });
}


    function remove_nominee(id){
        $.ajax({
            type: 'GET',
            url: '{{('/remove_nominee_member_creation')}}',
            data: {
               id
            },
            success: function(data){
                console.log(data)
                return

            },

        })
    }
     function close(){

       $.ajax({
            type: 'GET',
            url: '{{('/close')}}',
            data: {
               id
            },
            success: function(data){
                console.log(data)
                return

            },

        })
    }
</script>
