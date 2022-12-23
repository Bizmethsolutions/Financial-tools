@extends('layout.master2')

@section('content')
<style>
  
  body{
    background-color: #ffffff;
  }
</style>
<title>Finsuite | Register</title>
<div class="row align-middle height100vh">
    
    <div class="col-md-12 bgcolor-white d-flex align-items-center justify-content-center" >
        
        <div class="col-md-4 offset-md-4 align-middle">
            <div class="card">
                <div class="auth-form-wrapper px-4 py-2">
                  @if(Session::get('register_status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{Session::get('register_status')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                  @endif

                  @if($errors->any())
                      <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          <strong>
                              {!! implode('<br/>', $errors->all('<span>:message</span>')) !!}
                          </strong>
                      </div>
                  @endif
                  <div class="text-center">
                      <a href="#"><img src="{{ asset('images/finsuite_logo.png') }}" style="width:50%;"></a>
                  </div>
                  <h5 class="text-muted font-weight-bold mb-4 font-25 color-black">Create an Account</h5>
                  <form class="forms-sample" autocomplete="off" action="{{ url('register-user')}}" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" name="fname" required class="form-control" id="exampleInputEmail1" placeholder="First Name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" name="lname" required class="form-control" id="exampleInputEmail1" placeholder="Last Name">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" required class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input type="password" min="6" max="12" name="password" required class="form-control" id="pass_log_id" autocomplete="current-password" placeholder="Password">
                      <span class="toggle-password" style="cursor: pointer;" toggle="#password-field" id="openeye"><i  class="fa fa-eye eye-icon " aria-hidden="true"></i></span>
                      <span class="toggle-password"  toggle="#password-field" style="display: none;cursor: pointer;" id="closeeye"><i  class="fa fa-eye-slash eye-icon " aria-hidden="true"></i></span>
                    </div>
                    <div class="row ">
                      <div class="col-md-12 ">
                        <div class="form-check form-check-flat form-check-primary">
                          <label class="row">
                            <div class="col-md-1">
                              <input type="checkbox"  class="login-checkbox" required> 
                            </div>
                            <div class="col-md-11">
                              <span class="font-16">By creating an account you agree to our <a href="{{ url('/terms-condition') }}"><span class="color-grey font-weight-bold">Terms and conditions</span></a></span>
                            </div>
                          </label>
                        </div>
                      </div>
                      
                    </div>
                    {!! csrf_field() !!}
                    <div class="mt-12">
                      <button type="submit" class="btn btn-primary mr-12 mb-12 mb-md-0 login-btn">SIGN UP</button>
                    </div>
                    <div class="my-auto text-center padding-top-15">
                       <span class="font-16">Already have an account? <a href="{{ url('/login') }}" class="color-black font-16 font-weight-bold">Login</a></span>
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
          <img src="{{ asset('images/logo.png') }}" >
        </div>
        <div class="col-md-12 text-center">
          <img src="{{ asset('images/loginbg1.png') }}" class="width-60">
        </div>
        <div class="col-md-12 text-center color-blue font-25" style="font-family: Rubik">
          Welcome to Finsuite
        </div>
        <div class="col-md-12 text-center color-blue font-16" style="font-family: Noto Sans">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer ,
        </div>
        
      </div>  
    </div> -->
</div>

@endsection