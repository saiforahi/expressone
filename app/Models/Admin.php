<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
}
