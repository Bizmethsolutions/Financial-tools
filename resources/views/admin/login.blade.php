@extends('layout.master2')

@section('content')
<title>Finsuite | Admin Login</title>
<div class="row w-100 mx-0 auth-page align-middle height100vh">
					<div class="col-md-6 col-xl-6 mx-auto d-flex align-items-center justify-content-center">
						<div class="card">
							<div class="row">
                
                <div class="col-md-12 pl-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2"><img src="{{ asset('images/logo.png') }}"></a>
                    @if(Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          {{Session::get('error')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                    @endif
                    <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                    <form class="forms-sample" method="POST" action="{{ url('admin-login-user') }}">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                          Remember me
                        <i class="input-frame"></i></label>
                      </div>
                      {!! csrf_field() !!}
                      <div class="mt-3">
                        
                        <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                          Login
                        </button>
                      </div>
                      
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>
@endsection