@extends('layout.master1')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
{{-- {{ dd(session()->all()); }} --}}
<h2 class="font-35">Create Company</h2>

<div class="margin-top-35"><span class="font-25 "> Welcome to FinSuite -  Let’s create your first company</span></div>

<div class="row margin-top-20">
    <div class="col-md-8">
        <p class="font-18 color-grey1">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lLorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum </p><br>

        <p class="font-18 color-grey1">ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum </p>
    </div>
</div>
<div class="row margin-top-30">
    <div class="col-md-8">
        <form action="{{ url('connectqbo') }}" method="POST">
            {!! csrf_field() !!}
            <button type="submit" style="border: none;padding:0px;">
                <img src="{{ asset('images/QBO.png') }}" style="width:300px;">
            </button>
        </form>
    </div>
</div>


{{-- Company Name : {{ $companyInfo->CompanyName }}<br>
Company Address: {{ $companyInfo->CompanyAddr->Line1 }} {{ $companyInfo->CompanyAddr->Line2 }} {{ $companyInfo->CompanyAddr->Line3 }} {{ $companyInfo->CompanyAddr->Line4 }} {{ $companyInfo->CompanyAddr->Line5 }} {{ $companyInfo->CompanyAddr->City }}<br> --}}

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