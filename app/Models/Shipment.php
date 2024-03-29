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

    /**
     * Get the merchant t
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchant()
    {
        return $this->belongsTo(User::class);
        //return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }
    


    // relationships
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function added_by()
    {
        return $this->morphTo();
    }
    public function pickup_location()
    {
        return $this->belongsTo(Location::class, 'pickup_location_id', 'id');
    }
    public function delivery_location()
    {
        return $this->belongsTo(Location::class, 'delivery_location_id', 'id');
    }
    public function payment_detail(){
        return $this->hasOne(ShipmentPayment::class,'shipment_id','id');
    }
    /**
     * Get the deliveryCharge that owns the Shipment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shippingCharge()
    {
        return $this->belongsTo(ShippingCharge::class);
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
    public function scopeCousins($query)
    {
        $query->join('locations','shipments.pickup_location_id','locations.id')
        ->join('points','locations.point_id','points.id')
        ->join('units','points.unit_id','units.id')
        ->join('admins','units.admin_id','admins.id')->join('logistic_steps','logistic_steps.id','shipments.logistic_status');
    }
    public function scopeDeliverycousins($query)
    {
        $query->join('locations','shipments.delivery_location_id','locations.id')
        ->join('points','locations.point_id','points.id')
        ->join('units','points.unit_id','units.id')
        ->join('admins','units.admin_id','admins.id')
        ->join('logistic_steps','logistic_steps.id','shipments.logistic_status');
    }
}
