@extends('layout.company')

@section('content')
<script src="https://kit.fontawesome.com/277f86f6e1.js" crossorigin="anonymous"></script>
<style>
  input[type=email],input[type=password]{
    padding-left: 40px;
  }
  body{
    background-color: #ffffff;
  }
  
</style>

<title>Finsuite | Transactions</title>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>  
    <h3 class="mb-3 mb-md-0">{{ $company[0]->company_name }}</h3>
  </div>
</div>
<div class="row h-100">
    <div class="col-md-12 my-auto">
        <div class="col-md-12">
            <h3 class="text-left margin-bottom-20">{{ $transactions[0]->asset_category }}</h3>
        </div>
    </div>
    <div class="col-md-12 my-auto">
        <div class="card card-block col-md-12  padding-40">
            <div id="new" class="margin-top-10">
                <div class="row">
                    <div class="col-md-12 " style="padding:40px 40px;background-color: #F2F8FD;">
                        
						<div class="row">
							<div class="col-md-6">
                                <div class="row">
    								<div class="col-md-5">
                                        <label class="form-label" style="margin-top:10px;">Purchase Price</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div style="background-color:#fff;width: 100%;padding: 10px;">
                                            {{ $transactions[0]->debt_amt }}
                                        </div>
                                    </div>
                                </div>
							</div>
							
							<div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label" style="margin-top:10px;">Salvage Value</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div style="background-color:#fff;width: 100%;padding: 10px;">
                                            @if(empty($transactions[0]->salvage_value))
                                                {{ 0 }}
                                            @else
                                                {{ $transactions[0]->salvage_value }}
                                                
                                            @endif
                                            
                                        </div>
                                    </div>
								</div>
							</div><!-- Col -->
						</div><!-- Row -->
					
						<div class="row margin-top-10">
							<div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label" style="margin-top:10px;">Purchase Date</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div style="background-color:#fff;width: 100%;padding: 10px;">
                                            {{ $transactions[0]->start_date }}
                                        </div>
                                    </div>
                                </div>
							</div><!-- Col -->
							<div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label" style="margin-top:10px;">Depreciation Method</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div style="background-color:#fff;width: 100%;padding: 10px;">
                                            Straight Line
                                        </div>
                                    </div>
                                </div>
							</div><!-- Col -->
						</div><!-- Row -->

						<div class="row margin-top-10">
							<div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label" style="margin-top:10px;">Default Life </label>
                                    </div>
                                    <div class="col-md-7">
                                        <div style="background-color:#fff;width: 100%;padding: 10px;">
                                            {{ $transactions[0]->default_life }}
                                        </div>
                                    </div>
                                </div>
							</div><!-- Col -->
							<div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label" style="margin-top:10px;">De-minimus amount</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div style="background-color:#fff;width: 100%;padding: 10px;">
                                            {{ $company[0]->deminus_amount }}
                                        </div>
                                    </div>
                                </div>
							</div><!-- Col -->
						</div><!-- Row -->

                    </div>
                </div>
            </div>
        </div>
        <div class="card card-block col-md-12  padding-40 margin-top-20">
            <div class="col-md-12 margin-top-10">                    
                <table class="text-center">
                    <tr style="background-color:#148CE8;color:#fff;">
                        <th style="width:10%;padding: 10px;">MONTH</th>
                        <th style="width:10%;padding: 10px;">OPENING BALANCE</th>
                        <th style="width:10%;padding: 10px;">DEPRECIATION</th>
                        <th style="width:10%;padding: 10px;">CLOSING BALANCE</th>
                        <th style="width:10%;padding: 10px;">ACCUMULATED DEPRECIATION</th>
                       
                    </tr>
                    <!-- <tbody style="background-color:#F8F9FB;"> -->
                    @php
                    $sum=0;
                    @endphp
                    @foreach($Fa as $value)
                        <tr style="background-color:#F8F9FB;border-bottom: 1px solid #e4e4e4;">
                           
                            <td style="padding: 10px 0px;">
                                {{ $value->month }}
                            </td>
                            <td style="padding: 10px 5px;">
                                @php
                                    if($decimal == 0){
                                        echo round($value->opening_bal);   
                                    }
                                    if($decimal == 1){
                                        echo number_format($value->opening_bal,1);   
                                    }
                                    if($decimal == 2){
                                        echo number_format($value->opening_bal,2);   
                                    }
                                @endphp
                            </td>
                            <td style="padding: 10px 5px;">
                                @php $sum+=$value->period_dep @endphp
                                @php
                                    if($decimal == 0){
                                        echo round($value->period_dep);   
                                    }
                                    if($decimal == 1){
                                        echo number_format($value->period_dep,1);   
                                    }
                                    if($decimal == 2){
                                        echo number_format($value->period_dep,2);   
                                    }
                                @endphp
                            </td>
                            <td style="padding: 10px 5px;">
                                @php
                                    if($decimal == 0){
                                        echo round($value->closing_bal);   
                                    }
                                    if($decimal == 1){
                                        echo number_format($value->closing_bal,1);   
                                    }
                                    if($decimal == 2){
                                        echo number_format($value->closing_bal,2);   
                                    }
                                @endphp
                            </td>
                            <td style="padding: 10px 5px;">
                                
                                @php
                                    if($decimal == 0){
                                        echo round($sum);   
                                    }
                                    if($decimal == 1){
                                        echo number_format($sum,1);   
                                    }
                                    if($decimal == 2){
                                        echo number_format($sum,2);   
                                    }
                                @endphp
                            </td> 
                        </tr>
                    @endforeach
                    <!-- </tbody> -->
                </table>
            </div>
        </div>
   </div>
</div>
@endsection