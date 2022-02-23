<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Models\Product;

use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductStore;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->search_val)){
        $data = Product::where('barcode', $request->search_val)->orWhere('name_ar', 'like', '%' . $request->search_val . '%')->paginate(50);
        }else{
        $data = Product::paginate(50);
        }
        return view('/admin/store/productlist',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();
        $brand = Brand::all();
        return view('/admin/store/addproduct',compact('cat','brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required'
        ]);

        //return $request;
        $product = new Product;
        $product->barcode = 100000000;
        $product->name_ar = $request->name_ar;
        $product->sale_price = $request->sale_price;
        $product->default_discount = $request->default_discount;
        $product->stock_limit = $request->stock_limit;
       // $product->category_id = $request->category_id;
      //  $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->notes = $request->notes;
        $product->save();

        $product->barcode = 100000000 + $product->id;
        $product->save();

        $product_store= new ProductStore;
        $product_store->store_id= 1;
        $product_store->product_id= $product->id;
        $product_store->available_quantity= $request->available_quantity_1;
        $product_store->save();

        $product_store= new ProductStore;
        $product_store->store_id= 2;
        $product_store->product_id= $product->id;
        $product_store->available_quantity= $request->available_quantity_2;
        $product_store->save();

        Session::flash('success', 'تمت العملية بنجاح!');
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::with('category')->with('product_store')->find($id);
         // $product_brand = Product::with('brand')->find($id);
       // return $data;
        return view('/admin/store/products_details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //return $request;
        $product = Product::find($id);
		$product->name_ar = $request->name_ar;
		$product->sale_price = $request->sale_price;
		$product->default_discount = $request->default_discount;
		$product->stock_limit = $request->stock_limit;
		$product->notes =  $request->notes;
        $product->save();
        
        $pro_store = ProductStore::find($request->store_1)->update(['available_quantity'=> $request->available_quantity_1 ]);
        $pro_store = ProductStore::find($request->store_2)->update(['available_quantity'=> $request->available_quantity_2]);

        Session::flash('success', 'تمت العملية بنجاح!');
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	public function print_barcode($id){
		$product = Product::find($id);
		//return $product;
		return view('/admin/store/barcode',compact('product'));
	}
	
	public function print_barcode_list(){
		$products = Product::all();
		//return $product;
		return view('/admin/store/barcodelist',compact('products'));
	}

}
