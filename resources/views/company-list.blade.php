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
  .main-wrapper .page-wrapper{
      width: 100% !important;
      margin-left:0px !important;
      
  }
  .main-wrapper .page-wrapper .page-content{
    padding: 0px !important;
  }
  .mybtn{
    width: 100px;
    background-color: #148CE8;
    color: #fff !important;
    padding: 10px;
    border-radius: 5px;
    font-size: 14px;
  }
  .mybtn: hover{
    width: 100px;
    background-color: #148CE8;
    color: #fff !important;
    padding: 10px;
    border-radius: 5px;
    font-size: 14px;
  }
</style>
<title>Finsuite | Company Success</title>

    <div class="row h-100">
       <div class="col-md-12 my-auto">
            <div class="card card-block col-md-6 offset-md-3 text-center padding-40">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h3 class="font-25">List of companies</h3>    
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="font-20 color-blue" style="color:#148CE8;" href="{{ url('/connect-to-qbo')}}"><span style="font-size: 16px;">
                            <i class="fa fa-plus"></span></i>&nbsp;Add New Company
                        </a>    
                    </div>
                </div>
                <div class="margin-top-20">
                    <table class="table">
                        <tr>
                            <th class="text-left" style="width:80%">Name</th>
                            <th class="text-left" style="width:20%">Action</th>
                            
                        </tr>
                        @foreach($company as $value)
                        <tr>
                            <td class="text-left">
                                @if(empty($value->first_month_depreciation_method))
                                    {{ $value->company_name }}
                                @else
                                    {{ $value->company_name }}
                                @endif
                            </td>
                            <td class="text-left">
                                @if(empty($value->first_month_depreciation_method))
                                    <a href="setcompanydata/{{ $value->company_id }}" style="color:#fff;" class="mybtn" style="">Setup Wizard</a>
                                @else
                                    
                                @endif
                                @if(!empty($value->first_month_depreciation_method))
                                <!-- <a href=""><i class="fa fa-star-o" style="color:#707070;"></i></a>&nbsp;&nbsp; -->
                                <a href="#"><i class="fa fa-pencil color-blue"></i></a>&nbsp;&nbsp;
                                <a href="#" data-toggle="modal" data-target="#email{{ $value->company_id }}"><i class="fa fa-envelope color-blue"></i></a>&nbsp;&nbsp;
                                <a href="setcompany/{{ $value->company_id }}" style="background-color: #148CE8;color:#fff;" class="btn btn-primary">View Company</a>
                                @endif
                            </td>
                            
                        </tr>
                        <!-- Modal -->
                        <div id="email{{ $value->company_id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h4 class="modal-title">Invitation</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" action="{{ url('sendinvitation') }}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="companyid" value="{{ $value->company_id }}">
                                    <input type="hidden" name="company_name" value="{{ $value->company_name }}">
                                    <label>Enter Email</label>
                                    <input type="text" name="email" class="form-control" style="margin-top:5px;" placeholder="enter email with comma seperated">
                                    <input type="submit" name="" value="Send" class="btn btn-primary btn-next" style="margin-top:10px;height: 40px;">
                                </form>
                              </div>
                              
                            </div>

                          </div>
                        </div>
                        @endforeach

                        @foreach($usercompany as $value)
                        <tr>
                            <td class="text-left">
                                @if(empty($value->company_name))
                                    <a href="setcompanydata/{{ $value->company_id }}" class="btn btn-primary">Setup Wizard</a>
                                @else
                                    {{ $value->company_name }}
                                @endif
                            </td>
                            <td class="text-left">
                                @if(!empty($value->company_name))
                                <a href="#"><i class="fa fa-pencil color-blue"></i></a>&nbsp;&nbsp;
                                <a href="setcompany/{{ $value->company_id }}" class="btn btn-primary">Go to company</a>
                                @endif
                            </td>
                            
                        </tr>
                        <!-- Modal -->
                        <div id="email{{ $value->company_id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                
                                <h4 class="modal-title">Invitation</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" action="{{ url('sendinvitation') }}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="companyid" value="{{ $value->company_id }}">
                                    <input type="hidden" name="company_name" value="{{ $value->company_name }}">
                                    <label>Enter Email</label>
                                    <input type="text" name="email" class="form-control" style="margin-top:5px;" placeholder="enter email with comma seperated">
                                    <input type="submit" name="" value="Send" class="btn btn-primary btn-next" style="margin-top:10px;height: 40px;">
                                </form>
                              </div>
                              
                            </div>

                          </div>
                        </div>
                        @endforeach
                    </table>
                </div>
                <div class="margin-top-20 text-right">
                    <span class="font-16 color-blue">Previous</span><span class="font-16 color-blue"> | </span><span class="font-weight-bold font-16 color-blue">Next</span>
                </div>
            </div>
       </div>
    </div>

@endsection