<?php

namespace App\Models;
use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name_ar','name_en','address'];
    protected $table = "stores";

    public function getNameAttribute($value) {
      return $this->{'name_' . App::getLocale()};
}

    public function products()
    {
      return $this->hasMany('App\Models\Product');
    }


}
