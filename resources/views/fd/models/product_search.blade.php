<div class="row">
    <div class="col-md-12 text-center">
        <!-- notice modal -->
        <div class="modal fade" id="productSearchModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content " style="width: 800px;height: auto">
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ">
                                    <div class="card-header card-header-success card-header-icon">
                                        <div class="col-4">
                                            <div class="card-header card-header-rose card-header-text">
                                                <div class="card-text">
                                                    <h4 class="card-title">Find Product</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <label class="col-sm-1 col-form-label">Code:</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="product_c"
                                                                oninput="search_by_product_id(this.value)">
                                                        </div>
                                                    </div>
                                                    <label class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="product_n"
                                                                oninput="search_by_product_name(this.value)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="material-datatables">
                                                    <table id="datatables" class="table   table-bordered table-hover"
                                                        cellspacing="0" width="100%" style="width:100%">
                                                        <thead>
                                                            <th>name</th>
                                                            <th>Interest</th>
                                                            <th>Duration(Months)/th>
                                                        </thead>
                                                        <tbody id="product_body">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
    let product_data;

    // let is_customer_id_2 = false;

    function search_by_product_id(value){
        // console.log(is_customer_id_2);
        // console.log(value);
        if(value === ''){
            product_body.innerHTML = ''
        }
        $.ajax({
        type: 'GET',
        url: '{{('/newfdproductsbyname')}}',
        data: {code:value} ,
        success: function(data){
            console.log(data);
            return all_products_set(data)
        }
    })
    }

    function search_by_product_name(value){
        console.log(value);
        if(value === ''){
            product_body.innerHTML = ''
        }
        $.ajax({
        type: 'GET',
        url: '{{('/findproductbyname')}}',
        data: {text:value} ,
        success: function(data){
            console.log(data);

            return all_products_set(data)
        }
    })
    }


function all_products_set(data){
    console.log('inside setter -modal', data);
    product_body.classList.remove('d-none')
    product_body.innerHTML = ''

    product_data = data

    data.forEach(i => {
console.log(i)
        let html = `
        <tr>
            <td>${i.account_name}</td>
            <td>${i.duration}</td>
            <td>${i.interest}</td>
            <td>
                <button type="button"
                onclick=
                "
                this.parentElement.parentElement.parentElement.classList.add('d-none'),
                set_product_details('${i.id}')
                "
                class="btn btn-sm btn-primary">Select</button>
            </td>
        </tr>
        `
        product_body.innerHTML += html

    })


}

function set_product_details(id){
    console.log(id);

    product_data.filter(cus => {
        if(cus.id === parseInt(id)){
            console.log(cus);
            if(document.querySelector('#max_interest')){
                max_interest.value = cus.max
            }
            if(document.querySelector('#min_interest')){
                min_interest.value = cus.min
            }
            if(document.querySelector('#set_interest')){
                set_interest.value = cus.interest
            }
            if(document.querySelector('#sub_product')){
                sub_product.value = cus.account_name
            }
            if(document.querySelector('#sub_product_id')){
                sub_product_id.value = cus.id
            }
            if(document.querySelector('#deposite_period_id')){
                deposite_period_id.value = cus.duration
            }
            if(document.querySelector('#deposite_type')){
                deposite_type.value = cus.deposite_type
            }

            if(document.querySelector('#fd_interest_type_id')){
                fd_interest_type_id.value = cus.fd_interest_type_id
            }
            if(document.querySelector('#fd_interest_type')){
                fd_interest_type.value = cus.fd_interest_type
            }

            $('#productSearchModel').modal('hide');
             return console.log(cus);
            //  console.log(full_name);
        }
    })
}
</script>
