<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Supplier extends Model
{

	protected $fillable = ['id', 'name','phone','is_active'];
    protected $table = "suppliers";
    
	/*public function getNameAttribute($value) {
        return $this->{'name_' . App::getLocale()};
    }*/

    public function bills(){
		return $this->hasMany('App\Models\PurchaseBill', 'supplier_id');
	}
}
