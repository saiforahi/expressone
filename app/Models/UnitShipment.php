<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitShipment extends Model
{
    protected $fillable = ['shipment_id','unit_id','admin_id','status'];
    protected $table = 'unit_shipment';

    // relation 
    function shipment(){
    	return $this->belongsTo(Shipment::class);
    }
   	
   	function unit(){
    	return $this->belongsTo(Unit::class);
    }

    function user(){
    	return $this->belongsTo(User::class);
    }

    function admin(){
    	return $this->belongsTo(Admin::class);
    }

}
