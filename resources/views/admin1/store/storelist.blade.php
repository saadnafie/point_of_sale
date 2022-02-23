
@extends('admin.layouts.header')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0">إدارة المخازن</h6>
          </div><!-- /.col -->
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Store List</li>
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
                <h3 class="card-title">Store Details</h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body">
			   <div class="col-sm-12">
			  <a href="{{url('/admin/store/addstore')}}" class="btn btn-info">اضافة مخزن</a>
			  </div>
			  <hr>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>كود المخزن</th>
                    <th>الاسم</th>
                    <th>العنوان</th>
                    <th>إعدادات</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>st000000001</td>
                    <td>Delta</td>
                    <td>198 Alharam, Giza</td>
                    <td>-</td>
                  </tr>
                  
                </table>
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
  
  <!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "csv", "excel", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
  