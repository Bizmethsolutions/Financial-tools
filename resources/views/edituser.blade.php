@extends('layout.master1')

@section('content')
<script src="https://kit.fontawesome.com/277f86f6e1.js" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
  input[type=email], input[type=password]{
    padding-left: 15px;
  }
</style>
<!-- the fileinput plugin initialization -->
<title>Edit User | Finsuite </title>

    <div class="row h-100 margin-top-20 margin-bottom-20">
       <div class="col-md-12 my-auto">
            <div class="card card-block col-md-6 offset-md-3  padding-40">
                <div class="row" style="border-bottom: 2px solid #e3dede;margin-bottom: 35px;">
                    <div class="col-md-6 text-left" style="margin-bottom:15px;">
                        <h3 class="font-25">Edit User</h3>    
                    </div>
                    <div class="col-md-6 text-right">
                          
                    </div>
                </div>   
 
                <form style="padding:20px;" method="post" action="{{ url('updateuser',$users[0]->id) }}">
					<div class="row">
						<div class="col-sm-12">
						  {!! csrf_field() !!}
							<div class="mb-3">
								<label class="form-label">First Name</label>
								<input name="fname" value="{{ $users[0]->fname }}" type="text" class="form-control" placeholder="Enter first name">
							</div>
								<div class="mb-3">
								<label class="form-label">Last Name</label>
								<input name="lname" value="{{ $users[0]->lname }}" type="text" class="form-control" placeholder="Enter last name">
							</div>
								<div class="mb-3">
								<label class="form-label">Email Address</label>
								<input name="email" value="{{ $users[0]->email }}" readonly type="email" class="form-control" placeholder="Enter Email Address">
							</div>
							<div class="mb-3">
								<label class="form-label">Role</label>
                                <select name="role" class="form-control">
                                    <option value="">Select Role</option>
                                    <option <?php if($users[0]->role == 'Auditor' ) { echo "selected"; } ?> value="Auditor">Auditor</option>
                                    <option <?php if($users[0]->role == 'Accountant' ) { echo "selected"; } ?> value="Accountant">Accountant</option>
                                    <option <?php if($users[0]->role == 'Admin' ) { echo "selected"; } ?> value="Admin">Admin</option>
                                </select>
							</div>
						</div><!-- Col -->
					</div><!-- Row -->
				    <div class="row text-center">
                        <hr style="border-bottom: 1px solid #707070;width: 100%;">
                        <div class="col-md-12 margin-top-10 margin-bottom-10 text-center">
                            <button class="btn-active">Save</button>
                            <button class="btn-cancel">Cancel</button>
                        </div>
                    </div>
				
				</form>
            </div>
        </div>
    </div>
                </div>
              
            </div>
       </div>
    </div>

@endsection