<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
class Usertype extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'type'];
    protected $table = "user_types";

    public function users()
    {
      return $this->hasMany('App\Models\User');
    }
}

