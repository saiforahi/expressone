<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Point;
use App\Models\Unit;

class Location extends Model
{
    protected $fillable = ['name','point_id','status'];
    protected $table="locations";
    // relation 
    function shipments(){
    	return $this->hasMany(Shipment::class);
    }

    function point(){
    	return $this->belongsTo(Point::class);
    }

    function unit(){
    	return $this->belongsTo(Unit::class);
    }
}
