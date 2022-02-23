@extends('admin.layouts.header')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0">اضافة موظف جديد</h6>
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
<form action="{{route('employee.store')}}" method="post">
  @csrf
    
    <div class="row">


 <div class="col-sm-4">
    <div class="form-group">
      <label for="email">اسم الموظف</label>
      <input type="text" class="form-control"  name="name" required>
    </div>
 </div>

 <div class="col-sm-4">
    <div class="form-group">
      <label for="email">رقم الهاتف</label>
      <input type="text" class="form-control"  name="phone" required>
    </div>
</div>


<div class="form-check form-check-inline">
  <input onclick="myFunction()" class="form-check-input" type="radio" name="type"  id="inlineRadio1" value="0" >
  <label class="form-check-label" for="inlineRadio1">كاشير</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="1">
  <label class="form-check-label" for="inlineRadio2">صيانة</label>
</div>

<!-- <p onclick="myFunction()"><i class="fa fa-plus-circle"></i> click to add subcategory</p>
 -->
<p id="demo"></p><p id="demo2"></p><p id="demo3"></p><p id="demo4"></p>

<script>
function myFunction() {
  var x = document.createElement("INPUT");
  x.setAttribute("type", "hidden");
  document.body.appendChild(x);


  document.getElementById("demo").innerHTML = "<input  name='email' class='form-control' placeholder='ايميل الفرع الوأول'>";
  document.getElementById("demo2").innerHTML = "<input  name='password' class='form-control' placeholder='كلمة السر الفرع الأول'>";
  document.getElementById("demo3").innerHTML = "<input  name='email2' class='form-control' placeholder='ايميل الفرع الثاني'>";
    document.getElementById("demo4").innerHTML = "<input  name='password2' class='form-control' placeholder='كلمة السر الفرع الثاني'>";


}
</script>


<!-- <div class="col-sm-4">
    <div class="form-group">
      <label for="email">password</label>
      <input type="text" class="form-control"  name="password" required>
    </div>
</div> -->

<!-- <div class="col-sm-4">
    <div class="form-group">
      <label for="email">نوع الموظف</label>
      <input type="text" class="form-control"  name="user_type_id" required>
    </div>
</div> -->

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