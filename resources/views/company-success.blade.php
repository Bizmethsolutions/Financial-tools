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
        <div class="card card-block col-md-4 offset-md-4 text-center padding40">
            <div class="text-center">
                <img src="{{ asset('images/check-green.png') }}" class="img-width15">
            </div>                
            <h3 class="font-35 color-blue">Success!</h3>
            <div class="margin-top-20">
                <span class="font-16 color-blue font-weight-bold" style="display:block;">
                    Thanks for registering.
                </span>
                <span class="font-16 color-blue font-weight-bold">
                    Your company is successfully registered!!!
                </span>
            </div>
            <div class="margin-top-20">
                <a href="{{url('/company-list')}}"><button class="btn btn-primary btn-next"  style="height:48px;">Return to dashboard</button></a>
            </div>
        </div>
   </div>
</div>
@endsection