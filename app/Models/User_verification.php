<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_verification extends Model
{

    protected $fillable = [ 'merchant_id', 'verification_code', 'status'];


    function user(){
    	return $this->belongsTo(User::class);
    }

}
