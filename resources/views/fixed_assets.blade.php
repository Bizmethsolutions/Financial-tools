@extends('layout.company1')

@section('content')
<script src="https://kit.fontawesome.com/277f86f6e1.js" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
  input[type=email],input[type=password]{
    padding-left: 40px;
  }
  body{
    background-color: #ffffff;
  }
  .main-wrapper .page-wrapper{
      width: 100% !important;
      margin-left:0px !important;
      
  }
  .main-wrapper .page-wrapper .page-content{
    padding: 0px !important;
  }
</style>
<!-- the fileinput plugin initialization -->
<script>
var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
    'onclick="alert(\'Call your custom code here.\')">' +
    '<i class="bi-tag"></i>' +
    '</button>'; 
$("#avatar-2").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    showBrowse: false,
    browseOnZoneClick: true,
    removeLabel: '',
    removeIcon: '<i class="bi-x-lg"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-2',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="images/uploadpic.png" alt="Your Avatar"><h6 class="text-muted">Click Here</h6>',
    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
});
</script>
<title>Finsuite | Company Success</title>

    <div class="row h-100">
       <div class="col-md-12 my-auto">
            <div class="col-md-8 offset-md-2  padding-40">
                <div class="row" style="margin-bottom: 35px;">
                    <div class="col-md-4 text-left">
                        <div style="background-color: #148CE8;width:200px;height: 150px;">
                            <div style="background-color: #fff;width:200px;height: 150px;margin-left: 20px;margin-top: 20px;position: absolute;text-align: center;" class="">
                                <div class="font-25" style="text-align:center; top: 60px;left: 30px;position: absolute;color: #148CEB;"><a href="{{ url('/preferences') }}">Preferences</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-left">
                        <div style="background-color: #148CE8;width:200px;height: 150px;">
                            <div style="background-color: #fff;width:200px;height: 150px;margin-left: 20px;margin-top: 20px;position: absolute;text-align: center;" class="">
                                <div class="font-25" style="text-align:center; top: 40px;left: 45px;position: absolute;color: #148CEB;"><a href="{{ url('/chart-of-accounts') }}">Chart of <br>accounts</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-left">
                        <div style="background-color: #148CE8;width:200px;height: 150px;">
                            <div class="font-25" style="background-color: #fff;width:200px;height: 150px;margin-left: 20px;margin-top: 20px;position: absolute;text-align: center;" class="">
                                <div style="text-align:center; top: 40px;left: 45px;position: absolute;color: #148CEB;"><a href="{{ url('/preferences') }}">Category <br> mapping</a></div>
                            </div>
                        </div>
                    </div>
                    
                </div>   
            </div>
        </div>
    </div>
                </div>
              
            </div>
       </div>
    </div>

@endsection