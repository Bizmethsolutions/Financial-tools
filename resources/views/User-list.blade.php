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
       <div class="col-md-12 my-auto">
            <div class="card card-block col-md-6 offset-md-3 text-center padding-40">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h3 class="font-25">List of Users</h3>    
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="font-20 color-blue" href="#"><span style="font-size: 16px;">
                            <i class="fa fa-plus"></span></i>&nbsp;Add Users
                        </a>    
                    </div>
                </div>
                <div class="margin-top-20">
                    <table class="table">
                        <tr>
                            <th class="text-left" style="width:33.33%">Email</th>
                            <th class="text-left" style="width:33.33%">Status</th>
                            <th class="text-left" style="width:33.33%">Actions</th>
                        </tr>
                        <tr>
                            <th class="text-left" style="width:33.33%">Email</th>
                            <th class="text-left" style="width:33.33%">Status</th>
                            <th class="text-left" style="width:33.33%">Actions</th>
                        </tr>
                        <tr>
                            <th class="text-left" style="width:33.33%">Email</th>
                            <th class="text-left" style="width:33.33%">Status</th>
                            <th class="text-left" style="width:33.33%">Actions</th>
                            
                        </tr>
                    </table>
                    <!-- <table class="table">
                        <tr>
                            <th class="text-left" style="width:20%">First Name</th>
                            <th class="text-left" style="width:20%">Last Name</th>
                             <th class="text-left" style="width:20%">Email</th>
                            <th class="text-left" style="width:20%">Role</th>
                            <th class="text-left" style="width:20%">Actions</th>
                            
                        </tr>
                        <tr>
                            <td class="text-left">Company 1</td>
                            <td class="text-left"><i class="fa fa-star-o" style="color:#707070;"></i>&nbsp;&nbsp;<i class="fa fa-pencil color-blue"></i></td>
                            
                        </tr>
                        <tr>
                            <td class="text-left">Company 2</td>
                            <td class="text-left"><i class="fa fa-star-o" style="color:#707070;"></i>&nbsp;&nbsp;<i class="fa fa-pencil color-blue"></i></td>
                            
                        </tr>
                    </table> -->
                </div>
                <div class="margin-top-20 text-right">
                    <span class="font-16 color-blue">Previous</span><span class="font-16 color-blue"> | </span><span class="font-weight-bold font-16 color-blue">Next</span>
                </div>
            </div>
       </div>
    </div>

@endsection