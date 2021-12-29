<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    protected $fillable = ['consignment_type','shipping_amount'];
}
