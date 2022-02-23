@extends('admin.layouts.header')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0">تعديل بيانات المورد</h6>
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
<form action="{{route('supplier.update',$supplier->id)}}" method="post">
  @csrf
  {{ method_field('PUT') }}
    <div class="row">


 <div class="col-sm-4">
    <div class="form-group">
      <label for="email">اسم المورد </label>
      <input type="text" class="form-control"  name="name"  value="{{$supplier->name}}">
    </div>
 </div>

 <div class="col-sm-4">
    <div class="form-group">
      <label for="email">الهاتف</label>
      <input type="text" class="form-control"  name="phone" value="{{$supplier->phone}}">
    </div>
</div>


 <div class="col-sm-12">
<button type="submit" class="btn btn-primary">تعديل</button>

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