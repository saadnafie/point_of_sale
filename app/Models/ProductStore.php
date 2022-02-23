<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'store_id','product_id','available_quantity'];
    protected $table = "product_stores";

}
