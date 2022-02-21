<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Courier extends Authenticatable implements HasMedia
{
    use HasFactory, HasApiTokens,InteractsWithMedia;
    protected $table="couriers";
    protected $guard_name = 'courier';
    protected $fillable = [
        'first_name', 'last_name','email', 'phone', 'ip','password','password_str','status','is_active','joining_date','nid_no','employee_id','unit_id','salary'
    ];
    protected $hidden = [
        'password'
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s A',
        'updated_at' => 'datetime:Y-m-d h:i:s A',
        'joining_date' => 'datetime:Y-m-d h:i:s A',
    ];
    public function guard__name(){
        return $this->guard_name;
    }
    /**
     * Get all of the shipments f
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courierShipments()
    {
        return $this->hasMany(CourierShipment::class,);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function pickup_shipments(){
        return $this->hasMany(Shipment::class)->where('type','pickup');
    }
    public function delivery_shipments(){
        return $this->hasMany(Shipment::class)->where('type','delivery');
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('profile_pic')
              ->width(286)
              ->height(286)
              ->sharpen(10)
              ->queued();
    }
    public function registerMediaCollections(): void
    {
        // $this->addMediaCollection('thumb')->useDisk('public')->acceptsMimeTypes(['image/jpeg','image/jpg','image/png','image/webp'])->withResponsiveImages();
        $this
            ->addMediaCollection('profile_pic')
            // ->useDisk('media')
            ->acceptsMimeTypes(['image/jpeg','image/jpg','image/png','image/webp'])
            ->withResponsiveImages();
    }
}
