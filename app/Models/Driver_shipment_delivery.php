<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourierShipment_delivery extends Model
{
    protected $fillable = ['courier_id','shipment_id','type','status'];
    protected $table = 'CourierShipment_delivery';

    function driver(){
        return $this->belongsTo(Courier::class);
    }

    function shipment(){
        return $this->belongsTo(Shipment::class);
    }
}
