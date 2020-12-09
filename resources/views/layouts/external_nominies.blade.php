{{-- <button id="exxternal_nominee" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#exxternal_nominee">
    Launch demo modal
  </button> --}}

<!-- Modal -->
<div class="modal fade" id="exxternal_nominee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 800px;height: auto">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add External Nominees</h5>
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
                                    <input oninput="toCap(this.value, this.id)" type="text"
                                        class="form-control js-example-data-ajax" id="cus_name" name="cus_name"
                                        placeholder="Enter Full Name">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <label class="col-sm-2 col-form-label">Relationship</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <select name="relation_type" id="relation_type" class="form-control"
                                            data-style="select-with-transition" required>
                                            <option value="Mother">Mother</option>
                                            <option value="Father">Father</option>
                                            <option value="Wife">Wife</option>
                                            <option value="Husband">Husband</option>
                                            <option value="Sister">Sister</option>
                                            <option value="Husband">Brother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                            <option value="Other">Other</option>
                                        </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <label class="col-sm-2 col-form-label"> Contact No</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control js-example-data-ajax" name="contact_no" id="contact_no"
                                        type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <label class="col-sm-2 col-form-label"> Address</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control js-example-data-ajax" name="address" id="address"
                                        type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <label class="col-sm-2 col-form-label"> NIC</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control js-example-data-ajax" name="nic" id="nic" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <tbody id="show_ext_nominees_tbody" class="d-none"></tbody>
                    </table>
                </div>


            </div>
            <div class="modal-footer">
                <a onclick="addExternal()" class="btn btn-rose" >Add</a>
                <button type="button" class="btn btn-rose" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- @include('layouts.search_nominees_modal') --}}

<script>
    function addExternal(){
    customer=customer_id.value
    na=cus_name.value
    console.log(cus_name.value);
    addr=address.value
    nicc=nic.value
    relation_type=relation_type.value
   con=contact_no.value
      $.ajax({
          type: 'POST',
          url: '{{('/add_external_nominies')}}',
          data: {
            'customer_id':customer,
            'name':na,
            'address':addr,
            'contact_no':con,
            'nic':nicc,
            'relation_type':relation_type


          },
          success: function(data){
              console.log(data)
              Swal.fire({
                    title: 'External Nominee Added',
                    text: data.success,
                    icon: 'success',
                    timer: 20000
                })
                cus_name.value=''
                contact_no.value=''
                address.value=''
                nic.value=''
            // .then((value)=>{
                    return show_ext_nominees(data)
                    // })


          },
          error: function(data){
            //   console.log(data)
          }

      })
  }

  function show_ext_nominees(data){
    show_ext_nominees_tbody.classList.remove('d-none')
    show_ext_nominees_tbody.innerHTML = ''

      data.forEach(i => {
      let html = `
      <tr id='${i.id}' >
          <td>${i.name}</td>
          <td>${i.relation_type}</td>
          <td>${i.contact_no}</td>
      <td>
          <button type="button"
          onclick=
          "
          this.parentElement.parentElement.classList.add('d-none'),
          remove_ext_nominee('${i.id}')
          "
          class="btn btn-sm btn-primary">Remove</button>
      </td>
      </tr>
      `
      show_ext_nominees_tbody.innerHTML += html

  });
}


  function remove_ext_nominee(id){
      $.ajax({
          type: 'GET',
          url: '{{('/remove_ext_nominee_member_creation')}}',
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
