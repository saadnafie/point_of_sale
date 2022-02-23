@extends('admin.layouts.header')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0">عرض التقارير</h6>
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
<form action="{{route('reports.store')}}" method="post">
  @csrf
    
    <div class="row">

 <div class="col-sm-12">
<div class="form-check form-check-inline">
  <input  class="form-check-input" type="radio" name="type"  id="inlineRadio1" value="1" style=" width: 30px; height: 30px; " checked>
  <label class="form-check-label" for="inlineRadio1">&nbsp;&nbsp;المبيعات</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="2" style=" width: 30px; height: 30px; " >
  <label class="form-check-label" for="inlineRadio2">&nbsp;&nbsp;المشتريات</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="3" style=" width: 30px; height: 30px; " >
  <label class="form-check-label" for="inlineRadio2">&nbsp;&nbsp;الصيانة</label>
</div>
<br>
<br>
</div>

        <label>من :</label>
        <input type="date" name="date"> &nbsp;
        <label>الي :</label>
        <input type="date" name="date2">
     
</div>

</div>

<div class="row">







 <div class="col-sm-12">
<button type="submit" class="btn btn-primary" style="margin-right:30px;margin-bottom:20px;">عرض</button>

</div>

</div><!-------row----->

</form>
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
   function account_fields_disable(){
document.getElementById("cashier_account").style.display = "none";
}

function account_fields_enable(){
document.getElementById("cashier_account").style.display = "block";
}
</script>

@endsection