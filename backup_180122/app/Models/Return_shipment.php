<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Return_shipment extends Model
{
    protected $fillable = ['shipment_id','unit_id','admin_id','status'];

    function admin(){
        return $this->belongsTo(User::class);
    }
    function shipment(){
        return $this->belongsTo(Shipment::class);
    }

    function unit(){
        return $this->belongsTo(Unit::class);
    }
}
