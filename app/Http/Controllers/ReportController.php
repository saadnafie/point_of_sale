<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleBill;
use App\Models\PurchaseBill;
use App\Models\MaintenanceBill;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reports.reports');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = $request['type'];
        if($report == 1)
        {
            $from =$request['date'];
            $to =$request['date2'];
            $data = SaleBill::where('created_at', '>=', $from)->where('created_at', '<=', $to)->get();
            $sum=$data->sum('total_before_discount');
            return view('admin.reports.sales_reports_filter',compact('data','sum'));
        }
        if($report == 2)
        {
            $from =$request['date'];
            $to =$request['date2'];
            $data = PurchaseBill::where('created_at', '>=', $from)->where('created_at', '<=', $to)->get();
            $sum=$data->sum('total_cost');
            return view('admin.reports.purchases_reports_filter',compact('data','sum'));
        }
        if($report == 3)
        {
            $from =$request['date'];
            $to =$request['date2'];
            $data = MaintenanceBill::where('created_at', '>=', $from)->where('created_at', '<=', $to)->get();
            $sum=$data->sum('paid_amount');
            return view('admin.reports.maintenance_reports_filter',compact('data','sum'));
        }
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
   
}
