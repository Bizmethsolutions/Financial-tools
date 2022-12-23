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

</script>
<style type="text/css">
    .visuallyhidden {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }

</style>
<title>Finsuite | Company Success</title>

    <div class="row h-100 margin-top-20 margin-bottom-20">
       <div class="col-md-12 my-auto">
            <div class="card card-block col-md-6 offset-md-3  padding-40">
                <div class="row" style="border-bottom: 2px solid #e3dede;
    margin-bottom: 35px;">
                    <div class="col-md-6 text-left" style="margin-bottom:15px;">
                        <h3 class="font-25">Profile</h3>    
                    </div>
                    <div class="col-md-6 text-right">
                          
                    </div>
                </div>   
 
          <form style="padding:20px;" method="post" action="{{ url('/profile-update') }}" enctype="multipart/form-data">
										<div class="row h-100 justify-content-center align-items-center">
											<div class="col-md-6" >
                                                <input type="hidden" value="{{ $result[0]->id }}" name="id">
                                                <div style="background-image: url('{{ asset('images/profile_circle.png') }}');background-size: 80% 80%;background-repeat: no-repeat;min-height: 280px;margin-top:50px;background-position:center;">
                                                    
                                                        <center><img src="images/uploadpic.png" class="img-width15 margin-top-100"></center>
                                                        <p class="text-center font-20 margin-top-10 " style="color:#707070;">Upload Photo</p>
                                                        <p class="text-center font-16 " >
                                                            
                                                                <a href="#" style="color:#fff;" class="file-upload">Click Here</a>
                                                                <input type="file" name="file" id="file-input" class="visuallyhidden">
                                                            
                                                        </p>
                                                    
                                                </div>
				                                
           
											</div><!-- Col -->
										      {!! csrf_field() !!}
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Title</label>
													<input type="text" name="title" class="form-control" value="{{ $result[0]->title }}" placeholder="Mr/Miss/Mrs">
												</div>
												<div class="mb-3">
													<label class="form-label">First Name</label>
													<input type="text" name="fname" class="form-control" value="{{ $result[0]->fname }}" placeholder="Enter first name">
												</div>
													<div class="mb-3">
													<label class="form-label">Last Name</label>
													<input type="text" name="lname" class="form-control" value="{{ $result[0]->lname }}" placeholder="Enter last name">
												</div>
													<div class="mb-3">
													<label class="form-label">Email Address</label>
													<input type="text" readonly class="form-control" value="{{ $result[0]->email }}" placeholder="Enter Email Address">
												</div>
											
											</div><!-- Col -->
										</div><!-- Row -->
									   
                                        <div class="row text-center">
                                            <hr style="border-bottom: 1px solid #707070;width: 100%;">
                                            <div class="col-md-12 margin-top-10 margin-bottom-10 text-center">
                                                <button class="btn-active">Save</button>
                                                <a href="{{ url('/settings') }}"><button type="button" class="btn-cancel">Cancel</button></a>
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
