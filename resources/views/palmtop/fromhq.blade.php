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
                                <h4 class="card-title">From Head office To Branch</h4>
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
            <form id="form" class="form-horizontal">
                @csrf
                <div class="card ">
                    <div class="card-body ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Fill Details</h4>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Bank Account Number</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            @php
                                            $prod_types = Illuminate\Support\Facades\DB::table('sub_accounts')->get();
                                            @endphp
                                            <select  name="hq_account_number"
                                                class="form-control" data-style="select-with-transition">
                                                @isset($headofices)
                                                @foreach ($headofices as $headofice)
                                                <option value="{{$headofice->account_number}}">
                                                    {{$headofice->account_number}}
                                                    @endforeach
                                                    @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Branch Account Number</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <select   name="branch_account_number"
                                                class="form-control" data-style="select-with-transition">
                                                @isset($branchoffices)
                                                @foreach ($branchoffices as $branchoffice)
                                                <option value="{{$branchoffice->account_number}}">
                                                    {{$branchoffice->account_number}}
                                                    @endforeach
                                                    @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Current User</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">

                                            <select   name="user"
                                            class="form-control" data-style="select-with-transition">

                                            <option value="{{Auth::user()->id}}">
                                                {{Auth::user()->name}}

                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Transaction Type</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            {{-- <select oninput="" required name="transaction_type" class="form-control"
                                                data-style="select-with-transition">
                                                <option value="WITHDRAW">WITHDRAW </option>
                                                <option value="DEPOSITE">DEPOSITE </option>

                                            </select> --}}
                                            <input type="text" value="From Head Office" readonly  class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Deposit Amount</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="number" id="transaction_value"  name="transaction_value"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-6 text-right">
                            <a onclick="transfer()" class="btn btn-primary">Transfer</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </form>
</div>


<script>
 $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

function transfer(){
    $.ajax({
          type: 'POST',
          url: '{{('/fromhq/transfer')}}',
          data:new FormData(form),

        contentType: false,
        processData: false,
          success: function(data){
              console.log(data)
              Swal.fire({
                    title: 'Successfully Transfered To Branch Office',
                    text: data.success,
                    icon: 'success',
                    timer: 20000
                })
                document.getElementById("form").reset();
            //     custname.value=''
            //     address.value=''
            //     nic.value=''
            //     contact_no.value=''
            //         return show_ext_inv(data)


          },
          error: function(data){
            //   console.log(data)
          }

      })
}
</script>


@endsection
