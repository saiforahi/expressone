<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_Unit extends Model
{
    protected $table = 'admin_unit';
    protected $fillable = ['admin_id','unit_id'];

    function admin(){
    	return $this->belongsTo(Admin::class);
    }

    function unit(){
    	return $this->belongsTo(Unit::class);
    }

}
