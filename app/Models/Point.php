<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['name','status','unit_id'];
    protected $table='points';
    // relation 
    function shippingPrice(){
    	return $this->hasMany(ShippingPrice::class);
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
