@extends('layouts.app')


@section('content')
    <div class="card ">
        <div class="card-body ">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Branch Cash In-Out 1</h4>
                </div>
            </div>
            <form id="In"  method="POST">
            @csrf
            <div class="row">
                <label class="col-sm-2 col-form-label">Branch</label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input  type="text" readonly placeholder="{{$branch->branch_name}}"  class="form-control" name="branch" id="branch">
                        <input  type="text" readonly value="{{$branch->id}}" hidden class="form-control" name="branch_id" id="branch_id">
                    </div>
                </div>

            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Branch Name</font></label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select id="b_name" onclick="cashi()" name="b_name" required class="form-control" data-style="select-with-transition" >
                        <option value="">--Select--</option>
                        @isset($branches)
                        @foreach ($branches as $branche)
                         @if(intval($branche->is_enable) == 1)
                        <option value="{{$branche->id}}" >{{$branche->branch_name}}</option>
                        @endif
                        @endforeach
                        @endisset
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Branch Account</font></label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select name="branch_account_id" id="branch_account_id" required class="form-control" data-style="select-with-transition" >
                        <option value="">Select</option>
                        @isset($branch_acc)
                        @foreach ($branch_acc as $branch_ac)
                        @if(intval($branch_ac->is_enable) == 1)
                        <option value="{{$branch_ac->account_number}}">{{$branch_ac->account_number}}</option>
                        @endif
                        @endforeach
                        @endisset
                        </select>
                    </div>
                </div>
            </div>



            <div class="row">
                <label class="col-sm-2 col-form-label">Cashiar Select</font></label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select id="cashier_id" name="cashier_id" required class="form-control" data-style="select-with-transition" >
                        <option value="">Select</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Tansaction Type</font></label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select id="transaction_type" required name="transaction_type" class="form-control" data-style="select-with-transition" >
                        <option value="">Select</option>
                        <option value="1">IN</option>
                        <option value="0">OUT</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="row">
                <label class="col-sm-2 col-form-label">Tansaction Amount</label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input type="text" name="transaction_value" required class="form-control" >
                    </div>
                </div>
            </div>



        </div>

</form>
            <div class="row">

                <div class="col-4 text-right">
                    <button type="button" onclick="submit()" class="btn btn-rose col-4">Submit</button>
                </div>

            </div>

    </div>
    </div>

<script>

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function submit(){
const type = document.querySelector('#transaction_type').value;
console.log(type)

    if(type == 0){
        $.ajax({
        type: 'POST',
        url: '{{('/branchCashInOut1/submit1')}}',
        data: new FormData(In),
        processData: false,
        contentType: false,
        success: function(data){
            console.log(data);
            if(data == 'Success'){

               return Swal.fire('Successfully Out')

            }else {

            }

        }
    })
    }else if(type == 1){
        console.log(type)

        $.ajax({
        type: 'POST',
        url: '{{('/branchCashInOut2/submit2')}}',
        data: new FormData(In),
        processData: false,
        contentType: false,
        success: function(data){
            console.log(data);
            if(data == 'Success'){

               return Swal.fire('Successfully In')

            }else {

            }

        }
    })

    }
}

function cashi(){
const b_id = document.querySelector('#b_name').value;
console.log(b_id)

    $.ajax({
        type: 'GET',
        url: '{{('/branchCashInOut1/getCashiar')}}',
        data: {'branchId':b_id},
        success: function(data){
            console.log(data);
            cashier_id.innerHTML = `
            <select name="" id="cashier_id" name="cashier_id" class="form-control" data-style="select-with-transition" >
            `
            data.forEach(record => {
            html = `
            <option  value="${record.id}">${record.employee_no}</option>
            `
            cashier_id.innerHTML += html
            })

        }
    })
}

</script>

@endsection
