@extends('layouts.app')


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">



            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Documents Verification</h4>
                    </div>
                </div>
                <table class="table">
                    @isset($docs)
                    @foreach ($docs as $item)
                    <tr>
                        @if(!empty($item->img))
                        <th >
                            <img src="{{env('IMAGE_LOCATION').$item->img}}" height="500px" width="500px" alt="">
                        </th>
                        @else
                         <th>
                        <img src="/bank/public/images/default.png" height="100px" width="100px" alt="">
                        </th>
                        @endif
                        <th>{{$item->document_name}}</th>
                        <th>
                            @if ($item->status == 1)
                            <button class="btn btn-success">Verified</button>
                        @else<a

                        onclick="verify_image('{{$item->id}}', this)"
                            class="btn btn-primary text-white">Verify</a>

                            @endif
                        </th>
                    </tr>
                        @endforeach
                        @endisset
                </table>
                <div class="card-body ">

                </div>
            </div>






    </div>

</div>
</div>

<script>
    function verify_image(id, btn){
        console.log(id);
        $.ajax({
        type: 'GET',
        url: '{{('/verify_image')}}',
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
