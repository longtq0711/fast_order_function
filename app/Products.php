<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
      'link', 'note'
    ];
//    public function products(){
//        return $this->belongsTo('App\FastOrders','product_id');
//    }
}
