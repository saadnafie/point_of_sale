
@extends('admin.layouts.header')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0">إدارة فواتير المشتريات</h6>
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
  <iframe id="iframe" src="" style="display:none;"></iframe>
    <div class="content">

      <div class="container-fluid">
        <div class="row">
    
          <div class="col-lg-12">
              <div class="card">

              <div class="card-body">
                <div class="col-sm-12">
                   <a href="{{route('purchasebill.create')}}"  class="btn btn-success">إنشاء فاتورة</a>
                 </div>
        <hr>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th> رقم الفاتورة</th>
                <th>المورد</th>
                <th>عدد الأصناف</th>
                <th>إجمالي السعر</th>
                <th>إعدادات</th>
              </tr>
              </thead>
              <tbody>
              @foreach($bills as $index=>$item)
              <tr>
               <td>{{$index+1}}</td>
               <td>{{$item->bill_number}}</td>
               <td>{{$item->supplier->name}}</td>
               <td>{{count($item->bill_products)}}</td>
               <td>{{$item->total_cost}}</td>
                <td>
                  <a href="{{route('purchasebill.show',$item->id)}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                 
                </td>
              
              </tr>
              @endforeach
            </tbody>
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

<script type="text/javascript">
  function openmodle(url){
    document.getElementById("iframe").src=url;
  }
</script>
@endsection
  