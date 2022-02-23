<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Store;
use App\Models\Category;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index(){
        $users = User::all();
    	$count_users = $users->count();

        $products = Product::all();
    	$count_products = $products->count();

        $suppliers = Supplier::all();
    	$count_suppliers = $suppliers->count();

        $stores = Store::all();
    	$count_stores = $stores->count();

        $employees = Employee::all();
    	$count_employees = $employees->count();

        $categories = Category::all();
    	$count_categories = $categories->count();

        return view('/admin/dashboard',compact('count_users','count_products','count_suppliers','count_stores','count_employees','count_categories'));
    }
    
}
