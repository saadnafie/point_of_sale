@extends('admin.layouts.header')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0">اضافة مخزن جديد</h6>
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
<form action="{{route('store.store')}}" method="post">
  @csrf
    
    <div class="row">


 <div class="col-sm-4">
    <div class="form-group">
      <label for="email">اسم المستودع بالإنجليزي</label>
      <input type="text" class="form-control"  name="name_en" required>
    </div>
 </div>

 <div class="col-sm-4">
    <div class="form-group">
      <label for="email">اسم المستودع بالعربي</label>
      <input type="text" class="form-control"  name="name_ar" required>
    </div>
</div>



 <div class="col-sm-4">
  <div class="form-group">
    <label for="email">العنوان</label>
      <input type="text" class="form-control"  name="address" required>
    </div>
</div>



 <div class="col-sm-12">
<button type="submit" class="btn btn-primary">حفظ</button>

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
  
@endsection