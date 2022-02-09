<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,InteractsWithMedia;

    protected $guard_name = 'user';
    protected $fillable = [
        'first_name', 'last_name','email', 'phone', 'ip','password','image','status','is_verified','unit_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
    ];

    public function shipments(){
        return $this->morphMany(Shipment::class, 'added_by');
    }
    public function guard__name(){
        return $this->guard_name;
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    // public function inheritable(){
    //     return $this->morphTo();
    // }
    // public function merchants(){
    //     return $this->morphTo()->where('inheritable_type', Merchant::class);
    // }
    // public function morphClass(){
    //     return $this->hasOne(get_class($this->inheritable),'id','inheritable_id');
    // }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('profile_pic')
              ->width(247)
              ->height(300)
              ->sharpen(10)
              ->queued();
    }
    public function registerMediaCollections(): void
    {
        // $this->addMediaCollection('thumb')->useDisk('public')->acceptsMimeTypes(['image/jpeg','image/jpg','image/png','image/webp'])->withResponsiveImages();
        $this
            ->addMediaCollection('profile_pic')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg','image/jpg','image/png','image/webp'])
            ->withResponsiveImages();
    }
}
