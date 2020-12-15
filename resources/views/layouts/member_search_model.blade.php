{{-- <style>
    .modal-content{
        overflow-y: auto;
    }
</style> --}}
<div class="row">
    <div class="col-md-12 text-center">
        <!-- notice modal -->
        <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content " style="width: 800px;height: auto">
                    <div>
                        <div class="row mt-5 ml-3">
                            <label class="col-sm-2 col-form-label"> Client Full Name</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input
                                                oninput="toCap(this.value, this.id), get_modal_search_by_full_name(this.value)"
                                                type="text" class="form-control js-example-data-ajax"
                                                name="client_full_name_search_modal" id="client_full_name_search_modal"
                                                placeholder="Enter Full Name">
                                        </div>
                                    </div>
                                    <div class="col">
                                        {{-- <button class="btn fa fa-search btn-info btn"
                                            onclick="get_cus_details(client_full_name.value)">
                                            &nbspType in to search By Full Name</button> --}}
                                        <button class="btn  btn-info btn" onclick="data_clear()">
                                            Clear Results </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-3">
                            <label class="col-sm-2 col-form-label"> Customer Code</label>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input oninput="
                                            // toCap(this.value, this.id),
                                            get_modal_search_by_customer_id(this.value)" type="text"
                                                class="form-control js-example-data-ajax" id="customer_code_modal"
                                                name="customer_code_modal" placeholder="Enter Customer ID">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-3">
                            <label class="col-sm-2 col-form-label"> ID Number</label>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input oninput="
                                            // toCap(this.value, this.id),
                                            get_modal_search_by_nic_id(this.value)" type="text"
                                                class="form-control js-example-data-ajax" id="id_number_modal"
                                                name="id_number_modal" placeholder="Enter Identification Number">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- end notice modal -->
    </div>
</div>

<script>
    let customer_data;
    let is_customer_id_2 = false;


    function get_modal_search_by_full_name(value){
        // console.log(is_customer_id_2);
        //console.log(value);
        if(value === ''){
            modal_serach_by_name_results_tbody.innerHTML = ''
        } else {
            $.ajax({
                type: 'GET',
                url: '{{('/search_by_full_name/2')}}',
                data: {text:value} ,
                success: function(data){
                    console.log(data);
                    return set_modal_serach_by_name_results(data)
                }
            })
        }

    }

    function get_modal_search_by_customer_id(value){
        //console.log(value);
        if(value === ''){
            modal_serach_by_name_results_tbody.innerHTML = ''
        } else {
            $.ajax({
                type: 'GET',
                url: '{{('/search_by_customer_id/2')}}',
                data: {text:value} ,
                success: function(data){
                    console.log(data);

                    return set_modal_serach_by_name_results(data)
                }
            })
        }

    }

    function get_modal_search_by_nic_id(value){
        console.log(value);
        if(value === ''){
            modal_serach_by_name_results_tbody.innerHTML = ''
        } else {
            $.ajax({
                type: 'GET',
                url: '{{('/search_by_nic_id/2')}}',
                data: {text:value} ,
                success: function(data){
                    //console.log(data);
                    return set_modal_serach_by_name_results(data)
                }
            })
        }
    }


    function set_modal_serach_by_name_results(data){
        console.log('inside setter -modal', data);
        modal_serach_by_name_results_tbody.classList.remove('d-none')
        modal_serach_by_name_results_tbody.innerHTML = ''

        customer_data = data

        data.forEach(i => {

            let member_status = 'Non-member'
            if(parseInt(i.member) == 1) {
                member_status = "Member"
            }
            let html = `
            <tr id='${i.id}'>
                <td>${i.customer_id}</td>
                <td>${i.full_name}</td>
                <td>${i.identification_number}</td>
                <td>${member_status}</td>
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
        console.log(id);

        customer_data.filter(cus => {
            if(cus.id === parseInt(id)){
                console.log(cus);

                if(is_customer_id_2){
                    if(document.querySelector('#customer_id_2')){
                        customer_id_2.value = cus.customer_id
                    }
                } else{
                    if(document.querySelector('#customer_id')){
                    customer_id.value = cus.customer_id
                    }
                }

                if(document.querySelector('#full_name')){
                    full_name.value = cus.full_name
                }
                if(document.querySelector('#branch_code')){
                    branch_code.value = cus.branch_code
                }

                if(document.querySelector('#dob')){
                    dob.value = cus.date_of_birth
                }
                if(document.querySelector('#share_amount')){
                    share_amount.value = cus.share_amount
                }
                if(document.querySelector('#cid')){
                    cid.value = cus.customer_id
                }

                if(document.querySelector('#account_id')){
                    account_balance.value = cus.account_balance
                }
                if(document.querySelector('#account_balance')){
                    account_id.value = cus.account_number
                }
                $('#memberModal').modal('hide');
                 return console.log(cus);
            }
        })
    }

    function data_clear() {
        $("#client_full_name_search_modal").val('');
        $("#customer_code_modal").val('');
        $("#id_number_modal").val('');
        modal_serach_by_name_results_tbody.innerHTML = null;

    }
</script>
