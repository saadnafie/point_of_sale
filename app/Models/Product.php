<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use DB;

class Product extends Model
{
	
	public function getReactNameAttribute($value) {
        return $this->{'name_' . App::getLocale()};
    }
	
	protected $fillable = ['id', 'barcode','name_ar','name_en','sale_price','default_discount','stock_limit','category_id','brand_id','status','notes'];
    protected $table = "products";


//     public function getNameAttribute($value) {
//       return $this->{'name_' . App::getLocale()};
// }


    public function category()
    {
      return $this->belongsTo('App\Models\Category');
    }

    /*public function store()
    {
      return $this->belongsTo('App\Models\Store');
    }

    public function brand()
    {
      return $this->belongsTo('App\Models\Brand');
    }*/
    public function product_store()
    {
      return $this->hasMany('App\Models\ProductStore');
    }
}
