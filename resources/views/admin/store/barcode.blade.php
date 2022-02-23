 <body onload="window.print()" >
    <div id="elem" style="text-align:center;">

          <span style="font-size:18px;"><b>Galaxy Store</b></span>
          <br>
          <img width="150px"  src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->barcode, 'C128' , 1)}}" alt="barcode" /><br>
         <span style="font-size:12px;"><b> {{$product->barcode}}</b></span>
         <span style="font-size:16px;"><b>({{$product->sale_price}} ج)</b></span>
         <br>
          <span style="font-size:12px;"><b>{{Str::limit($product->name_ar,25)}}</b></span> 
          
       </div> 
</body>


  

    
