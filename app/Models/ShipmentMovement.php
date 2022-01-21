<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentMovement extends Model
{
    use HasFactory;
    protected $table = "shipment_movements";
    public function action_made_by()
    {
        return $this->morphTo();
    }
}
