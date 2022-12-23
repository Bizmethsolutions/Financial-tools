@extends('layout.company1')

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
<title>Error | Finsuite</title>
<div class="row h-100">
   <div class="col-sm-12 my-auto">
        <div class="card card-block col-md-4 offset-md-4 text-center padding40">
            <div class="text-center">
                <img src="{{ asset('images/delete.png') }}" class="img-width15">
            </div>                
            
            <div class="margin-top-20">
                <span class="font-20 color-red font-weight-bold" style="display:block;">
                    Error in user update
                </span>
            </div>
            <div class="row margin-top-10">
                <div class=" col-md-10 offset-md-1">
                    <span class="font-16 text-center">
                        Go back to user list <a href="{{ url('/user-list') }}" class="color-red">Click here</a>
                    </span>
                </div>
            </div>
        </div>
   </div>
</div>
@endsection