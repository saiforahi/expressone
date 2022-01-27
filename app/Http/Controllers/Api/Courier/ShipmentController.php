<?php

namespace App\Http\Controllers\Api\Courier;

use Auth;
use App\Models\User;
use App\Models\Courier;
use App\Models\CourierShipment;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class ShipmentController extends Controller
{
    public function get_pickup_shipments(){
        try{
            $courierShipments = CourierShipment::where('courier_id',Auth::guard('api_courier')->user()->id)->where('type','pickup')->get();
            $shipments = array();
            foreach($courierShipments as $item){
                array_push($shipments,Shipment::with(['pickup_location','merchant','delivery_location','added_by','payment_detail'])->where('id',$item->shipment_id)->first());
            }
            return response()->json(['status'=>true,'data'=>$shipments],200);
        }
        catch(Exception $e){
            return response()->json(['status'=>false,'errors'=>$e],500);
        }
    }

    public function mark_shipments_as_received(Request $req){
        try{
            $shipment=Shipment::where('tracking_code',$req->tracking_code)->first();
            $shipment->logistic_status=4;
            $shipment->save();
            CourierShipment::where(['shipment_id'=>$shipment->id,'courier_id'=>auth()->guard('api_courier')->user()->id,'type'=>'pickup','status'=>'pending'])->update(['status'=>'received']);
            return response()->json(['status'=>true,'message'=>'Shipment marked as received'],200);
        }
        catch(Exception $e){
            return response()->json(['status'=>false,'errors'=>$e],500);
        }
    }
}
