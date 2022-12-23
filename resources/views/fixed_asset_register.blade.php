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

<title>Finsuite | Fixed Asset Register</title>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>  
    <h3 class="mb-3 mb-md-0">{{ $company[0]->company_name }}</h3>
  </div>
</div>
<div class="row h-100">

   <div class="col-md-12 my-auto">
        <div class="card card-block col-md-12 text-center padding-40">
            <h4 style="border-bottom: 1px solid #707070;" class="text-left margin-bottom-20">Fixed Asset Register</h4>
            
            <div class="row margin-top-40">
                <div class="col-md-6">
                    <form method="post" action="{{ url('fixed-asset-search')}}">
                        <div class="row">
                            {!! csrf_field() !!}
                            <div class="col-md-3 text-left">
                                <span class="text-left color-grey" style="vertical-align: middle;margin-top:8px ;">Start Date</span>
                            </div>
                            <div class="col-md-6" style="padding-left:0;">
                                <input type="text" id="start_date" required name="start_date" class="form-control">
                            </div>
                            <div class="col-md-3" style="padding-left:0;">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn-cancel">Post JE</button>
                    <button type="button" class="btn-cancel">Download</button>
                </div>

            </div>
            

            <div id="new" class="margin-top-30">
                
                <div class="row">
                    <div class="col-md-12 ">
                            @php
                            $today = date("Y-m-01");
                            $id=1;
                            $currentdate=date('n');
                            @endphp
                            {!! csrf_field() !!}
                        <div class="table-responsive">
                            <table class="">
                                <tr style="background-color:#148CE8;color:#fff;">
                                    <th style="width:10%;padding: 10px;">ASSET DESCRIPTION</th>
                                    <th style="width:10%;padding: 10px;">VENDOR NAME</th>
                                    <th style="width:10%;padding: 10px;">PURCHASE PRICE</th>
                                    <th style="width:10%;padding: 10px;">LIFE</th>
                                    <th style="width:10%;padding: 10px;">PUT TO USE DATE</th>
                                    <th style="width:10%;padding: 10px;">Jan {{ date('y') }}<br>
                                        @php
                                            if($currentdate >= 1 ){
                                                echo "(Actual)";
                                            }
                                            else{
                                                echo '<span style="color:red;">(Forecast)</span>';   
                                            }
                                        @endphp
                                    </th>
                                    <th style="width:10%;padding: 10px;">Feb {{ date('y') }}<br>
                                        @php
                                            if($currentdate >= 2 ){
                                                echo "(Actual)";
                                            }
                                            else{
                                                echo '<span style="color:red;">(Forecast)</span>';   
                                            }
                                        @endphp
                                    </th>
                                    <th style="width:10%;padding: 10px;">Mar<br>
                                        @php
                                            if($currentdate >= 3 ){
                                                echo "(Actual)";
                                            }
                                            else{
                                                echo '<span style="color:red;">(Forecast)</span>';   
                                            }
                                        @endphp
                                    </th>
                                    <th style="width:10%;padding: 10px;">Apr {{ date("y") }}<br>
                                        @php
                                            if($currentdate >= 4 ){
                                                echo "(Actual)";
                                            }
                                            else{
                                                echo '<span style="color:red;">(Forecast)</span>';   
                                            }
                                        @endphp
                                    </th>
                                    <th style="width:10%;padding: 10px;">May {{ date("y") }}<br>
                                        @php
                                            if($currentdate >= 5 ){
                                                echo "(Actual)";
                                            }
                                            else{
                                                echo '<span style="color:red;">(Forecast)</span>';   
                                            }
                                        @endphp
                                    </th>
                                    <th style="width:10%;padding: 10px;">Jun {{ date("y") }}<br>
                                        @php
                                            if($currentdate >= 6 ){
                                                echo "(Actual)";
                                            }
                                            else{
                                                echo '<span style="color:red;">(Forecast)</span>';   
                                            }
                                        @endphp
                                    </th>
                                    <th style="width:10%;padding: 10px;">Jul {{ date("y") }}<br>
                                        @php
                                            if($currentdate >= 7 ){
                                                echo "(Actual)";
                                            }
                                            else{
                                                echo '<span style="color:red;">(Forecast)</span>';   
                                            }
                                        @endphp
                                    </th>
                                    <th style="width:10%;padding: 10px;">Aug {{ date("y") }}<br>
                                        @php
                                            if($currentdate >= 8 ){
                                                echo "(Actual)";
                                            }
                                            else{
                                                echo '<span style="color:red;">(Forecast)</span>';   
                                            }
                                        @endphp
                                    </th>
                                    <th style="width:10%;padding: 10px;">Sep {{ date("y") }}<br>
                                        @php
                                            if($currentdate >= 9 ){
                                                echo "(Actual)";
                                            }
                                            else{
                                                echo '<span style="color:red;">(Forecast)</span>';   
                                            }
                                        @endphp
                                    </th>
                                    <th style="width:10%;padding: 10px;">Oct {{ date("y") }}<br>
                                        @php
                                            if($currentdate >= 10 ){
                                                echo "(Actual)";
                                            }
                                            else{
                                                echo '<span style="color:red;">(Forecast)</span>';   
                                            }
                                        @endphp
                                    </th>
                                    <th style="width:10%;padding: 10px;">Nov {{ date("y") }}<br>
                                        @php
                                            if($currentdate >= 11 ){
                                                echo "(Actual)";
                                            }
                                            else{
                                                echo '<span style="color:red;">(Forecast)</span>';   
                                            }
                                        @endphp
                                    </th>
                                    <th style="width:10%;padding: 10px;">Dec {{ date("y") }}<br>
                                        @php
                                            if($currentdate >= 12 ){
                                                echo "(Actual)";
                                            }
                                            else{
                                                echo '<span style="color:red;">(Forecast)</span>';   
                                            }
                                        @endphp
                                    </th>
                                    <th style="width:10%;padding: 10px;">NET BOOK VALUE</th>
                                </tr>
                                <!-- <tbody style="background-color:#F8F9FB;"> -->

                                @foreach($list as $lis)
                                    <tr style="background-color:#F8F9FB;border-bottom: 1px solid #e4e4e4;" >
                                        
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;color:#148CE8;cursor: pointer;" onclick="show({{$id}})">
                                           {{ $lis['asset_category'] }}
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row"></span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row">{{ $lis['purchase_price'] }}</span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row">{{ $lis['first'] }}</span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row">{{ $lis['second'] }}</span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row">{{ $lis['third']}}</span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row">{{ $lis['fourth']}}</span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row">{{ $lis['fifth']}}</span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row">{{ $lis['sixth']}}</span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row">{{ $lis['seventh']}}</span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row">{{ $lis['eigth']}}</span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row">{{ $lis['nine']}}</span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row">{{ $lis['ten']}}</span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row">{{ $lis['eleven']}}</span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            <span class="main{{$id}} main-row">{{ $lis['twelve']}}</span>
                                        </td>
                                        <td  style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            
                                        </td>
                                        
                                    </tr>
                                    @foreach($lis['final'] as $trn)
                                    <tr id="show{{ $id }}" class="hide-row show{{ $id }}" style="background-color:#F8F9FB;border-bottom: 1px solid #e4e4e4;display: none;" >
                                        
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;color: #000;">
                                           <a href="{{ url('fixed-asset-detail') }}/{{ $trn['asset_key'] }}" style="color:#000;">{{ $trn['asset_category'] }}</a>
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['name'] }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['purchase_price'] }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['life'] }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['start_date'] }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['first'] }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['second'] }}
                                        </td>
                                        
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['third']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['fourth']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['fifth']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['sixth']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['seventh']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['eigth']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['nine']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['ten']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['eleven']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $trn['twelve']}}
                                        </td>
                                        
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                    <tr id="show{{ $id }}" class="hide-row show{{ $id }}" style="background-color:#F8F9FB;border-bottom: 1px solid #e4e4e4;display: none;" >
                                        
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;color: #000;">
                                           Total
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                        
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $lis['purchase_price'] }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $lis['first'] }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $lis['second'] }}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $lis['third']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $lis['fourth']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $lis['fifth']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $lis['sixth']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $lis['seventh']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $lis['eigth']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $lis['nine']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $lis['ten']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $lis['eleven']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            {{ $lis['twelve']}}
                                        </td>
                                        <td style="padding-left: 0px;padding-right: 10px;padding: 10px 0px;">
                                            
                                        </td>
                                        
                                    </tr>
                                    @php
                                    $id++;
                                    @endphp
                                @endforeach
                                    
                                    
                                <!-- </tbody> -->
                            </table>
                        </div>
                    </div>
                </div>
                
                
            </div>
            
            
            
        </div>
   </div>
</div>
@endsection