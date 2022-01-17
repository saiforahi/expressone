<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CourierShipment extends Model
{
    protected $fillable = ['courier_id', 'shipment_id', 'admin_id', 'note', 'status'];
    protected $table = 'courier_shipment';
    public function driver()
    {
        return $this->belongsTo(Courier::class);
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
