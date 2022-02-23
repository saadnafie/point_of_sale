


    <body onload="window.print()">
     
      @foreach($products as $product)
      <div id="elem" style="text-align:center;">
<br>
          <span style="font-size:20px;"><b>Galaxy Store</b></span>
          <br>
          <img width="200px"  src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->barcode, 'C39','1','40')}}" alt="barcode" /><br>
         <span style="font-size:12px;"><b> {{$product->barcode}}</b></span>
         <span style="font-size:16px;"><b>({{$product->sale_price}} ج)</b></span>
         <br>
          <span style="font-size:16px;"><b>{{Str::limit($product->name_ar,50)}}</b></span> 
          
       </div> 
  
@endforeach

</body>


  

    
