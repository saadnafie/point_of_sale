<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleBillProduct extends Model
{
	public function bill(){
		return $this->belongsTo('App\Models\SaleBill', 'bill_id')->with('user');
	}

	public function product()
	{
   		return $this->belongsTo('App\Models\Product', 'product_id');
	}
}
