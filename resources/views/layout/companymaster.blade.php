@php
    $base_url=env('QBO_URL');
    $accessToken = Session::get('accessToken');
    $companyid = Session::get('realmid');
@endphp
<!DOCTYPE html>
<html>
<head>
  <title>Finsuite</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
  <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <script src="{{ asset('assets/js/spinner.js') }}"></script>

  <div class="main-wrapper" id="app">
    @include('layout.companysidebar')
    <div class="page-wrapper">
      @include('layout.companyheader')
      <div class="page-content">
        @yield('content')
      </div>
      @include('layout.footer')
    </div>
  </div>
    
    <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!-- end common js -->

    @stack('custom-scripts')
    <script type="text/javascript">
      $('#OpenImgUpload').click(function(){ 
          $('#imgupload').trigger('click');
          
      });
      $('input[type="file"]').change(function() {
          var filename = $('input[type=file]').val().replace(/.*(\/|\\)/, '');
          console.log(filename);
          $('#OpenImgUpload').val(filename);
      });
      $('#OpenImgUpload1').click(function(){ $('#imgupload').trigger('click'); });
      
      $(document).ready(function () {
           // Attach Button click event listener 
          $("#dispose").click(function(){
            
            $('#disposeModal').modal('show');
            var checked=$('.ids:checked').map(function() {return this.value;}).get().join(',');
            $('#ids').val(checked);

          });
      });


    </script>
</body>
</html>