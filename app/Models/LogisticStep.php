<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogisticStep extends Model
{
    use HasFactory;
    // protected $fillable=[];
    protected $guarded=[];

    protected function next(){
        return $this->hasOne(LogisticStep::class);
    }
}
