<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PurchaseBill;
use App\Models\PurchaseBillProduct;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\ProductStore;

class PurchaseBillController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = PurchaseBill::/*with('bill_products')->*/get();
        return view('admin.purchase.purchasebillslist',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$suppliers = Supplier::all();
        return view('admin.purchase.addbill',compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //return $request;
        $bill= new PurchaseBill;
        $bill->bill_number = 1000000000;
        $bill->user_id = auth()->user()->id;
        $bill->supplier_id = $request->supp_id;
        $bill->total_cost = $request->final_total;
        $bill->save();
        $bill->bill_number = 1000000000 + $bill->id;
        $bill->save();
        foreach ($request->multi_product as $key => $value) {
         
            $billpro = new PurchaseBillProduct();
            $billpro->bill_id = $bill->id;
            $billpro->product_id = $value;
            $billpro->price = ($request->multi_price)[$key];
            $billpro->quantity = ($request->multi_amount_1)[$key] + ($request->multi_amount_2)[$key];
            $billpro->total_cost = ($request->multi_total)[$key];
            $billpro->save();

            $pro1 = ProductStore::where('product_id',$value)->where('store_id',1)->first();
            $pro1->available_quantity = $pro1->available_quantity + ($request->multi_amount_1)[$key];
            $pro1->save();

            $pro2 = ProductStore::where('product_id',$value)->where('store_id',2)->first();
            $pro2->available_quantity = $pro2->available_quantity + ($request->multi_amount_2)[$key];
            $pro2->save();
        }
        return redirect()->route('purchasebill.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = PurchaseBill::with('bill_products')->with('user')->with('supplier')->find($id);
        return view('admin.purchase.purchasebilldetail',compact('bill'));
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
        //
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

    public function ajax_search_barcode($barcode_val)
    {
        $pro = Product::where('barcode', $barcode_val)->first();
        if($pro == ''){
            $response['error'] = true;
            $response['message'] = "No Product"; 
        }else{
            $response['pro'] = $pro;
            $response['error'] = false;
            $response['message'] = "Success";
        }
        return $response;
    }

    public function print_bill($id){
        $bill = PurchaseBill::with('supplier')->with('bill_products')->find($id);
        return view('admin.purchase.printpurchasebill',compact('bill'));
    }

}