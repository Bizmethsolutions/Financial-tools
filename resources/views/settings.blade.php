@extends('layout.company1')

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

    <div class="container margin-top-40 margin-bottom-20">
       <div class="row card card-block padding-bottom-40">
            <div class="text-left padding-40">
                <h3 class="font-25">Settings</h3>    
            </div>
       
            <div class="col-md-12 padding-lr-40">
                <div class="row ">

                    <div class="col-md-6 padding-left-40 padding-right-20" >
                        <div class="padding-40 bgcolor-grey2 height100" style="border:1px solid #e4e4e4;">
                            <h5 class="color-blue1">COMPANY</h5>
                            <ul class="margin-top-15 myul">
                                <li class="color-grey1">
                                    <a href="{{ url('/company-profile')}}" class="color-grey1">Company Profile</a>
                                </li>
                                <!-- <li class="color-grey1">
                                    <a href="{{ url('/dashboard')}}" class="color-grey1">Sync Now</a>
                                </li> -->
                                <li class="color-grey1">
                                    <a href="{{ url('/quickbook-connection')}}" class="color-grey1">Quickbooks Connection</a>
                                </li>
                                <li class="color-grey1">
                                    <a href="{{ url('/dashboard')}}" class="color-grey1">Security</a>
                                </li>
                            </ul>
                            <h5 class="color-blue1 margin-top-20">ACCOUNT</h5>
                            <ul class="margin-top-15 myul">
                                <li class="color-grey1">
                                    <a href="{{ url('/profile')}}" class="color-grey1">Profile</a>
                                </li>
                                <li class="color-grey1">
                                    <a href="{{ url('/user-list')}}" class="color-grey1">User And Role</a>
                                </li>
                                <li class="color-grey1">
                                    <a href="{{ url('/change-password')}}" class="color-grey1">Change Password</a>
                                </li>
                                <li class="color-grey1">
                                    <a href="{{ url('/preferences')}}" class="color-grey1">User Preferences</a>
                                </li>
                            </ul>
                            <h5 class="color-blue1 margin-top-20">MODULE SETTINGS</h5>
                            <ul class="margin-top-15 myul">
                                <li class="color-grey1">
                                    <a href="{{ url('/fixed-assets')}}" class="color-grey1">Fixed Assets</a>
                                </li>
                                <li class="color-grey1">
                                    <a href="{{ url('/company-list')}}" class="color-grey1">Prepaids (Coming Soon)</a>
                                </li>
                                <li class="color-grey1">
                                    <a href="{{ url('/company-list')}}" class="color-grey1">Accurals (Coming Soon)</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-6 padding-right-40 padding-left-20" >
                        <div class="padding-40 bgcolor-grey2 height100" style="border:1px solid #e4e4e4;">
                            <h5 class="color-blue1">PAYMENT</h5>
                            <ul class="margin-top-15 myul">
                                <li class="color-grey1">
                                    <a href="{{ url('/subscription')}}" class="color-grey1">Subscription</a>
                                </li>
                                <li class="color-grey1">
                                    <a href="{{ url('/credit-card')}}" class="color-grey1">Credit Card</a>
                                </li>
                                <li class="color-grey1">
                                    <a href="{{ url('/invoice')}}" class="color-grey1">Invoice</a>
                                </li>
                                <li class="color-grey1">
                                    <a href="{{ url('/dashboard')}}" class="color-grey1">Referral Code</a>
                                </li>
                            </ul>
                            <h5 class="color-blue1 margin-top-20">PARTNER FIRM(ACCOUNT LEVEL)</h5>
                            <ul class="margin-top-15 myul">
                                <li class="color-grey1">
                                    <a href="{{ url('/dashboard')}}" class="color-grey1">Join Our Patnership Program</a>
                                </li>
                                <li class="color-grey1">
                                    <a href="{{ url('/dashboard')}}" class="color-grey1">Refer Accounting Firm</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection