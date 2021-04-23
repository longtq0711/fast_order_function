<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable =[
        'name', 'phonenumber', 'address'
    ];
    public function products(){
        return $this->hasMany('App\Products','id');
    }
}
