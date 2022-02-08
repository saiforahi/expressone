<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerification extends Model
{
    use HasFactory;
    protected $table="user_verifications";
    protected $fillable = [ 'merchant_id', 'verification_code', 'status'];

    function user(){
    	return $this->belongsTo(User::class);
    }
}
