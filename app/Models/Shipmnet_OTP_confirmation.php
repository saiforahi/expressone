<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipmnet_OTP_confirmation extends Model
{
    protected $fillable = ['otp','collect_by','shipment_id','driver_id'];
    protected $table = 'shipment_otp_confirmations';
	
	
	//relationship
    function shipment(){
        return $this->belongsTo(Shipment::class);
    }

    function driver(){
        return $this->belongsTo(Driver::class);
    }

}
