<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = ['name','status'];
    // relation
    function shippingPrice(){
    	return $this->hasMany(ShippingPrice::class);
    }
}
