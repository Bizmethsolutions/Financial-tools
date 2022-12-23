@extends('layout.master2')

@section('content')
<style>
  input[type=email],input[type=password],input[type=text]{
    padding-left: 40px;
  }
  body{
    background-color: #ffffff;
  }
</style>
<title>Finsuite | Login</title>
<div class="row align-middle height100vh">
    
    <div class="col-md-12 bgcolor-white d-flex align-items-center justify-content-center" >
        
        <div class="col-md-4 offset-md-4 align-middle">
            <div class="card">
                <div class="auth-form-wrapper px-4 py-2">
                  @if(Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{Session::get('error')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                  @endif
                  <div class="text-center">
                      <a href="#"><img src="{{ asset('images/finsuite_logo.png') }}" style="width:50%;"></a>
                  </div>
                  <h5 class="text-muted font-weight-bold mb-4 font-25 color-black">Login to Your Finsuite Account.</h5>
                  <form class="forms-sample" method="POST" action="{{ url('login-user') }}">
                    <div class="form-group">
                      
                      <i class="fa fa-user-o email-icon" class=""></i>
                      <input type="email" name="email" required class="form-control" id="pass_log_ide" placeholder="Email">
                    </div>
                    <div class="form-group">
                      
                      <i class="fa fa-lock password-icon" aria-hidden="true"></i>

                      <input type="password" name="password" required class="form-control" id="pass_log_id" autocomplete="current-password" placeholder="Password">
                      <span class="toggle-password" style="cursor: pointer;" toggle="#password-field" id="openeye"><i  class="fa fa-eye eye-icon " aria-hidden="true"></i></span>
                      <span class="toggle-password" toggle="#password-field" style="display: none;cursor: pointer;" id="closeeye"><i  class="fa fa-eye-slash eye-icon " aria-hidden="true"></i></span>
                    </div>
                    <div class="row ">
                      <div class="col-md-6 ">
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="">
                            <input type="checkbox" class="login-checkbox">
                            <span class="font-16">Keep me logged in</span>
                          </label>
                        </div>
                      </div>
                      <div class="col-md-6 my-auto text-right">
                          <a href="{{ url('/forgot') }}" class="font-16 color-black my-auto"><span class="verticalalignmiddle">Forgot Password</span></a>
                      </div>
                    </div>
                    {!! csrf_field() !!}
                    <div class="mt-12">
                      <button type="submit" class="btn btn-primary mr-12 mb-12 mb-md-0 login-btn">Login</button>
                    </div>
                    <div class="my-auto text-center padding-top-15">
                       Don't have an account <a href="{{ url('/register') }}" class="color-black font-16 font-weight-bold">Signup</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- <div class="col-md-6 d-flex align-items-center justify-content-center" style="background-image:url('{{ asset('images/loginbg.png') }}')">
      <div class="col-md-8 align-middle">
        <div class="col-md-12 text-center">
          <img src="{{ asset('images/logo.png') }}">
        </div>
        <div class="col-md-12 text-center">
          <img src="{{ asset('images/loginbg1.png') }}" class="width-60">
        </div>
        <div class="col-md-12 text-center color-blue font-25" style="font-family: Rubik">
          Welcome to Finsuite
        </div>
        <div class="col-md-12 text-center color-blue font-16 " style="font-family: Noto Sans">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer ,
        </div>
        
      </div>  
    </div> -->
</div>

@endsection