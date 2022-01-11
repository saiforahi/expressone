<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'type', 'units','is_active','first_name', 'last_name','email', 'phone', 'ip','password','status'
    ];
    // public function user(){
    //     return $this->morphOne(User::class, 'inheritable');
    // }
}
