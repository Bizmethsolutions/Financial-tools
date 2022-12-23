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
<div class="row h-100 margin-top-20 margin-bottom-20">
   <div class="col-sm-12 my-auto">
        <div class="card card-block col-md-6 offset-md-3 text-center padding-40">
            <div class="text-left" style="border-bottom: 1px solid #707070;">
                <span class="font-25 color-blue padding-left-10">Invoice</span>
            </div>                
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/invoice.png') }}" style="width: 100%;" class="padding-20">
                </div>
                <div class="col-md-6">
                    <div class="margin-top-60">
                        <div class="col-md-12 text-left margin-top-20">
                            <span class="font-16 " >Email Invoices</span>
                        </div>
                        <div class="col-md-12 text-left margin-top-10">
                            <select class="form-control" name="sync_frequecy">
                                <option value="">Please Select</option>
                                <option value="Yes"> Yes </option>
                                <option value="No" > No  </option>
                            </select>
                        </div>
                        <div class="col-md-12 text-left margin-top-20">
                            <span class="font-16 " >Use Class</span>
                        </div>
                        <div class="col-md-12 text-left margin-top-10">
                            <select class="form-control" name="sync_frequecy">
                                <option value="">Please Select</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-left margin-top-20">
                            <span class="font-16 " >Download Invoice</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <hr style="border-bottom: 1px solid #707070;width: 100%;">
                <div class="col-md-12 margin-top-10 margin-bottom-10 text-center">
                    <button class="btn-active">Save</button>
                    <button class="btn-cancel">Cancel</button>
                </div>
            </div>
        </div>
   </div>
</div>
@endsection