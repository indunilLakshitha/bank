@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card ">
                <div class="row">
                    <div class="col-10">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Paalmtop Transfer</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="card-text">
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Palmtop user</label>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <select name="users" id="users" class="form-control" oninput="filter(this.value)">
                                    @isset($users)
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                    @endisset

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="form-group">
                        {{-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."> --}}
                        <form id="form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table">
                                        <table id="table" class="table table-striped table-no-bordered table-hover"
                                            cellspacing="0" width="100%" style="width:100%">
                                            <tr>
                                                <th style="">ID </th>
                                                <th>DATE</th>
                                                <th>Agent Name</th>
                                                <th>Customer Name</th>
                                                <th>Customer ID</th>
                                                <th>Account ID</th>
                                                <th>Amount</th>
                                                <th>Select </th>
                                                <th>Actions</th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th> </th>
                                                <th> </th>
                                                <th> </th>
                                                <th></th>
                                                <th>Select All<input type="checkbox" name="select-all"
                                                        id="select-all" /></th>
                                                <th></th>
                                            </tr>
                                            <tbody id="ext_inv_results_tbody">
                                            @foreach ($data as $item)
                                                <tr i>
                                                <td class="text-center">{{$item->id}}</td>
                                                <td class="text-center">{{$item->created_at}}</td>
                                                <td class="text-center">{{$item->logger}}</td>
                                                <td class="text-center">{{$item->full_name}}</td>
                                                <td class="text-center">{{$item->customer_id}}</td>
                                                <td class="text-center">{{$item->account_number}}</td>
                                                <td class="text-center">
                                                    <?php echo number_format( $item->transaction_value , 2 , '.' , ',' ) ?>
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox" name="is_checked[]" id="is_checked"
                                                        value="{{$item->id}}">
                                                </td>
                                                <td class="text-center"> <button type="button"
                                                        onclick="submit_data_single({{$item->id}})" rel="tooltip"
                                                        class="btn btn-info btn-round">
                                                        <i class="material-icons">edit</i> <span class="mx-1">Transfer
                                                            This</span>
                                                    </button></td>
                                                <td class="text-center"> <button type="button"
                                                        onclick="reject({{$item->id}})" rel="tooltip"
                                                        class="btn btn-trash btn-round">
                                                        <i class="material-icons">delete</i>
                                                    </button></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button type="button" class="btn btn-primary" onclick="submit_data()">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    function filter(id){
console.log(id)
$.ajax({
          type: 'GET',
          url: '{{('/getpalmtopdata')}}',
          data:{id:id},


          success: function(data){
              console.log('1', data)

                    return show_ext_inv(data)


          },
          error: function(data){
            //   console.log(data)
          }

      })
  }

  function show_ext_inv(data){
    console.log('inside show ext inv')
    ext_inv_results_tbody.innerHTML = ''
    console.log(ext_inv_results_tbody)

//       data.forEach(i => {
//       let html = `
//          <tr>
//              <td class="text-center">${i.id}</td>
//              <td class="text-center">${i.created_at}</td>
//              <td class="text-center">${i.logger}</td>
//              <td class="text-center">${i.full_name}</td>
//              <td class="text-center">${i.customer_id}</td>
//              <td class="text-center">${i.account_number}</td>
//              <td class="text-center">
//                  ${i.transaction_value}
//              </td>
//              <td class="text-center">
//                  <input type="checkbox" name="is_checked[]" id="is_checked"
//                      value="${i.id}">
//              </td>
//              <td class="text-center"> <button type="button"
//                      onclick="submit_data_single('${i.id}'')" rel="tooltip"
//                      class="btn btn-info btn-round">
//                      <i class="material-icons">edit</i> <span
//                          class="mx-1">Transfer This</span>
//                  </button></td>
//              <td class="text-center"> <button type="button"
//                      onclick="reject('${i.id}'')" rel="tooltip"
//                      class="btn btn-trash btn-round">
//                      <i class="material-icons">delete</i>
//                  </button></td>
//         </tr>
//       `
//       results_tbody.innerHTML += html

//   });
}


function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
    $('#select-all').click(function(event) {
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;
        });
    }
});
    function submit_data(){
        console.log('sadsa')

        Swal.fire({
  position: 'top-end',
  icon: 'loading',
  title: 'Transfering.....',
  showConfirmButton: false,
//   timer: 1500
})

    $.ajax({
            type: 'POST',
            url: '{{('/submit_palmtop_data')}}',
            data: new FormData(form),
            contentType: false,
            processData: false,
            success: function(data) {
                // console.log(data)
                if(data=="completed"){
                    Swal.close()
                    Swal.fire({
                title: 'Done',
                icon: 'success',
                text: 'All Selected Transactions are Transfered',
                confirmButtonText: 'Okay'
                }).then((value)=>{
                    location.reload();

                })
                console.log(123)

                }
                // return showCustomers(data)
            }
        })
}
    function submit_data_single(x){
        console.log(x)

        Swal.fire({
  position: 'top-end',
  icon: 'loading',
  title: 'Transfering.....',
  showConfirmButton: false,
//   timer: 1500
})

    $.ajax({
            type: 'GET',
            url: '{{('/submit_palmtop_data_single')}}',
            data: {text:x},
            success: function(data) {
                console.log(data)
                if(data=="completed"){
                    Swal.close()
                    Swal.fire({
                title: 'Done',
                icon: 'success',
                text: 'All Selected Transactions are Transfered',
                confirmButtonText: 'Okay'
                }).then((value)=>{
                    location.reload();

                })
                console.log(123)

                }
                // return showCustomers(data)
            }
        })
}
function reject(value){
    console.log(value)
    $.ajax({
                type: 'GET',
                url: '{{('/submit_palmtop_data_reject')}}',
                data: {text:value} ,
                success: function(data){
                    console.log(data);
                    if(data=="completed"){
                    Swal.close()
                    Swal.fire({
                title: 'Rejected',
                icon: 'success',
                text: ' Selected Transaction rejected',
                confirmButtonText: 'Okay'
                }).then((value)=>{
                    location.reload();

                })
                console.log(123)

                }
                }
            })
}

</script>


@endsection
