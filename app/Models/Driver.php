<?php

namespace App\Models;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
class Driver extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $guard = 'driver';

    protected $fillable = [
        'driver_id','first_name','last_name', 'email','phone', 'password','image','status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
    ];
    // relation
    public function hub_shipment_boxes()
    {
    	return $this->belongsToMany(Hub_shipment_box::class);
    }


}
