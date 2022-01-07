<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Driver_shipment extends Model
{
    protected $fillable = ['driver_id', 'shipment_id', 'admin_id', 'note', 'status'];
    protected $table = 'driver_shipment';
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
