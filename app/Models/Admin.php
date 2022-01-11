<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'type', 'units','is_active','first_name', 'last_name','email', 'phone', 'ip','password','status'
    ];
    // public function user(){
    //     return $this->morphOne(User::class, 'inheritable');
    // }
}
