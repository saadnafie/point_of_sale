@extends('admin.layouts.header')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0">اضافة منتج جديد </h6>
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
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
		
          <div class="col-lg-12">
              <div class="card">
              <!--<div class="card-header">
                <h3 class="card-title">Product Details</h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body">
<form action="" method="post">
@csrf

 <div class="row">
  
 

 
 <div class="col-sm-4">
    <div class="form-group">
      <label for="email"> اسم الصنف (en)</label>
      <input type="text" class="form-control"  name="item_name_en" value="{{ old('item_name_en') }}" required>
    
	 @error('item_name_en')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
	</div>
  </div>
  
   <div class="col-sm-4">
    <div class="form-group">
      <label for="email"> اسم الصنف (ar)</label>
      <input type="text" class="form-control"  name="item_name_ar" value="{{ old('item_name_ar') }}" required>
    
		   @error('item_name_ar')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
	</div>
  </div>

  
<div class="col-sm-4">
<div class="form-group">
   <label for="email">الباركود</label>
      <input type="text" class="form-control" name="barcode" value="{{ old('barcode') }}">
     @error('barcode')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
    </div>
</div>



<div class="col-sm-4">
    <div class="form-group">
      <label for="email">سعر البيع</label>
      <input type="number" step="0.0001" class="form-control" name="defaultprice_sale" value="{{ old('defaultprice_sale') }}" required>
    
	   @error('defaultprice_sale')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
	</div>
</div>

<div class="col-sm-4">
    <div class="form-group">
      <label for="email">الخصم الإفتراضي</label>
      <input type="number" step="0.0001" class="form-control" name="default_discount" value="{{ old('defaultprice_sale') }}" required>
    
     @error('default_discount')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
</div>


<div class="col-sm-4">
    <div class="form-group">
       <label for="email">التصنيف</label>
       <select class="form-control selectpicker"  data-live-search="true" name="main_category" id="main_category" onChange="main_category_val()">
        <option value="-1" disabled selected>اختر الفئة </option>
        
        <option value="1">ألبان</option>
  
       </select>
       
    </div>
  </div>  



</div>



<!---------------------------------------------------->

<div class="row">
<div class="col-sm-4">
<div class="form-group">
   <label for="email">المخزون الافتتاحى</label>
      <input type="number" class="form-control" name="base_amount" value="{{ old('base_amount') }}" >
	  
	   @error('base_amount')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
    </div>
  </div> 




<div class="col-sm-4">
    <div class="form-group">
      <label for="email">المخزن</label>
      <select class="form-control selectpicker" name="base_store" data-live-search="true">
        
        <option value="1" >دلتا</option>
       
       </select>
    </div>
</div>




<div class="col-sm-4">
<div class="form-group">
   <label for="email">حد تنيه انتهاء المخزون</label>
      <input type="number" class="form-control" name="stock_limit_alarm" value="{{ old('stock_limit_alarm') }}">
    
	@error('stock_limit_alarm')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
	</div>
</div>




 <div class="col-sm-4">
    <div class="form-group">
       <label for="email">سعر الشراء</label>
      <input type="number" step="0.0001" class="form-control" name="defaultprice_purchase" value="{{ old('defaultprice_purchase') }}">
    @error('defaultprice_purchase')
     <div class="alert alert-danger">{{ $message }}</div>
   @enderror
	</div>
</div>





 <div class="col-sm-4">
<div class="form-group">
  <label for="email">تاريخ الانتاج</label>
      <input type="date" class="form-control" name="base_production_date" value="{{ old('base_production_date') }}" >
   
	   @error('base_production_date')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror

   </div>
 </div>


 <div class="col-sm-4">
    <div class="form-group">
	  <label for="email">تاريخ الانتهاء</label>
      <input type="date" class="form-control" name="base_expire_date" value="{{ old('base_expire_date') }}">
    
	
	   @error('base_expire_date')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
	</div>
 </div>



<div class="col-sm-4">
<div class="form-group">
  <label for="email">ملاحظات</label>
      <input type="text" class="form-control" name="base_note" value="{{ old('base_note') }}">
    </div>
 </div>
</div>


 
<div class="col-sm-12">
<button type="submit" class="btn btn-primary">حفظ</button>

</div>

</form>
</div>


</div>





</div>
              <!-- /.card-body -->
            </div>

            
          </div>
          <!-- /.col-md-12 -->
 
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>

//$('.my-select').selectpicker();

    function service_fields_disable(){
document.getElementById("item_more").style.display = "block";
document.getElementById("if_multi_date").style.display = "block";
}

function service_fields_enable(){
document.getElementById("item_more").style.display = "none";
document.getElementById("multi_values").style.display = "none";
document.getElementById("active_multi_val").checked = false;
}

function enable_disable_multival(){
 // Get the checkbox
  var checkBox = document.getElementById("active_multi_val");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
   document.getElementById("multi_values").style.display = "block";
   document.getElementById("if_multi_date").style.display = "none";
  } else {
    document.getElementById("multi_values").style.display = "none";
	document.getElementById("if_multi_date").style.display = "block";
  }
}



</script>

<script type="text/javascript">
          
    $(".add").click(function(){
      
	$(".main").append('<tr> <td> <select name="multi_store[]"  class="form-control select2"> <option value="-1" disabled selected>اختر المخزن</option> <option value="1">دلتا</option> </select> </td> <td><input type="number" name="multi_amount[]"  class="form-control" /></td> <td><input type="number" step="0.0001" name="multi_price[]"  class="form-control" /></td> <td><input type="date" name="multi_production_date[]"  class="form-control" /></td> <td><input type="date" name="multi_expire_date[]"  class="form-control" /></td> <td><input type="text" name="multi_notes[]"  class="form-control" /></td> <td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-trash"></i></button></td> </tr>');
  /*$('.my-select').selectpicker();
		$('.my-select').selectpicker('refresh');
	});*/
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();

         
    });  
   
   /*
     $(function() {
  $('.selectpicker').selectpicker();*/
  selectRefresh();
});

</script>


<script type="text/javascript">
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
</script>


@endsection