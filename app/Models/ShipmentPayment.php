<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentPayment extends Model
{
    protected $fillable = ['shipment_id','admin_id','amount'];
    protected $table="shipment_payments";
    // relation 
    function user(){
        return $this->belongsTo(User::class);
    }

    function shipment(){
        return $this->belongsTo(Shipment::class);
    }

    function admin(){
        return $this->belongsTo(Admin::class);
    }

}
