<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <title>Point of Sale</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('img/icon.jpg')}}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
  
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">


<style>

@media only screen and (max-width: 900px) {
  body {
    display: none !important;
  }
}

body{
	background-color: #f8f9fa;
  direction:rtl;
}
label{
  float: right;
  font-size: 13px;
}
td,th{
  text-align:right;
}

.fixTableHead {
      overflow-y: auto;
      height: 250px;
    }
    .fixTableHead thead th {
      position: sticky;
      top: 0;
    }


    th{
      padding: 8px 15px;
      border: 2px solid black;
    }
    th {
      background: gold;
    }


.filterDiv {
  
  /*background-color: #2196F3;
  color: #ffffff;*/
  background-color: #e8e5e5;
    color: #880808;
    border-radius: 20px;
  text-align: center;
  margin: 2px;
  display: none;
  padding:20px;
  cursor: pointer;
}

.show {
  display: block;
}

.container {
  margin-top: 20px;
  overflow: hidden;
}


/* Style the buttons */
.btn1 {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

.btn1:hover {
  background-color: #ddd;
}

.btn1.active {
  background-color: #666;
  color: white;
}

ul, li {
  list-style: none;
  
}

th, td{
  font-size:10px;
}

.footer {
   position: fixed;
   right: 0;
   bottom: 0;
   width: 50%;
   background-color: black;
   color: white;
   text-align: center;
   padding:20px;
}

@media only screen and (max-width: 600px) {
  .footer { 
    width: 100%;
  }
}
</style>
</head>
<body> 

<div class="container-fluid" style="height:100vh;background-color: #fff;">

<div class="row">

<div class="col-md-6 col-sm-12 col-xs-12">

<div class="card" style=" height: 50px; width:100%">
    <div class="card-body" style="background-color:black;">
	
  <input type="text" class="form-control" id="barcodeScannerVal" onchange="barcode_scanner();" placeholder="باركود الصنف..." autofocus>

 </div> 
  </div> 
  

  


@if(Session::has('id'))
<!-- The Modal -->
<div class="modal" id="myModalprint">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body">
        <iframe src="{{route('printsalebill',['id' => Session::get('id') ])}}"></iframe>
      </div>
    </div>
  </div>
</div>
@endif



   <div style="padding:10px;background-color: #fff;">
   <form action="{{route('salebill.store')}}"  method="post">
    @csrf
    <input type="hidden" class="form-control" name="bill_source" value="0">
    <input type="hidden" class="form-control" name="bill_date" value="{{date('Y-m-d')}}">
    <input type="hidden" class="form-control" name="due_date" value="{{date('Y-m-d')}}">
<br>
  <div class="table-responsive">
     <div class="fixTableHead">
   <table  class="table table-striped table-bordered" >
    <thead >
    <tr>
    <th>الصنف</th>
    <th>سعر</th>
    <th>كمية</th>
    <th>خصم</th>
    <th>اجمالي</th>
      <th>حذف</th>
  </tr>
   </thead>
	 <tbody id="add_to_me">
	 
	 </tbody>
  
   </table>
  </div>
   </div>
  <br> 


<div class="footer">
   <table class="table" style="background:gold;">
  <tr>
    <td><b >اجمالي قبل خصم:</b></td>
    <td><input type="text" id="total_before_tax" name="total_before_tax" style="width:40px;border:0px;" value="0" readonly>  ج</td>

      <td><b >اجمالي الخصم:</b></td>
      <td><input type="text" id="total_discount" name="total_discount" style="width:40px;border:0px;" value="0" readonly>  ج</td>

    <td><b >اجمالي الفاتورة:</b></td>
      <td><input type="text" id="final_total" name="final_total" style="width:40px;border:0px;" value="0" readonly>  ج</td>

    </tr>
   </table>
   

   <div class="row">
   <div class="col-md-4 col-sm-4 col-xs-4">
   <div class="form-group">
   <label>المدفوع</label>
    <input type="number" step="0.001"  name="paid_amount" value="0" id="paid_amount" onChange="set_remaining_amount()" onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" required>
  </div>
</div>

   <div class="col-md-4 col-sm-4 col-xs-4">
   <div class="form-group">
   <label>المتبقي</label>
    <input type="number" step="0.001"  value="0" name="remaining_amount" id="remaining_amount" readonly>
  </div>
</div>

   
  <div class="col-md-4 col-sm-4 col-xs-4">
  <div class="form-group">
    <label for="pwd">طريقة الدفع</label>
    <select style="width:100%;height:30px;" name="pay_way">
      <option value="0">كاش</option>
      <option value="1">فيزا</option>
  </select>
  </div>
</div>
</div>

<div class="row">
  <div class="col-md-6">
    <button type="submit" class="btn btn-primary btn-block" id="save_validate" disabled="disabled"><i class="fa fa-money" aria-hidden="true"></i> حفظ الفاتورة</button>
  </div>

  <div class="col-md-6">
    <button type="button" class="btn btn-danger btn-block" onclick='window.location.reload(true);'><i class="fa fa-trash" aria-hidden="true"></i> إلغاء الفاتورة</button>
  </div>

</div>
</div>
  </form>  
   </div>
 

</div>


<div class="col-md-6 col-sm-12 col-xs-12">
<div class="card" style=" height: 50px; width:100%">
    <div class="card-body" style="background-color:black;">
  
 <input type="text" class="form-control" style="width:200px;" id="search_phone" onChange="search_phone()" placeholder="بحث برقم هاتف"></td>

 
        <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="left:5px;top:1px;color:white;font-size:18px;position:fixed;">
              <i class="fa fa-sign-out" aria-hidden="true"></i>
             
                تسجيل الخروج
              
            </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                     </form>

<br>
<!--------------------------------------------------------------------------------------->
<!-----------------------------Search and Close Bill------------------------------------->

<form method="post"  style="display:none;" id="search_form">
     @csrf
    @method('patch')
 <div style="background: rgb(208 215 222 / 25%);padding: 20px;" >   
        <div style="text-align:right;">
            
        <input type="hidden" id="bill_id" name="bill_id">
            
<b>اسم العميل:</b> 
<input type="text" class="form-control" id="cus_name" disabled><br>
<b>رقم الهاتف</b>
<input type="text" class="form-control" id="cus_phone" disabled><br>

<b>موظف الصيانة </b>
<input type="text" class="form-control" id="emp_name" disabled><br>
<b>بيانات الجهاز والاعطال </b>
<input type="text" class="form-control" id="note" disabled><br>

</div>
<br>
    <div class="row">
<div class="col-md-3">
    <label for="pwd">تكلفة قطع الغيار</label>
    <input type="text" class="form-control" id="hardware_cost" disabled>
    </div>
    <div class="col-md-3">
         <label for="pwd">تكلفة الصيانة</label>
    <input type="text" class="form-control" id="maintenance_cost" disabled>
    </div>
    <div class="col-md-3">
         <label for="pwd">المدفوع</label>
    <input type="text" class="form-control" id="paied_amount" disabled>
    </div>
    <div class="col-md-3">
        <label for="pwd">المتبقي</label>
    <input type="text" class="form-control" id="remain_amount" disabled>
    </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary btn-block"  ><i class="fa fa-money" aria-hidden="true"></i> إغلاق الفاتورة</button>
    
    
  </div>  
  <br>
</form>

<!--------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------->



   <form action="{{route('maintenance.store')}}"  method="post">
    @csrf

    <div style="background: rgb(208 215 222 / 25%);padding: 20px;">
<div class="row">
<div class="col-md-4">
    <div class="form-group">
    <label for="pwd">اسم العميل</label>
    <input type="text" class="form-control" name="cus_name" required>
</div>
</div>

<div class="col-md-4">
   <div class="form-group">
    <label for="pwd">رقم الهاتف</label>
    <input type="text" class="form-control" name="cus_phone" required>
</div>
</div>
<div class="col-md-4">
  <div class="form-group">
     <label for="pwd">موظف الصيانة</label>
    <select class="form-control"  name="employee_id">
      <option selected="true" disabled>إختر موظف</option>
      @foreach($employees as $value)
      <option value="{{$value->id}}">{{$value->name}}</option>
      @endforeach
    </select>
  </div>
</div>


<div class="col-md-12">
 <div class="form-group">
    <label for="pwd">بيانات الجهاز والاعطال</label>
    <textarea class="form-control" name="maintenance_desc" rows="2"  required></textarea>
</div>
</div>


<div class="col-md-3">
    <div class="form-group">
    <label for="pwd">تكلفة قطع الغيار</label>
    <input type="number" step="0.001" class="form-control" name="hardware_cost" id="maintenance_hardware_cost" value="0" 
    onChange="remaining_maintenance()" onkeyup="this.onchange();" 
    onpaste="this.onchange();" oninput="this.onchange();" required>
</div>
</div>

<div class="col-md-3">
   <div class="form-group">
    <label for="pwd">تكلفة الصيانة</label>
    <input type="number" step="0.001" class="form-control" name="maintenance_cost" id="maintenance_maintenance_cost" value="0" 
    onChange="remaining_maintenance()" onkeyup="this.onchange();" 
    onpaste="this.onchange();" oninput="this.onchange();"required>
</div>
</div>

<div class="col-md-3">
    <div class="form-group">
    <label for="pwd">المدفوع</label>
    <input type="number" step="0.001" class="form-control" name="paied_amount" id="maintenance_paied_amount" value="0" 
    onChange="remaining_maintenance()" onkeyup="this.onchange();" 
    onpaste="this.onchange();" oninput="this.onchange();" required>
</div>
</div>

<div class="col-md-3">
   <div class="form-group">
    <label for="pwd">المتبقي</label>
    <input type="number" step="0.001" class="form-control" name="remain_amount" id="maintenance_remain_amount" value="0" readonly required>
</div>
</div>

</div>
<div class="row">
  <div class="col-md-6">
    <button type="submit" class="btn btn-primary btn-block" ><i class="fa fa-money" aria-hidden="true"></i> حفظ الفاتورة</button>
  </div>

  <div class="col-md-6">
    <button type="button" class="btn btn-danger btn-block" onclick='window.location.reload(true);'><i class="fa fa-trash" aria-hidden="true"></i> إلغاء الفاتورة</button>
  </div>

</div>

</div>
  </form>

 </div> 
  </div> 





</div>
  
</div>





<script> 	
  $(document).ready(function() {
    selectRefresh();
  });
   
  function selectRefresh() {
    $('.select2').select2({
      tags: true,
      placeholder: "Select an Option",
      allowClear: true,
      width: '100%'
    });
  }
</script> 

<script>
  function myFunction2() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput2");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
  }

  filterSelection("all")
  function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
      w3RemoveClass(x[i], "show");
      if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
  }

  function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
    }
  }

  function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);     
      }
    }
    element.className = arr1.join(" ");
  }

  // Add active class to the current button (highlight it)
  /*var btnContainer = document.getElementById("myBtnContainer");
  var btns = btnContainer.getElementsByClassName("btn");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function(){
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    });
  }*/
</script>

<script type="text/javascript">
  var i = 0;
  var bill_products_list= new Array();
  var branch = 1;

  function barcode_scanner() {
    var product_barcode = document.getElementById("barcodeScannerVal").value;

    if (product_barcode != '') {
        // GET every service Explanation section Details by serviceId
        $.ajax({
            url: "{{url('admin/ajax_search_barcode')}}/"+ product_barcode,
            dataType: 'json',
            type: 'GET',
            cache: false,
            async: true,
            success: function (data) {
              if(!data.error){
                check_data(data.pro);
              }
              else{
                if(data.status == 1){
                  alert(data.message);
                  document.getElementById("barcodeScannerVal").value = '';
                }
              }
            },
            error: function (jqXhr, textStatus, errorThrown) {
                //console.log(errorThrown);
                //alert(errorThrown);
            }
        })

      }

  }

  function check_data(data){
    if(bill_products_list.length == 0){
      set_product(data);
    }else{
      var pro_id = data.id;
      var found = false; var x=null;
      for(var j=0;j<bill_products_list.length;j++){
        if(bill_products_list[j] != null && bill_products_list[j].id == pro_id){
          found = true;
          x = j;
          break;
        }
      }
      if(found){
        document.getElementById("quantity"+x).value = parseInt(document.getElementById("quantity"+x).value) +1;
        document.getElementById("barcodeScannerVal").value = '';
        pro_total_pruce(x);
      }
      else
        set_product(data);
    }
  }

  function set_product(data){
    bill_products_list.push(data);

    $('#add_to_me').append
    ('<tr>'+
    '<td >'+ data.name_ar +'<input type="hidden" value="'+data.id+'" name="multi_product[]"></td>'+

    '<td><input type="text" value="'+data.sale_price+'" name="multi_price[]" id="price'+i+'" style="width:40px;background:transparent;border:0px;" readonly></td>'+

    '<td> <input type="number" value="1" onchange="pro_total_pruce('+i+')" oninput="this.onchange();" name="multi_amount[]" id="quantity'+i+'" style="width:40px;"></td>'+

    '<td><input type="text"  name="multi_discount[]" id="discount'+i+'" value="'+data.default_discount+'" style="width:40px;background:transparent;border:0px;" readonly></td>'+

    /*'<td><input type="text"  name="subTot[]" id="subTot'+i+'" value="'+data.sale_price+'" style="width:40px;background:transparent;border:0px;" readonly></td>'+*/
    
    '<td><input type="text" id="pro_total'+i+'" name="multi_total[]" style="width:40px;background:transparent;border:0px;" value="'+data.sale_price+'" readonly></td>'+
    
    '<td><button style="float:right;width: 25px; height: 25px; border-radius: 25px;font-size:12px;padding:4px;" type="button" class="btn btn-danger" onclick="deleteCurrentRow(this,'+i+')"><i class="fa fa-trash"></i></button></td>'+'</tr>'); 

    //pro_subtotal_price(i);
    pro_total_pruce(i);
    ++i;
    document.getElementById("barcodeScannerVal").value = '';  
    
  }

  function deleteCurrentRow(event,k){
    $(event).parents('tr').remove();
    bill_products_list[k]=null;

    set_total_discount();
    set_total_before_tax();
    set_final_total();
    set_remaining_amount();
    validate_bill_save();
    
  }
  
</script>

<script type="text/javascript">


  //-----------------------------------calculate subtotal with amount
  function pro_subtotal_price(k){
    var subtotal = (document.getElementById('quantity'+k).value * document.getElementById("price"+k).value) - document.getElementById('discount'+k).value ;
    document.getElementById('pro_total'+k).value = subtotal;
  }

  function pro_total_pruce(k){
    if(parseInt(document.getElementById("quantity"+k).value) > bill_products_list[k].product_store[branch-1].available_quantity)
      document.getElementById("quantity"+k).value = bill_products_list[k].product_store[branch-1].available_quantity;
    var x = parseFloat(document.getElementById("pro_total"+k).value);
    document.getElementById("pro_total"+k).value = x.toFixed(2);

    pro_subtotal_price(k);

    set_total_discount();
    set_total_before_tax();
    set_final_total();
  }


</script>

<!----------------- Totals ------------------------>
<script type="text/javascript">
  
  function set_total_before_tax(){
    var x = document.getElementsByName("multi_price[]");
    var y = document.getElementsByName("multi_amount[]");
    var z = document.getElementsByName("multi_discount[]");
    var tot = 0;
    for(var i = 0 ; i < y.length ; i++){
      tot += (parseFloat(y[i].value) * parseFloat(x[i].value)) - parseFloat(z[i].value);
    }
    document.getElementById("total_before_tax").value = tot.toFixed(2);
  }

  function set_total_discount(){
    var y = document.getElementsByName("multi_discount[]");
    var ty = 0;
    for(var i = 0 ; i < y.length ; i++){
      ty += parseInt(y[i].value);
    }
    document.getElementById("total_discount").value = ty;
  }

  function set_final_total(){
    var y = document.getElementsByName("multi_total[]");
    var tot = 0;
    for(var i = 0 ; i < y.length ; i++){
      tot += parseFloat(y[i].value);
    }
    document.getElementById("final_total").value = tot.toFixed(2);
    //document.getElementById("paid_amount").value = tot.toFixed(2);
    
    set_remaining_amount();
  }

  function set_remaining_amount(){
    var x = document.getElementById("paid_amount").value - document.getElementById("final_total").value;
    document.getElementById("remaining_amount").value = x.toFixed(2);

    validate_bill_save();
  }
</script>


<script type="text/javascript">

  function validate_bill_save(){
    if(bill_products_list.length >= 1 ){
      var x = bill_products_list.every(function(z){ return z == null});
      //console.log(x);
      if(!x){
        var BillTotal = parseFloat(document.getElementById("final_total").value);
        var paidAmount = parseFloat(document.getElementById("paid_amount").value);
        if(paidAmount >= BillTotal){
          document.getElementById("save_validate").disabled = false;
        }else{
          document.getElementById("save_validate").disabled = true;
        }
      }else{
        document.getElementById("save_validate").disabled = true
      }
    }else{
      document.getElementById("save_validate").disabled = true;
    }
  }

</script>

<!----------------------- maintenance -------------------------->
<script type="text/javascript">
  function remaining_maintenance(){
    //console.log('xxx');
    var x = parseInt(document.getElementById("maintenance_hardware_cost").value) + 
    parseInt(document.getElementById("maintenance_maintenance_cost").value) ;
    var y = x - parseInt(document.getElementById("maintenance_paied_amount").value);
    document.getElementById("maintenance_remain_amount").value = y;
  }
</script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

<script type="text/javascript"> 
$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

<?php if(Session::has('success')){ ?>
   // $('.toastrDefaultSuccess').click(function() {
      toastr.success('{{ Session::get('success') }}');
<?php } if(Session::has('error')){ ?>
    //});

    toastr.error('{{ Session::get('success') }}');

    <?php } ?>

    });

</script>

<script>
    function search_phone() {
    var search_phone = document.getElementById("search_phone").value;

    if (search_phone != '') {
        // GET every service Explanation section Details by serviceId
        $.ajax({
            url: "{{url('admin/ajax_search_bill')}}/"+ search_phone,
            dataType: 'json',
            type: 'GET',
            cache: false,
            async: true,
            success: function (data) {
              if(!data.error){
                set_form(data.mbill);
                document.getElementById("search_phone").value = '';

              }
              else{
                if(data.status == 0){
                  alert(data.message);
                  document.getElementById("search_phone").value = '';
                }
              }
            },
            error: function (jqXhr, textStatus, errorThrown) {
                //console.log(errorThrown);
                //alert(errorThrown);
            }
        })

      }

  }
  
  function set_form(bill){
      var url = '{{url("admin/maintenance")}}'+ '/'+ bill.id;
      document.getElementById("search_form").style.display = "block";
      document.getElementById("search_form").action = url ;
      
      console.log(url);
      
      document.getElementById("bill_id").value = bill.id;
      
      document.getElementById("cus_name").value = bill.customer_name;
      document.getElementById("cus_phone").value = bill.customer_phone;
      document.getElementById("emp_name").value = bill.employee.name;
      document.getElementById("note").value = bill.notes;
      
      document.getElementById("hardware_cost").value = bill.hardware_price;
      document.getElementById("maintenance_cost").value = bill.maintenance;
      document.getElementById("paied_amount").value = bill.paid_amount;
      document.getElementById("remain_amount").value = bill.remaining_amount;
  }
</script>
</body>
</html>