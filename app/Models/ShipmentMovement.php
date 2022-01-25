<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentMovement extends Model
{
    use HasFactory;
    protected $table = "shipment_movements";
    protected $guarded=[];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'deleted_at' => 'datetime:Y-m-d h:i:s A',
    ];
    public function action_made_by()
    {
        return $this->morphTo();
    }

    public function shipment(){
        return $this->belongsTo(Shipment::class);
    }

    public function logistic_step(){
        return $this->hasOne(LogisticStep::class,'id','logistic_step_id');
    }
}
