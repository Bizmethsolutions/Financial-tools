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
</style>
<title>Finsuite | Company Success</title>
<div class="row h-100">
   <div class="col-sm-12 my-auto">
        <div class="card card-block col-md-8 offset-md-2 text-center padding-40">
            <h4 style="border-bottom: 1px solid #707070;color: #707070;" class="text-left margin-bottom-20">Chart of accounts</h4>
            
            <div class="row margin-top-40">
                <div class="col-md-12 text-right" style="margin-bottom:20px;">
                    <a class="text-right color-blue" ><i class="fa fa-pencil"></i> Edit</a>
                </div>
                <div class="col-md-12 ">
                    <table class="table">
                        <tr style="background-color:#148CE8;color:#fff;">
                            <th>Asset Accounts</th>
                            <th>Mapped</th>
                            <th>Accumulated Depreciation</th>
                            <th>Depreciation Account</th>
                            <th>Gain/Loss Account</th>

                        </tr>
                        <tbody style="background-color:#F8F9FB;">
                            <tr >
                                <td style="padding-left: 10px;padding-right: 10px;">
                                    <input type="text" name="" class="form-control" value="Lorem Ispum">
                                </td>
                                <td style="padding-left: 0px;padding-right: 10px;">
                                    <input type="text" name="" class="form-control" value="Yes">
                                </td>
                                <td style="padding-left: 0px;padding-right: 10px;">
                                    <input type="text" name="" class="form-control" value="Lorem Ispum">
                                </td>
                                <td style="padding-left: 0px;padding-right: 10px;">
                                    <input type="text" name="" class="form-control" value="Lorem Ispum">
                                </td>
                                <td style="padding-left: 0px;padding-right: 10px;">
                                    <input type="text" name="" class="form-control" value="Lorem Ispum">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;padding-right: 10px;">
                                    <input type="text" name="" class="form-control" value="Lorem Ispum">
                                </td>
                                <td style="padding-left: 0px;padding-right: 10px;">
                                    <input type="text" name="" class="form-control" value="No">
                                </td>
                                <td style="padding-left: 0px;padding-right: 10px;">
                                    <input type="text" name="" class="form-control" value="Lorem Ispum">
                                </td>
                                <td style="padding-left: 0px;padding-right: 10px;">
                                    <input type="text" name="" class="form-control" value="Lorem Ispum">
                                </td>
                                <td style="padding-left: 0px;padding-right: 10px;">
                                    <input type="text" name="" class="form-control" value="Lorem Ispum">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
            
        </div>
   </div>
</div>
@endsection