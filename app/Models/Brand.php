<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // use HasFactory;
    // protected $fillable = ['id', 'brand_ar','brand_en'];
    // protected $table = "brands";

    public function getBrandAttribute($value) {
        return $this->{'brand_' . App::getLocale()};
  }

  public function products()
    {
      return $this->hasMany('App\Models\Product');
    }

}
