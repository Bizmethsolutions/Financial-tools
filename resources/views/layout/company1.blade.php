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
  <link rel="stylesheet" href="{{ asset('css/core.css') }}">
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
  <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css')}}">
  <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script>
  var jqOld = jQuery.noConflict();
    jqOld(function() {
        jqOld("#start_date" ).datepicker();
    });
  </script>
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <script src="{{ asset('assets/js/spinner.js') }}"></script>
  @include('layout.companyheader1')
  <div class="main-wrapper" id="app">
    
    <div class="page-wrapper">
      
      <div class="page-content">
        @yield('content')
      </div>
      @include('layout.footer')
    </div>
  </div>
  
    <!-- base js -->
    <script src="{{ asset('js/core.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
    $("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#pass_log_id");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});

$('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });

$('#step1').click(function(){ 
    let cn=$("#company_name").val();
    if(cn == ''){
      $('#errorcn').show();
      $('#errorcn').text('Enter Company Name');
      return false;
    }

    let c=$("#currency").val();
    if(c == ''){
      $('#errorcn').hide();
      $('#errorc').text('Select Currency');
      return false;
    }

    let industry=$("#industry").val();
    if(industry == ''){
      $('#errorcn').hide();
      $('#errorc').hide();
      $('#errori').show();
      $('#errori').text('Select Industry');
      return false;
    }

    let fiscal_date=$("#fiscal_date").val();
    if(fiscal_date == ''){
      $('#errorcn').hide();
      $('#errorc').hide();
      $('#errorc').hide();
      $('#errori').hide();
      $('#errorfy').show();
      $('#errorfy').text('Enter Date');
      return false;
    }
    $('#errorcn').hide();
    $('#errorc').hide();
    $('#errorc').hide();
    $('#errori').hide();
    $('#errorfy').hide();
    $('#Step1').hide();
    $('#Step2').show();
    $('#Step3').hide();
    $('#Step4').hide();
    $('#myModal').modal('show');
});

$('#back1').click(function(){ 
  $('#Step1').show();
  $('#Step2').hide();
  $('#Step3').hide();
  $('#Step4').hide();
});


$('#step2').click(function(){ 
  let fa=$("#fixed_account").val();
    if(fa == ''){
      $('#errorfa').show();
      $('#errorfa').text('Select Account');
      return false;
    }

    let accumulated=$("#accumulated").val();
    if(accumulated == ''){
      $('#errorfa').hide();
      $('#erroraccumulated').show();
      $('#erroraccumulated').text('Select Accumulated');
      return false;
    }

    let depreciation=$("#depreciation").val();
    if(depreciation == ''){
      $('#errorfa').hide();
      $('#erroraccumulated').hide();
      $('#errordepreciation').show();
      $('#errordepreciation').text('Select depreciation');
      return false;
    }

    let gl=$("#gl").val();
    if(gl == ''){
      $('#errorfa').hide();
      $('#erroraccumulated').hide();
      $('#errordepreciation').hide();
      $('#errorgl').show();
      $('#errorgl').text('Select Gain/Loss Assets');
      return false;
    }

    let decimal=$("#decimal").val();
    if(decimal == ''){
      $('#errorfa').hide();
      $('#erroraccumulated').hide();
      $('#errordepreciation').hide();
      $('#errorgl').hide();
      $('#errordecimal').show();
      $('#errordecimal').text('Enter Decimal Place');
      return false;
    }

    let deminus=$("#deminus").val();
    if(deminus == ''){
      $('#errorfa').hide();
      $('#erroraccumulated').hide();
      $('#errordepreciation').hide();
      $('#errorgl').hide();
      $('#errordecimal').hide();
      $('#errordeminus').show();
      $('#errordeminus').text('Enter Deminus Amount');
      return false;
    }
    $("#addassets > tbody"). empty();
    var outArray = [];
      $("#accumulated option:selected").each(function(){
        var selectedItem1 = $(this).text();
        if (selectedItem1) {
          outArray.push(selectedItem1);
          
        }

      });

      var trackarray = [];
      $("#depreciation option:selected").each(function(){
        var selectedItem3 = $(this).text();
        if (selectedItem3) {
          trackarray.push(selectedItem3);
        }
      });

      var glarray = [];
      $("#gl option:selected").each(function(){
        var selectedItem4 = $(this).text();
        
        if (selectedItem4) {
          glarray.push(selectedItem4); 
        }
      });
    $("#fixed_account option:selected").each(function(){
      

      var selectedItem = $(this).text();
      var selectedValue= $(this).val();
      var request;
      var data = {
          'company_id': {{ $companyid }} ,
           "_token": "{{ csrf_token() }}",
           "accumulated":outArray,
           "track":trackarray,
           "gl":glarray,
          'id': selectedValue
      };
      var headers = {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      request = $.ajax({
          url: "{{ URL::to('/') }}/get-account",
          type: "post",
          headers: headers,
          data: data
      });
      request.done(function (){
          var method=request.responseJSON.default_method;
          var text1 = 'Two';
          $("#depreciation_method option").filter(function() {
            //may want to use $.trim in here
            return $(this).text() == method;
          }).prop('selected', true);
          $("#addassets").append('<tr><td><select class="js-example-basic-single asset_account" data-width="100%" name="asset_account[]" id="asset_account"><option value="'+selectedItem+'">'+selectedItem+'</option></select></td><td><input type="text" class="form-control" name="asset_category[]" id="asset_category" value="'+request.responseJSON.data.Account.AccountSubType+'"></td><td><select class="js-example-basic-single" data-width="100%" name="depreciation_method[]" id="depreciation_method"><option value="Straight-line">Straight-line</option><option value="Declining Balance">Declining Balance</option><option value="Do not depreciate">Do not depreciate</option></select></td><td><input type="text" class="form-control" name="month[]" id="month" value="'+request.responseJSON.default_life+'"> </td><td><select class="js-example-basic-single accumulated_depreciation_account" data-width="100%" name="accumulated_depreciation_account[]" id="accumulated_depreciation_account"></select></td><td><select class="js-example-basic-single depreciation_account" data-width="100%" name="depreciation_account[]" id="depreciation_account"></select></td><td><select class="js-example-basic-single glfa"  data-width="100%" aria-hidden="true" name="glfa[]" id="glfa"></select></td></tr>');
          $('.glfa').empty();
          $.each(glarray,function(index, value){
            console.log(index);
            $('.glfa').append('<option value="'+value+'">'+value+'</option>');
          });

          $('.accumulated_depreciation_account').empty();
          $.each(request.responseJSON.accumulated,function(index, value){
              $('.accumulated_depreciation_account').append('<option value="'+value+'">'+value+'</option>');
          });

          $('.depreciation_account').empty();
          $.each(request.responseJSON.track,function(index, value){
              $('.depreciation_account').append('<option value="'+value+'">'+value+'</option>');
          });
          
      });
      
    });
      
    
  
  let track=$("#track").val();
  console.log(track);
  if(track == 'Yes'){
    $('#Step1').hide();
    $('#Step2').hide();
    $('#Step31').show();
    $('#Step3').hide();
    $('#Step4').hide(); 
    $('#backstep31').show(); 
    $('#backstep2').hide();
  }
  else{
    $('#Step1').hide();
    $('#Step2').hide();
    $('#Step3').show();
    $('#Step4').hide();   
    $('#backstep31').hide(); 
    $('#backstep2').show();
  }  
});

$('#back2').click(function(){ 
  console.log("Back 2");
  $('#Step1').hide();
  $('#Step2').show();
  $('#Step3').hide();
  $('#Step4').hide();
});

$('#back21').click(function(){ 
  console.log("Back 2");
  $('#Step1').hide();
  $('#Step2').show();
  $('#Step31').hide();
  $('#Step3').hide();
  $('#Step4').hide();
});

$('#step31').click(function(){ 
  let valid = true;
  $('[required]').each(function() {
    if ($(this).is(':invalid') || !$(this).val()) valid = false;
  })
  if (!valid){$('#trackError').text("Please fill all fields"); return false;}
  else{
    $('#trackError').text("");  
  }
  $('#Step1').hide();
  $('#Step2').hide();
  $('#Step31').hide();
  $('#Step3').show();
  $('#Step4').hide();      


  
  
});

$('#back31').click(function(){ 
  $('#Step1').hide();
  $('#Step2').hide();
  $('#Step31').show();
  $('#Step3').hide();
  $('#Step4').hide();
});

$('#step3').click(function(){ 
  $('#Step1').hide();
  $('#Step2').hide();
  $('#Step31').hide();
  $('#Step3').hide();
  $('#Step4').show();
});

$('#step33').click(function(){ 
  $('#Step1').hide();
  $('#Step2').hide();
  $('#Step31').hide();
  $('#Step3').hide();
  $('#Step4').show();
});


$('#back3').click(function(){ 
  $('#Step1').hide();
  $('#Step2').hide();
  $('#Step31').hide();
  $('#Step3').show();
  $('#Step4').hide();
});

$('#track').change(function(){ 
  let track=$('#track').val();
  if(track == 'Yes'){
    $('#trackyes').show();
  }
  else{
    $('#trackyes').hide();
  }
});

$(document).ready(function(){
    $(".addCF").click(function(){
        $("#customFields").append('<tr><td><input type="text" required class="form-control track" name="location[]" ></td><td><input type="text" required class="form-control track" name="leaseenddate[]" ></td><td><select class="form-control track" name="defaultlease[]" ><option value="No">No</option><option value="Yes">Yes</option></select></td><td><a href="javascript:void(0);" class="remCF"><i class="fa fa-trash" style="color:red;"></i></a></td></tr>');
    });
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
});

$(document).ready(function(){
    $(".assets").click(function(){
        $("#addassets").append('<tr><td><select class="form-control" name="industry" id="industry"><option value="">Select</option></select></td><td><select class="form-control" name="industry" id="industry"><option value="">Select</option></select></td><td><input type="text" class="form-control" name="" id=""></td><td><select class="form-control" name="industry" id="industry"><option value="">Select</option></select></td><td><select class="form-control" name="industry" id="industry"><option value="">Select</option></select></td><td><select class="form-control" name="industry" id="industry"><option value="">Select</option></select></td><td><select class="form-control" name="industry" id="industry"><option value="">Select</option></select></td><td><select class="form-control" name="industry" id="industry"><option value="">Select</option></select></td><td><a href="javascript:void(0);" class="remas">Remove</a></td></tr>');
    });
    $("#addassets").on('click','.remas',function(){
        $(this).parent().parent().remove();
    });
});

$(document).ready(function() {
  $('.js-example-basic-multiple').select2();
});
$(document).ready(function() {
  $('.js-example-basic-single').select2();
});

$('#fixed_account').change(function () {
  $("#accumulated option").prop('disabled', false);
  $("#fixed_account option:selected").each(function(){
    var selectedItem = $(this).val();
    
    if (selectedItem) {
        $('#accumulated').find('option[value="' + selectedItem + '"]').prop('disabled', true);
    }

  });
});

$('#depreciation').change(function () {
  $("#gl option").prop('disabled', false);
  $("#depreciation option:selected").each(function(){
    var selectedItem = $(this).val();
    
    if (selectedItem) {
        // $('#gl').find('option[value="' + selectedItem + '"]').prop('disabled', true);
    }

  });
});

$(".chb").change(function() {
  $(".chb").prop('checked', false);
  let yes=$(this).val();
  if(yes == 'Now'){
    $('#now').show();
  }
  else{
    $('#now').hide(); 
  }
  $(this).prop('checked', true);
});


</script>
<script type="text/javascript">
    $('.file-upload').on('click', function(e) {
      e.preventDefault();
      $('#file-input').trigger('click');
    });
</script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <!-- end common js -->

    @stack('custom-scripts')
</body>
</html>