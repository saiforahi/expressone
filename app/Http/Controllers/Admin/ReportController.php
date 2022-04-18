<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\CourierShipment;
use App\Models\GeneralSettings;
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
            $statuses=LogisticStep::where('slug','to-pick-up')->orWhere('slug','picked-up')->orWhere('slug','dropped-at-pickup-unit')->orWhere('slug','unit-received')->orWhere('slug','delivery-confirmed')->pluck('id')->toArray();
            $shipment_with_movements = ShipmentMovement::whereIn('logistic_step_id',$statuses)->get(['shipment_id']);
            $shipments=Shipment::deliverycousins()->whereIn('shipments.logistic_status',$statuses)->select('shipments.*','locations.name as delivery_location_name','units.name as delivery_unit_name','units.id as unit_id')->get();
            
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
                if(isset($req->unit_id)){
                    $locations = Location::where('unit_id',$req->unit_id)->pluck('id')->toArray();
                    $shipments=$shipments->whereIn('pickup_location_id','=',$locations);
                }
                break;
            
        case 'delivery':
            $shipments=$this->delivery_shipments_report($req->all());
            if(isset($req->unit_id)){
                $locations = Location::where('unit_id',$req->unit_id)->pluck('id')->toArray();
                $shipments=$shipments->whereIn('delivery_location_id',$locations);
            }
            break;
        }
        
        if(isset($req->merchant_id)){
            $shipments=$shipments->where('merchant_id','=',$req->merchant_id);
        }
        if(isset($req->courier_id)){
            $courier_shipments_ids=CourierShipment::where('courier_id',$req->courier_id)->pluck('id')->toArray();
            $shipments=$shipments->whereIn('id',$courier_shipments_ids);
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
    public function unit_wise_payment_report($req){
        $units=array();
        $from=$req->from_date;
        $to=$req->to_date;
        foreach(Unit::all() as $unit){
            array_push($units,array('unit'=>$unit,'total_collected'=>unit_collected_cod_amount($unit->id,$from,$to),'total_paid'=>unit_paid_amount($unit->id,$from,$to)));
        }
        
        return $units;
    }
    public function shipment_wise_payment_report($req){
        $shipments =Shipment::all();
        if ($req->from_date && $req->to_date) {
            $shipments =  Shipment::whereBetween('created_at', [$req->from_date . " 00:00:00", $req->to_date . " 23:59:59"])->get();
        }
        // dd($merchants);
        return $shipments;
    }
    public function merchant_wise_payment_report($req){
        $merchants =array();
        foreach(User::all() as $user){
            $total_paid=0;
            $total_due=0;
            $total_shipments=Shipment::where('merchant_id','=',$user->id);
            if ($req->from_date && $req->to_date) {
                $total_shipments =  $total_shipments->whereBetween('created_at', [$req->from_date . " 00:00:00", $req->to_date . " 23:59:59"]);
            }
            foreach($total_shipments->get() as $shipment){
                $total_paid += $shipment->payment_detail->paid_amount;
                $amount_to_be_paid = $shipment->payment_detail->cod_amount - ($shipment->payment_detail->delivery_charge+$shipment->payment_detail->weight_charge);
                $total_due+= $amount_to_be_paid - $shipment->payment_detail->paid_amount;
            }
            array_push($merchants,array('user'=>$user,'total_paid'=>$total_paid,'total_due'=>$total_due,'total_shipments'=>$total_shipments->count()));
        }
        // dd($merchants);
        return $merchants;
    }
    public function show_payment_reports(Request $req){
        $title="";
        $units=$this->unit_wise_payment_report($req);
        $merchants=$this->merchant_wise_payment_report($req);
        $shipments=$this->shipment_wise_payment_report($req);
        // dd($unit_payments);
        $result=array();
        return view('admin.reports.payments-report',compact(['title','units','result','merchants','shipments']));
    }

    public function show_incentive_reports(Request $req){
        //success
        $successfull_result=array();
        foreach(Courier::all() as $courier){
            $courier_shipments=CourierShipment::where('type','delivery')->where('courier_id',$courier->id)->where('courier_shipment.status','delivered');
            if($req->from_date && $req->to_date){
                $courier_shipments=$courier_shipments->whereBetween('created_at', [$req->from_date . " 00:00:00", $req->to_date . " 23:59:59"]);
            }
            $total_delivered=$courier_shipments->join('shipment_payments','shipment_payments.shipment_id','courier_shipment.shipment_id')->count();
            $total_incentive=  $total_delivered * GeneralSettings::first()->incentive_val;
            array_push($successfull_result,array('courier'=>$courier,'total_delivered'=>$total_delivered,'total_incentive'=>$total_incentive));
        }
        //return
        $return_result=array();
        foreach(Courier::all() as $courier){
            $courier_shipments=CourierShipment::where('type','return')->where('courier_id',$courier->id)->where('courier_shipment.status','delivered');
            if($req->from_date && $req->to_date){
                $courier_shipments=$courier_shipments->whereBetween('created_at', [$req->from_date . " 00:00:00", $req->to_date . " 23:59:59"]);
            }
            $total_returned=$courier_shipments->join('shipment_payments','shipment_payments.shipment_id','courier_shipment.shipment_id')->count();
            $total_incentive=  $total_returned * GeneralSettings::first()->incentive_val;
            array_push($return_result,array('courier'=>$courier,'total_returned'=>$total_returned,'total_incentive'=>$total_incentive));
        }
        //result
        // dd($return_result);
        $results=array('successfull_result'=>$successfull_result,'return_result'=>$return_result);
        // dd($results);
        $returned_deliveries=Shipment::whereBetween('logistic_status',[14,18])->get();
        $successfull_deliveries=Shipment::whereBetween('logistic_status',[10,11])->get();
        return view('admin.reports.incentive-report',compact('returned_deliveries','successfull_deliveries','results'));
    }
}
