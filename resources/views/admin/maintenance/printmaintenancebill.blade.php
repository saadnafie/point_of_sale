
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
<style>
th,td{
  font-size:15px;
  text-align:right;
  font-weight:bold;
}

.detail td{
  border:1px solid gray;
}
body {
    margin: 0;
    padding: 0;
    height:auto;
    font-weight:bold;
}

/*
@page {
    size: A4;
    margin: 0;
}*/

/*@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
}*/

</style>
</head>

    <body onload="window.print()">
      {{--<div class="page">--}}
      <center>
        <div id="elem" style="text-align:center;width:250px;height:auto;font-size:12px;">
        <span style="font-size:68px;"><b>GS</b></span><br>
        <span style="font-size:22px;">Galaxy Store</span>
        <br><br>{{$bill->created_at}}<br><br>
          <table class="detail" width="100%">
         <tr>
            <td>رقم</td>
            <td>{{$bill->bill_number}}</td>
            <td>وقت</td>
            <td>{{$bill->created_at}}</td>
          </tr>
 
      
          </table>
          <br>
          <span style="float:left;"> {{$bill->user_finished_by->name}} </span><span style="float:right;">كاشير</span>
          <br>
          <span style="float:left;"> {{$bill->customer_name}} </span><span style="float:right;">عميل</span>
          <br>
          <span style="float:left;">{{$bill->employee->name}} </span><span style="float:right;">موظف الصيانة</span>
          <br>
          
          <hr>
      {{--    <span style="float:left;font-weight:bold;">{{$bill->hardware_price}} ج</span><span style="float:right;font-weight:bold;">اجمالي قبل الخصم</span>
          <br>
          <span style="float:left;font-weight:bold;">{{$bill->maintenance}} ج</span><span style="float:right;font-weight:bold;">اجمالي الخصم</span>
          <br>--}}
          <span style="float:left;font-weight:bold;">{{$bill->hardware_price + $bill->maintenance}} ج</span><span style="float:right;font-weight:bold;">الاجمالي النهائي</span>
          <br>
           <span style="float:left;font-weight:bold;">{{$bill->paid_amount}} ج</span><span style="float:right;font-weight:bold;">المدفوع</span>
          <br>
           <span style="float:left;font-weight:bold;">{{$bill->remaining_amount}} ج</span><span style="float:right;font-weight:bold;">المتبقي</span>
          <br>
          <br>
          <span><i class="fa fa-phone" aria-hidden="true"></i> 01063821201</span>
           &nbsp;&nbsp;-&nbsp;&nbsp;
          <span><i class="fa fa-whatsapp" aria-hidden="true"></i> 01118205064</span>
          <br>
          <span><i class="fa fa-instagram" aria-hidden="true"></i> GALAXY_STORE_GS</span>
          <br>
          <span>مول بدر الدين - الشيخ زايــــد</span>
          <br><br>
          <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($bill->bill_number, 'C128','1','30')}}" alt="barcode" />
          <br>
          #{{$bill->bill_number}}
      </div>
        </center>
        {{--</div>--}}
</body>


  

    
