<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PurchaseBill;

class HelperController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}