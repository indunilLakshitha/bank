@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">


            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Main Holder</h4>
                    </div>
                </div>
                <div class="card-body ">
                <table class="table">
                    <tr>
                        <th>
                            <img src="{{env('IMAGE_LOCATION').$acc->cus_sign_img}}" alt="">
                        </th>
                        <th>
                            @if ($acc->sign_status == 1)
                                <button class="btn btn-success">Verified</button>
                            @else
                            <a
                        onclick="verify_sign('{{$acc->id}}', '/main_holder_sign', this)"
                            class="btn btn-primary text-white">Verify</a>
                            @endif
                        </th>
                    </tr>
                </table>

                </div>
            </div>

            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Other Holders</h4>
                    </div>
                </div>
                <div class="card-body ">
                <table class="table">
                    @foreach ($join_acc_mems as $item)
                    <tr>
                        <th>
                            <img src="{{env('IMAGE_LOCATION').$item->other_holder_sign_img}}" alt="">
                        </th>
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
