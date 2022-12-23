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
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<title>Finsuite | Company Success</title>

    <div class="row h-100 margin-top-40 margin-bottom-100">
       <div class="col-md-12 my-auto">
        <form method="post" action="{{ url('factorsave') }}">
            {!! csrf_field() !!}
            <div class="card card-block col-md-8 offset-md-2 text-center padding-40">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <h3 class="font-25 color-grey1" style="border-bottom: 1px solid #707070;padding-bottom: 5px;">Enable Two-Step Verification</h3>    
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
                            <div class="col-md-6  offset-md-3 padding-right-30">
                                <div class="row" style="border:1px solid #148CE8;border-radius: 5px;">
                                    <div class="col-md-6 text-left margin-top-20">
                                        <p class="font-18 color-blue">Email<br>
                                        Authentication</p>
                                    </div>
                                    <div class="col-md-6 margin-top-20" style="background-size: 80%;background-repeat: no-repeat;background-image: url('{{ asset('images/Area.png') }}');background-position: bottom;background-position-x: right;padding-right: 0px;">
                                        <p class="font-14 color-white" style="vertical-align: middle;margin-top: 20px;padding-left: 35px;">
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
                                        @if($user[0]->two_factor == 1)
                                            <input type="radio" name="check" value="1" checked>
                                        @else
                                            <input type="radio" name="check" value="0">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6 padding-left-30">
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
                            </div> -->
                        </div>

                        <div class="row margin-top-30">

                            @if($user[0]->two_factor == 1)
                                <div class="col-md-12 text-center">
                                    <label class="switch">
                                      <input type="checkbox" name="check1" value="0" checked>
                                      <span class="slider round"></span>
                                    </label>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <hr style="border-bottom: 1px solid #707070;">
                <div class="margin-top-20 margin-bottom-20">
                    <button type="submit" class="btn-active">Activate</button>
                    <button type="button" class="btn-cancel">Cancel</button>
                </div>


            </div>
        </form>
       </div>
    </div>

@endsection