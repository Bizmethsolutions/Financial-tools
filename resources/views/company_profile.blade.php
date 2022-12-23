@extends('layout.company1')

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

    <div class="row h-100">
       <div class="col-md-12 my-auto">
            <div class="card card-block col-md-6 offset-md-3  padding-40">
                <div class="row" style="border-bottom: 2px solid #e3dede;
    margin-bottom: 35px;">
                    <div class="col-md-6 text-left" style="margin-bottom:15px;">
                        <h3 class="font-25">Company Profile</h3>    
                    </div>
                    <div class="col-md-6 text-right">
                          
                    </div>
                </div>   
  <ul class="nav nav-tabs" style="border-bottom:0px !important;">
    <li class="active"><a data-toggle="tab" href="#home">Company Details</a></li>
    <li><a data-toggle="tab" href="#menu1">Address</a></li>
    <li><a data-toggle="tab" href="#menu2">Primary Contact Details</a></li>
  
  </ul>

  <div class="tab-content">
    
    <div id="home" class="tab-pane fade in active show">
       
     <form style="padding:20px;">
										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Company Name</label>
													<input type="text" class="form-control" placeholder="Enter first name">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Default Currency</label>
													<input type="text" class="form-control" placeholder="Enter last name">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
									
										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Fiscal Year End Date</label>
													<input type="date" class="form-control" placeholder="Enter email">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Last Book Close</label>
													<input type="date" class="form-control" autocomplete="off" placeholder="Password">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
											<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Industry</label>
													<input type="text" class="form-control" placeholder="Enter email">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Finsuite Comapny ID</label>
													<input type="text" class="form-control" autocomplete="off" placeholder="Password">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
									</form>
    </div>
    <div id="menu1" class="tab-pane fade">
      <form style="padding:20px;">
										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Address 1</label>
													<input type="text" class="form-control" placeholder="Enter first name">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Address 2</label>
													<input type="text" class="form-control" placeholder="Enter last name">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
									
										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">City</label>
													<input type="text" class="form-control" placeholder="Enter email">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">State / Province</label>
													<input type="text" class="form-control" autocomplete="off" placeholder="Password">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
											<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Zip / Postal Code</label>
													<input type="text" class="form-control" placeholder="Enter email">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Country</label>
													<input type="text" class="form-control" autocomplete="off" placeholder="Password">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
									</form>
    </div>
    <div id="menu2" class="tab-pane fade">
          <form style="padding:20px;">
										<div class="row">
											<div class="col-sm-6">
					<input type="file" value="" name="fileup" id="fileup">
           
											</div><!-- Col -->
										
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Title</label>
													<input type="text" class="form-control" placeholder="Enter last name">
												</div>
												<div class="mb-3">
													<label class="form-label">Name</label>
													<input type="text" class="form-control" placeholder="Enter first name">
												</div>
												<div class="mb-3">
													<label class="form-label">Email Address</label>
													<input type="text" class="form-control" placeholder="Enter first name">
												</div>
											</div><!-- Col -->
										</div><!-- Row -->
									
									
									</form>
    </div>
   
  </div>
</div>
</div>
                </div>
              
            </div>
       </div>
    </div>

@endsection