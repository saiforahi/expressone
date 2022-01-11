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
    protected $fillable = [
        'first_name', 'last_name','email', 'phone', 'ip','password','status','is_active','joining_date','nid_no','employee_id'
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
    ];
    // public function user(){
    //     return $this->morphOne(User::class, 'inheritable');
    // }
}
