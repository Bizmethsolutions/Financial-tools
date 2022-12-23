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
<div class="row h-100 margin-top-20 margin-bottom-20">
   <div class="col-sm-12 my-auto">
        <div class="card card-block col-md-6 offset-md-3 text-center padding-40">
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
            <form action="{{ url('changepassword') }}" method="POST" id="myform">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <h3 style="color:#707070;" class="text-left">Change Password</h3>
                        <p style="color:#707070;" class="text-left margin-top-20">Password must contain:</p>
                        <p style="color:#707070;" id="six" class="text-left margin-top-10">* At least 6 characters</p>
                        <p style="color:#707070;" id="upper" class="text-left margin-top-10">* At least 1 upper case letter(A-Z) </p>
                        <p style="color:#707070;" id="lower" class="text-left margin-top-10">* At least 1 lower case letter(a-z) </p>
                        <p style="color:#707070;" id="num" class="text-left margin-top-10">* At least 1 number(0-9) </p>
                        <p style="color:#FF0000;" id="error" class="text-left margin-top-10"> </p>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            {!! csrf_field() !!}
                            <div class="col-md-12 text-left margin-top-10">
                                <input type="password" name="current" id="current"  class="form-control" placeholder="Current Password">
                            </div>
                            <div class="col-md-12 text-left margin-top-10">
                                <input type="password" name="new" id="new" onkeypress="return cur(this.value)" onblur="return cur(this.value)" class="form-control" placeholder="New Password">
                            </div>
                            <div class="col-md-12 text-left margin-top-10">
                                <input type="password" name="confirm"  id="confirm" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="col-md-12 text-left margin-top-10">
                                <button type="submit" class="btn-active" style="width: 100%;height: 40px;">Save</button>
                            </div>
                            <div class="col-md-12 text-left margin-top-10">
                                <a style="text-decoration: none;" href="{{ url('/settings') }}"><button type="button" style="height: 40px;width: 100%;background-color: #fff;color: #148CE8;border: 1px solid #148CE8;">Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- <div class="row text-center">
                <hr style="border-bottom: 1px solid #707070;width: 100%;">
                <div class="col-md-12 margin-top-10 margin-bottom-10 text-center">
                    <button class="btn-active">Save</button>
                    <button class="btn-cancel">Cancel</button>
                </div>
            </div> -->
        </div>
   </div>
</div>
<script type="text/javascript">
    $('#myform').submit(function() {
        let current=$('#current').val().length;
        let currentval=$('#current').val();
        let newp=$('#new').val();
        let confirm=$('#confirm').val();
        var numUpper = (val.match(/[A-Z]/g) || []).length;
        var numLower = (val.match(/[a-z]/g) || []).length;
        var num = (val.match(/[0-9]/g) || []).length;
        if(parseInt(current) >= 6 && parseInt(current)<= 20){
            console.log(current);
            $('#six').css('color','#008000');
        }
        else{
            $('#six').css('color','#FF0000');
            
        }

        if(parseInt(numUpper) >= 1){
            $('#upper').css('color','#008000');
        }
        else{
            $('#upper').css('color','#FF0000');
            
        }

        if(parseInt(numLower) >= 1){
            console.log(numLower);
            $('#lower').css('color','#008000');
        }
        else{
            $('#lower').css('color','#FF0000');
            
        }

        if(parseInt(num) >= 1){
            console.log(num);
            $('#num').css('color','#008000');
        }
        else{
            $('#num').css('color','#FF0000');
            
        }

        if(current == ''){
            $('#error').text('Please enter current password');
            return false;
        }

        if(newp !== confirm){
            $('#error').text(' New password & confirm password does not match');
            return false;
        }

        return true;

    });
    function cur(val){
        let current=$('#current').val().length;
        let newp=$('#new').val();
        let confirm=$('#confirm').val();
        var numUpper = (val.match(/[A-Z]/g) || []).length;
        var numLower = (val.match(/[a-z]/g) || []).length;
        var num = (val.match(/[0-9]/g) || []).length;
        if(parseInt(current) >= 6 && parseInt(current)<= 20){
            console.log(current);
            $('#six').css('color','#008000');
        }
        else{
            $('#six').css('color','#FF0000');
            
        }

        if(parseInt(numUpper) >= 1){
            $('#upper').css('color','#008000');
        }
        else{
            $('#upper').css('color','#FF0000');
            
        }

        if(parseInt(numLower) >= 1){
            console.log(numLower);
            $('#lower').css('color','#008000');
        }
        else{
            $('#lower').css('color','#FF0000');
            
        }

        if(parseInt(num) >= 1){
            console.log(num);
            $('#num').css('color','#008000');
        }
        else{
            $('#num').css('color','#FF0000');
            
        }
        return true;
    }
</script>
@endsection