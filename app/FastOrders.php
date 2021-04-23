<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FastOrders extends Model
{
    public $timestamps = false;
    public function products(){
        return $this->hasMany('App\Products','product_id');
    }
}
