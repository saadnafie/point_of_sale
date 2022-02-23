
@extends('admin.layouts.header')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0">تصنيف الماركات</h6>
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
			  <a data-toggle="modal" data-target="#myModal"  class="btn btn-info"> اضافة ماركة</a>
			  </div>
			  <hr>


                            <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">اضــافة ماركــة جديدة</h4>
        </div>
        <div class="modal-body">
        <form  method="POST" action="{{route('brand.store')}}"  class="parsley-style-1"  name="selectForm2" novalidate="">
          @csrf

          <div class="row">

                  {{-- title   --}}
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="">اسم الماركـة :</label>
                           <input type="text" name="brand_ar" class="form-control" placeholder="ادخل اسم الماركة ...">



             <span class="text-danger" id="supplier_id_error"></span>
                      </div>
                  </div>


          </div>

          <div class="mg-t-30">
              <button class="btn btn-dark pd-x-20"  type="submit"> حفظ </button>
          </div>
      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">الغــاء</button>
        </div>
      </div>
      </div>
	  </div>


<!-- ////// -->

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>اسم الماركة</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                 @foreach($data as $index=>$item)
                  <tr>
                   <td>{{$index+1}}</td>
                   <td>{{$item->brand_ar}}</td>
                   
        
                  
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
@endsection
  