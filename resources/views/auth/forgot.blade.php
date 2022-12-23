@extends('layout.master2')

@section('content')
<style>
  input[type=email],input[type=password]{
    padding-left: 40px;
  }
  body{
    background-color: #ffffff;
  }
</style>
<title>Finsuite | Register</title>
<div class="row align-middle height100vh">
    
    <div class="col-md-12  bgcolor-white d-flex align-items-center justify-content-center" >
        
        <div class="col-md-4 align-middle">
            <div class="card">
                <div class="auth-form-wrapper px-4 py-5">
                    @if(Session::get('error'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{Session::get('error')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                    @endif
                    <h5 class="text-muted font-weight-bold mb-4 font-25 color-black">Reset Your password</h5>
                    <span class="font-16 color-black">Please enter your email address and we will send you a password link.</span>
                  
                  <form method="post" action="{{ url('sendforgetlink') }}" class="forms-sample padding-top-20" autocomplete="off">
                    
                    <div class="form-group">
                        <i class="fa fa-envelope-o email-icon" class=""></i>
                        <input type="email" name="email" required class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    
                    {!! csrf_field() !!}
                    <div class="mt-12 padding-top-10">
                      <button class="btn btn-primary mr-12 mb-12 mb-md-0 login-btn">SEND RESET LINK</button>
                    </div>
                    
                  </form>
                </div>
            </div>
        </div>
        
    </div>
    
</div>

@endsection