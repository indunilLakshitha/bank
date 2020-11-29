{{-- <style>
    .modal-content{
        overflow-y: auto;
    }
</style> --}}
<div class="row">
    <div class="col-md-12 text-center">
        <!-- notice modal -->
        <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content " style="width: 800px;height: auto">
                    <div>
                        <div class="row mt-5">
                            <label class="col-sm-2 col-form-label"> Client Full Name</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input oninput="toCap(this.value, this.id), get_modal_search_by_full_name(this.value)"
                                                type="text" class="form-control js-example-data-ajax"
                                                id="client_full_name"
                                                placeholder="Enter Full Name"
                                                >
                                        </div>
                                    </div>
                                    <div class="col">
                                        {{-- <button class="btn fa fa-search btn-info btn"
                                            onclick="get_cus_details(client_full_name.value)">
                                            &nbspType in to search By Full Name</button> --}}
                                            <button class="btn  btn-info btn"
                                            onclick="modal_serach_by_name_results_tbody.innerHTML = null"
                                            >
                                            Clear Results </button>

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
                                            <input
                                            oninput=
                                            "
                                            // toCap(this.value, this.id),
                                            get_modal_search_by_customer_id(this.value)"
                                                type="text" class="form-control js-example-data-ajax"

                                                placeholder="Enter Customer ID"
                                                >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table">
                                <tbody id="modal_serach_by_name_results_tbody" class="d-none"></tbody>
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
                                            <select name="identification_type_id" id="identification_type_id"
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
                                            <input type="text" name="identification_number" id="identification_number"
                                                class="form-control" placeholder="">

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn fa fa-search btn-info btn"
                                            onclick="get_cus_details(identification_type_id.value, identification_number.value)">
                                            &nbspSearch By ID</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end notice modal -->
    </div>
</div>

<script>

    let customer_data;

    function get_modal_search_by_full_name(value){
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
            return set_modal_serach_by_name_results(data)
        }
    })
    }

    function get_modal_search_by_customer_id(value){
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
            return set_modal_serach_by_name_results(data)
        }
    })
    }
    get_modal_search_by_customer_id

function set_modal_serach_by_name_results(data){
    console.log('inside setter -modal', data);
    modal_serach_by_name_results_tbody.classList.remove('d-none')
    modal_serach_by_name_results_tbody.innerHTML = ''

    customer_data = data

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
            set_cus_details_from_modal('${i.id}')
            "
            class="btn btn-sm btn-primary">Select</button>
        </td>
        </tr>
        `
        modal_serach_by_name_results_tbody.innerHTML += html
    })


}

function set_cus_details_from_modal(id){
    // console.log(customer_data);

    customer_data.filter(cus => {
        if(cus.id === parseInt(id)){
            full_name.value = cus.full_name
            customer_id.value = cus.customer_id
             return console.log(cus);
            //  console.log(full_name);
        }
    })
}
</script>
