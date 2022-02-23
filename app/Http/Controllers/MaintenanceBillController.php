<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;


use App\Models\MaintenanceBill;
use App\Models\Employee;


class MaintenanceBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['except'=>['store']]);
    }


    public function index()
    {
        //salebillslist
        $bills = MaintenanceBill::with('employee')->with('user_created_by')->with('user_finished_by')->get();
        return view('admin.maintenance.maintenancebilllist',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function create()
    {
        //
       // return view('admin.sale.pointofsale');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required'
        ]);
        $maintenance = new MaintenanceBill();
        $maintenance->bill_number = 200000;
        $maintenance->employee_id = $request->employee_id ;
        $maintenance->created_by = auth()->user()->id;
        $maintenance->customer_name = $request->cus_name ;
        $maintenance->customer_phone = $request->cus_phone ;
        $maintenance->notes = $request->maintenance_desc ;
        $maintenance->hardware_price = $request->hardware_cost ;
        $maintenance->maintenance = $request->maintenance_cost ;
        $maintenance->paid_amount = $request->paied_amount ;
        $maintenance->remaining_amount = $request->remain_amount ;
        $maintenance->save();
        $maintenance->bill_number = 200000 +$maintenance->id;
        $maintenance->save();

        Session::flash('success', 'تمت العملية بنجاح!');
        return redirect()->back();//->with('id',$bill->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = MaintenanceBill::with('employee')->with('user_created_by')->with('user_finished_by')->find($id);
        //return $bill;
        return view('admin/maintenance/maintenancebilldetail',compact('bill'));
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
        $mbill = MaintenanceBill::find($id);
        $mbill->bill_status = 1;
        $mbill->finished_by = auth()->user()->id;
        $mbill->save();
        return redirect()->back();
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


    public function ajax_search_bill($phone)
    {
        $mbill = MaintenanceBill::with('employee')->where('customer_phone', $phone)->where('bill_status', 0)->first();
        //return $pro;

        if($mbill == ''){
            $response['error'] = true;
            $response['status'] = 0;
            $response['message'] = "لا توجد فاتورة مفتوحة لذلك الرقم"; 
        }else{
            $response['mbill'] = $mbill;
            $response['error'] = false;
            $response['message'] = "Success";
        }
        return $response;
    }

    public function print_bill($id){
        $bill = MaintenanceBill::with('employee')->with('user_created_by')->with('user_finished_by')->find($id);
        return view('admin.maintenance.printmaintenancebill',compact('bill'));
    }
}
