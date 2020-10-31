@include('layouts.header')
  <div class="wrapper ">
    @include('layouts.sidebar')
    <div class="main-panel">
        @include('layouts.navbar')
      <div class="content">
          @include('layouts.messages')
          <div class="container-fluid">
            @yield('content')
          </div>
        </div>
      </div>
  </div>
@include('layouts.footer')
