<?php

namespace App\Models;
use App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceBill extends Model
{
    public function employee()
	{
   		return $this->belongsTo('App\Models\Employee', 'employee_id');
	}


	public function user_created_by()
	{
   		return $this->belongsTo('App\Models\User', 'created_by');
	}


	public function user_finished_by()
	{
   		return $this->belongsTo('App\Models\User', 'finished_by');
	}
}
