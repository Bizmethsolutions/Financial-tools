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
  <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
  <!-- end plugin css -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
  
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
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
    <script type="text/javascript">
        function transaction(name){
           if(name == 'New'){
              $('#newcolor').addClass('color-blue');
              $('#processedcolor').addClass('color-grey1');
              $('#ignoredcolor').addClass('color-grey1');
              $('#newcolor').removeClass('color-grey1');
              $('#processedcolor').removeClass('color-blue');
              $('#ignoredcolor').removeClass('color-blue');
              $('#new').show();
              $('#processed').hide();
              $('#ignored').hide();
           }
           if(name == 'Ignored'){
              $('#newcolor').addClass('color-grey1');
              $('#processedcolor').addClass('color-grey1');
              $('#ignoredcolor').addClass('color-blue');
              $('#newcolor').removeClass('color-blue');
              $('#processedcolor').removeClass('color-blue');
              $('#ignoredcolor').removeClass('color-grey1');
              $('#new').hide();
              $('#processed').hide();
              $('#ignored').show();
           }
           if(name == 'Processed'){
              $('#newcolor').addClass('color-grey1');
              $('#processedcolor').addClass('color-blue');
              $('#ignoredcolor').addClass('color-grey1');
              $('#newcolor').removeClass('color-blue');
              $('#processedcolor').removeClass('color-grey1');
              $('#ignoredcolor').removeClass('color-blue');
              $('#new').hide();
              $('#processed').show();
              $('#ignored').hide();
           }
        }

        $('#selectAll').click(function(e){
            var table= $(e.target).closest('table');
            $('td input:checkbox',table).prop('checked',this.checked);
        });
    </script>
    
    @if(!empty(Session::get('start_date')))
      
      <script>
        var year={{ date('Y',strtotime(Session::get('start_date'))) }};
        var month={{ date('m',strtotime(Session::get('start_date'))) }};
        var date={{ date('d',strtotime(Session::get('start_date'))) }};
        var jqOld = jQuery.noConflict();
        jqOld(function() {
          jqOld( "#start_date" ).datepicker({
            dateFormat: "yy-mm-dd",
            minDate: new Date(year, month-1, date),
            maxDate:'0'
          });
          jqOld( "#end_date" ).datepicker({
            dateFormat: "yy-mm-dd",
            minDate: new Date(year, month-1, date),
            maxDate:'0'
          });
          jqOld( "#dispose_date" ).datepicker({
            dateFormat: "yy-mm-dd",
            maxDate:'0'
          });

          
        });

        $('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });
        function show(id){
          $('.main-row').show();
          $('.hide-row').hide();
          $('.show'+id).show();
          $('.main'+id).hide();
        }
        $(document).ready(function () {

             // Attach Button click event listener 
            $("#dispose").click(function(){
              $('#disposeModal').modal('show');
              // var programming = $("input[name='programming']:checked").map(function() {
              //   return this.value;
              // }).get().join(', ');
              var checked=$('.ids:checked').map(function() {return this.value;}).get().join(',');
              $('#ids').val(checked);
            });
            $("#disposeClose").click(function(){
              $('#disposeModal').modal('hide');
            });
            
        });
        function confirmDispose(){
          $('#ErrorMessage').text("");
          var date=$('#dispose_date').val();
          var sold=$('#sold').val();
          var ids=$('#ids').val();
          if( date == '' || sold == ''){
              $('#ErrorMessage').text("Please Fill All Fields");
              return false;
          }

          $('#disposeModal').modal('hide');
          $.ajax({
            url: "{{ url('depreciation') }}",
            type: 'POST',
            data:{
                "_token": "{{ csrf_token() }}",
                'date': date,
                'sold': sold,
                'ids': ids,
            },
            dataType: 'json',
            success: function(data) {
              $('#disdate').text(date);
              $('#entrydate').val(date);
              $('#disposeModal').attr('style', 'display: none !important');
              $('#disposeModal1').modal('show');
              $('#disposedata').html(data);

            },
            error: function(error) {
              // handle error here via accessing error variable
            },
          });

        }
      </script>
    @endif
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
</body>

</html>