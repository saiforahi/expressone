<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use App\Models\Shipment;

class Admin extends Authenticatable
{
    use HasFactory, HasApiTokens,HasRoles;

    protected $fillable = [
        'type', 'units','is_active','first_name', 'last_name','email', 'phone', 'ip','password','status'
    ];
    protected $hidden = [
        'password'
    ];
    protected $guard_name = 'admin';

    public function shipments(){
        return $this->morphMany(Shipment::class, 'added_by');
    }
    public function guard__name(){
        return $this->guard_name;
    }

    public function units(){
        return $this->hasMany(Unit::class);
    }

    public function my_shipments(){
        if($this->hasRole('super-admin')){
            return Shipment::with('pickup_location')->with('delivery_location')->get();
        }
        else{
            return DB::table('units')->where('admin_id',$this->id)->join('points','points.unit_id','units.id')->join('locations','locations.point_id','points.id')->join('shipments','shipments.pickup_location_id','locations.id');
        }
    }    
}
