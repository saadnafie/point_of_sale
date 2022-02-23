
@extends('admin.layouts.header')

@section('content')

<style>
    .col-md-4{
        text-align:right;
    }
</style>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0">إدارة المنتجات</h6>
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
			 
              <!--<div class="card-header">
                <h3 class="card-title">Product Details</h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body">
                      <div class="row">
			   <div class="col-md-4">
			  <a href="{{route('product.create')}}" class="btn btn-info">اضافة منتج</a>
			  	<a href="{{route('printbarcodelist')}}" target="_blank" type="button" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> طباعة الباركود</a>

			  </div>
			  
			
  	<div class="col-md-4">
      <form method="get" class="form-inline" action="{{url('admin/product')}}">
  	 <input class="form-control input-lg" name="search_val" type="text" required>
      <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
     <a href="{{url('admin/product')}}" class="btn btn-danger" style="margin-top:0px;"><i class="fa fa-times"></i></a>
   </form>
</div>


<div class="col-md-4">
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">رقم الصفحة : {{$data->currentPage()}}
  <span class="caret"></span></button>
  <ul class="dropdown-menu" style="overflow-y: scroll;height:200px;">
  	@for($i=1; $i<=$data->lastPage();$i++)
    <li><a  href="{{url('admin/product')}}/?page={{$i}}">{{$i}}</a></li>
    @endfor
  </ul>
</div>
</div>
</div>

			  
			  <hr>

            <table  class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th> الباركود</th>
                <th>اسم الصنف</th>
                <th>سعر البيع</th>
                <th>إعدادات</th>
              </tr>
              </thead>
              <tbody>
              @foreach($data as $index=>$item)
              <tr>
               <td>{{$index+1}}</td>
               <td>{{$item->barcode}}</td>
               <td>{{$item->name_ar}}</td>
               <td>{{$item->sale_price}}</td>
                <td>
                  <a href="product/{{$item->id}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                 <button type="button" class="btn btn-success"   
				 onclick='openmodle("{{route("printbarcode",["id" => $item->id] ) }}")'>
                <i class="fa fa-print" aria-hidden="true"></i></button>
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
  