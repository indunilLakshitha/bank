@extends('layouts.app')


@section('content')

<form method="post" id="form" class="form-horizontal">
    @csrf
    <div class="card " style="border: solid">
        <div class="row">
            <div class="col">
                {{-- <button type="button" class="btn fa fa-search btn-info float-right" data-toggle="modal"
            href="#noticeModal"> SEARCH</button> --}}
            </div>
        </div>
        <div class="card-body ">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Member Creation</h4>
                </div>
            </div>


            <div class="row">
                <label class="col-sm-2 col-form-label">Customer Name</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="full_name" readonly>
                        <input type="text" class="form-control" id="customer_id" name="customer_id" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Allocated Shares</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="number" class="form-control"
                            oninput="share_amount.value = this.value*{{$share_amount}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Payment Amount</label>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="number" class="form-control" name="share_amount" id="share_amount">
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-6 text-right">
                    <button type="button" onclick="submit_form()" class="btn btn-rose col-4 text-white">SUBMIT</button>
                </div>
                <div class="col-1 text-right">
                    <button type="submit" class="btn ">Clear</button>
                </div>
            </div>

        </div>

    </div>

</form>

{{-- nominees modal --}}
@include('layouts.search_nominees_modal')

@include('layouts.search_modal')


<script>
    function getCustomers(value){
        // console.log(value);
        $.ajax({
        type: 'GET',
        url: '{{('/search_by_full_name')}}',
        data: {text:value} ,
        success: function(data){
            console.log(data);
            return show_data(data)
        }
    })
    }

    function show_data(data){

        results_tbody.classList.remove('d-none')
        results_tbody.innerHTML = ''

data.forEach(i => {
    let html = `
    <tr id='${i.id}' >
        <td>${i.customer_id}</td>
    <td>${i.full_name}</td>
    <td>
        <button type="button" onclick="
        add_name('${i.full_name}','${i.customer_id}'), this.parentElement.parentElement.parentElement.classList.add('d-none')" class="btn btn-sm btn-primary">Select</button>
    </td>
    </tr>
    `
    results_tbody.innerHTML += html
})

}

function add_name(name,id){
     console.log(id);
     full_name.value = name
     customer_id.value = id

}

function submit_form(){
    $.ajax({
        type: 'POST',
        url: '{{('/member_creation')}}',
        data: new FormData(form) ,
        processData: false,
        contentType: false,
        success: function(data){
            console.log(data);
            if(data === 'Member already exists'){
                return Swal.fire(data)
            } else{

                Swal.fire(data)
                return nominee_modal_trigger_btn.click()
            }

        }
    })
    }

</script>



@endsection
