<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['name','status'];
    protected $table="units";
    // relation 
    public function employees()
    {
    	return $this->hasMany(Employee::class);
    }
    
    function points(){
    	return $this->belongsTo(Point::class);
    }

    function shipments(){
    	return $this->belongsToMany(Shipment::class);
    }

    function admins(){
        return $this->belongsToMany(Admin::class);
    }
}
