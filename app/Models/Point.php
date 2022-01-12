<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['name','status'];
    protected $table='points';
    // relation 
    function shippingPrice(){
    	return $this->hasMany(ShippingPrice::class);
    }
}
