<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use SoftDeletes;
    protected $fillable = ['invoice_id', 'tracking_code', 'recipient', 'added_by', 'amount', 'shipping_charge_id', 'weight', 'weight_charge', 'delivery_charge', 'parcel_type', 'delivery_type', 'note', 'amount', 'shipping_status', 'status', 'delivery_location_id', 'pickup_location_id'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'deleted_at' => 'datetime:Y-m-d h:i:s A',
        'time_starts' => 'datetime:Y-m-d h:i:s A',
        'recipient' => 'array',
    ];

    // relationships
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    // function owner()
    // {
    //     return $this->belongsTo(User::class,'');
    // }
    public function added_by(){
        return $this->morphTo();
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
    public function hubs()
    {
        return $this->belongsToMany(Hub::class);
    }

    // public function inheritable(){
    //     return $this->morphTo();
    // }
    // public function merchants(){
    //     return $this->morphTo()->where('inheritable_type', Merchant::class);
    // }
    // public function morphClass(){
    //     return $this->hasOne(get_class($this->inheritable),'id','inheritable_id');
    // }
}
