<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use SoftDeletes;
    protected $fillable = ['invoice_id', 'tracking_code', 'recipient', 'added_by', 'cod_amount', 'shipping_charge_id', 'weight', 'weight_charge', 'delivery_charge', 'parcel_type', 'delivery_type', 'note', 'amount', 'shipping_status', 'status', 'delivery_location_id', 'pickup_location_id'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'deleted_at' => 'datetime:Y-m-d h:i:s A',
        'time_starts' => 'datetime:Y-m-d h:i:s A',
        'customer' => 'array',
    ];
    // relationships
    function area()
    {
        return $this->belongsTo(Area::class);
    }
    function owner()
    {
        return $this->belongsTo(User::class,'');
    }
    function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    function hubs()
    {
        return $this->belongsToMany(Hub::class);
    }

}
