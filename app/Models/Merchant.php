<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $fillable = [
        'shop_name', 'NID','BIN','bank_name','bank_br_name','bank_acc_name','bank_acc_no','address','website_link'
    ];
    public function user(){
        return $this->morphOne(User::class, 'inheritable');
    }
}
