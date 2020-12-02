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
                        <h4 class="card-title">Main Holder Signature</h4>
                    </div>
                </div>
                    </div>
                <div class="col-2">
                       <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                        </div>
                         </div>
                    </div>
                </div>
                <div class="card-body ">
                <table class="table">
                    <tr>
                        @if(!empty($acc->cus_sign_img))
                        <th>
                            <img src="{{env('IMAGE_LOCATION').$acc->cus_sign_img}}" height="250px" width="250px" alt="">
                        </th>
                        @else
                         <th>
                            <img src="/bank/public/images/default.png" height="100px" width="100px" alt="">
                        </th>
                        @endif
                        <th>
                        </th>

                        @if(!empty($cus->cus_sign_img))
                        <th>
                            <img src="{{env('IMAGE_LOCATION').$acc->sign_img}}" height="250px" width="250px" alt="">
                        </th>
                        @else
                         <th>
                            <img src="/bank/public/images/default.png" height="100px" width="100px" alt="">
                        </th>
                        @endif


                        <th>
                            @if ($acc->sign_status == 1)
                                <button class="btn btn-success">Verified</button>
                            @else
                            <a
                        onclick="verify_sign('{{$acc->id}}', '/main_holder_sign', this)"
                            class="btn btn-primary text-white">Verify</a>
                            @endif
                        </th>
                    <tr>
                    </tr>
                </table>

                </div>
            </div>

            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Other Holders Signatures</h4>
                    </div>
                </div>
                <div class="card-body ">
                <table class="table">
                    @isset($join_acc_mems)
                    @foreach ($join_acc_mems as $item)
                    <tr>
                        @if(!empty($item->other_holder_sign_img))
                        <th>
                            <img src="{{env('IMAGE_LOCATION').$item->other_holder_sign_img}}" height="500px" width="500px" alt="">
                        </th>
                        @else
                         <th>
                        <img src="/bank/public/images/default.png" height="100px" width="100px" alt="">
                        </th>
                         @endif
                        <th>{{$item->document_name}}</th>
                        <th>
                            @if ($item->sign_status == 1)
                                <button class="btn btn-success">Verified</button>
                            @else<a
                        onclick="verify_sign('{{$item->id}}', '/other_holder_sign', this)"
                            class="btn btn-primary text-white">Verify</a>
                            @endif
                        </th>
                    </tr>
                        @endforeach
                        @endisset
                </table>

                </div>
            </div>






    </div>

</div>
</div>

<script>
    function verify_sign(id, url,btn){
        console.log(id);
        $.ajax({
        type: 'GET',
        url,
        data: {id} ,
        success: function(data){
            console.log(data);
            btn.classList.add('d-none')
            // return show_data(data)
        }
    })
    }
</script>

@endsection
