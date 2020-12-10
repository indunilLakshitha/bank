{{-- <style>
    .modal-content{
        overflow-y: auto;
    }
</style> --}}
<div class="row">
    <div class="col-md-12 text-center">
        <!-- notice modal -->
        <div class="modal fade" id="mmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                                oninput="toCap(this.value, this.id), member_search_for_fd_byfname(this.value)"
                                                type="text" class="form-control js-example-data-ajax"
                                                id="mmodel" placeholder="Enter Full Name">
                                        </div>
                                    </div>
                                    <div class="col">
                                        {{-- <button class="btn fa fa-search btn-info btn"
                                            onclick="get_cus_details(client_full_name.value)">
                                            &nbspType in to search By Full Name</button> --}}
                                        <button class="btn  btn-info btn" onclick="member_list.innerHTML = null">
                                            Clear Results </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-3">
                            <label class="col-sm-2 col-form-label"> Customer ID</label>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input oninput="
                                            // toCap(this.value, this.id),
                                            get_member_fd(this.value)" type="text"
                                                class="form-control js-example-data-ajax"
                                                placeholder="Enter Customer ID">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table">
                                <tbody id="member_list" class="d-none"></tbody>
                            </table>
                        </div>

                        <div class="row mb-5 ml-3">
                            <label class="col-sm-2 col-form-label ">ID Number</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="form-group">
                                            <input type="text" name="identification_number" id="identification_number"
                                                class="form-control" placeholder="" oninput="get_member_fd_by_nic(this.value)">

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        {{-- <button class="btn fa fa-search btn-info btn"
                                            onclick="get_cus_details(identification_type_id.value, identification_number.value)">
                                            &nbspSearch By ID</button> --}}

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
    let customer_d;

    // let is_customer_id_2 = false;


    function member_search_for_fd_byfname(value){
        // console.log(is_customer_id_2);
        console.log(value);
        if(value === ''){
            member_list.innerHTML = ''
        }
        $.ajax({
        type: 'GET',
        url: '{{('/member_for_fd')}}',
        data: {text:value,type:'cfn'} ,
        success: function(data){
            console.log(data);
            return member_results_table_view(data)
        }
    })
    }

    function get_member_fd(value){
        console.log(value);
        if(value === ''){
            member_list.innerHTML = ''
        }
        $.ajax({
        type: 'GET',
        url: '{{('/member_for_fd')}}',
        data: {text:value,type:'cid'} ,
        success: function(data){
            // console.log(data);

            return set_modal_serach_by_name_results(data)
        }
    })
    }
    function get_member_fd_by_nic(value){
        console.log(value);
        if(value === ''){
            member_list.innerHTML = ''
        }
        $.ajax({
        type: 'GET',
        url: '{{('/member_for_fd')}}',
        data: {text:value,type:'nic'} ,
        success: function(data){
            // console.log(data);

            return set_modal_serach_by_name_results(data)
        }
    })
    }


function member_results_table_view(data){
    // console.log('inside setter -modal', data);
    member_list.classList.remove('d-none')
    member_list.innerHTML = ''

    customer_d = data

    data.forEach(i => {

        let member_status = i.non_member===1 ? 'Member' : 'Non-member'
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
                set_member_fd('${i.id}')
                "
                class="btn btn-sm btn-primary">Select</button>
            </td>
        </tr>
        `
        member_list.innerHTML += html
// console.log('done')
    })


}

function set_member_fd(x){
    // console.log(x);

    customer_d.filter(cus => {
        if(cus.id === parseInt(x)){
            // console.log(cus);


                if(document.querySelector('#customer_id')){
                customer_id.value = cus.customer_id
                getAccounts(cus.customer_id)
                }


            $('#mmodel').modal('hide');

            //  return console.log(cus);
        }
    })
}
</script>
