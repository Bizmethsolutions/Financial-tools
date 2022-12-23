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
<title>Finsuite | Subscription</title>

    <div class="row h-100">
       <div class="col-md-12 my-auto">
            <div class="col-md-8 offset-md-2  padding-40 card card-block" style="margin-top:40px;margin-bottom: 40px;">
                <div class="row" style="margin-bottom: 35px;">
                    <h2 class="color-blue">Choose your monthly plan</h2>
                    <p style="width:80%;" class="color-grey">Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum</p>
                    <div class="col-md-12" style="margin-top:50px;"></div>
                    <div class="col-md-4 text-center">
                        <div style="background-color: #fff;border: 1px solid #686868;min-height: 200px;padding: 40px;margin-top: 50px;">
                            <h3 class="color-blue" style="margin-top: 30px;">Prepaid</h3>
                            <p>Coming Soon</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="background-color: #148CEB;border: 1px solid #148CEB;margin-bottom: 20px;padding: 40px;min-height: 300px;">
                            <h3 class="color-white">Fixed Assets Module</h3><br>
                            <h4 class="color-white">$100/Month</h4><br>
                            <h4 class="color-white">$600/Year</h4><br>
                            <button class="btn btn-default" style="background-color:#fff;height:40px">Current Plan</button>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="background-color: #fff;border: 1px solid #686868;min-height: 200px;padding: 40px;margin-top: 50px;">
                            <h3 class="color-blue" style="margin-top: 30px;">Accruals</h3>
                            <p>Coming Soon</p>
                        </div>
                    </div>
                    <div class="col-md-12 text-center" style="margin-top:50px;">
                        <button class="btn btn-default" style="background-color:#fff;color:#148CEB;border:1px solid #148CEB;height:40px ;">Cancel Subscription</button>
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