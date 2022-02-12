<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable =['title','photo','description','status'];
    protected $table="missions";
}
