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
                <div class="col-sm-12 ">
                    <div class="form-group">
                        <form id="form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table">
                                        <table id="table" class="table table-striped table-no-bordered table-hover"
                                            cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <th style="">ID </th>
                                                <th>DATE</th>
                                                <th>Customer Name</th>
                                                <th>Customer ID</th>
                                                <th>Account ID</th>
                                                <th>Amount</th>
                                                <th>Select </th>
                                                <th>Actions</th>
                                            </thead>
                                            <thead>
                                                <th ></th>
                                                <th></th>
                                                <th> </th>
                                                <th> </th>
                                                <th> </th>
                                                <th></th>
                                                <th>Select All<input type="checkbox" name="select-all" id="select-all" /></th>
                                                <th></th>
                                            </thead>
                                            <tbody id="results_tbody">
                                                @foreach ($data as $item)
                                                <tr>
                                                    <td class="text-center">{{$item->id}}</td>
                                                    <td class="text-center">{{$item->created_at}}</td>
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
                                                    <td class="text-center"> <button type="button" onclick="submit_data_single({{$item->id}})" rel="tooltip"
                                                            class="btn btn-info btn-round">
                                                            <i class="material-icons">edit</i> <span
                                                                class="mx-1">Transfer This</span>
                                                        </button></td>
                                                    <td class="text-center"> <button type="button" onclick="reject({{$item->id}})" rel="tooltip"
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
