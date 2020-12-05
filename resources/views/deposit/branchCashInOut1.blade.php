@extends('layouts.app')


@section('content')
    <div class="card ">
        <div class="card-body ">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title">Branch Cash In-Out 1</h4>
                </div>
            </div>
            <form id="In">
            @csrf
            <div class="row">
                <label class="col-sm-2 col-form-label">Branch</label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input  type="text" class="form-control" name="branch" id="branch">
                    </div>
                </div>

            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Branch Name</font></label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select name="" id="b_name" name="b_name" class="form-control" data-style="select-with-transition" >
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
                        <select name="" id="" class="form-control" data-style="select-with-transition" >
                        <option value="">Select</option>
                        <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>



            <div class="row">
                <label class="col-sm-2 col-form-label">Cashiar Select</font></label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select name="" id="cashiar" name="cashiar" class="form-control" data-style="select-with-transition" >
                        <option value="">Select</option>
                        <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Tansaction Type</font></label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select name="" id="" name="transaction_type" class="form-control" data-style="select-with-transition" >
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
                        <input type="text" name="transaction_amount" class="form-control" >
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
        $.ajax({
        type: 'POST',
        url: '{{('/branchCashInOut1/submit1')}}',
        data: new FormData(In),
        processData: false,
    contentType: false,
        success: function(data){
            console.log(data);
            if(data == 'Success'){

               return Swal.fire('Successful')

            }else {

            }

        }
    })
}

</script>

@endsection
