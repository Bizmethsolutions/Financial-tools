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
                <img src="{{ asset('images/delete.png') }}" class="img-width15">
            </div>                
            
            <div class="margin-top-15">
                <span class="font-30 color-red font-weight-bold" style="display:block;">
                    Lorem Ipsum
                </span>
            </div>
            <div class="row margin-top-10">
                <div class=" col-md-10 offset-md-1">
                    <span class="font-14 text-center">
                        Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum 
                    </span>
                </div>
                <div class="col-md-12 margin-top-20">
                    <button class="btn-cancel">Yes</button>
                </div>
            </div>
        </div>
   </div>
</div>
@endsection