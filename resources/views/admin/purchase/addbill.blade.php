@extends('admin.layouts.header')

@section('content')


{{--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<style>
input[type=date]{
width:130px;
font-size:10px;
 }

#com_info{
display:none;
}

.select2-container .select2-selection--single {

height:40px;
  }
  </style>
 --}}
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0">اضافة فاتورة مشتريات</h6>
          </div><!-- /.col -->
         <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product List</li>
            </ol>
          </div>--><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   <div class="content">
      <div class="container-fluid">
        <div class="row">
    
          <div class="col-lg-12">
              <div class="card">
       
       
              <!-- /.card-header -->
              <div class="card-body">

          <form action="{{route('purchasebill.store')}}"  method="post">
          @csrf
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="email">اختر المورد</label><br>
                  <select class="form-control select2"  name="supp_id" id="supp" onChange="validate_bill_save()">
                    <option value="0" selected disabled>إختر المورد</option>
                    @foreach($suppliers as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <!--<div class="col-md-2">
                <div class="form-group">
                  <label for="pwd">تاريخ الفاتورة</label>
                  <input type="date" class="form-control" name="bill_date" value="{{date('Y-m-d')}}" required>
                </div>
              </div>-->

            </div>

            <div class="row">
              <div class="col-sm-12">
                <br>
                <input type="text" class="form-control" id="barcodeScannerVal" onchange="barcode_scanner();"  oninput="this.onchange();" placeholder="Product Barcode" autofocus>
                <br><br>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped main" id="dynamicTable">  
                    <tr>
                      <th style="width:150px;">اســـم المنتـــج</th>
                      <th>السعر</th>
                			<th>كمية الفرع 1</th>
                      <th>كمية الفرع 2</th>
                			<th>الاجمالي</th>
                      <th>ملاحظات</th>
                			<th>حذف</th>
                    </tr>
                  </table> 
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="email">إجمالي الاصناف</label>
                  <input type="number" class="form-control" name="pro_count" value="0" id="pro_count" required readonly>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="email"> الإجمالي النهائي</label>
                  <input type="number" step="0.001" class="form-control" name="final_total" value="0" id="final_total" required readonly>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="pwd">المبلغ المدفوع</label>
                  <input type="number" step="0.001" class="form-control" name="paid_amount" value="0" id="paid_amount" onChange="set_remaining_amount()" onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" required>
                </div>
              </div>
            
              <div class="col-md-3">
                <div class="form-group">
                  <label for="pwd">المبلغ المتبقي</label>
                  <input type="number" step="0.001" class="form-control"  value="0" name="remaining_amount" id="remaining_amount">
                </div>
              </div>

             <!-- <div class="col-md-2">
                <div class="form-group">
                  <label for="pwd">طريقة الدفع</label>
                  <select class="form-control" name="pay_way">
                    <option value="0">كاش</option>
                    <option value="1">شبكة</option>
                  </select>
                </div>
              </div>-->

            </div>

            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary" id="save_validate" disabled="disabled">حفظ</button>
                <a href="{{url()->previous()}}" type="button" class="btn btn-danger" style="margin-top: 0px;">إلغاء</a>
              </div>
            </div>

          </form>
        </div>
      </div>

    </div>

  </div>
</div>

</div>

</div>

<!---------------------- table --------------------------------------->

<script>

  var i = 0;
  var bill_products_list= new Array();

  function barcode_scanner() {
    var product_barcode = document.getElementById("barcodeScannerVal").value;

    if (product_barcode != '') {
        // GET every service Explanation section Details by serviceId
        $.ajax({
            url: "{{url('admin/ajax_search_barcode_purchase')}}/"+ product_barcode,
            dataType: 'json',
            type: 'GET',
            cache: false,
            async: true,
            success: function (data) {
              if(!data.error){
                //console.log("success");
                check_data(data.pro);
              }
              else{
                //console.log(data);
                /*alert(data.message);
                document.getElementById("barcodeScannerVal").value = '';*/
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
        document.getElementById("quantity_1"+x).value = parseInt(document.getElementById("quantity_1"+x).value) +1;
        document.getElementById("barcodeScannerVal").value = '';
        pro_total_pruce(x);
      }
      else
        set_product(data);
    }
  }

  function set_product(data){
    bill_products_list.push(data);
    

    $('.main').append
    ('<tr>'+
    '<td>'+ data.name_ar +'<input type="hidden" value="'+data.id+'" name="multi_product[]"> </td>'+

    
    '<td><input type="number" step="0.001" value="'+data.sale_price+'"name="multi_price[]"  class="form-control" id="price'+i+'" onChange="pro_total_pruce('+i+')" oninput="this.onchange()" onpaste="this.onchange();" required/></td>'+

    '<td><input type="number" value="1"name="multi_amount_1[]"  class="form-control" value="0" id="quantity_1'+i+'" onChange="pro_total_pruce('+i+')" onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" min="0" required/></td>'+

    '<td><input type="number" value="1"name="multi_amount_2[]"  class="form-control" value="0" id="quantity_2'+i+'" onChange="pro_total_pruce('+i+')" onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" min="0" required/></td>'+

    '</td> <td><input type="text" name="multi_total[]" value="0" class="form-control" id="pro_total'+i+'" readonly/>'+

    '<td><input type="text" name="multi_note[]"  class="form-control"/></td>'+

    '<td><button type="button" class="btn btn-danger" onclick="deleteCurrentRow(this,'+i+')"><i class="fa fa-trash"></i></button></td>'+
    '</tr>'); 
    pro_total_pruce(i);
    ++i;
    document.getElementById("barcodeScannerVal").value = '';
    set_pro_count();
  }

  function selectRefresh() {
    $('.select2').select2({
      tags: true,
      placeholder: "Select an Option",
      allowClear: true,
      width: '100%'
    });
  }

  $(document).ready(function() {
    selectRefresh();
  });

  function deleteCurrentRow(event,k){
    $(event).parents('tr').remove();
    bill_products_list[k]=null;

    set_pro_count();
    set_final_total();
    validate_bill_save();
  }

</script>

<!---------------------- product --------------------------------------->

<script>

  
  function pro_total_pruce(k){
    var x = (document.getElementById("price"+k).value * (parseInt(document.getElementById("quantity_1"+k).value) + parseInt(document.getElementById("quantity_2"+k).value)));
    document.getElementById("pro_total"+k).value = x.toFixed(2);

    set_final_total();

    //validate_bill_save();
  }
    
</script>

<!---------------------- finals --------------------------------------->

<script type="text/javascript">

  function set_pro_count(){
    var x = document.getElementsByName("multi_product[]").length;
    document.getElementById("pro_count").value = x;
  }

  function set_final_total(){
    var y = document.getElementsByName("multi_total[]");
    var tot = 0;
    for(var i = 0 ; i < y.length ; i++){
      tot += parseFloat(y[i].value);
    }
    document.getElementById("final_total").value = tot.toFixed(2);
    set_remaining_amount();
  }

  function set_remaining_amount(){
    var x = parseFloat(document.getElementById("paid_amount").value) - parseFloat(document.getElementById("final_total").value);
    document.getElementById("remaining_amount").value = x.toFixed(2);

    validate_bill_save();
  }

</script>

<!---------------------- validation --------------------------------------->
<script>
  function validate_bill_save(){
    if(document.getElementById("supp").value > 0){
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
          //console.log(bill_products_list.length);
      }
    }

  }
</script>
 @endsection

    