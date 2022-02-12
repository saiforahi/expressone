<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Unit;
use App\Driver_return_shipment_box;
use App\Models\LogisticStep;
use App\Driver_hub_shipment_box;
use App\Models\Courier;
use App\Driver_shipment_delivery;
use App\Return_shipment_box;
use App\Hold_shipment;
use App\Return_shipment;
use App\Models\User;
use App\Models\CourierShipment;
use Session; use Auth;
use App\Events\ShipmentMovementEvent;
use App\Models\ShipmentMovement;

class HoldShipmentController extends Controller
{
    public function index($type)
    {
        if($type=='hold'){
            return view('admin.shipment.hold.hold-shipments',compact('type'));
        }
        elseif($type=='return'){
            return view('admin.shipment.hold.return-shipments',compact('type'));
        }else{
            $hub_box = CourierShipment::where(['status'=>$type])->select('hub_shipment_box_id')
            ->groupBy('hub_shipment_box_id')->pluck('hub_shipment_box_id')->toArray();
            $hubInfo = Hub_shipment_box::whereIn('id',$hub_box)->get();

            if($hubInfo->count() !=0){
                foreach($hubInfo as $ship){ $hub_ids[] = $ship->hub_id;}
                $hubs = Hub::whereIn('id',$hub_ids)->get();
            } else $hubs = array();

            return view('admin.shipment.hold.shipments',compact('type','hubs'));
        }
    }
    function driver_hub_shipments($type){
        // $shipments = CourierShipment::where(['status'=>$type])->get();
        
        if($type=='hold'){
            $shipments = Shipment::where('logistic_status',LogisticStep::where('slug','on-hold')->first()->id)->deliverycousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->get(['shipments.*']);
            return view('admin.shipment.hold.include.driver_hub_shipments',compact('type','shipments'));
        }elseif($type=='return'){
            $shipments = Shipment::whereIn('logistic_status',LogisticStep::where('slug','returned-by-recipient-confirmed')->orWhere('slug','returned-by-recipient')->pluck('id')->toArray())->deliverycousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->get(['shipments.*']);
            $units = Shipment::where('logistic_status',LogisticStep::where('slug','returned-by-recipient-confirmed')->first()->id)->deliverycousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->select('units.id')->groupBy('units.id')->pluck('units.id')->toArray();
            // dd($units);
            $hubs = Unit::whereIn('id',$units)->get();
            return view('admin.shipment.hold.include.return-left',compact('type','shipments','hubs'));
        }

    }

    public function move_to_hold_shipment(Shipment $shipment, Unit $hub)
    {
        // dd(LogisticStep::where('slug','on-hold-at-unit')->first()->id);
        // $shipment->update(['logistic_status'=>LogisticStep::where('slug','on-hold-at-unit')->first()->id]);
        $shipment->logistic_status=LogisticStep::where('slug','on-hold-at-unit')->first()->id;
        $shipment->save();
        event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','on-hold-at-unit')->first(),Auth::guard('admin')->user()));
    }
    public function move_to_hold_shipmentWithInvoice($invoice_id)
    {
        $shipment = Shipment::where('invoice_id',$invoice_id)->first();
        $shipments=array();
        array_push($shipments,$shipment);
        $type='hold';
        return view('admin.shipment.hold.include.driver_hub_shipments',compact('type','shipments'));
    }
    public function move_to_hold_shipmentRider(Courier $driver)
    {
        // $courierShipment=CourierShipment::whe
        $courierShipments = CourierShipment::where(['courier_id'=>$driver->id,'type'=>'delivery','status'=>'hold'])->get();
        $shipments=array();
        foreach($courierShipments as $item){
            array_push($shipments,Shipment::find($item->shipment_id));
        }
        $type='hold';
        return view('admin.shipment.hold.include.driver_hub_shipments',compact('type','shipments'));
    }


    //ajax call
    function hold_shipment_rows($type){
        $shipments = Shipment::where('logistic_status',13)->deliverycousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->get(['shipments.*']);
        return view('admin.shipment.hold.include.hold_shipment_rows',compact('shipments','type'));
    }
    public function move_back2hold_shipment(Shipment $shipment,$type)
    {
        $shipment->logistic_status=LogisticStep::where('slug','on-hold')->first()->id;         
        $shipment->save();         
        event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','on-hold')->first(),Auth::guard('admin')->user()));
    }
    // hold Shipments into Agent dispatch or save sorting
    public function sendToSorting(){
        // dd('working');
        $shipments=Shipment::where('logistic_status',LogisticStep::where('slug','on-hold-at-unit')->first()->id)->deliverycousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->get(['shipments.*']);
        // dd($shipments);
        foreach($shipments as $shipment){
            $shipment->logistic_status=LogisticStep::where('slug','returned-sorted')->first()->id;
            $shipment->save();
            event(new ShipmentMovementEvent(Shipment::find($shipment->id),LogisticStep::where('slug','returned-sorted')->first(),Auth::guard('admin')->user()));
        }
        return back()->with('message','Parcels are been sorted and visble at Return segment');
    }



    // save shipment info at return_shipments (left to right)
    function move_to_return_shipment(Shipment $shipment,Unit $hub){
        $shipment->logistic_status=LogisticStep::where('slug','returned-sorted')->first()->id;
        $shipment->save();
        $this->return_shipment_rows('return');
    }
    // save shipment info at return_shipments (left to right) with invoiceID
    function move_to_return_shipment_withInvoice($invoice_id){
        $shipment = Shipment::where('invoice_id',$invoice_id)->first();
        $check = Return_shipment::where(['shipment_id'=>$shipment->id,'status'=>'assigning']);
        if($check->count() <1)
        {
            Return_shipment::create([
                'shipment_id'=>$shipment->id,
                'hub_id'=>$shipment->area->hub->id,
                'admin_id'=>Auth::guard('admin')->user()->id,
                'status'=>'assigning'
            ]);
            Driver_hub_shipment_box::where(['shipment_id'=>$shipment->id,'status'=>'return'])->update([
                'status_in'=>'assigning'
            ]);
        }
    }
    // save shipment info at return_shipments (left to right) with driver id
    function move_to_return_shipment_withRider(Courier $driver){
        $dds = Driver_shipment_delivery::where(['courier_id'=>$driver->id,'type'=>'return'])->get();
        foreach($dds as $dd){
            $shipment = Shipment::where('id',$dd->shipment_id)->first();
            $check = Return_shipment::where(['shipment_id'=>$shipment->id,'status'=>'pending']);
            if($check->count() <1)
            {
                Return_shipment::create([
                    'shipment_id'=>$shipment->id,'hub_id'=>$shipment->area->hub->id,
                    'admin_id'=>Auth::guard('admin')->user()->id,'status'=>'assigning'
                ]);
                Driver_hub_shipment_box::where('shipment_id',$shipment->id)->update([
                    'status_in'=>'assigning'
                ]);
            }
        }
    }
    //ajax call
    function return_shipment_rows($type){
        $hub = Shipment::where('logistic_status',LogisticStep::where('slug','returned-sorted')->first()->id)->cousins()->select('units.id')->groupBy('units.id')->pluck('units.id')->toArray();
        $hubs = Unit::whereIn('id',$hub)->get();
        return view('admin.shipment.hold.include.return-right',compact('type','hubs'));
    }
    function return_shipments_parcels(Unit $hub,$logistic_step_slug_array=array('returned-sorted')){
        $statuses=LogisticStep::whereIn('slug',$logistic_step_slug_array)->pluck('id')->toArray();
        $shipments = Unit::join('points','points.unit_id','units.id')->join('locations','locations.point_id','points.id')->join('shipments','shipments.pickup_location_id','locations.id')
            ->where('units.id',$hub->id)->whereIn('shipments.logistic_status',$statuses)->pluck('shipments.id')->toArray();
        $shipments=Shipment::whereIn('id',$shipments)->get();
        return view('admin.shipment.hold.include.return-parcels',compact('shipments'));
    }
    public function move_back2return_shipment(Shipment $return_shipment,$type)
    {
        // dd($return_shipment);
        // ShipmentMovement::where('shipment_id',$return_shipment->id)->whereIn('logistic_step_id',[9,15])->delete();
        Shipment::where(['id'=>$return_shipment->id])->update(['logistic_status'=>LogisticStep::where('slug','delivery-unit-received')->first()->id]);
        CourierShipment::where(['shipment_id'=>$return_shipment->id,'type'=>'delivery'])->delete();
        event(new ShipmentMovementEvent($return_shipment,LogisticStep::where('slug','delivery-unit-received')->first(),auth()->guard('admin')->user()));
    }
    function return_sorting(Unit $hub){
        $shipments=Shipment::where('logistic_status',LogisticStep::where('slug','returned-sorted')->first()->id)->deliverycousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->get(['shipments.*']);
        foreach($shipments as $item){
            $item->logistic_status=LogisticStep::where('slug','returned-in-transit')->first()->id;
            $item->save();
        }
        return 'Data has been sorted to return-dispatch!';
    }

    function return_dispatch(){
        if(Auth::guard('admin')->user()->hasRole('super-admin')){
            $shipment = Return_shipment_box::where('status','dispatch')
            ->orWhere('status','on-transit')
            ->select('hub_id')->groupBy('hub_id')->pluck('hub_id')->toArray();
        }else{
            // dd(Session::get('admin_hub')->hub_id);
            
            $shipment = Shipment::where('logistic_status',LogisticStep::where('slug','returned-in-transit')->first()->id)->cousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->select('units.id')->groupBy('units.id')->pluck('units.id')->toArray();
        }
        $hubs = Unit::whereIn('id',$shipment)->get();

        return view('admin.shipment.hold.return-dispatch',compact('hubs'));
    }

    function dispatch_view(Unit $hub){
        return view('admin.shipment.hold.dispatch-view',compact('hub'));
    }
    function status_dispatch(Unit $hub){
        $shipments = Shipment::where('logistic_status',LogisticStep::where('slug','returned-in-transit')->first()->id)->get();
        return view('admin.shipment.hold.include.status-dispatch',compact('shipments','hub'));
    }

    function status_on_transit(Hub $hub){
        $boxes = Return_shipment_box::where(['hub_id'=>$hub->id,'status'=>'on-transit'])->get();
        return view('admin.shipment.hold.include.status-on-transit',compact('boxes','hub'));
    }

    //ajax, change status to transit
    function box_status_changes(Return_shipment_box $return_shipment_box,$status){
        $check = Return_shipment_box::where(['id'=>$return_shipment_box->id,'status'=>$status]);
        // dd($status);
        if($check->count() <1){
            $return_shipment_box->update(['status'=>$status]);
        }

    }

    function box_status_changes_bulk_id($bulk_id,$status){
        $check =Return_shipment_box::where(['bulk_id'=>$bulk_id,'status'=>$status])->get();
        if($check->count() ==0){
            Return_shipment_box::where('bulk_id',$bulk_id)->update(['status'=>$status]);
        }

    }

    function box_sorting(Hub $hub){
        $boxes = Return_shipment_box::where('hub_id',$hub->id)->get();
        foreach ($boxes as $key => $box) {
            foreach (explode(',',$box->shipment_ids) as $key => $shipment_id) {
                event(new ShipmentMovement($shipment_id, 'admin', Auth::guard('admin')->user()->id,'admin-return-transit','transit the return-shipment','return-transit'));
            }
        }
        Return_shipment_box::where(['hub_id'=>$hub->id,'status'=>'on-transit'])->update(['status'=>'transit']);

       return back();
    }

    function receive_from_hub(){
        // dd(Session::get('admin_hub')->hub_id);
        if(Session::has('admin_hub')){
            $boxes = Return_shipment_box::where(['hub_id'=>Session::get('admin_hub')->hub_id])->get();
        }else{
            $boxes = Return_shipment_box::orderBy('id')->get();
        }
        return view('admin.shipment.hold.receove-from-hub',compact('boxes'));
    }

    // agent dispatch center view
    function agent_dispatch(){
        return view('admin.shipment.hold.agent-dispatch');
    }

    //Return_shipment_box shipments
    function dispatch_box_view(Return_shipment_box $return_shipment_box){
        $shipments = Shipment::whereIn('id',explode(',',$return_shipment_box->shipment_ids))->get();
        return view('admin.shipment.load.dispatch.bulk-items',compact('return_shipment_box','shipments'));
    }
    
    function agent_dispatch_agentSide(){
        if(Session::has('admin_hub')){
            $hub = Hub::where('id',Session::get('admin_hub')->hub_id)->first();
        }else $hub = null;

        if($hub ==null){
            $boxes = Return_shipment_box::where(['status'=>'transit'])->get();
        }else{
            $boxes = Return_shipment_box::where(['hub_id'=>$hub->id,'status'=>'transit'])->get();
        }
        // dd($boxes);
        return view('admin.shipment.hold.agent.agent-side',compact('boxes'));
    }
     //ajax call
    function agentDispatch2DriverAssign(Return_shipment_box $return_shipment_box, Shipment $shipment){
        // dd($return_shipment_box);
        $check = Driver_return_shipment_box::where('shipment_id',$shipment->id);
        if($check->count() <1){
            Driver_return_shipment_box::create( [
                'return_shipment_box_id'=>$return_shipment_box->id,
                'shipment_id'=>$shipment->id,
                'admin_id'=>Auth::guard('admin')->user()->id,
                'status'=>'on-delivery','status_in'=>'assigning',
            ]);
            // event(new ShipmentMovement($shipment->id, 'admin',Auth::guard('admin')->user()->id,'assigned-driver-for-return-delivery','parcel hand over to Rider for return-delivery','assign-driver-for-return-delivery'));
        }
    }

    function agent_dispatch_driverSide(){
        if(Session::has('admin_hub')){
            $hub = Hub::where('id',Session::get('admin_hub')->hub_id)->first();
        }else $hub = null;

        if($hub ==null){
            $boxes = Return_shipment_box::where(['status'=>'transit'])->get();
        }else{
            $boxes = Return_shipment_box::where(['hub_id'=>$hub->id,'status'=>'transit'])->get();
        }
        $drivers = Courier::orderBy('first_name')->get();
        // dd($drivers);
        return view('admin.shipment.hold.agent.driver-side',compact('drivers','boxes'));
    }
    //ajax call
    function driverAssign2Agent_dispatch(Return_shipment_box $return_shipment_box, Shipment $shipment){
        Driver_return_shipment_box::where([
            'return_shipment_box_id'=>$return_shipment_box->id,
            'shipment_id'=>$shipment->id,
            'status_in'=>'assigning'
        ])->delete();
    }

    function agent_dispatchAssigning(Request $request){
        // dd($request->all());
        $box_ids = Driver_return_shipment_box::where([
            'admin_id'=>Auth::guard('admin')->user()->id,'status_in'=>'assigning'
        ])->select('return_shipment_box_id','shipment_id')->distinct()->get();
        Session::put('box_ids',$box_ids);

        $count = 0;
        foreach (Session::get('box_ids') as $key => $box) {
            $shipment = Shipment::where('id',$box->shipment_id)->first();
            // Test if string contains the word
            if(strpos($shipment->shipping_status, "on-") !== false){
                return 'OPT not confirmed by the Rider! Please confirm OTP first from Rider!!';
            }
        }

        Driver_return_shipment_box::where([
            'admin_id'=>Auth::guard('admin')->user()->id,'status_in'=>'assigning'
        ])->update( [
            'courier_id'=>$request->courier_id,'status_in'=>'assigned'
        ]);

        // dd(Session::get('box_ids'));

        $count = 0;
        foreach (Session::get('box_ids') as $key => $box) {
            $query = Return_shipment_box::where('id',$box->return_shipment_box_id)->first();
            foreach (explode(',',$query->shipment_ids) as $shipment_id) {
               $count += Driver_return_shipment_box::where(['return_shipment_box_id'=>$box->return_shipment_box_id,'shipment_id'=>$shipment_id])->count();
            }
            if($count==COUNT(explode(',',$query->shipment_ids))){
                Return_shipment_box::where('id',$box->return_shipment_box_id)->update([
                    'status'=>'return-delivery'
                ]);
            }
            Shipment::where('id',$box->shipment_id)->update(['shipping_status'=>'9']);
        }
        Session::forget('box_ids');
        return back();
    }


    function return2return_delivery(Request $request, $type,$hub_shipmentBoxID){
        $hub_box = Driver_hub_shipment_box::where(['status'=>$type,'hub_shipment_box_id'=>$hub_shipmentBoxID])->get();
        // dd($hub_box);
        foreach($hub_box as $hb){
            event(new ShipmentMovement($hb->shipment_id, 'admin',Auth::guard('admin')->user()->id,'return-to-return-delivery','parcel return for return-delivery','return-to-return-delivery'));
            Driver_hub_shipment_box::where('id',$hb->id)->update(['status'=>'return']);
        }
    }


    function merchant_handover(){
        $statuses=LogisticStep::where('slug','returned-in-transit')->orWhere('slug','returned-received')->orWhere('slug','returned-handover-to-merchant')->orWhere('slug','courier-assigned-to-return')->orWhere('slug','returned-handover-to-merchan')->orWhere('slug','received-shipment-back')->pluck('id')->toArray();
        $merchants = Shipment::whereIn('logistic_status',$statuses)->cousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->select('shipments.merchant_id')
        ->groupBy('shipments.merchant_id')->pluck('shipments.merchant_id')->toArray();
        $users = User::whereIn('id',$merchants)->get();

        $shipments=Shipment::whereIn('logistic_status',$statuses)->cousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->get(['shipments.*']);
        // dd($user);
        return view('admin.shipment.hold.merchant-handover-new',compact('users','shipments'));
    }
    public function receive_return_shipment_by_pickup_unit(Shipment $shipment){
        try{
            $shipment->logistic_status=LogisticStep::where('slug','returned-received')->first()->id;
            $shipment->save();
            event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','returned-received')->first(),Auth::guard('admin')->user()));
            return back();
        }
        catch(Exception $e){
            throw $e;
        }
    }
    function merchant_handover_parcels(User $user){
        return view('admin.shipment.hold.merchant-handover');
    }

    function handover2merchant(Shipment $shipment){
        try{
            $shipment->logistic_status=LogisticStep::where('slug','returned-handover-to-merchant')->first()->id;
            $shipment->save();
            event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','returned-handover-to-merchant')->first(),Auth::guard('admin')->user()));
            return back()->with('message','Parcels are handover to merchant successfully!!');
        }
        catch(Exception $e){
            throw $e;
        }
        
    }

}
