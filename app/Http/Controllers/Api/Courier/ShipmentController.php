<?php

namespace App\Http\Controllers\Api\Courier;

use Auth;
use App\Models\User;
use App\Models\Courier;
use App\Models\CourierShipment;
use App\Models\Shipment;
use App\Models\ShipmentOTP;
use App\Models\LogisticStep;
use App\Events\ShipmentMovementEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class ShipmentController extends Controller
{
    public function get_shipments($type){
        try{
            // return Auth::guard('api_courier')->user()->id;
            $courierShipments;
            switch($type){
                case 'pickup':
                    $courierShipments=CourierShipment::where('courier_id',Auth::guard('api_courier')->user()->id)->where('type',$type)->join('shipments','shipments.id','courier_shipment.shipment_id')->whereIn('shipments.logistic_status',LogisticStep::where('slug','to-pick-up')->orWhere('slug','picked-up')->orWhere('slug','dropped-at-pickup-unit')->pluck('id')->toArray())->get(['courier_shipment.*']);
                    break;
                    
                case 'delivery':
                    $courierShipments=CourierShipment::where('courier_id',Auth::guard('api_courier')->user()->id)->where('type',$type)->join('shipments','shipments.id','courier_shipment.shipment_id')->whereIn('shipments.logistic_status',LogisticStep::where('slug','to-delivery')->pluck('id')->toArray())->get(['courier_shipment.*']);
                    break;
            }
            $shipments = array();
            foreach($courierShipments as $item){
                array_push($shipments,Shipment::with(['logistic_step','pickup_location','merchant','delivery_location','added_by','payment_detail'])->where('id',$item->shipment_id)->first());
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
            event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','picked-up')->first(),Auth::guard('courier')->user()));
            return response()->json(['status'=>true,'message'=>'Shipment marked as received'],200);
        }
        catch(Exception $e){
            return response()->json(['status'=>false,'errors'=>$e],500);
        }
    }

    public function mark_shipments_as_submitted(Request $req){
        try{
            $shipment=Shipment::where('tracking_code',$req->tracking_code)->first();
            $shipment->update(['logistic_status'=>LogisticStep::where('slug','dropped-at-pickup-unit')->first()->id]);
            event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','dropped-at-pickup-unit')->first(),Auth::guard('api_courier')->user()));
            // CourierShipment::where(['shipment_id'=>$shipment->id,'courier_id'=>auth()->guard('api_courier')->user()->id,'type'=>'pickup','status'=>'pending'])->update(['status'=>'received']);
            return response()->json(['status'=>true,'message'=>'Shipment marked as received'],200);
        }
        catch(Exception $e){
            return response()->json(['status'=>false,'errors'=>$e],500);
        }
    }

    public function submit_delivery_report(Request $req){
        try{
            $shipment=Shipment::find($req->shipment_id);
            switch($req->report_type){
                case 'delivered':
                    $shipment->logistic_status = LogisticStep::where('slug','delivered')->first()->id;
                    $shipment->save();
                    CourierShipment::where('shipment_id',$shipment->id)->update(['status'=>'delivered']);
                    ShipmentOTP::create([
                        'shipment_id'=>$shipment->id,
                        'courier_id'=> auth()->guard('api_courier')->user()->id,
                        'otp'=>'1234',
                        'sent_to_phone_number'=>$req->otp=='merchant'?$shipment->merchant->phone:$shipment->recipient['phone'],
                        'sent_to'=>$req->otp
                    ]);
                    event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','delivered')->first(),Auth::guard('api_courier')->user()));
                    break;
                
                case 'return':
                    $shipment->logistic_status = LogisticStep::where('slug','returned-by-recipient')->first()->id;
                    $shipment->save();
                    CourierShipment::where('shipnent_id',$shipment->id)->update(['status'=>'returned']);
                    
                    ShipmentOTP::create([
                        'shipment_id'=>$shipment->id,
                        'courier_id'=> auth()->guard('courier')->user()->id,
                        'otp'=>'1234',
                        'sent_to_phone_number'=>$req->otp=='merchant'?$shipment->merchant->phone:$shipment->recipient['phone'],
                        'sent_to'=>$req->otp
                    ]);
                    event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','returned-by-recipient')->first(),Auth::guard('api_courier')->user()));
                    break;

                case 'hold':
                    $shipment->logistic_status = LogisticStep::where('slug','on-hold')->first()->id;
                    $shipment->save();
                    CourierShipment::where('shipment_id',$shipment->id)->update(['status'=>'hold']);
                    event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','on-hold')->first(),Auth::guard('courier')->user()));
                    break;
                    
            }
            return response()->json(['success'=>true,'message'=>'Shipment report has been submitted']);
        }
        catch(Exception $e){
            return response()->json(['success'=>true,'errors'=>$e]);
        }
    }
    
    public function merchant_wise_pickup_shipments(){
        try{
            $shipments = CourierShipment::where(['type'=>'pickup','courier_id' => Auth::guard('courier')->user()->id])->join('shipments','shipments.id','courier_shipment.shipment_id')->where('shipments.merchant_id',$id)->get(['shipments.*']);
            $user = User::find($id);
            return response()->json(['success'=>true,'data'=>$shipments],200);
        }
        catch(Exception $e){
            return response()->json(['success'=>true,'data'=>$e],500);
        }
    }
    public function confirm_delivery_report(Request $request){
        try{
            $shipment = Shipment::where('id', $request->shipment_id)->first();
            $shipment_otp=ShipmentOTP::where('shipment_id',$shipment->id)->where('courier_id',auth()->guard('api_courier')->user()->id)->first();
            if($request->otp == $shipment_otp->otp){
                $shipment_otp->collect_by()->associate(Auth::guard('api_courier')->user());
                $shipment_otp->confirmed=true;
                $shipment_otp->save();
                
                if($shipment->logistic_step->slug=='returned-by-recipient'){
                    // dd($shipment->logistic_step->slug);
                    $shipment->logistic_status = LogisticStep::where('slug','returned-by-recipient-confirmed')->first()->id;
                    $shipment->save();
                    event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','returned-by-recipient-confirmed')->first(),Auth::guard('api_courier')->user()));
                }
                else if($shipment->logistic_step->slug=='delivered'){
                    $shipment->logistic_status = LogisticStep::where('slug','delivery-confirmed')->first()->id;
                    $shipment->save();
                    event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','delivery-confirmed')->first(),Auth::guard('api_courier')->user()));
                }
                
                return response()->json(['success'=>true,'message'=>'The Shipment OTP has been confirmed successfully!'],200);
            }
            return response()->json(['success'=>false,'message'=> 'OTP mismatched!'],404);
        }
        catch(Exception $e){
            return response()->json(['success'=>false,'message'=> $e],500);
        }
    }
}
