<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Send_sms extends Model
{
    protected $fillable = ['receiver_type','sent_to','message_body'];
}
