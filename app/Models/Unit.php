<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['name','point_id','status'];
    protected $table="units";
    // relation 
    public function employees()
    {
    	return $this->hasMany(Employee::class);
    }
    
    function zone(){
    	return $this->belongsTo(Zone::class);
    }

    function shipments(){
    	return $this->belongsToMany(Shipment::class);
    }

    function admins(){
        return $this->belongsToMany(Admin::class);
    }
}
