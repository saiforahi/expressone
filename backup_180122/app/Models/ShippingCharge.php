<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    protected $fillable = ['consignment_type','shipping_amount'];
}
