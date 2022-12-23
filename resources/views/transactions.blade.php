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
<div class="row h-100">

   <div class="col-md-12 my-auto">
        <div class="card card-block col-md-12 text-center padding-40">
            <h4 style="border-bottom: 1px solid #707070;" class="text-left margin-bottom-20">Transactions</h4>
            
            <div class="row margin-top-40">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-1 text-left">
                            <span class="text-left color-grey" style="vertical-align: middle;">From</span>
                        </div>
                        <div class="col-md-3" style="padding-left:0;">
                            <input type="text" id="start_date" readonly name="from" value="{{ Session::get('start_date') }}" class="form-control">
                        </div>
                        <div class="col-md-1">
                            <span class="text-right color-grey">TO</span>
                        </div>
                        <div class="col-md-3" style="padding-left:0;">
                            <input type="text" id="end_date" readonly name="enddate" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>
            </div>
            <div class="row margin-top-20">
                <div class="col-md-8 text-left">
                    <ul style="list-style: none;display: inline-flex;padding-left: 0px;">
                        <li style="display: inline;padding-right: 10px;">
                            <h3 class="font-20 " >
                                <a href="javascript:void(0)" id="newcolor" onclick="transaction('New')" class="color-blue">     New Transaction
                                </a>
                            </h3>
                        </li>
                        <li style="display: inline;padding-right: 10px;">
                            <h3 class="font-20"   style="color: #707070;" >
                                <a href="javascript:void(0)" id="processedcolor" class="color-grey1" onclick="transaction('Processed')">Processed Transaction</a>
                            </h3>
                        </li>
                        <li style="display: inline;padding-right: 10px;">
                            <h3 class="font-20"  style="color: #707070;">
                                <a href="javascript:void(0)" id="ignoredcolor" class="color-grey1"  onclick="transaction('Ignored')">Ignored Transaction</a>
                            </h3>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 text-right">
                    <a href="" class="font-20 color-grey1">+ Create Asset Manually</a>
                </div>
            </div>

            <div id="new">
                <form action="{{ url('process') }}" method="post">
                <div class="row">
                    <div class="col-md-12 ">
                        
                            {!! csrf_field() !!}
                        <table class="">
                            <tr style="background-color:#148CE8;color:#fff;">
                                <th style="width:5%;padding: 10px;"><input type="checkbox" id="selectAll"  name="" style="width:20px;" class="form-control" value=""></th>
                                <th style="width:10%;padding: 10px;">Account</th>
                                <th style="width:10%;padding: 10px;">Date</th>
                                <th style="width:10%;padding: 10px;">Name</th>
                                <th style="width:10%;padding: 10px;">Type</th>
                                <th style="width:10%;padding: 10px;">Memo</th>
                                <th style="width:10%;padding: 10px;">DEBIT</th>
                                <th style="width:10%;padding: 10px;">CREDIT</th>
                                <th style="width:10%;padding: 10px;">DEPRECIATION METHOD</th>
                                <th style="width:10%;padding: 10px;">LIFE(Mos)</th>
                                <th style="width:5%;padding: 10px;">ACTIONS</th>
                            </tr>
                            <!-- <tbody style="background-color:#F8F9FB;"> -->

                                @foreach($new as $trn)
                                <tr style="background-color:#F8F9FB;border-bottom: 1px solid #e4e4e4;">
                                    <td style="padding-left: 10px !important;padding-right: 10px;padding: 10px 0px;">
                                        <input type="checkbox" name="id[]" id="accountId" style="width:20px;" class="form-control" value="{{ $trn->asset_key }}">
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                        {{ $trn->account_name }}
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                        {{ $trn->txn_date }}
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                        {{ $trn->name }}
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                        {{ $trn->txn_type }}
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                        {{ $trn->memo }}
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                        @php
                                            if($decimal == 0){
                                                echo round($trn->debt_amt);   
                                            }
                                            if($decimal == 1){
                                                echo number_format($trn->debt_amt,1);   
                                            }
                                            if($decimal == 2){
                                                echo number_format($trn->debt_amt,2);   
                                            }
                                        @endphp
                                        
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                        
                                        @php
                                            if($decimal == 0){
                                                echo round($trn->credit_amt);   
                                            }
                                            if($decimal == 1){
                                                echo number_format($trn->credit_amt,1);   
                                            }
                                            if($decimal == 2){
                                                echo number_format($trn->credit_amt,2);   
                                            }
                                        @endphp
                                    </td>
                                    
                                    <td style="padding-left: 0px;padding-right: 10px;color: #148CEB;padding: 10px 0px;">
                                        {{ $trn->dep_method}}
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;color: #148CEB;padding: 10px 0px;">
                                        {{ $trn->default_life}}
                                    </td>
                                    <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                        <a href="{{ url('edittransactions')}}/{{ $trn->asset_key }}" class="color-black"><i class="fa fa-pencil"></i></a>&nbsp;
                                        <a href="{{ url('/ignored') }}/{{ $trn->asset_key }}" onclick="return confirm('Are you sure want to ignore this transaction?');">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20">
                                                <path id="Icon_material-delete-sweep" data-name="Icon material-delete-sweep" d="M19.25,21h5v2.5h-5Zm0-10H28v2.5H19.25Zm0,5h7.5v2.5h-7.5Zm-15,7.5A2.507,2.507,0,0,0,6.75,26h7.5a2.507,2.507,0,0,0,2.5-2.5V11H4.25ZM18,7.25H14.25L13,6H8L6.75,7.25H3v2.5H18Z" transform="translate(-3 -6)" fill="#d61515" opacity="0.6"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            <!-- </tbody> -->
                        </table>
                    </div>
                </div>
                <div class="row" style="margin-top:20px">
                    <div class="col-md-2">
                        <button type="submit" class="btn-active" style="width:160px;">Process Transaction</button>
                    </div>

                    <div class="col-md-2 text-left">
                        <button type="button" class="btn-cancel">Cancel</button>
                    </div>

                    <!-- <div class="col-md-8 text-right">
                        <button class="btn-active" style="width:180px;margin-right: 0px;">Merge Transaction</button>
                    </div> -->
                </div>
                </form>
            </div>
            <div id="processed" style="display:none;">
                <div class="row">
                    <div class="col-md-12 ">
                        <table class="">
                            <tbody>
                                <tr style="background-color:#148CE8;color:#fff;">
                                    <th style="width:5%;padding: 10px;"></th>
                                    <th style="width:10%;padding: 10px;">Account</th>
                                    <th style="width:10%;padding: 10px;">Date</th>
                                    <th style="width:10%;padding: 10px;">Name</th>
                                    <th style="width:10%;padding: 10px;">Type</th>
                                    <th style="width:10%;padding: 10px;">Memo</th>
                                    <th style="width:10%;padding: 10px;">DEBIT</th>
                                    <th style="width:10%;padding: 10px;">CREDIT</th>
                                    <th style="width:10%;padding: 10px;">DEPRECIATION METHOD</th>
                                    <th style="width:10%;padding: 10px;">LIFE(Mos)</th>
                                   
                                    
                                    
                                </tr>
                                @foreach($processed as $trn)
                                    <tr style="background-color:#F8F9FB;border-bottom: 1px solid #e4e4e4;">
                                        <td></td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->account_name }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->txn_date }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->name }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->txn_type }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->memo }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            @php
                                                if($decimal == 0){
                                                    echo round($trn->debt_amt);   
                                                }
                                                if($decimal == 1){
                                                    echo number_format($trn->debt_amt,1);   
                                                }
                                                if($decimal == 2){
                                                    echo number_format($trn->debt_amt,2);   
                                                }
                                            @endphp
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            @php
                                                if($decimal == 0){
                                                    echo round($trn->credit_amt);   
                                                }
                                                if($decimal == 1){
                                                    echo number_format($trn->credit_amt,1);   
                                                }
                                                if($decimal == 2){
                                                    echo number_format($trn->credit_amt,2);   
                                                }
                                            @endphp
                                        </td>
                                        
                                        <td style="padding-left: 0px;padding-right: 10px;color: #148CEB;padding: 10px 0px;">
                                            {{ $trn->dep_method}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #148CEB;padding: 10px 0px;">
                                            {{ $trn->default_life}}
                                        </td>
                                        
                                    </tr>
                                @endforeach

                                @foreach($historical as $trn)
                                    <tr style="background-color:#F8F9FB;border-bottom: 1px solid #e4e4e4;">
                                        <td><span style="color:#015CC8;">(H)</span></td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->account_name }} 
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->txn_date }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->name }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->txn_type }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->memo }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            @php
                                                if($decimal == 0){
                                                    echo round($trn->debt_amt);   
                                                }
                                                if($decimal == 1){
                                                    echo number_format($trn->debt_amt,1);   
                                                }
                                                if($decimal == 2){
                                                    echo number_format($trn->debt_amt,2);   
                                                }
                                            @endphp
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            @php
                                                if($decimal == 0){
                                                    echo round($trn->credit_amt);   
                                                }
                                                if($decimal == 1){
                                                    echo number_format($trn->credit_amt,1);   
                                                }
                                                if($decimal == 2){
                                                    echo number_format($trn->credit_amt,2);   
                                                }
                                            @endphp
                                        </td>
                                        
                                        <td style="padding-left: 0px;padding-right: 10px;color: #148CEB;padding: 10px 0px;">
                                            {{ $trn->dep_method}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #148CEB;padding: 10px 0px;">
                                            {{ $trn->default_life}}
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" style="margin-top:20px">
                    <!-- <div class="col-md-2">
                        <button class="btn-active" style="width:160px;">Process Transaction</button>
                    </div> -->

                    <!-- <div class="col-md-2 text-left">
                        <button class="btn-cancel">Cancel</button>
                    </div> -->

                    
                </div>
            </div>
            <div id="ignored" style="display:none;">
                <div class="row">
                    <div class="col-md-12 ">
                        <table class="">
                            <tbody>
                                <tr style="background-color:#148CE8;color:#fff;">
                                    <!-- <th style="width:10%;padding: 10px;"></th> -->
                                    <th style="width:10%;padding: 10px;">Account</th>
                                    <th style="width:10%;padding: 10px;">Date</th>
                                    <th style="width:10%;padding: 10px;">Name</th>
                                    <th style="width:10%;padding: 10px;">Type</th>
                                    <th style="width:10%;padding: 10px;">Memo</th>
                                    
                                    <th style="width:10%;padding: 10px;">DEBIT</th>
                                    <th style="width:10%;padding: 10px;">CREDIT</th>
                                    <th style="width:10%;padding: 10px;">DEPRECIATION METHOD</th>
                                    <th style="width:10%;padding: 10px;">LIFE(Mos)</th>
                                    <th style="width:10%;padding: 10px;">ACTION</th>
                                    
                                </tr>
                                @foreach($ignored as $trn)
                                    <tr style="background-color:#F8F9FB;border-bottom: 1px solid #e4e4e4;">
                                        <!-- <td style="padding-left: 10px;padding-right: 10px;">
                                            <input type="checkbox" name="" style="width:20px;" class="form-control" value="{{ $trn->asset_key }}">
                                        </td> -->
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->account_name }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->txn_date }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->name }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->txn_type }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->memo }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->debt_amt }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #10B759;padding: 10px 0px;">
                                            {{ $trn->credit_amt }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #148CEB;padding: 10px 0px;">
                                            {{ $trn->dep_method}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;color: #148CEB;padding: 10px 0px;">
                                            {{ $trn->default_life}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;">
                                            <a onclick="return confirm('Are you sure want to move this transaction?');" href="{{ url('/new') }}/{{ $trn->asset_key }}" class="color-black">
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            
        </div>
   </div>
</div>
@endsection