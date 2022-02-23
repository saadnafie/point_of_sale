
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
          {{--<tr>
            <td>رقم</td>
            <td>{{$bill->bill_number}}</td>
            <td>وقت</td>
            <td>{{$bill->created_at}}</td>
          </tr>--}}
          <tr>
            <td>موظف: {{$bill->user->name}}</td>
            <td>عميل: نقدي</td>
          </tr>
          </table>
          <br>
          <hr>
          <table>
            <tr>
            <th style="width:200px;">الصنف</th>
            <th>السعر</th>
            <th>الكمية</th>
            <th>اجمالي</th>
            </tr>
            @foreach($bill->bill_products as $item)
            <tr>
              <td>{{$item->product->name_ar}}</td>
              <td>{{$item->price}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{$item->total_cost}}</td>
            </tr>
            @endforeach
          </table>
          <hr>
          <span style="float:left;">{{$bill->total_before_discount}} ج</span><span style="float:right;">اجمالي قبل الخصم</span>
          <br>
          <span style="float:left;">{{$bill->total_discount}} ج</span><span style="float:right;">اجمالي الخصم</span>
          <br>
          <span style="float:left;">{{$bill->total_cost}} ج</span><span style="float:right;">الاجمالي النهائي</span>
          <br>
           <span style="float:left;">{{$bill->paid_amount}} ج</span><span style="float:right;">المدفوع</span>
          <br>
           <span style="float:left;">{{$bill->remaining_amount}} ج</span><span style="float:right;">المتبقي</span>
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
          <center>
        <br>
        <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($bill->bill_number, 'QRCODE')}}" alt="barcode" />
        
        <br>
        <h3>{{$bill->bill_number}}</h3>
        <a href="https://galaxystore.payquickbill.com/admin/salebill/1">https://galaxystore.payquickbill.com/admin/salebill/1</a>
        <br><br>
        </center>
          <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($bill->bill_number, 'C128','1','30')}}" alt="barcode" />
          <br>
          #{{$bill->bill_number}}
      </div>
        </center>
        {{--</div>--}}
</body>


  

    
