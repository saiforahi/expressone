<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver_shipment_delivery extends Model
{
    protected $fillable = ['courier_id','shipment_id','type','status'];
    protected $table = 'driver_shipment_delivery';

    function driver(){
        return $this->belongsTo(Courier::class);
    }

    function shipment(){
        return $this->belongsTo(Shipment::class);
    }
}
