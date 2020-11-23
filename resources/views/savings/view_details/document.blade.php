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
                        <th>
                            <img src="{{env('IMAGE_LOCATION').$item->img}}" alt="">
                        </th>
                        <th>{{$item->document_name}}</th>
                        <th>
                            @if ($item->status == 1)
                            <button class="btn btn-success">Verified</button>
                        @else<a
                            <a
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
