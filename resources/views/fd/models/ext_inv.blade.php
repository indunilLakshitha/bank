{{-- <button id="exxternal_nominee" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#exxternal_nominee">
    Launch demo modal
  </button> --}}

<!-- Modal -->
<div class="modal fade" id="ext_inv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 800px;height: auto">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add External Investores</h5>
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
                <form id="form">
                    @csrf
                    <input type="hidden" name="account_id" id="external_account_id">
                    <div class="row mt-5">
                        <label class="col-sm-2 col-form-label"> Client Full Name</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input oninput="toCap(this.value, this.id)" type="text" class="form-control "
                                            id="custname" name="name" placeholder="Enter Full Name">
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
                                        <select name="relation_type" id="relation" class="form-control"
                                            data-style="select-with-transition">
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
                                        <input class="form-control " name="contact_no" id="contact_no" type="text">
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
                                        <input class="form-control " name="address" id="address" type="text">
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
                                        <input class="form-control " name="nic" id="nic" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <tbody id="show_ext_inv_tbody" class="d-none"></tbody>
                        </table>
                    </div>


            </div>
            </form>
            <div class="modal-footer">
                <a onclick="addExtinv()" class="btn btn-rose">Add</a>
                <button type="button" class="btn btn-rose" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- @include('layouts.search_nominees_modal') --}}

<script>
    function addExtinv(){
    // customer=customer_id.value
    // na=custname.value
    // addr=address.value
    // nicc=nic.value
    // relation=relation.value
    // con=contact_no.value
    // console.log('1111')
      $.ajax({
          type: 'POST',
          url: '{{('/addextinvfd')}}',
          data:new FormData(form),

        contentType: false,
        processData: false,
          success: function(data){
              console.log(data)
              Swal.fire({
                    title: 'External Invester Added',
                    text: data.success,
                    icon: 'success',
                    timer: 20000
                })
                custname.value=''
                address.value=''
                nic.value=''
                    return show_ext_inv(data)


          },
          error: function(data){
            //   console.log(data)
          }

      })
  }

  function show_ext_inv(data){
    show_ext_inv_tbody.classList.remove('d-none')
    show_ext_inv_tbody.innerHTML = ''

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
          remove_ext_inv('${i.id}')
          "
          class="btn btn-sm btn-primary">Remove</button>
      </td>
      </tr>
      `
      show_ext_inv_tbody.innerHTML += html

  });
}


  function remove_ext_inv(id){
      $.ajax({
          type: 'GET',
          url: '{{('/remove_ext_inv_member_creation')}}',
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
