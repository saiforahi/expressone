<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog_category extends Model
{
    protected $fillable = [	'name','photo','status'];


    function blogs(){
    	return $this->hasMany(Blog::class);
    }
}
