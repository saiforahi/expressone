<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use SoftDeletes;
    //protected $fillable = ['invoice_id', 'tracking_code', 'recipient', 'added_by_id', 'amount', 'shipping_charge_id', 'weight', 'weight_charge', 'delivery_charge', 'parcel_type', 'delivery_type', 'note', 'amount', 'shipping_status', 'status', 'delivery_location_id', 'pickup_location_id'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'deleted_at' => 'datetime:Y-m-d h:i:s A',
        'time_starts' => 'datetime:Y-m-d h:i:s A',
        'customer' => 'array',
    ];
    /**
     * Get the user that owns the Shipment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    /**
     * Get the user that owns the Shipment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    function hubs()
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
