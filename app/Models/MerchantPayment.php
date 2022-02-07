<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantPayment extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function shipment(){
        return $this->belongsTo(Shipment::class,'shipment_id','id');
    }
    public function merchant(){
        return $this->hasOne(User::class);
    }
    public function paid_by()
    {
        return $this->morphTo();
    }

}
