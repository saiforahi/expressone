<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentOTP extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function collect_by(){
        return $this->morphTo();
    }
}
