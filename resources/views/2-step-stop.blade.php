@extends('layout.master1')

@section('content')
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

    <div class="row h-100 margin-top-40 margin-bottom-100">
       <div class="col-md-12 my-auto">
            <div class="card card-block col-md-8 offset-md-2 text-center padding-40">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <h3 class="font-25 color-grey1" style="border-bottom: 1px solid #707070;padding-bottom: 5px;">Disable Two-Step Verification</h3>    
                    </div>
                </div>
                <div class="margin-top-40 margin-bottom-40">
                    <div class="row text-center">
                        <img src="{{ asset('images/2fa.png') }}" style="width: 10%;margin: 0 auto;text-align: center;">
                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-md-2 margin-top-10">
                            <p class="text-center font-18 color-grey1">Add an extra layer of security</p>
                            <p class="text-center font-14 color-grey1">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem </p>
                        </div>
                    </div>
                    <div class="container padding-lr-100">
                        <div class="row margin-top-30">
                            <div class="col-md-6 padding-right-30">
                                <div class="row" style="border:1px solid #148CE8;border-radius: 5px;">
                                    <div class="col-md-6 text-left margin-top-20">
                                        <p class="font-18 color-blue">Email<br>
                                        Authentication</p>
                                    </div>
                                    <div class="col-md-6 margin-top-20" style="background-size: 80%;background-repeat: no-repeat;background-image: url('{{ asset('images/Area.png') }}');background-position: bottom;background-position-x: right;padding-right: 0px;">
                                        <p class="font-14 color-white" style="vertical-align: middle;margin-top: 25px;padding-left: 35px;">
                                            Recommended
                                        </p>
                                        
                                    </div>
                                    <div class="col-md-12 margin-bottom-20">
                                        <p class="text-left">
                                            Lorem Ipsum Lorem Ipsum <br> 
                                            Lorem Ipsum Lorem Ipsum <br>
                                            Lorem Ipsum Lorem Ipsum <br>
                                            Lorem Ipsum Lorem 
                                        </p>
                                    </div>
                                    <div class="col-md-12" style="background-color: #148CE8;padding:20px;">
                                        <input type="radio" name="check">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 padding-left-30">
                                <div class="row" style="border:1px solid #148CE8;border-radius: 5px;">
                                    <div class="col-md-6 text-left margin-top-20">
                                        <p class="font-18 color-blue">Text<br>
                                        Message(SMS)</p>
                                    </div>
                                    
                                    <div class="col-md-12 margin-bottom-20">
                                        <p class="text-left">
                                            Lorem Ipsum Lorem Ipsum <br> 
                                            Lorem Ipsum Lorem Ipsum <br>
                                            Lorem Ipsum Lorem Ipsum <br>
                                            Lorem Ipsum Lorem 
                                        </p>
                                    </div>
                                    <div class="col-md-12" style="background-color: #707070;padding:20px;">
                                        <input type="radio" name="check">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="border-bottom: 1px solid #707070;">
                <div class="margin-top-20 margin-bottom-20">
                    <button class="btn-active">De-activate</button>
                    <button class="btn-cancel">Cancel</button>
                </div>


            </div>
       </div>
    </div>

@endsection