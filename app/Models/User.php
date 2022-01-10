<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'user_id', 'first_name', 'last_name','shop_name', 'email', 'phone', 'password','address','area_id','website_link','image','status','is_verified'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'email_verified_at' => 'datetime:Y-m-d h:i:s A',
    ];

    function area(){
    	return $this->belongsTo(Area::class);
    }


}
