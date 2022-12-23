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

body.modal-open .modal {
    display: flex !important;
    height: 100%;
} 

body.modal-open .modal .modal-dialog {
    margin:auto;
}
  .main-wrapper .page-wrapper{
      width: 100% !important;
      margin-left:0px !important;
      
  }
  .main-wrapper .page-wrapper .page-content{
    padding: 0px !important;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice{
      background:#F9FAFB !important;
      font-size: 16px;
      
  }

  .select2-container--default .select2-results__option--highlighted[aria-selected]{
    background: #148ce8;
  }
  .select2-results__options{
    max-height: 300px !important;
  }
  .select2-results__options li{
    font-size: 16px !important;
  }
      
  select.form-control, select.typeahead, select.tt-query, select.tt-hint, .select2-container--default .select2-selection--single select.select2-search__field, .select2-container--default select.select2-selection--single, .email-compose-fields .select2-container--default select.select2-selection--multiple, select{
    color: #000;
  }
  .modal-header{
    display: block !important;
  }
</style>
<title>Finsuite | Company Registration</title>
@php
    $base_url=env('QBO_URL');
    $accessToken = Session::get('accessToken');
    $companyid = Session::get('realmid');
    $cinfo = curl_init();
    
    curl_setopt_array($cinfo, array(
        CURLOPT_URL => $base_url.'/v3/company/'.$companyid.'/query?minorversion=62',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'Select * from CompanyInfo',
        CURLOPT_HTTPHEADER => array(
            'User-Agent: QBOV3-OAuth2-Postman-Collection',
            'Accept: application/json',
            'Content-Type: application/text',
            'Authorization: Bearer '.$accessToken
        ),
    ));
    $cinfo_response = curl_exec($cinfo);
    $cinfo_res1=json_decode($cinfo_response);

    
    $asset = curl_init();
    curl_setopt_array($asset, array(
        CURLOPT_URL => $base_url.'/v3/company/'.$companyid.'/query?minorversion=62',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'Select * from Account WHERE Classification=\'Asset\'',
        CURLOPT_HTTPHEADER => array(
            'User-Agent: QBOV3-OAuth2-Postman-Collection',
            'Accept: application/json',
            'Content-Type: application/text',
            'Authorization: Bearer '.$accessToken
        ),
    ));
    $assetresponse = curl_exec($asset);
    $assetres1=json_decode($assetresponse);
    

    
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $base_url.'/v3/company/'.$companyid.'/query?minorversion=62',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'Select * from Account WHERE Classification=\'Asset\' AND AccountType=\'Fixed Asset\' AND AccountSubType IN (\'DepletableAssets\',\'FixedAssetComputers\',\'FixedAssetCopiers\',\'FixedAssetFurniture\',\'FixedAssetPhone\',\'FixedAssetPhotoVideo\',\'FixedAssetSoftware\',\'FixedAssetOtherToolsEquipment\',\'FurnitureAndFixtures\',\'Land\',\'LeaseholdImprovements\',\'OtherFixedAssets\',\'Buildings\',\'IntangibleAssets\',\'MachineryAndEquipment\',\'Vehicles\',\'AssetsInCourseOfConstruction\',\'CapitalWip\',\'IntangibleAssetsUnderDevelopment\',\'LandAsset\',\'NonCurrentAssets\',\'ParticipatingInterests\',\'ProvisionsFixedAssets\') STARTPOSITION 1 MAXRESULTS 100
        ',
        CURLOPT_HTTPHEADER => array(
            'User-Agent: QBOV3-OAuth2-Postman-Collection',
            'Accept: application/json',
            'Content-Type: application/text',
            'Authorization: Bearer '.$accessToken
        ),
    ));
    $response = curl_exec($curl);
    $res1=json_decode($response);

    $ad = curl_init();
    curl_setopt_array($ad, array(
        CURLOPT_URL => $base_url.'/v3/company/'.$companyid.'/query?minorversion=62',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'Select * from Account WHERE Classification=\'Asset\' AND AccountSubType=\'AccumulatedDepreciation\' STARTPOSITION 1 MAXRESULTS 100',
        CURLOPT_HTTPHEADER => array(
            'User-Agent: QBOV3-OAuth2-Postman-Collection',
            'Accept: application/json',
            'Content-Type: application/text',
            'Authorization: Bearer '.$accessToken
        ),
    ));
    $adresponse = curl_exec($ad);
    $adres1=json_decode($adresponse);


    
    
    

    $expense = curl_init();
    curl_setopt_array($expense, array(
        CURLOPT_URL => $base_url.'/v3/company/'.$companyid.'/query?minorversion=62',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'Select * from Account WHERE Classification=\'Expense\'',
        CURLOPT_HTTPHEADER => array(
            'User-Agent: QBOV3-OAuth2-Postman-Collection',
            'Accept: application/json',
            'Content-Type: application/text',
            'Authorization: Bearer '.$accessToken
        ),
    ));
    $expense_response = curl_exec($expense);
    $expense_res=json_decode($expense_response);

    $preference = curl_init();
    curl_setopt_array($preference, array(
        CURLOPT_URL => $base_url.'/v3/company/'.$companyid.'/query?minorversion=62',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'select * from preferences',
        CURLOPT_HTTPHEADER => array(
            'User-Agent: QBOV3-OAuth2-Postman-Collection',
            'Accept: application/json',
            'Content-Type: application/text',
            'Authorization: Bearer '.$accessToken
        ),
    ));
    $preference_response = curl_exec($preference);
    $preference_res=json_decode($preference_response);


    $CompanyDate=date('m',strtotime($cinfo_res1->QueryResponse->CompanyInfo[0]->FiscalYearStartMonth));
    foreach($cinfo_res1->QueryResponse->CompanyInfo[0]->NameValue as $ins){
        $name=$ins->Name;
        if($name == 'IndustryType'){
            $industrytype=$ins->Value;
        }
    }

    $Fiscal=date('F', strtotime('-1 months', strtotime($CompanyDate)));
    $faarray = array();
    $i=0;
    foreach($res1->QueryResponse->Account as $account){
        if($account->AccountType == 'Fixed Asset'){
            $faarray[$i]["Id"] = $account->Id;
            $faarray[$i]["Name"] = $account->Name;
        }
            
        else{
            $faarray[$i]["Id"] = $account->Id;
            $faarray[$i]["Name"] = $account->Name;
        }
        $i++;
        
    }

    $aarray = array();
    $j=0;
    foreach($assetres1->QueryResponse->Account as $accounts){
        $aarray[$j]["Id"] = $accounts->Id;
        $aarray[$j]["Name"] = $accounts->Name;
        $j++;
    }
    
    //print("<pre>".print_r($res11->Account,true)."</pre>");
    
@endphp

<form action="{{ url('updatecompany') }}" method="post" enctype="multipart/form-data">   
    {!! csrf_field() !!}
    <article id="Step1">
        <div class="row " style="background-color: #148ce8;">
            <div class="container">
                <div class="row">
                    <ul class="top-bar">
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center">
                                    <i class=" fa fa-user-o color-blue font-20 "></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white">Company Information</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue-opacity">
                                    <i class="fas fa-book-reader font-20 color-blue-opacity"></i>
                                    
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white-opacity">QBO Structure</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue-opacity">
                                    <i class="fas fa-sitemap font-20 color-blue-opacity"></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white-opacity">Map your asset Classes</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue-opacity">
                                    <i class="fas fa-file-import color-blue-opacity font-20 "></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white-opacity">Import Historical Data</div>
                            </div>
                        </li>
                    </ul>
                    
                </div>
                <div class="row">
                    
                </div>
            </div>    
        </div>
        @php
            if(!empty($companydata[0]->company_name))
                $cname = $companydata[0]->company_name;
            else
                $cname = $cinfo_res1->QueryResponse->CompanyInfo[0]->CompanyName;
        @endphp
        @php
            if(!empty($companydata[0]->fiscal_year))
                $fyear = $companydata[0]->fiscal_year;
            else
                $fyear = '';
        @endphp
        <div class="row margin-top-80 margin-bottom-80">
            <div class="container">
                <div class="col-md-6 m-auto d-flex align-items-center justify-content-center">
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <h3 class="font-25 text-left">Your Company Information</h3>
                        </div>
                        <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">Company Name</label>
                            <input type="text" value="{{ $cname }}"  class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name">
                            <span id="errorcn" style="color:red;"></span>
                        </div>
                        <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">Default Currency</label>
                            <input type="text" readonly="" name="currency" id="currency" class="form-control" value="{{ $preference_res->QueryResponse->Preferences[0]->CurrencyPrefs->HomeCurrency->value }}" >
                            <span id="errordc" style="color:red;"></span>
                        </div>
                        <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">Industry</label>
                            <input type="text" readonly="" name="industry" id="industry" class="form-control" value="{{ $industrytype }}" >

                            <span id="errori" style="color:red;"></span>
                        </div>
                        {{-- <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">Date Format</label>
                            <input type="text"  class="form-control" name="date_format" id="date_format" placeholder="MM-DD-YY">
                        </div> --}}
                        <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">Fiscal Year End Date</label>
                            <input type="text"  class="form-control" name="fiscal_date" id="fiscal_year" placeholder="YYYY-MM-DD" value="{{ $fyear }}">
                            <span id="errorfy" style="color:red;"></span>
                        </div>
                        <div class="col-md-6 pl-0">
                            <div class="col-md-12 margin-top-30">
                                <span class="font-16 family-Noto" style="display: inline">
                                    <i class="fa fa-arrow-left color-blue"></i><span class="color-blue font-16" style="display: inline">BACK</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 pr-0 text-right">
                            <div class="col-md-12 margin-top-30">
                                <span class="btn btn-primary btn-next" id="step1">Next</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <article id="Step2" style="display: none;">
        <div class="row " style="background-color: #148ce8;">
            <div class="container">
                <div class="row">
                    <ul class="top-bar">
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center">
                                    <i class=" fa fa-user-o color-blue font-20 "></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white">Company Information</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-white-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue">
                                    <i class="fas fa-book-reader font-20 color-blue"></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white">QBO Structure</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue-opacity">
                                    <i class="fas fa-sitemap font-20 color-blue-opacity"></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white-opacity">Map your asset Classes</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue-opacity">
                                    <i class="fas fa-file-import color-blue-opacity font-20 "></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white-opacity">Import Historical Data</div>
                            </div>
                        </li>
                    </ul>
                    
                </div>
                <div class="row">
                    
                </div>
            </div>    
        </div>

        <div class="row margin-top-80 margin-bottom-80">
            <div class="container">
                <div class="col-md-6 m-auto d-flex align-items-center justify-content-center">
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <h3 class="font-25 text-left">Your QBO Structure</h3>
                        </div>
                        <div class="col-md-12 margin-top-30">
                            
                            
                            <label class="margin-bottom-15 font-16 color-black-light">Which accounts do you track fixed assets </label>

                            <select class="js-example-basic-multiple w-100" multiple="multiple" data-width="100%" name="fixed_account" id="fixed_account">
                                @foreach($fa as $account)
                                    <option selected="selected"   value="{{ $account->QBO_account_id }}">
                                        @if(!empty($account->QBO_ac_number)) {{ $account->QBO_ac_number }} - @endif {{ $account->QBO_ac_name }} </option>
                                @endforeach

                                @foreach($faother as $account)
                                    @php
                                        if(!empty($account->QBO_ac_number)){
                                            $acname=$account->QBO_ac_number.'-'.$account->QBO_ac_name;    
                                        }
                                        else{
                                            $acname=$account->QBO_ac_name;       
                                        }
                                        
                                    @endphp
                                    <option @if(in_array($acname,explode(",",$companydata[0]->fixed_assets))) selected @endif value="{{ $account->QBO_account_id }}">
                                        @if(!empty($account->QBO_ac_number)){{ $account->QBO_ac_number }} - @endif {{ $account->QBO_ac_name }}
                                    </option>
                                @endforeach

                                
                                
                                
                            </select>
                            <span id="errorfa" style="color:red;"></span>
                            
                        </div>
                        <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">Which accounts do you track Accumulated depreciation?</label>
                            <select class="js-example-basic-multiple w-100" multiple="multiple" data-width="100%" id="accumulated" name="accumulated">
                                
                                @foreach($accumulated_depreciation as $abaccount)
                                    <option selected="selected" value="{{ $account->QBO_account_id }}">
                                        @if(!empty($abaccount->QBO_ac_number)){{ $abaccount->QBO_ac_number }} - @endif {{ $abaccount->QBO_ac_name }}
                                    </option>    
                                @endforeach
                                
                            </select>
                            <span id="erroraccumulated" style="color:red;"></span>
                        </div>
                        <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">Which accounts do you track depreciation?   </label>
                            <select class="js-example-basic-multiple w-100" multiple="multiple" data-width="100%" name="depreciation" id="depreciation">
                                @foreach($track_depreciation as $account)
                                    <option selected="selected" value="{{ $account->id }}">
                                        @if(!empty($account->QBO_ac_number)){{ $account->QBO_ac_number }} - @endif {{ $account->QBO_ac_name }} 
                                    </option>    
                                @endforeach
                                @foreach($all_expenses_td as $account)
                                    @php
                                        if(!empty($account->QBO_ac_number)){
                                            $track=$account->QBO_ac_number.'-'.$account->QBO_ac_name;    
                                        }
                                        else{
                                            $track=$account->QBO_ac_name;       
                                        }
                                    @endphp
                                    <option @if(in_array($track,explode(",",$companydata[0]->track))) selected @endif value="{{ $account->QBO_ac_name }}">@if(!empty($account->QBO_ac_number)){{ $account->QBO_ac_number }} - @endif {{ $account->QBO_ac_name }}</option>
                                @endforeach

                            </select>
                            <span id="errordepreciation" style="color:red;"></span>
                        </div>
                        <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">Which accounts do you track gain/loss in FA?</label>
                            <select class="js-example-basic-multiple w-100" multiple="multiple" data-width="100%" name="gl" id="gl">
                                @foreach($track_gl as $account)
                                    <option selected="selected" value="{{ $account->id }}">
                                        @if(!empty($account->QBO_ac_number)){{ $account->QBO_ac_number }} - @endif {{ $account->QBO_ac_name }}
                                    </option>    
                                @endforeach
                                @foreach($other_expenses_gl as $account)
                                    @php
                                        if(!empty($account->QBO_ac_number)){
                                            $gl=$account->QBO_ac_number.'-'.$account->QBO_ac_name;    
                                        }
                                        else{
                                            $gl=$account->QBO_ac_name;       
                                        }
                                    @endphp
                                    <option @if(in_array($gl,explode(",",$companydata[0]->gl))) selected @endif  value="{{ $account->QBO_ac_name }}">@if(!empty($account->QBO_ac_number)){{ $account->QBO_ac_number }} - @endif {{ $account->QBO_ac_name }}</option>
                                @endforeach
                                @foreach($all_expenses_gl as $account)
                                    @php
                                        if(!empty($account->QBO_ac_number)){
                                            $gl=$account->QBO_ac_number.'-'.$account->QBO_ac_name;    
                                        }
                                        else{
                                            $gl=$account->QBO_ac_name;       
                                        }
                                    @endphp
                                    <option @if(in_array($gl,explode(",",$companydata[0]->gl))) selected @endif  value="{{ $account->QBO_ac_name }}">@if(!empty($account->QBO_ac_number)){{ $account->QBO_ac_number }} - @endif {{ $account->QBO_ac_name }}</option>
                                @endforeach
                            </select>
                            <span id="errorgl" style="color:red;"></span>
                        </div>
                        <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">How many decimal places to round?</label>
                            <select  class="form-control" name="decimal" id="decimal" >
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                            <span id="errordecimal" style="color:red;"></span>
                        </div>
                        <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">Write off asset once it reaches deminus amount of</label>
                            <input type="number" min="0" max="5000" value="0"  class="form-control" name="deminus" id="deminus" >
                            <span id="errordeminus" style="color:red;"></span>
                        </div>
                        <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">What is your First Month Depreciation Method?</label>
                            <select  class="form-control" name="first_month_depreciation" id="first_month_depreciation" >
                                <option value="Half-Month">Half-Month</option>
                                <option selected="selected" value="Pro-Rate">Pro-Rate</option>
                                <option value="First 15 Days Full Month">First 15 Days, Full Month</option>
                            </select>
                            <span id="errordecimal" style="color:red;"></span>
                        </div>
                        <!-- <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">Do you track leasehold Improvements? </label>
                            <select class="form-control margin-top-10" name="track" id="track">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>

                        </div> -->
                        <input type="hidden" name="track" id="track" value="No">
                        
                        <div class="col-md-6 pl-0">
                            <div class="col-md-12 margin-top-30">
                                <span class="font-16 family-Noto" id="back1" style="display: inline;cursor:pointer;">
                                    <i class="fa fa-arrow-left color-blue"></i><span class="color-blue font-16" style="display: inline">BACK</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 pr-0 text-right">
                            <div class="col-md-12 margin-top-30">
                                <span class="btn btn-primary btn-next" id="step2">Next</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!-- <article id="Step31" style="display: none;">
        <div class="row " style="background-color: #148ce8;">
            <div class="container">
                <div class="row">
                    <ul class="top-bar">
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center">
                                    <i class=" fa fa-user-o color-blue font-20 "></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white">Company Information</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-white-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue">
                                    <i class="fas fa-book-reader font-20 color-blue"></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white">QBO Structure</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-white-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue">
                                    <i class="fas fa-sitemap font-20 color-blue"></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white">Map your asset Classes</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue-opacity">
                                    <i class="fas fa-file-import color-blue-opacity font-20 "></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white-opacity">Import Historical Data</div>
                            </div>
                        </li>
                    </ul>
                    
                </div>
                <div class="row">
                    
                </div>
            </div>    
        </div>

        <div class="row margin-top-80 margin-bottom-80">
            <div class="container">
                <div class="col-md-6 m-auto d-flex align-items-center justify-content-center">
                    <div class="row">
                        <div class="col-md-12 text-left clearfix">
                            <h3 class="font-25 text-center">Track leasehold Improvements</h3>
                        </div>
                        
                    </div>
                </div>
                <div class="margin-top-30">
                    <div class="col-md-6 m-auto d-flex align-items-center justify-content-center">
                        <div class="row">
                            
                            <div id="trackyes" class="clearfix">
                                
                                <div class="col-md-12 text-left" >
                                    <table class="table table-bordered" id="customFields">
                                        <thead>
                                            <tr>
                                                <th>Location Name</th>
                                                <th>Lease End Date</th>
                                                <th>Default Lease?</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th><input type="text" required class="form-control track" name="location[]" ></th>
                                                <th><input type="text" required class="form-control track" name="leaseenddate[]" ></th>
                                                <th>
                                                    <select class="form-control track" name="defaultlease[]" >
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                    </select>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12 margin-top-15 text-right">
                                    <a href="javascript:void(0);" class="addCF  btn btn-primary" >Add</a>
                                </div>
                            </div>
                            <span style="color:red;" id="trackError"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container margin-top-30 margin-bottom-80">
            <div class="row">
                <div class="col-md-6 pl-0">
                    <div class="col-md-12 margin-top-30">
                        <span class="font-16 family-Noto" id="back21" style="display: inline;cursor:pointer;">
                            <i class="fa fa-arrow-left color-blue"></i><span class="color-blue font-16" style="display: inline">BACK</span>
                        </span>
                    </div>
                </div>
                <div class="col-md-6 pr-0 text-right">
                    <div class="col-md-12 margin-top-30">
                        <span class="btn btn-primary btn-next" id="step31">Next</span>
                    </div>
                </div>
            </div>
        </div>
    </article> -->

    <article id="Step3" style="display: none;">
        <div class="row " style="background-color: #148ce8;">
            <div class="container">
                <div class="row">
                    <ul class="top-bar">
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center">
                                    <i class=" fa fa-user-o color-blue font-20 "></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white">Company Information</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-white-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue">
                                    <i class="fas fa-book-reader font-20 color-blue"></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white">QBO Structure</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-white-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue">
                                    <i class="fas fa-sitemap font-20 color-blue"></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white">Map your asset Classes</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue-opacity">
                                    <i class="fas fa-file-import color-blue-opacity font-20 "></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white-opacity">Import Historical Data</div>
                            </div>
                        </li>
                    </ul>
                    
                </div>
                <div class="row">
                    
                </div>
            </div>    
        </div>

        <div class="row margin-top-80 margin-bottom-80">
            <div class="container">
                <div class="col-md-6 m-auto d-flex align-items-center justify-content-center">
                    <div class="row">
                        <div class="col-md-12 text-left clearfix">
                            <h3 class="font-25 text-center">Map your Asset Category</h3>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row margin-bottom-15">
            <div class="container">
                <h3 class="font-25 text-left">Asset Category</h3>
            </div>
        </div>
        <div class="row m-auto d-flex align-items-center justify-content-center">
            
            <div class="col-lg-12 grid-margin stretch-card padding-15" style="background-color: #fff;">
                <div class="table-responsive" >
                    <table class="table " id="addassets" style="background-color:#FFFFFF">
                        <thead>
                            <tr>
                                <td><span class="font-11">ASSET ACCOUNT</span></td>
                                <td><span class="font-11">ASSET CATEGORY</span></td>
                                <td><span class="font-11">DEPRECIATION METHOD</span></td>
                                <td><span class="font-11">DEFAULT LIFE(MONTHS)</span></td>
                                <td><span class="font-11">ACCUMULATED DEPRECIATION A/C</span></td>
                                <td><span class="font-11">DEPRECIATION ACCOUNT</span></td>
                                {{-- <td><span class="font-11">DEPRECIATION CLASS</span></td> --}}
                                <td><span class="font-11">GAIN/LOSS ON FIXED ASSET A/C</span></td>
                                {{-- <td><span class="font-11">ACTION</span></td> --}}
                            </tr>
                        </thead>
                        <tbody style="background-color: #E8EBF1;">
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
            {{-- <div class="container">
                <div class="text-right">
                    <a class="assets btn btn-primary" href="javascript:void(0);">ADD ASSETS + </a>
                </div>
            </div> --}}
        </div>
        <div class="container margin-top-30 margin-bottom-80" id="backstep31" style="display:none;">
            <div class="row">
                <div class="col-md-6 pl-0">
                    <div class="col-md-12 margin-top-30">
                        <span class="font-16 family-Noto" id="back31" style="display: inline;cursor:pointer;">
                            <i class="fa fa-arrow-left color-blue"></i><span class="color-blue font-16" style="display: inline">BACK</span>
                        </span>
                    </div>
                </div>
                <div class="col-md-6 pr-0 text-right">
                    <div class="col-md-12 margin-top-30">
                        <span class="btn btn-primary btn-next" id="step3">Next</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container margin-top-30 margin-bottom-80" id="backstep2">
            <div class="row">
                <div class="col-md-6 pl-0">
                    <div class="col-md-12 margin-top-30">
                        <span class="font-16 family-Noto" id="back2" style="display: inline;cursor:pointer;">
                            <i class="fa fa-arrow-left color-blue"></i><span class="color-blue font-16" style="display: inline">BACK</span>
                        </span>
                    </div>
                </div>
                <div class="col-md-6 pr-0 text-right">
                    <div class="col-md-12 margin-top-30">
                        <span class="btn btn-primary btn-next" id="step33">Next</span>
                    </div>
                </div>
            </div>
        </div>

    </article>
    <article id="Step4" style="display: none;">
        <div class="row " style="background-color: #148ce8;">
            <div class="container">
                <div class="row">
                    <ul class="top-bar">
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center">
                                    <i class=" fa fa-user-o color-blue font-20 "></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white">Company Information</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-white-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue">
                                    <i class="fas fa-book-reader font-20 color-blue"></i>
                                    
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white">QBO Structure</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-white-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue">
                                    <i class="fas fa-sitemap font-20 color-blue"></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white">Map your asset Classes</div>
                            </div>
                        </li>
                        <li class="margin-left-right">
                            
                            <div class="m-auto height-100 d-flex align-items-center justify-content-center">
                                <span class="border-white-100"></span>
                            </div>
                            
                        </li>
                        <li>
                            <div class="text-center">
                                <div class="m-auto box d-flex align-items-center justify-content-center bgcolor-blue">
                                    <i class="fas fa-file-import color-blue font-20 "></i>
                                </div>
                                <div class="text-center padding-top-10 font-12 color-white">Import Historical Data</div>
                            </div>
                        </li>
                    </ul>
                    
                </div>
                <div class="row">
                    
                </div>
            </div>    
        </div>

        <div class="row margin-top-80 margin-bottom-80">
            <div class="container">
                <div class="col-md-6 m-auto d-flex align-items-center justify-content-center">
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <h3 class="font-25 text-left">Import Historical Data</h3>
                        </div>
                        <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">Start Date for Finsuite.io</label>
                            <input type="text" class="form-control" required  id="start_date" name="start_date" placeholder="">
                        </div>

                        <div class="col-md-12 margin-top-30">
                            <label class="margin-bottom-15 font-16 color-black-light">Import Historical Data</label>
                        </div>

                        <div class="col-md-12 ">
                            <input type="checkbox" onclick="return checkbtn('Now')" checked value="Now" class="chb login-checkbox"> Now<br>
                            <input type="checkbox" onclick="return checkbtn('Later')" value="Later" class="chb login-checkbox margin-top-5"> Later<br>
                        </div>
                        
                        <div class="col-md-12 margin-top-30" id="now">
                            <div class="row">
                                <label class="margin-bottom-15 font-16 color-black-light">Upload historical data file (csv, xlsx)</label>
                                <div class="col-md-8 pr-0 pl-0">
                                    <input type="file" name="image-upload" id="imgupload" style="display: none;"/>
                                    <input type="text" style="background-color: #fff" class="form-control" id="OpenImgUpload"/>
                                </div>
                                <div class="col-md-4 pr-0 pl-0">
                                    <button id="OpenImgUpload1" type="button" class="btn btn-primary login-btn height-35">Browse</button>
                                </div>
                                <div class="col-md-12 margin-top-30">
                                    <label class="margin-bottom-15 font-14 color-black-light">Download the Template <a download="" href="{{ asset('assets/template.xlsx') }}">click here</a></label>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6 pl-0">
                            <div class="col-md-12 margin-top-30">
                                <span class="font-16 family-Noto" id="back3" style="display: inline;cursor:pointer;">
                                    <i class="fa fa-arrow-left color-blue"></i><span class="color-blue font-16" style="display: inline">BACK</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 pr-0 text-right">
                            <div class="col-md-12 margin-top-30">
                                <button type="submit" class="btn btn-primary btn-next" id="">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</form>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Applying Default Rules</h4>
      </div>
      <div class="modal-body">
        <p>System had pre-populated account info and suggested the best relevant data based on your QB company, but you are always welcome to change these pre-populated information and make it as per your need.</p>
      </div>
      
    </div>

  </div>
</div>
@endsection
