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
<script>
var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
    'onclick="alert(\'Call your custom code here.\')">' +
    '<i class="bi-tag"></i>' +
    '</button>'; 
$("#avatar-2").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    showBrowse: false,
    browseOnZoneClick: true,
    removeLabel: '',
    removeIcon: '<i class="bi-x-lg"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-2',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="images/uploadpic.png" alt="Your Avatar"><h6 class="text-muted">Click Here</h6>',
    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
});
</script>
<title>Finsuite | Company Success</title>

    <div class="row h-100 margin-top-20 margin-bottom-20">
       <div class="col-md-12 my-auto">
            <div class="card card-block col-md-6 offset-md-3  padding-40">
                <div class="row" style="border-bottom: 2px solid #e3dede;margin-bottom: 35px;">
                    <div class="col-md-6 text-left" style="margin-bottom:15px;">
                        <h3 class="font-25">Add User</h3>    
                    </div>
                    <div class="col-md-6 text-right">
                          
                    </div>
                </div>   
 
                <form style="padding:20px;" method="post" action="{{ url('/adduser') }}">
					<div class="row">
						<div class="col-sm-12">
						  {!! csrf_field() !!}
							<div class="mb-3">
								<label class="form-label">First Name</label>
								<input name="fname" type="text" required class="form-control" placeholder="Enter first name">
							</div>
								<div class="mb-3">
								<label class="form-label">Last Name</label>
								<input name="lname" type="text" required class="form-control" placeholder="Enter last name">
							</div>
								<div class="mb-3">
								<label class="form-label">Email Address</label>
								<input name="email" type="email" required class="form-control" placeholder="Enter Email Address">
							</div>
							<div class="mb-3">
								<label class="form-label">Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="">Select Role</option>
                                    <option value="Auditor">Auditor</option>
                                    <option value="Accountant">Accountant</option>
                                    <option value="Admin">Admin</option>
                                </select>
							</div>
							<div class="mb-3">
								<label class="form-label">Password</label>
								<input name="password" type="Password" required class="form-control" placeholder="Enter Email Address">
							</div>
						
						</div><!-- Col -->
					</div><!-- Row -->
				    <div class="row text-center">
                        <hr style="border-bottom: 1px solid #707070;width: 100%;">
                        <div class="col-md-12 margin-top-10 margin-bottom-10 text-center">
                            <button class="btn-active">Save</button>
                            <a href="{{ url('/user-list') }}"><button type="button" class="btn-cancel">Cancel </button></a>
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