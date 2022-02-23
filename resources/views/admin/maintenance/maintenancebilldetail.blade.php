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
          <label for="email"> إسم العميل</label>
          <input type="text" class="form-control" value="{{$bill->customer_name}}" readonly>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="email"> سعر الهاردوير  </label>
          <input type="number" step="0.001" class="form-control" value="{{$bill->hardware_price}}" readonly>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="form-group">
          <label for="email"> سعر الصيانة </label>
          <input type="text" class="form-control" value="{{$bill->maintenance}}" readonly>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="email"> هاتف العميل </label>
          <input type="number" step="0.001" class="form-control" value="{{$bill->customer_phone}}" readonly>
        </div>
    </div>
    
     <div class="col-md-3">
        <div class="form-group">
          <label for="email">أنشيء بواسطة</label><br>
          <input type="text" class="form-control" value="{{$bill->user_created_by->name}}" disabled>
        </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
          <label for="email">أغلقها</label><br>
          <input type="text" class="form-control" value="{{$bill->user_finished_by->name}}" disabled>
        </select>
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

    