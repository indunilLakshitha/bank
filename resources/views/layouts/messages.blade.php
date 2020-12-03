@if($errors->any() )
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
    {{$error}}
</div>
@endforeach
@endif

@if(session('success'))
{{-- <div class="alert alert-success text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">close</i>
    </button>
    <span> {{session('success')}} </span>
</div> --}}
    <script>
         Swal.fire('{{session('success')}}')
    </script>
@endif

@if (session('error'))
{{-- <div class="alert alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">close</i>
    </button>
    <span> {{session('error')}} </span>
</div> --}}
    <script>
         Swal.fire(session('error'))
    </script>
@endif

{{-- @if($errors->any() )
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(isset($success))
    <script>
        return Swal.fire("{{$success}}")
    </script>
@endif

@if (isset($error))
    <script>
        return Swal.fire("{{$error}}")
    </script>
@endif --}}

