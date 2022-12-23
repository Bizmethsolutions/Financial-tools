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
<title>Edit Transactions | Finsuite </title>

    <div class="row h-100 margin-top-20 margin-bottom-20">
       <div class="col-md-12 my-auto">
            <div class="card card-block col-md-8 offset-md-2  padding-40">
                <div class="row" style="border-bottom: 2px solid #e3dede;margin-bottom: 35px;">
                    <div class="col-md-6 text-left" style="margin-bottom:15px;">
                        <h3 class="font-25">Edit Transaction</h3>    
                    </div>
                    <div class="col-md-6 text-right">
                          
                    </div>
                </div>   
 
                <form style="padding:20px;" method="post" action="{{ url('updatetransaction',$data[0]->asset_key) }}">
					<div class="row">
						
						  {!! csrf_field() !!}
						<div class="col-md-6">
							<label class="form-label">Asset Category</label>
							<input name="asset_category" value="{{ $data[0]->asset_category }}" type="text" class="form-control">
						</div>
							<div class="col-md-6">
							<label class="form-label">Depreciation Rule</label>
							<select class="form-control" name="dep_method">
                                <option value="Straight-line">Straight Line</option>               
                            </select>
						</div>
                    </div><!-- Row -->

                    <div class="row margin-top-20">
						<div class="col-md-6">
							<label class="form-label">Start Date</label>
							<input name="start_date" id="start_date" value="{{ $data[0]->start_date }}" type="text" class="form-control">
						</div>
						<div class="col-md-6">
							<label class="form-label">Life(mo)</label>
                            <input name="default_life" value="{{ $data[0]->default_life }}"  type="text" class="form-control">
						</div>
					</div><!-- Row -->

                    <div class="row margin-top-20">
                        <div class="col-md-6">
                            <label class="form-label">Salvage Value</label>
                            <input name="salvage_value" value="{{ $data[0]->salvage_value}}" type="number" min="0" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Warrenty End Date</label>
                            <input name="warrenty_end_date" id="warrenty_end_date" value="{{ $data[0]->warrenty_end_date }}"  type="text" class="form-control">
                        </div>
                    </div><!-- Row -->

                    <div class="row margin-top-20">
                        <div class="col-md-6">
                            <label class="form-label">Serial Number</label>
                            <input name="serial_number" value="{{ $data[0]->serial_number }}"  type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Warrenty Details</label>
                            <input name="warrenty_details" value="{{ $data[0]->warrenty_details }}" type="text" class="form-control">
                        </div>
                    </div><!-- Row -->

                    <div class="row margin-top-20">
                        <div class="col-md-6">
                            <label class="form-label">Other Memo</label>
                            <input name="other_memo" value="{{ $data[0]->other_memo }}" type="text" class="form-control">
                        </div>
                        
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