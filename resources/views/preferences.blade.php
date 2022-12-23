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
  .form-control{
    height: 40px;
  }
</style>
<title>Finsuite | Company Success</title>
<div class="row h-100">
   <div class="col-sm-12 my-auto">
        <div class="card card-block col-md-4 offset-md-4 text-center padding-40">
            <h4 style="border-bottom: 1px solid #707070;color: #707070;" class="text-left padding-left-10">Preferences</h4>
            
            
                <div class="padding-left-20 padding-right-20">
                    <div class="row margin-top-50">
                        <div class="col-md-12 text-left padding-bottom-10">
                            <span class="font-16 " >Decimal Rounding</span>
                        </div>
                        <div class="col-md-12 text-left">
                            <select class="form-control" name="decimal_rounding">
                                <option value="">0.12</option>
                            </select>
                        </div>
                    </div>
                    <div class="row margin-top-20">
                        <div class="col-md-12 text-left padding-bottom-10">
                            <span class="font-16 " >De-minimus Amount</span>
                        </div>
                        <div class="col-md-12 text-left">
                            <input type="number" name="deminimus_amount" class="form-control">
                        </div>
                    </div>
                    <div class="row margin-top-20">
                        <div class="col-md-12 text-left padding-bottom-10">
                            <span class="font-16 " >First Month Depreciation Method</span>
                        </div>
                        <div class="col-md-12 text-left">
                            <select class="form-control" name="sync_frequecy">
                                <option value="">Please Select</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row margin-top-30">
                    <hr style="border-bottom: 1px solid #707070;width: 100%;">
                    <div class="col-md-12">
                        <button class="btn-active">Save</button>
                        <button class="btn-cancel">Cancel</button>
                    </div>
                </div>
        </div>
   </div>
</div>
@endsection
]