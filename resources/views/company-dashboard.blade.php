@extends('layout.companymaster')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<style type="text/css">
  .page-content{
    padding: 0px !important;
  }
</style>
<div class="row">
  <div class="col-md-9" style="padding:25px;">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>  
        <h3 class="mb-3 mb-md-0">{{ $company[0]->company_name }}</h3>
      </div>
    </div>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>  
        <h4 class="mb-3 mb-md-0">WELCOME TO DASHBOARD</h4>
      </div>
    </div>
    <div class="col-md-12" style="background-color:#fff;box-shadow: 1px 1px 1px 1px;padding: 10px;">
        <p>Notification Center</p><br>
        <ul style="margin-top: 10px;margin-block-start: 0px;
    padding-inline-start: 20px;">
          <li>X new transactions need processing</li>
          <li>Depreciation entry for June 2021 posted successfully, post next month now</li>
          <li>Your trail is ending on June 30 2021,Renew Now</li>
        </ul>
    </div>
    <div class="col-md-12" style="background-color:#fff;box-shadow: 1px 1px 1px 1px;padding: 10px;margin-top: 20px;">
      <div class="row">
        <div class="col-md-4">
          <p>SUMMARY</p>
        </div>
        <div class="col-md-2">
          <p>GROSS VALUE</p>
        </div>
        <div class="col-md-2">
          <p>ACC. DEP.</p>
        </div>
        <div class="col-md-2">
          <p>NET BOOK VALUE</p>
        </div>
        <div class="col-md-2">
          <p>ASSET COUNT</p>
        </div>
      </div>
       
    </div>
  </div>
  <div class="col-md-3" style="background-color: #ECF4FB;height: 100%;min-height: 85vh;">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin position-fixed" style="margin-top:100px;">
      <div>  
        <p class="mb-3 mb-md-0" style="color:#158CE8;font-size: 18px;">SHORTCUTS</p>
      </div>
      <div class="row">
        <div class="col-md-12 " style="margin-top:10px;">
          <a style="color:#000;" href="{{ url('transactions')}}">REVIEW NEW TRANSACTIONS</a>
        </div>
        <div class="col-md-12" style="margin-top:10px;">
          <a style="color:#000;" href="{{ url('fixed-asset-register')}}">REVIEW FIXED ASSETS REGISTER TRANSACTIONS</a>
        </div>
        <div class="col-md-12" style="margin-top:10px;">
          <a style="color:#000;" href="{{ url('upload-historical-data')}}">UPLOAD HISTORICAL TRANSACTIONS</a>
        </div>
        <div class="col-md-12" style="margin-top:10px;">
          <a style="color:#000;" href="{{ url('transactions')}}">CHANGE IN LIFE OF ASSETS</a>
        </div>
        <div class="col-md-12" style="margin-top:10px;">
          <a style="color:#000;" href="{{ url('dispose-assets')}}">DISPOSE ASSETS</a>
        </div>
        <div class="col-md-12" style="margin-top:10px;">
          <a style="color:#000;" href="{{ url('fixed-assets')}}">FIXED ASSET SETTINGS</a>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush