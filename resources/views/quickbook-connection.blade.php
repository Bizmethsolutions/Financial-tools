@extends('layout.master1')

@section('content')
<script src="https://kit.fontawesome.com/277f86f6e1.js" crossorigin="anonymous"></script>
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
<title>Finsuite | Company Success</title>
<div class="row h-100">
   <div class="col-sm-12 my-auto">
        <div class="card card-block col-md-4 offset-md-4 text-center padding-40">
            <h4 style="border-bottom: 1px solid #707070;color: #707070;" class="text-left">Quickbooks Connections</h4>
            
            <div class="row margin-top-20">
                <div class="col-md-6 text-left">
                    <span class="font-18 color-blue connection" onclick="return change('show','hide')" style="font-weight:700;cursor: pointer;">Connection Status</span>
                </div>
                <div class="col-md-6 text-left">
                    <span class="font-18 preferences" onclick="return change('hide','show')" style="font-weight:700;cursor: pointer;">Preferences</span>
                </div>
            </div>
            <div id="connection">
                <div class="row margin-top-40">
                    <div class="col-md-8 text-left">
                        <span class="font-18 " >Status</span>
                    </div>
                    <div class="col-md-4 text-left">
                        <span class="font-18 color-blue">Active</span>
                    </div>
                </div>
                <div class="row margin-top-20">
                    <div class="col-md-8 text-left">
                        <span class="font-18 " >Sync Now</span>
                    </div>
                    <div class="col-md-4 text-left">
                        <img src="{{ asset('images/sync.png') }}" class="img-width15">
                    </div>
                </div>
                <div class="row margin-top-20">
                    <div class="col-md-8 text-left">
                        <span class="font-18 " >Disconnect QBO</span>
                    </div>
                    <div class="col-md-4 text-left">
                        <img src="{{ asset('images/disconnect-qbo.png') }}" class="img-width20">
                    </div>
                </div>

                <div class="row margin-top-100">
                    <hr style="border-bottom: 1px solid #707070;width: 100%;">
                    <div class="col-md-12">
                        <button class="btn-active">Save</button>
                        <button class="btn-cancel">Cancel</button>
                    </div>
                </div>
            </div>
            <div id="preferences" style="display: none;">
                <div class="row margin-top-10">
                    <div class="col-md-12 text-left">
                        <span class="font-16 " >Sync Frequency (Automatic or Manual)</span>
                    </div>
                    <div class="col-md-12 text-left">
                        <select class="form-control" name="sync_frequecy">
                            <option value="">Please Select</option>
                        </select>
                    </div>
                </div>
                <div class="row margin-top-20">
                    <div class="col-md-12 text-left">
                        <span class="font-16 " >Use Class</span>
                    </div>
                    <div class="col-md-12 text-left">
                        <select class="form-control" name="sync_frequecy">
                            <option value="">Please Select</option>
                        </select>
                    </div>
                </div>
                <div class="row margin-top-20">
                    <div class="col-md-12 text-left">
                        <span class="font-16 " >Use Location</span>
                    </div>
                    <div class="col-md-12 text-left">
                        <select class="form-control" name="sync_frequecy">
                            <option value="">Please Select</option>
                        </select>
                    </div>
                </div>

                <div class="row margin-top-30">
                    <hr style="border-bottom: 1px solid #707070;width: 100%;">
                    <div class="col-md-12">
                        <button class="btn-active">Save</button>
                        <button class="btn-cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
@endsection
<script type="text/javascript">
    function change(str,str1){
        if(str == 'show'){
            $('#connection').show();
            $('#preferences').hide();
            $('.connection').addClass('color-blue');
            $('.preferences').removeClass('color-blue');
        }
        else{
            $('#connection').hide();
            $('#preferences').show();   
            $('.connection').removeClass('color-blue');
            $('.preferences').addClass('color-blue');
        }
        console.log(str);
        console.log(str1);
    }
</script>