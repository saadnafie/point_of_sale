
@extends('admin.layouts.header')

@section('content')
<style>
/*body {
    font-family: "Lato", sans-serif;
}*/




.main {
  
    font-size: 18px; 

}


hr{
margin-top: 10px;
	/*    margin-bottom: 10px;
*/}

td{
text-align:center;
}
.glyphicon-tag{
font-size:50px;
}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">لوحة التحكم</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
           {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>--}}
          </div><!-- /.col -->
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
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">احصائيات عامة</h3>

                </div>
              </div>
              <div class="card-body">
                  
              <table class="table table-bordered">
    <tbody>
      <tr>
        <td><i class="fa fa-address-book" style="font-size:48px;color:#03a5fc"></i><br /><br />المديرين : {{$count_users}}</td>
        <td><i class="far fa-address-card				" style="font-size:48px;color:#03a5fc"></i><br /><br />الموردين : {{$count_suppliers}}</td>

        <td><i class="fa fa-users			" style="font-size:48px;color:#03a5fc"></i><br /><br />الموظفين : {{$count_employees}}</td>      </tr>
	  <tr>
               <td><i class="fa fa-tags		" style="font-size:48px;color:#03a5fc"></i><br /><br />المنتجات : {{$count_products}}</td>
               <td><i class="fas fa-store			" style="font-size:48px;color:#03a5fc"></i><br /><br />المخازن : {{$count_stores}}</td>
               <td><i class="fas fa-border-all		" style="font-size:48px;color:#03a5fc"></i><br /><br />الأصناف : {{$count_categories}}</td>

<!--         <td><span class="glyphicon glyphicon-tag"></span><br /><br />الموردين Orders: 50</td>
 -->      </tr>
    </tbody>
  </table>
 <center> 
 <br><br>
  <?php
                  echo DNS2D::getBarcodeHTML('4445645656', 'QRCODE');
                  ?>
                  </center>
 <br><br>
              </div>
            </div>
            <!-- /.card -->

            
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
@endsection
  