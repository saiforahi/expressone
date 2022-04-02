<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\LogisticStep;
use App\Models\MerchantPayment;
use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\ShipmentMovement;
use App\Models\Unit;
use App\Models\User;
use Exception;
use DB;

class ReportController extends Controller
{
    //
    public function show_report_pickup_from_merchant(){
        $title="";
        $result=array();
        $shipments=Shipment::all();
        foreach($shipments as $shipment){
            $audit_logs = ShipmentMovement::where('shipment_id', $shipment->id)->orderBy('updated_at','ASC')->get();
            $movements = [
                'pickup_from_merchant'=> ShipmentMovement::where(['shipment_id'=>$shipment->id,'logistic_step_id'=>LogisticStep::where('slug','picked-up')->first()->id])->first(),
                'dropped_at_unit'=> ShipmentMovement::where(['shipment_id'=>$shipment->id,'logistic_step_id'=>LogisticStep::where('slug','dropped-at-pickup-unit')->first()->id])->first(),
                'internal_transit'=> ShipmentMovement::where(['shipment_id'=>$shipment->id,'logistic_step_id'=>LogisticStep::where('slug','in-transit')->first()->id])->first(),
                'received_delivery_unit'=> ShipmentMovement::where(['shipment_id'=>$shipment->id,'logistic_step_id'=>LogisticStep::where('slug','delivery-unit-received')->first()->id])->first(),
                'courier_assigned_to_deliver'=> ShipmentMovement::where(['shipment_id'=>$shipment->id,'logistic_step_id'=>LogisticStep::where('slug','to-delivery')->first()->id])->first(),
            ];
            array_push($result,array('shipment'=>$shipment,'movements'=>$movements));
        }
        // $audit_logs = \App\Models\ShipmentMovement::where('shipment_id', $shipment->id)->orderBy('updated_at','ASC')->get();
        
        // dd($result[0]['shipment']->recipient['name']);
        return view('admin.reports.show',compact(['title','result']));
    }
    public function pickup_shipments_report($data){
        try{
            $statuses=LogisticStep::where('slug','to-pick-up')->orWhere('slug','picked-up')->orWhere('slug','dropped-at-pickup-unit')->orWhere('slug','unit-received')->pluck('id')->toArray();
            $shipment_with_movements = ShipmentMovement::whereIn('logistic_step_id',$statuses)->get(['shipment_id']);
            $shipments=Shipment::whereIn('logistic_status',$statuses)->get();
            
            return $shipments;
        }
        catch(Exception $e){

        }
    }
    public function delivery_shipments_report($data){
        try{
            $statuses=LogisticStep::where('slug','to-pick-up')->orWhere('slug','picked-up')->orWhere('slug','dropped-at-pickup-unit')->orWhere('slug','unit-received')->pluck('id')->toArray();
            $shipment_with_movements = ShipmentMovement::whereIn('logistic_step_id',$statuses)->get(['shipment_id']);
            $shipments=Shipment::deliverycousins()->whereBetween('shipments.logistic_status',[7,10])->select('shipments.*','locations.name as delivery_location_name','units.name as delivery_unit_name','units.id as unit_id')->get();
            
            if(isset($data['area_id'])){
                $shipments->where('delivery_localtion_id',$data['area_id']);
            }
            return $shipments;
        }
        catch(Exception $e){

        }
    }
    public function show_shipment_reports(Request $req,$type){
        $shipments=array();
        switch($type){
            case 'pickup':
                $shipments=$this->pickup_shipments_report($req->all());
                break;
            
        case 'delivery':
            $shipments=$this->delivery_shipments_report($req->all());
            break;
        }
        if(isset($req->unit_id)){
            $shipments=$shipments->where('unit_id','=',$req->unit_id);
        }
        if(isset($req->merchant_id)){
            $shipments=$shipments->where('merchant_id','=',$req->merchant_id);
        }
        
        if ($req->from_date && $req->to_date) {
            $from_date = date('Y-m-d', strtotime($req->from_date));
            $to_date = date('Y-m-d', strtotime($req->to_date));
            $shipments =  $shipments->whereBetween('created_at', [$from_date . " 00:00:00", $to_date . " 23:59:59"]);
        }
        // dd($shipments);
        $title="";
        $result=$shipments->toArray();
        $locations=Location::all();
        $units=Unit::all();
        $users=User::all();
        return view('admin.reports.shipments-report',compact(['type','title','result','locations','units','users']));
    }
    public function unit_wise_payment_report(){
        $units = DB::table('shipments')->join('shipment_payments','shipment_payments.shipment_id','=','shipments.id')
        ->join('locations','locations.id','=','shipments.delivery_location_id')->join('points','points.id','=','locations.point_id')->join('units','units.id','=','points.unit_id')->select('units.*')->get();
        
        return $units;
    }
    public function merchant_wise_payment_report(){
        $merchants =array();
        foreach(User::all() as $user){
            $total_paid=0;
            $total_due=0;
            $total_shipments=Shipment::where('merchant_id','=',$user->id)->count();
            foreach(Shipment::where('merchant_id','=',$user->id)->get() as $shipment){
                $total_paid += $shipment->payment_detail->paid_amount;
                $amount_to_be_paid = $shipment->payment_detail->cod_amount - ($shipment->payment_detail->delivery_charge+$shipment->payment_detail->weight_charge);
                $total_due+= $amount_to_be_paid - $shipment->payment_detail->paid_amount;
            }
            array_push($merchants,array('user'=>$user,'total_paid'=>$total_paid,'total_due'=>$total_due,'total_shipments'=>$total_shipments));
        }
        // dd($merchants);
        return $merchants;
    }
    public function show_payment_reports(){
        $title="";
        $units=$this->unit_wise_payment_report();
        $merchants=$this->merchant_wise_payment_report();
        // dd($unit_payments);
        $result=array();
        return view('admin.reports.payments-report',compact(['title','units','result','merchants']));
    }

    public function show_incentive_reports(){
        $returned_deliveries=Shipment::whereBetween('logistic_status',[14,18])->get();
        $successfull_deliveries=Shipment::whereBetween('logistic_status',[10,11])->get();
        return view('admin.reports.incentive-report',compact('returned_deliveries','successfull_deliveries'));
    }
}
