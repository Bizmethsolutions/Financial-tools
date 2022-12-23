@extends('layout.companymaster')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

  <div class="row h-100">
    <div class="col-md-12 my-auto">
      <div class="card card-block col-md-6 offset-md-3 text-center padding-40">
        <form method="post" enctype="multipart/form-data"  action="{{ url('import-historical-data') }}">
        <div class="row padding-40">
            @php
              $date1 = '2020-01-01';
              $date2 = '2021-12-01';
              $d1=new DateTime($date2); 
              $d2=new DateTime($date1);                                  
              $Months = $d2->diff($d1); 
              $howeverManyMonths = (($Months->y) * 12) + ($Months->m);
            @endphp
            @if(Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{Session::get('error')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3 style="font-size: 25px;color:#148ce8;border-bottom: 1px solid #000;margin-bottom: 100px;width: 100%;text-align: left;">
                Upload Historical Transactions
            </h3>
            {!! csrf_field() !!}
            <label class="margin-bottom-15 font-16 color-black-light text-left" style="width:100%;">Upload historical data file (csv, xlsx)</label>
            <!-- <label class="margin-bottom-15 font-12 color-black-light">Import old transaction csv,xlsx file</label> -->
            <div class="col-md-8 pr-0 pl-0">
                <input type="file"  id="imgupload" name="image-upload" style="display: none;"/>
                <input type="text" style="background-color: #fff"  placeholder="Import old transaction csv file" class="form-control" id="OpenImgUpload"/>
                <span id="uploadMessage"></span>
            </div>
            <div class="col-md-4 pr-0 pl-0">
                <button id="OpenImgUpload1" type="button" class="btn btn-primary login-btn height-35">Browse</button>
            </div>
            <div class="margin-top-30 text-left" style="width:100%;">
                <label class="margin-bottom-15 font-14 color-black-light">Download the Template <a download href="{{ asset('assets/template.xlsx') }}">click here</a></label>
            </div>
            <div class="text-center" style="margin-top:100px;border-top: 1px solid #000;width: 100%;padding-top: 20px;">
              <button type="submit" class="btn-active">Upload</button>
              <button class="btn-cancel">Cancel</button>
            </div>
          
        </div>
        </form>
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