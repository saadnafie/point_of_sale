<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SaleBill extends Model
{
	public function user()
	{
   		return $this->belongsTo('App\Models\User', 'user_id');
	}

	public function bill_products()
	{
   		return $this->hasMany('App\Models\SaleBillProduct','bill_id')->with('product');
	}
}
