
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
  th{
    text-align:right;
  }
</style>
</head>

    <body onload="window.print()">
      <div class="container">
        <br><br>
        <center>
                <img class="main-logo" src="{{url('img/Logo.png')}}" alt="" width="200px"><br>
        <br><br>
</center>
   <div class="panel panel-default">
    <div class="panel-heading">تفاصيل الفاتورة رقم : {{$bill->bill_number}}
    <!--<span style="float:left;">تاريخ الفاتورة: {{$bill->bill_date}}</span>-->
    </div>
    <div class="panel-body">
<br>
<table class="table table-bordered">
  <tr>
    <td>أنشيء بواسطة</td>
    <td>المورد</td>
  </tr>
  <tr>
    <td>{{$bill->user->name}}</td>
    <td>{{$bill->supplier->name}}</td>
  </tr>
</table>


<table class="table table-bordered">
  <tr><td>إجمالي الاصناف</td><td>{{count($bill->bill_products)}}</td></tr>
  <tr><td>الإجمالي النهائي</td><td>{{$bill->total_cost}}</td></tr>
</table>





        <table class="table table-bordered table-striped main" id="dynamicTable">  
          <tr>
            <th style="width:300px;">اســـم المنتـــج</th>
            <th>السعر</th>
            <th>الكمية</th>
            <th>الاجمالي</th>
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

  
</div>
</div>

<center>
<br>
          <!--<span>رقم الضريبي: 75757687678</span>
          <br>-->
          <span>055889798789 - 05513289787</span>
          <br>
          <span>المملكة العربية السعودية</span>
          <br>
          <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($bill->bill_number, 'C39','2','30')}}" alt="barcode" />
        </center>
</div>
</body>


  

    
