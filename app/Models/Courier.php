<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Courier extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $table="couriers";
    protected $guard_name = 'courier';
    protected $fillable = [
        'first_name', 'last_name','email', 'phone', 'ip','password','status','is_active','joining_date','nid_no','employee_id'
    ];
    protected $hidden = [
        'password'
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
    ];
    public function guard__name(){
        return $this->guard_name;
    }
    /**
     * Get all of the shipments f
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courierShipments()
    {
        return $this->hasMany(CourierShipment::class,);
    }
    public function pickup_shipments(){
        return $this->hasMany(Shipment::class)->where('type','pickup');
    }
    public function delivery_shipments(){
        return $this->hasMany(Shipment::class)->where('type','delivery');
    }
    // public function user(){
    //     return $this->morphOne(User::class, 'inheritable');
    // }
}
