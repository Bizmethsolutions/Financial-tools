@extends('layout.master2')

@section('content')
<style>
  input[type=password]{
    padding-right: 40px;
  }
  body{
    background-color: #ffffff;
  }
</style>
<title>Finsuite | Reset Password</title>
<div class="row align-middle height100vh">
    
    <div class="col-md-6 bgcolor-white d-flex align-items-center justify-content-center" >
        
        <div class="col-md-8 offset-md-2 align-middle">
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
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                    <h5 class="text-muted font-weight-bold mb-4 font-25 color-black">Reset Your password</h5>
                    <span class="font-14 color-black">Almost done. Enter your password, and you're good to go.</span>
                  
                  <form method="post" action="{{ url('passwordreset') }}" class="forms-sample padding-top-20" autocomplete="off">
                    {!! csrf_field() !!}
                    <label>New Password</label>
                    <div class="form-group">
                        <i toggle="#password-field" class="fa fa-eye eye-icon-right toggle-password"></i>
                        <input name="new" type="password" required class="form-control" id="pass_log_id" >
                    </div>

                    <label>Confirm New Password</label>
                    <div class="form-group">
                        <input name="confirm" type="password" required class="form-control" id="exampleInputEmail1">
                    </div>
                    <input type="hidden" name="email" value="{{ base64_decode(request()->email) }}">
                    
                    <div class="mt-12 padding-top-10">
                      <button class="btn btn-primary mr-12 mb-12 mb-md-0 login-btn">Reset Password</button>
                    </div>
                    
                  </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="col-md-6 d-flex align-items-center justify-content-center" style="background-image:url('{{ asset('images/loginbg.png') }}')">
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
    </div>
</div>

@endsection