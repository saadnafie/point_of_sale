<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;


use App\Models\SaleBill;
use App\Models\Product;
use App\Models\SaleBillProduct;
use App\Models\ProductStore;
use App\Models\Employee;


class SaleBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        
        $this->middleware('admin',['except'=>['create','store','ajax_search_barcode','print_bill']]);
    }


    public function index(Request $request)
    {
        //salebillslist
        if(isset($request->search_val)){
            $bills = SaleBill::with('bill_products')->where('bill_number', $request->search_val)->paginate(100);
            
        }else{
        $bills = SaleBill::with('bill_products')->paginate(100);
        }
        return view('admin.sale.salebillslist',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employees = Employee::where('type',1)->get();
        return view('admin.sale.pointofsale',compact('employees'));
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
        //
        $bill = new SaleBill();
        $bill->bill_number = 1000000000;
        //$bill->bill_date = $request->bill_date;
        //$bill->customer_id = $request->cus_id;
        $bill->store_id = 1;
        $bill->total_discount = $request->total_discount;
        $bill->total_before_discount = $request->total_before_tax;
        //$bill->total_tax = $request->total_tax;
        $bill->total_cost = $request->final_total;
        //$bill->due_date = $request->due_date;
        //$bill->bill_source = $request->bill_source;
        $bill->paid_amount = $request->paid_amount;
        $bill->remaining_amount = $request->remaining_amount;
        $bill->pay_way = $request->pay_way;
        $bill->user_id = auth()->user()->id;
        $bill->save();
        $bill->bill_number = 1000000000 +$bill->id;
        $bill->save();


        foreach ($request->multi_product as $key => $product) {
            $item = Product::find($product);

            $bill_pro = new SaleBillProduct();
            $bill_pro->bill_id = $bill->id;
            $bill_pro->product_id = $product;
            $bill_pro->price = ($request->multi_price)[$key];
            $bill_pro->product_discount = ($request->multi_discount)[$key];
            //$bill_pro->tax_value = ($request->multi_tax_val)[$key];
            $bill_pro->quantity = ($request->multi_amount)[$key];
            $bill_pro->total_cost = ($request->multi_total)[$key];
            $bill_pro->save();

            $quantity = ($request->multi_amount)[$key];


            $pro_store = ProductStore::where('product_id',$product)->where('store_id',1)->first();
            $pro_store->available_quantity = $pro_store->available_quantity - ($request->multi_amount)[$key];
            $pro_store->save(); 
            
        }

        Session::flash('success', 'تمت العملية بنجاح!');
        return redirect()->back()->with('id',$bill->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $branch = auth()->user()->store_id;
        $branch = 1;
        $pro = Product::with('product_store')->where('barcode', $barcode_val)->first();
        //return $pro;

        if($pro == ''){
            $response['error'] = true;
            $response['status'] = 0;
            $response['message'] = "No Product"; 
        }else if($pro->product_store[$branch-1]->available_quantity == 0){
            $response['error'] = true;
            $response['status'] = 1;
            $response['message'] = "There is No Quantity \n".$pro->barcode."-".$pro->name;
        }else{
            $response['pro'] = $pro;
            $response['error'] = false;
            $response['message'] = "Success";
        }
        return $response;
    }

    public function print_bill($id){
        $bill = SaleBill::with('user')->with('bill_products')->with('user')->find($id);
        //return $bill;
        return view('admin.sale.printsalebill',compact('bill'));
    }
}
