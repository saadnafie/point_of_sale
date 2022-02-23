<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class PurchaseBill extends Model
{

	public function user()
	{
   		return $this->belongsTo('App\Models\User', 'user_id');
	}

	public function supplier()
	{
   		return $this->belongsTo('App\Models\Supplier', 'supplier_id');
	}

	public function bill_products()
	{
   		return $this->hasMany('App\Models\PurchaseBillProduct','bill_id')->with('product');
	}

}
