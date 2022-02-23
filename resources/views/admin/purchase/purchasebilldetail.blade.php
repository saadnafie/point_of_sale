@extends('admin.layouts.header')

@section('content')



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h6 class="m-0">
             تفاصيل الفاتورة رقم : {{$bill->bill_number}}
            </h6>
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
                  
                  <div class="row">
               
  

    <div class="col-md-3">
        <div class="form-group">
          <label for="email">أنشيء بواسطة</label><br>
          <input type="text" class="form-control" value="{{$bill->user->name}}" disabled>
        </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="email">المورد</label><br>
          <input type="text" class="form-control" value="{{$bill->supplier->name}}" disabled>
        </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="email">إجمالي الاصناف</label>
          <input type="number" class="form-control" value="{{count($bill->bill_products)}}" readonly>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="email"> الإجمالي النهائي</label>
          <input type="number" step="0.001" class="form-control" value="{{$bill->total_cost}}" readonly>
        </div>
    </div>

</div>
  


<div class="row">
 <div class="col-sm-12">
     <br>
     بيانات المنتجات
     <br>
<div class="table-responsive">
        <table class="table table-bordered table-striped main" id="dynamicTable">  
          <tr>
            <th style="width:300px;">اســـم المنتـــج</th>
            <th>السعر</th>
            <th>الكمية</th>
            <th>الاجمالي</th>
          </tr>
          @foreach($bill->bill_products as $item)
            <tr>  
              <td><input type="text"  class="form-control" value="{{$item->product->name_ar}}"readonly/></td> 
              <td><input type="number" step="0.001"  class="form-control" value="{{$item->price}}" readonly/></td> 
              <td><input type="number" class="form-control" value="{{$item->quantity}}" readonly/></td>  
              <td><input type="number" class="form-control" value="{{$item->total_cost}}" readonly/></td> 
              
            </tr> 
          @endforeach 
        </table> 
    </div>

</div>
  
</div>
</div>
</div>

</div>

</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  function openmodle(){
    document.getElementById("iframe").src="{{route('printpurchasebill', $bill->id)}}";
  }
</script>
    @endsection

    