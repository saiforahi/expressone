<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\LogisticStep;
use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\ShipmentMovement;
use App\Models\Unit;
use App\Models\User;
use Exception;

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
    public function pickup_shipments_report(){
        try{
            $statuses=LogisticStep::where('slug','to-pick-up')->orWhere('slug','picked-up')->orWhere('slug','dropped-at-pickup-unit')->orWhere('slug','unit-received')->pluck('id')->toArray();
            $shipment_with_movements = ShipmentMovement::whereIn('logistic_step_id',$statuses)->get(['shipment_id']);
            $shipments=Shipment::whereIn('logistic_status',$statuses)->get();
            // foreach($shipment_with_movements as $item){
            //     array_push($shipments,Shipment::find($item['shipment_id']));
            // }
            return $shipments;
        }
        catch(Exception $e){

        }
    }
    public function delivery_shipments_report(){
        try{
            $statuses=LogisticStep::where('slug','to-pick-up')->orWhere('slug','picked-up')->orWhere('slug','dropped-at-pickup-unit')->orWhere('slug','unit-received')->pluck('id')->toArray();
            $shipment_with_movements = ShipmentMovement::whereIn('logistic_step_id',$statuses)->get(['shipment_id']);
            $shipments=Shipment::whereBetween('logistic_status',[7,10])->get();
            // foreach($shipment_with_movements as $item){
            //     array_push($shipments,Shipment::find($item['shipment_id']));
            // }
            return $shipments;
        }
        catch(Exception $e){

        }
    }
    public function show_shipment_reports($type){
        $shipments=array();
        switch($type){
            case 'pickup':
                $shipments=$this->pickup_shipments_report();
                break;
            
        case 'delivery':
            $shipments=$this->delivery_shipments_report();
            break;
        }
        $title="";
        $result=$shipments;
        $locations=Location::all();
        $units=Unit::all();
        $users=User::all();
        return view('admin.reports.shipments-report',compact(['type','title','result','locations','units','users']));
    }

    public function show_payment_reports(){
        $title="";
        $result=array();
        $type="";
        return view('admin.reports.payments-report',compact(['type','title','result']));
    }
}
