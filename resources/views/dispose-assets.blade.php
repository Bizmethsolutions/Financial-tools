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
  body.modal-open .modal {
        display: flex !important;
        height: 100%;
    } 

    body.modal-open .modal .modal-dialog {
        margin: auto;
    }
    .modal-content{
        width: 700px;
        padding: 20px;
    }
    .modal-footer{
        border-top: 1px solid #000;
    }
    .modal-header{
        border-bottom: 1px solid #000;
    }
</style>

<title>Finsuite | Disposal Assets</title>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>  
    <h3 class="mb-3 mb-md-0">{{ $company[0]->company_name }}</h3>
  </div>
</div>
<div class="row h-100">

   <div class="col-md-12 my-auto">
        <div class="card card-block col-md-12 text-center padding-40">
            <h4 style="border-bottom: 1px solid #707070;" class="text-left margin-bottom-20">Disposal Assets</h4>
            
            <div class="row margin-top-40">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-4 text-left" style="vertical-align: middle;margin-top:8px ;">
                            <span class="text-left color-grey" >Start Date</span>
                        </div>
                        <div class="col-md-8" style="padding-left:0;">
                            <input type="text" id="start_date" readonly name="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-4 text-left" style="vertical-align: middle;margin-top:8px ;">
                            <span class="text-left color-grey">To</span>
                        </div>
                        <div class="col-md-8" style="padding-left:0;">
                            <input type="text" id="end_date" readonly name="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-4 text-left" style="vertical-align: middle;margin-top:8px ;">
                            <span class="text-left color-grey">Category</span>
                        </div>
                        <div class="col-md-8" style="padding-left:0;">
                            <select name="category" class="form-control">
                            </select>
                        </div>
                    </div>
                </div>
                

            </div>
            

            <div id="new" class="margin-top-30">
                
                <div class="row">
                    <div class="col-md-12 ">
                            @php
                            $today = date("Y-m-01");
                            $id=1;
                            @endphp
                            {!! csrf_field() !!}
                        <table class="">
                            <tr style="background-color:#148CE8;color:#fff;">
                                <td style="width:3%;padding: 10px;"></td>
                                <th style="width:10%;padding: 10px;">ASSET DESCRIPTION</th>
                                <th style="width:10%;padding: 10px;">VENDOR NAME</th>
                                <th style="width:10%;padding: 10px;">LIFE</th>
                                <th style="width:10%;padding: 10px;">PUT TO USE DATE</th>
                                <th style="width:10%;padding: 10px;">PURCHASE PRICE</th>
                                <th style="width:10%;padding: 10px;">ACCUMULATED DEPRECIATION</th>
                                <th style="width:10%;padding: 10px;">NET BOOK VALUE</th>
                            </tr>
                            <!-- <tbody style="background-color:#F8F9FB;"> -->

                            @foreach($list as $lis)
                                <tr style="background-color:#F8F9FB;border-bottom: 1px solid #e4e4e4;" >
                                    <td>
                                        <input type="checkbox" name="checkbox{{ $id }}">
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;color:#148CE8;cursor: pointer;" onclick="show({{$id}})">
                                       {{ $lis['asset_category'] }}
                                    </td>
                                    <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                        <span class="main{{$id}} main-row"></span>
                                    </td>
                                    <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;"></td>
                                    <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;"></td>
                                    <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                        <span class="main{{$id}} main-row">{{ $lis['purchase_price'] }}</span>
                                    </td>    
                                    <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;"></td>
                                    <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;"></td>
                                </tr>
                                @foreach($lis['final'] as $trn)
                                <tr id="show{{ $id }}" class="hide-row show{{ $id }}" style="background-color:#F8F9FB;border-bottom: 1px solid #e4e4e4;display: none;" >
                                    <td>
                                        <input type="checkbox" class="ids" value="{{ $trn['asset_key'] }}" name="checkbox[{{ $trn['asset_key']}}]">
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;color: #000;">
                                       <a href="{{ url('fixed-asset-detail') }}/{{ $trn['asset_key'] }}" style="color:#000;">{{ $trn['asset_category'] }}</a>
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                        {{ $trn['name'] }}
                                    </td>
                                    
                                    <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                        {{ $trn['life'] }}
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                        {{ $trn['date'] }}
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                        {{ $trn['purchase_price'] }}
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                        
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                        
                                    </td>
                                    
                                </tr>
                                <script type="text/javascript">
                                    
                                    function checkall{{ $trn['asset_key'] }}(){

                                    }

                                </script>
                                @endforeach
                                @php
                                $id++;
                                @endphp
                            @endforeach
                                
                                
                            <!-- </tbody> -->
                        </table>
                    </div>

                    <div class="col-md-12 margin-top-10 margin-bottom-10 text-left">
                        <button type="button" id="dispose" class="btn-active">Dispose</button>
                        <button type="button" class="btn-cancel"><a href="{{ url('company-dashboard') }}">Cancel</a></button>
                    </div>
                </div>
                
                
            </div>
            
            
            
        </div>
   </div>
</div>


<!-- Modal -->
<div class="modal fade" data-backdrop="false" id="disposeModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Confirm Journal Entry</h4>
                </div>
                <div class="modal-body">
                    
                    <div class="row margin-bottom-10 margin-top-10">
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6 text-right">
                            Date:<span id="disdate"></span>
                        </div>
                    </div>
                    <div class="row margin-bottom-10 margin-top-10 text-center">
                        <div id="disposedata" ></div>
                    </div>
                    <div class="row margin-bottom-10 margin-top-10 text-center">
                        <div class="col-md-6">
                            <textarea class="form-control" style="resize:none;" placeholder="Description"></textarea>
                        </div>
                        <div class="col-md-6 text-right">
                            <input type="text" class="form-control" name="entrydate" value="" id="entrydate" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12 margin-top-10 text-center">
                        <button type="button" style="width: 150px;" class="btn-active" onclick="return confirmDispose()" data-dismiss="model" >Post Entry</button>
                        
                        <button type="button" class="btn-cancel" id="disposeClose" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" data-backdrop="false" id="disposeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Disposal Of Assets</h4>
                </div>
                <input type="hidden" name="ids" id="ids">
                <div class="modal-body">
                    <div class="row margin-bottom-10 margin-top-10">
                        <div class="col-md-4 offset-md-2">
                            <label style="margin-top:10px;">Asset Sold for Consideration?</label>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" id="sold">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row margin-bottom-10 margin-top-10">
                        <div class="col-md-4 offset-md-2">
                            <label style="margin-top:10px;">Disposal Date</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="disposedate" id="dispose_date" required placeholder="MM/DD/YYYY" class="form-control">
                        </div>
                    </div>
                    <div class="row" id="ErrorMessage" style="color:red;">

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12 margin-top-10 text-center">
                        <button type="button" style="width: 150px;" class="btn-active" onclick="return confirmDispose()" data-dismiss="model" >Confirm Update</button>
                        <!-- <a href="#" style="width: 150px;" class="btn-active" data-toggle="modal" data-target="#modal4">open small modal</a> -->
                        <button type="button" class="btn-cancel" id="disposeClose" data-dismiss="modal">Close</button>
                    </div>
                </div>
            
        </div>
    </div>
</div>



@endsection