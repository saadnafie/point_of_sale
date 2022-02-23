<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Models\user;
use App\Models\Usertype;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::all();

        return view('/admin/employee/employees',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Usertype::all();
        return view('/admin/employee/addemployee',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff = $request['type'];

        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->phone = $request->input('phone');
        $employee->type = $request->input('type');
        $employee->save();

        if($staff == 0)
        {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
       //     $user->phone = $request->input('phone');
            $user->user_type_id = 2;
            $user->employee_id = $employee->id;
            $user->store_id = 1;
            $user->password = Hash::make($request['password']);
            $user->save();
        }
    
        Session::flash('success', 'تمت العملية بنجاح!');
        return redirect('/admin/employee');
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
