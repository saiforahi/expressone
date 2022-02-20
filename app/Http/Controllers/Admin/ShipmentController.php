<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\MerchantPayment;
use App\Models\Area;
use App\Models\User;
use App\Models\Courier;
use App\Models\Shipment;
use App\Models\Hub_shipment;
use App\Models\LogisticStep;
use Illuminate\Http\Request;
use App\Models\ShippingPrice;
use App\Models\CourierShipment;
use App\Models\ShipmentPayment;
use App\Models\ShipmentMovement;
use App\Events\ShipmentMovementEvent;
use App\Models\Hub_shipment_box;
use App\Models\Events\SendingSMS;
use App\Models\Reconcile_shipment;
use Illuminate\Support\Facades\DB;
use App\Models\Thirdparty_shipment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Driver_hub_shipment_box;
use Illuminate\Support\Facades\Session;
use App\Models\CourierShipment_delivery;
use App\Models\Driver_return_shipment_box;
use App\Models\Location;
use App\Models\Unit;
use App\Models\UnitShipment;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class ShipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin', 'role:super-admin|unit-admin'])->except([]);
        // $this->middleware('role:super-admin|unit-admin')->except([]);
    }
    public function index()
    {
        $merchants = array();
        if (!Auth::guard('admin')->user()->hasRole('super-admin')) {
            $shipments_belongs_to_my_units = DB::table('units')->where('admin_id', Auth::guard('admin')->user()->id)
            ->join('points', 'points.unit_id', 'units.id')
            ->join('locations', 'points.id', 'locations.point_id')
            ->join('shipments', 'locations.id', 'shipments.pickup_location_id')
            ->whereBetween('shipments.logistic_status', [1,3])
            ->select('shipments.*', 'locations.name as location_name', 'units.name as unit_name')->get();
            // dd($shipments_belongs_to_my_units);
            // return $shipments_belongs_to_my_units;
            $merchants = $shipments_belongs_to_my_units->pluck('merchant_id')->toArray();
        } else {
            $merchants = Shipment::whereBetween('logistic_status', [1,3])->select('merchant_id')->groupBy('merchant_id')->pluck('merchant_id')->toArray();
        }

        $users = User::whereIn('id', array_unique($merchants))->get();
        return view('admin.shipment.shipment-list', compact('users'));
    }
    public function set_delivery_location(Shipment $shipment, Location $location){
        try{
            $shipment->delivery_location_id = $location->id;
            $shipment->save();
            
        }
        catch(Exception $e){

        }
    }
    public function all_shipments(Request $request)
    {
        if(Auth::guard('admin')->user()->hasRole('super-admin')){
            $shipments = Auth::guard('admin')->user()->my_shipments();
        }
        else{
            $shipments = Shipment::cousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->get(['shipments.*']);
        }
        
        // dd($shipments);
        return view('admin.shipment.all-shipments', compact('shipments'));
    }
    function new_shipment_detail(Shipment $shipment)
    {
        $total_price=$price = $shipment->amount;
        return view('admin.shipment.includes.shipment-view', compact('shipment', 'price', 'total_price'));
    }
    function shipment_detail(Shipment $shipment)
    {
        $zone = Area::find($shipment->area_id);
        $shipping = ShippingPrice::where('zone_id', $zone->zone_id)->where('delivery_type', $shipment->delivery_type)->first();
        if ($shipping == null) {
            dd('ShippingPrice missing');
        }

        $weight = (float) $shipment->weight;
        if ($weight > $shipping->max_weight) {
            $ExtraWeight = ($weight - $shipping->max_weight) / $shipping->per_weight;
            if ((int) $ExtraWeight < $ExtraWeight) {
                $ExtraWeight = (int) $ExtraWeight + 1;
            }
            $price = ($ExtraWeight * $shipping->price) + $shipping->max_price;
        } else {
            $price = (int) $shipping->max_price;
        }
        $total_price = $price + (int) $shipment->parcel_value;

        return view('admin.shipment.includes.shipment-view', compact('shipment', 'price', 'total_price', 'shipping'));
    }

    function shipment_print(Shipment $shipment)
    {
        // $zone = Area::find($shipment->area_id);
        $shipping = '';
        $total_price = $price = (int) $shipment->cod_amount;

        return view('admin.shipment.includes.pos_printing', compact('shipment', 'price', 'total_price', 'shipping'));
    }


    public function shipment_received()
    {
        try{
            $date = \Carbon\Carbon::today()->subDays(7);
            $statuses=LogisticStep::where('slug','picked-up')->orWhere('slug','dropped-at-pickup-unit')->orWhere('slug','unit-received')->pluck('id')->toArray();
            $shipment = Shipment::cousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->whereIn('shipments.logistic_status',$statuses)->select('shipments.merchant_id')->groupBy('shipments..merchant_id')->pluck('shipments.merchant_id')->toArray();
            $users = User::where('unit_id', '!=', null)->whereIn('id', $shipment)->get();
            return view('admin.shipment.shipment-receive', compact('users'));
        }
        catch(Exception $e){
            throw $e;
        }
        
    }

    function shipment_cancelled()
    {
        $shipment = Shipment::where(['status' => 'cancelled'])->select('merchant_id')->groupBy('merchant_id')->pluck('merchant_id')->toArray();
        $user = User::whereIn('id', $shipment)->get();
        return view('admin.shipment.shipment-list', compact('user'));
    }

    public function show($id, $status, $logistic_statuses)
    {
        $statuses=array('0'=>null,'1'=>'delivered','2'=>'returned','3'=>'cancelled');
        $shipments=[];
        if(auth()->guard('admin')->user()->hasRole('super-admin')){
            $shipments = Shipment::cousins()->where(['shipments.merchant_id'=> $id,'shipments.status'=>$statuses[$status]])->whereIn('logistic_steps.slug' , array_values(explode(",",$logistic_statuses)))->get(['shipments.*']);
        }
        else{
            $shipments = Shipment::cousins()->where(['shipments.merchant_id'=> $id,'shipments.status'=>$statuses[$status],'units.admin_id'=>Auth::guard('admin')->user()->id])->whereIn('logistic_steps.slug' , array_values(explode(",",$logistic_statuses)))->get(['shipments.*']);
        }
        
        //dd($shipments);
        $user = User::find($id);
        $drivers = Courier::orderBy('id', 'desc')->get();
        return view('admin.shipment.shipment-more', compact('shipments', 'drivers', 'user','status','logistic_statuses'));
    }
    public function addParcelForm()
    {
        $data['title'] = "Add Parcel";
        return view('admin.shipment.addParcel', $data);
    }
    public function adminSaveParcel(Request $request)
    {
        try {
            $shipment = new Shipment();
            $data = $request->only('name', 'phone', 'address');
            $shipment->recipient = $data;
            $shipment->tracking_code = uniqid();
            $shipment->invoice_id = rand(1000, 100000);
            $shipment->shipping_charge_id = $request->shipping_charge_id;
            $shipment->pickup_location_id = $request->pickup_location_id;
            $shipment->weight = $request->weight;
            $shipment->amount = $request->amount;
            $shipment->note = $request->note;
            //$shipment->merchant_id = Auth::guard('admin')->user()->id;
            $shipment->added_by()->associate(Auth::guard('admin')->user());
            $shipment->logistic_status = LogisticStep::first()->id;
            $shipment->save();
            //Make shipment Payment
            if ($shipment->save()) {
                $shipmentPmnt =  new ShipmentPayment();
                //dd($shipmentPmnt);
                $shipmentPmnt->shipment_id = $shipment->id;
                $shipmentPmnt->sl_no  = rand(1, 100000);
                $shipmentPmnt->tracking_code  = uniqid();
                $shipmentPmnt->invoice_no  = rand(2222, 222222);
                // $shipmentPmnt->admin_id  = Auth::guard('user')->user()->id;
                $shipmentPmnt->cod_amount  = $shipment->amount;
                $shipmentPmnt->delivery_charge  = $shipment->shipping_charge_id;
                $shipmentPmnt->save();
            }
            return redirect()->route('merchant.list')->with('message', 'New parcel has been saved successfully!!');
        } catch (\Throwable $th) {
            throw $th;
            return back()->with('error', 'Parcel not saved!!'.$th);
        }

    }
    // add a parcel under a merchant
    public function add_parcel(Request $request)
    {

        // $total_price = 0;
        // $cod_type = 0;
        // $cod_amount = 0;
        $checkInvoice = Shipment::where('invoice_id', $request->invoice_id)->count();
        if ($checkInvoice > 0 && $checkInvoice != null) {
            $invoice_id = $request->invoice_id . rand(1000, 100000);
        } else $invoice_id = $request->invoice_id;
        // $data = [
        //     'merchant_id' => $request->merchant_id,
        //     'unit_id' => $request->unit_id,
        //     'name' => $request->name,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'zip_code' => $request->zip_code,
        //     'parcel_value' => $request->parcel_value,
        //     'invoice_id' => $invoice_id,
        //     'merchant_note' => $request->merchant_note,
        //     'weight' => $request->weight,
        //     'delivery_type' => $request->delivery_type,
        //     'tracking_code' => rand(),
        //     'cod' => $cod_type,
        //     'cod_amount' => $cod_amount,
        //     'price' => 0,
        //     'total_price' => $total_price,
        //     'shipping_status' => 2
        // ];
        // $shipment = Shipment::create($data);
        $shipment = new Shipment();
        $data = $request->only('name', 'phone', 'address');
        $shipment->recipient = $data;
        $shipment->tracking_code = $request->tracking_code;
        $shipment->invoice_id = $invoice_id;
        $shipment->shipping_charge_id = $request->shipping_charge_id;
        $shipment->pickup_location_id = $request->pickup_location_id;
        $shipment->weight = $request->weight;
        $shipment->amount = $request->amount;
        $shipment->note = $request->note;
        $shipment->merchant_id = Auth::guard('admin')->user()->id;
        $shipment->added_by()->associate(Auth::guard('admin')->user());
        $shipment->logistic_status = LogisticStep::first()->id;
        $shipment->save();

        // if ($request->status != '0') {
        //     if ($request->status == '1') $status = 'pending';

        //     if ($request->status == '2') $status = 'received';
        //     CourierShipment::create([
        //         'courier_id' => $request->courier_id,
        //         'shipment_id' => $shipment->id,
        //         'admin_id' => Auth::guard('admin')->user()->id,
        //         'status' => $status
        //     ]);
        // }
        return back()->with('message', 'New parcel has been created successfully!!');
    }
    public function set_delivery_charge(Request $req){
        try{
            // dd(ShipmentPayment::where('shipment_id',$req->shipment_id)->first());
            ShipmentPayment::where('shipment_id',$req->shipment_id)->update(['delivery_charge'=>$req->delivery_charge]);
            return back()->with('message', 'Shipment delivery charge updated');
        }
        catch(Exception $e){
            throw $e;
        }
    }
    public function save_courier_shipment($id, Request $request)
    {
        if (is_numeric($request->shipment_id)) {
            $check = CourierShipment::where(['courier_id' => $request->courier_id, 'shipment_id' => $request->shipment_id,'type'=>'pickup'])->count();
            if ($check > 0) {
                Session::flash('message', 'Data already exist!!');
                return back();
            }
            CourierShipment::create([
                'courier_id' => $request->courier_id, 'shipment_id' => $request->shipment_id,
                'admin_id' => Auth::guard('admin')->user()->id, 'note' => $request->note,'type'=>'pickup'
            ]);
            Shipment::where('id', $request->shipment_id)->where('logistic_status','<=',LogisticStep::where('slug','to-pick-up')->first()->previous)->update(['logistic_status' => LogisticStep::where('slug','to-pick-up')->first()->id]);
            event(new ShipmentMovementEvent(Shipment::find($request->shipment_id), LogisticStep::where('slug','to-pick-up')->first(),Auth::guard('admin')->user()));
        } else {
            foreach (explode(',', $request->shipment_id) as $key => $id) {
                $check = CourierShipment::where(['courier_id' => $request->courier_id, 'shipment_id' => $id])->count();
                if ($check < 1) {
                    CourierShipment::create([
                        'courier_id' => $request->courier_id, 'shipment_id' => $id,
                        'admin_id' => Auth::guard('admin')->user()->id, 'note' => $request->note,'type'=>'pickup'
                    ]);
                    Shipment::where('id', $id)->where('logistic_status','<=',3)->update(['logistic_status' => LogisticStep::where('slug','to-pick-up')->first()->id]);
                    event(new ShipmentMovementEvent(Shipment::find($id), LogisticStep::where('slug','to-pick-up')->first(),Auth::guard('admin')->user()));
                }
            }
        }
        Session::flash('message', 'Courier is assigned to pickup shipment');
        return back();
    }
    public function save_courier_shipment_for_return(Request $request)
    {
        // dd($request->all());
        
        if ($request->shipment_id) {
            $check = CourierShipment::where(['courier_id' => $request->courier_id, 'shipment_id' => $request->shipment_id,'type'=>'return'])->count();
            if ($check > 0) {
                Session::flash('message', 'Data already exist!!');
                return back();
            }
            CourierShipment::create([
                'courier_id' => $request->courier_id, 'shipment_id' => $request->shipment_id,
                'admin_id' => Auth::guard('admin')->user()->id, 'note' => $request->note,'type'=>'return'
            ]);
            //dd('ok');
            Shipment::where('id', $request->shipment_id)->update(['logistic_status' => LogisticStep::where('slug','courier-assigned-to-return')->first()->id]);
            event(new ShipmentMovementEvent(Shipment::find($request->shipment_id), LogisticStep::where('slug','courier-assigned-to-return')->first(),Auth::guard('admin')->user()));
        } else {
            
        }
        Session::flash('message', 'Courier is assigned for return delivery');
        return back();
    }
    public function save_courier_shipment_for_delivery(Request $request)
    {
        // dd($request->all());
        
        if (is_numeric($request->shipment_id)) {
            $check = CourierShipment::where(['courier_id' => $request->courier_id, 'shipment_id' => $request->shipment_id,'type'=>'delivery'])->count();
            if ($check > 0) {
                Session::flash('message', 'Data already exist!!');
                return back();
            }
            CourierShipment::create([
                'courier_id' => $request->courier_id, 'shipment_id' => $request->shipment_id,
                'admin_id' => Auth::guard('admin')->user()->id, 'note' => $request->note,'type'=>'delivery'
            ]);
            //dd('ok');
            Shipment::where('id', $request->shipment_id)->where('logistic_status','<=',8)->update(['logistic_status' => LogisticStep::where('slug','to-delivery')->first()->id]);
            event(new ShipmentMovementEvent(Shipment::find($request->shipment_id), LogisticStep::where('slug','to-delivery')->first(),Auth::guard('admin')->user()));
        } else {
            // dd(explode(',', $request->shipment_id));
            foreach (explode(',', $request->shipment_id) as $key => $id) {
                $check = CourierShipment::where(['courier_id' => $request->courier_id, 'shipment_id' => $id])->count();
                if ($check < 1) {
                    CourierShipment::create([
                        'courier_id' => $request->courier_id, 'shipment_id' => $id,
                        'admin_id' => Auth::guard('admin')->user()->id, 'note' => $request->note,'type'=>'delivery'
                    ]);
                    Shipment::where('id', $id)->where('logistic_status','<=',3)->update(['logistic_status' => LogisticStep::where('slug','to-delivery')->first()->id]);
                    event(new ShipmentMovementEvent(Shipment::find($id), LogisticStep::where('slug','to-delivery')->first(),Auth::guard('admin')->user()));
                }
            }
        }
        Session::flash('message', 'Shipments are handover to Courier');
        return back();
    }

    public function cencelled_shippings($merchant_id)
    {
        $shipments = Shipment::where('merchant_id', $merchant_id)->where(['logistic_status' => LogisticStep::where('slug','cancelled')->first()->id])->get();
        $user = User::find($merchant_id);
        $drivers = Courier::orderBy('first_name')->get();
        return view('admin.shipment.cencelled-shipments', compact('shipments', 'drivers', 'user'));
    }

    function back2shipment($id)
    {
        Shipment::where('id', $id)->update(['logistic_status' => LogisticStep::where('slug','approval')->first()->id]);
        event(new ShipmentMovementEvent(Shipment::find($id), LogisticStep::where('slug','approval')->first(),Auth::guard('admin')->user()));
        Session::flash('message', 'Shipment has been backed successfully!');
        return back();
    }
    //delete a parcel
    public function destroy($id)
    {
        Shipment::where('id', $id)->delete();
        CourierShipment::where('shipment_id',$id)->delete();
        ShipmentPayment::where('shipment_id',$id)->delete();
        Session::flash('message', 'Shipment has been removed successfully!');
        return back();
    }

    public function cencel($id, Request $request)
    {
        Shipment::where('id', $id)->update(['logistic_status' => LogisticStep::where('slug','cancelled')->first()->id]);
        event(new ShipmentMovementEvent(Shipment::find($id),LogisticStep::where('slug','cancelled')->first(),Auth::guard('admin')->user()));
        ShipmentMovement::where(['shipment_id'=>$id,'logistic_step_id'=>LogisticStep::where('slug','cancelled')->first()->id])->update(['note'=>$request->note]);
        Session::flash('message', 'Shipment has been Cancelled successfully!');
        return back();
    }

    function unit_received_and_receivable($id, $status, $logistic_status)
    {
        $user = User::find($id);
        $units = Shipment::whereBetween('logistic_status',[4,6])->deliverycousins()->join('unit_shipment','unit_shipment.shipment_id','shipments.id')->pluck('units.id')->toArray();
        $units = Unit::whereIn('id', array_unique($units))->get();
        return view('admin.shipment.assign-to-unit', compact('units', 'user', 'id', 'status', 'logistic_status'));
    }

    function receiving_parcels($id, $status = 1, $logistic_status = 4)
    {
        // $date = \Carbon\Carbon::today()->subDays(7);
        // $shipments = Shipment::where('merchant_id', $id)
        //     ->where(['status' => $status, 'logistic_status' => $logistic_status])
        //     ->where('time_starts', '>=', $date)->get();
        // dd(Shipment::whereIn('logistic_status',explode(",",$logistic_status))->get());
        $shipments= Shipment::where('logistic_status',5)->cousins()->where(['units.admin_id'=>Auth::guard('admin')->user()->id,'shipments.merchant_id'=>$id])->get(['shipments.*']);
        
        $locations = Location::orderBy('name')->get();
        return view('admin.shipment.load.receiving-parcels', compact('shipments', 'locations', 'id', 'status', 'logistic_status'));
    }

    //ajax call form assign-to-hub route
    function MoveToHub(Request $request)
    {
        // dd($request->all());
        $check = Hub_shipment::where(['shipment_id' => $request->shipment_id, 'status' => 'on-dispatch']);
        $merchant_id = $request->merchant_id;
        if ($check->count() < 1) {
            Hub_shipment::create([
                'merchant_id' => $request->merchant_id, 'shipment_id' => $request->shipment_id, 'hub_id' => $request->hub_id, 'admin_id' => Auth::guard('admin')->user()->id,
            ]);
        }
        Shipment::where('id', $request->shipment_id)->update([
            'area_id' => $request->area_id, 'weight' => $request->weight
        ]);

        $shipment = Hub_shipment::where(['merchant_id' => $request->merchant_id, 'status' => 'on-dispatch'])->select('hub_id')->groupBy('hub_id')->pluck('hub_id')->toArray();
        $hubs = Hub::whereIn('id', $shipment)->get();
        return view('admin.shipment.load.hub-shipments', compact('hubs', 'merchant_id'));
    }
    function MoveToHubNew(Request $request)
    {
        // dd($request->all());
        $merchant_id=$request->merchant_id;
        UnitShipment::create([
            'shipment_id'=>$request->shipment_id,
            'unit_id'=>Shipment::find($request->shipment_id)->pickup_location->point->unit->id,
        ]);
        Shipment::where('id',$request->shipment_id)->update(['logistic_status'=>6,'delivery_location_id'=>$request->delivery_location_id]);
        event(new ShipmentMovementEvent(Shipment::find($request->shipment_id),LogisticStep::find(6),Auth::guard('admin')->user()));
        $units = Shipment::cousins()->join('unit_shipment','unit_shipment.shipment_id','shipments.id')->pluck('units.id')->toArray();
        $units = Unit::whereIn('id', array_unique($units))->get();
        return view('admin.shipment.load.unit-shipments', compact('units', 'merchant_id'));
    }
    //unit-received shipment view
    function external_unit_received_shipment_view(Shipment $shipment){
        // $shipments = Shipment::whereIn('id',explode(',',$return_shipment_box->shipment_ids))->get();
        return view('admin.shipment.load.dispatch.bulk-items',compact('shipment'));
    }

    // show hub_parcel data
    function hub_parcels($unit, $merchant_id, $status = 'on-dispatch')
    {
        $id = Unit::find($unit)->id;
        // dd($unit);
        $shipments= Shipment::deliverycousins()->where(['shipments.logistic_status'=>LogisticStep::where('slug','unit-received')->first()->id,'shipments.merchant_id'=>$merchant_id])
        ->where(['units.id'=>$id])->get(['shipments.*','units.id as unit_id']);
        // dd($shipments);
        return view('admin.shipment.load.hub-parcels', compact('shipments', 'id'));
    }

    function hub_parcels_csv(Unit $hub, $merchant_id, $status = 'on-dispatch')
    {
        $shipments = Shipment::where(['merchant_id'=>$merchant_id,'logistic_status'=>LogisticStep::where('slug','unit-received')->first()->id])->cousins()->where('units.id',$hub->id)->where('units.admin_id',Auth::guard('admin')->user()->id)->get();
        foreach ($shipments as $key => $shipment) {
            $rows[] =  [$shipment->invoice_id, $shipment->recipient['name'], $shipment->recipient['phone'], $shipment->recipient['address'], '', $shipment->amount, $shipment->weight, ''];
        }
        $columnNames = ['Invoice', 'Customer Name', 'Contact No.', 'Customer Address', 'Post Code', 'COD Amount', 'Weight', 'Product Selling Price'];
        return self::getCsv($columnNames, $rows, date('d/m/Y h i s') . '.csv');
    }

    function hub_parcels_csv_old(Unit $hub, $merchant_id, $status = 'on-dispatch')
    {
        $shipment = Hub_shipment::where(['hub_id' => $hub->id, 'merchant_id' => $merchant_id, 'status' => $status])->select('shipment_id')->groupBy('shipment_id')->pluck('shipment_id')->toArray();;
        $shipments = Shipment::whereIn('id', $shipment)->get();
        // dd($shipments);
        Shipment::where('status', 1)->select('merchant_id')->groupBy('merchant_id')->pluck('merchant_id')->toArray();
        foreach ($shipments as $key => $shipment) {
            $rows[] =  [$shipment->invoice_id, $shipment->name, $shipment->phone, $shipment->address, $shipment->zip_code, $shipment->cod_amount, $shipment->weight, ''];
        }
        $columnNames = ['Invoice', 'Customer Name', 'Contact No.', 'Customer Address', 'Post Code', 'COD Amount', 'Weight', 'Product Selling Price'];
        return self::getCsv($columnNames, $rows, date('d/m/Y h i s') . '.csv');
    }

    // remove an item from hub_shipment table
    function remove_hub_parcel($shipment)
    {
        try{
            UnitShipment::where('shipment_id',$shipment)->delete();
            Shipment::where('id', $shipment)->update(['logistic_status' => LogisticStep::where('slug','dropped-at-pickup-unit')->first()->id]);
            ShipmentMovement::where(['shipment_id'=>$shipment,'logistic_step_id'=>LogisticStep::where('slug','dropped-at-pickup-unit')->first()->id])->delete();
            event(new ShipmentMovementEvent(Shipment::find($shipment),LogisticStep::where('slug','dropped-at-pickup-unit')->first(),Auth::guard('admin')->user()));
        }
        catch(Exception $e){
            throw $e;
        }
    }

    function change_hub($area_id)
    {
        // $hub_id =  Area::find($area_id)->hub_id;
        // return Hub::find($hub_id);
    }
    public function unit_sorting(Unit $unit){
        $shipments = Shipment::where('logistic_status',6)->cousins()->where('admins.id',Auth::guard('admin')->user()->id)->get(['shipments.*']);
        foreach($shipments as $shipment){
            // Shipment::where('id',$shipment['id'])->update(['logistic_status'=>7]);
            if($shipment->pickup_location->point->unit->id == $shipment->delivery_location->point->unit->id){
                Shipment::where('id',$shipment['id'])->update(['logistic_status'=>8]);
            }
            else{
                Shipment::where('id',$shipment['id'])->update(['logistic_status'=>7]);
            }
        }
        return 'Data has been sorted to dispatch & sent SMS to customer mobile!';
    }
    // function hub_sorting(Hub $hub)
    // {

    //     $hub_shipments = Hub_shipment::where([
    //         'hub_id' => $hub->id, 'status' => 'on-dispatch'
    //     ])->get();

    //     foreach ($hub_shipments as $key => $hubShipment) {
    //         Shipment::where('id', $hubShipment->shipment_id)->update(['shipping_status' => '3']);

    //         event(new ShipmentMovement($hubShipment->shipment_id, 'admin', Auth::guard('admin')->user()->id, 'admin-dispatch', 'Dispatch the shipment', 'dispatch'));

    //         $shipment_ids[] = $hubShipment->shipment_id;
    //         $message = 'Dear ' . $hubShipment->shipment->name . ', You have a parcel on ' . basic_information()->wensote_link . ' &  paracel is in Dispatch center. We will get you soon!';
    //         // event(new SendingSMS('customer', $hubShipment->shipment->phone, $message));
    //     }

    //     //get the last id of hub_shipment_boxes table
    //     $bulk_id_init = Hub_shipment_box::where('hub_id', $hub->id)->orderBy('id', 'desc')->first();
    //     if ($bulk_id_init == null) $bulk_id = 1;
    //     else $bulk_id = $bulk_id_init->id;

    //     //if action by superdamin, make box_by (hub_id) null
    //     // dd(Session::get('admin_hub'));
    //     if (Session::has('admin_hub')) $boxByHub_id = Session::get('admin_hub')->hub_id;
    //     else $boxByHub_id = null;
    //     // dd($boxByHub_id);// if $boxByHub_id=null, it means, the shipment boxes by superadmin
    //     $checkBox = Hub_shipment_box::where('shipment_ids', implode(',', $shipment_ids))->count();
    //     if ($checkBox < 1) {
    //         $box = Hub_shipment_box::create([
    //             'bulk_id' => rand() . $bulk_id, 'hub_id' => $hub->id,
    //             'shipment_ids' => implode(',', $shipment_ids),
    //             'admin_id' => Auth::guard('admin')->user()->id,
    //             'box_by' => $boxByHub_id,
    //         ]);
    //     }

    //     $check = Hub_shipment::where(['hub_id' => $hub->id, 'admin_id' => Auth::guard('admin')->user()->id, 'status' => 'dispatch']);
    //     if ($check->count() < 1) {
    //         Hub_shipment::where(['hub_id' => $hub->id, 'admin_id' => Auth::guard('admin')->user()->id])->update(['status' => 'dispatch']);
    //     }

    //     // direct to sorting hub parcels into agent-dispatch
    //     if ($hub->id == $boxByHub_id) {
    //         $box->update(['status' => 'on-delivery']);
    //         foreach ($shipment_ids as $key => $shipment_id) {
    //             Shipment::where('id', $shipment_id)->update(['shipping_status' => '5']);
    //             Hub_shipment::where('shipment_id', $shipment_id)->update(['status' => 'on-delivery']);
    //         }
    //     }

    //     return 'Data has been sorted to dispatch & sent SMS to customer mobile!';
    // }

    function shipment_dispatch()
    {
        $units=[];
        if (Auth::guard('admin')->user()->hasRole('super-admin')) {
            $units = Shipment::where('shipments.logistic_status',7)->join('locations','shipments.delivery_location_id','locations.id')->join('points','locations.point_id','points.id')->join('units','points.unit_id','units.id')->distinct()->get(['units.*']);
        } else {
            $units = Shipment::where('shipments.logistic_status',7)->join('locations','shipments.delivery_location_id','locations.id')->join('points','locations.point_id','points.id')->join('units','points.unit_id','units.id')->distinct()->get(['units.*']);
        }
        // $units = array_unique($units);

        return view('admin.shipment.shipment-dispatch', compact('units'));
    }

    function dispatch_view(Hub $hub)
    {
        return view('admin.shipment.dispatch-view', compact('hub'));
    }

    //Hub_shipment_box shipments
    function dispatch_box_view(Hub_shipment_box $hub_shipment_box)
    {
        $shipments = Shipment::whereIn('id', explode(',', $hub_shipment_box->shipment_ids))->get();
        return view('admin.shipment.load.dispatch.bulk-items', compact('hub_shipment_box', 'shipments'));
    }

    function status_dispatch(Hub $hub)
    {
        $boxes = Hub_shipment_box::where(['hub_id' => $hub->id, 'status' => 'dispatch'])->get();
        return view('admin.shipment.load.dispatch.status-dispatch', compact('boxes', 'hub'));
    }

    function status_on_transit(Hub $hub)
    {
        $boxes = Hub_shipment_box::where(['hub_id' => $hub->id, 'status' => 'on-transit'])->get();
        return view('admin.shipment.load.dispatch.status-on-transit', compact('boxes', 'hub'));
    }

    //ajax, change status to transit
    function box_status_changes(Hub_shipment_box $hub_shipment_box, $status)
    {
        $check = Hub_shipment_box::where(['id' => $hub_shipment_box->id, 'status' => $status]);
        if ($check->count() < 1) {
            $hub_shipment_box->update(['status' => $status]);
        }
    }

    function box_status_changes_bulk_id($bulk_id, $status)
    {
        $check = Hub_shipment_box::where(['bulk_id' => $bulk_id, 'status' => $status])->get();
        if ($check->count() == 0) {
            Hub_shipment_box::where('bulk_id', $bulk_id)->update(['status' => $status]);
        }
    }

    function box_sorting(Hub $hub)
    {
        $boxes = Hub_shipment_box::where('hub_id', $hub->id)->get();
        // dd($boxes);
        foreach ($boxes as $key => $box) {
            foreach (explode(',', $box->shipment_ids) as $key => $shipment_id) {
                Shipment::where('id', $shipment_id)->update(['shipping_status' => '4']);
                if ($hub->zone->status == '1' && $hub->status == '1') {
                    \App\Thirdparty_shipment::create([
                        'shipment_id' => $shipment_id, 'hub_id' => $hub->id,
                        'admin_id' => Auth::guard('admin')->user()->id, 'status' => 'transit'
                    ]);
                    event(new ShipmentMovement($shipment_id, 'admin', Auth::guard('admin')->user()->id, 'third-party', 'transit the shipment to a third party', 'transit'));
                } else {
                    event(new ShipmentMovement($shipment_id, 'admin', Auth::guard('admin')->user()->id, 'admin-transit', 'transit the shipment', 'transit'));
                }
                $shipment_ids[] = $shipment_id;
            }
        }
        if ($hub->zone->status == '1' && $hub->status == '1') {
            $status = 'third-party';
        } else $status = 'transit';

        Hub_shipment_box::where(['hub_id' => $hub->id, 'status' => 'on-transit'])->update(['status' => $status]);

        // $pdf = PDF::loadView('admin.shipment.shipment-pdf', compact('shipment_ids', 'hub'));
        // return $pdf->download(' parcels for-' . $hub->name . ' - ' . date('y-m-d h:i:s') . '.pdf');
        return redirect()->back();
    }


    function unit_receivable()
    {
        try{
            $title = 'Unit receivable Shipments';
            $shipments = Shipment::where('logistic_status',7)->deliverycousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->get(['shipments.*']);
            // dd($shipments);
            return view('admin.shipment.unit-receivable', compact('shipments', 'title'));
        }
        catch(Exception $e){
            throw $e;
        }
        // if (Session::has('admin_sub')) {
        //     $hub = Unit::where('id', Session::get('admin_hub')->unit_id)->first();
        // } else $hub = null;

        // if ($hub == null) {
        //     $boxes = Hub_shipment_box::where(['status' => 'transit'])->get();
        //     $title = 'Hub receivable for admin';
        // } else {
        //     $boxes = Hub_shipment_box::where(['hub_id' => $hub->id, 'status' => 'transit'])->get();
        //     $title = 'Hub receivable for employee | ' . Session::get('admin_hub')->name;
        // }
        
    }

    function box_back2Dispatch(Hub_shipment_box $hub_shipment_box)
    {
        foreach (explode(',', $hub_shipment_box->shipment_ids) as $key => $shipment_id) {
            Shipment::where('id', $shipment_id)->update(['shipping_status' => '3']);
            event(new ShipmentMovement($shipment_id, 'admin', Auth::guard('admin')->user()->id, 'receive-at-hub', 'Hub receivable cancelled', 'back-to-dispatch'));
        }
        $hub_shipment_box->update(['status' => 'dispatch']);
    }
    //ajax call for sorting, from hub-receivable to on-delivery
    function sort2agentDispatch(Hub_shipment_box $hub_shipment_box)
    {
        $hub_shipment_box->update(['status' => 'on-delivery']);
        foreach (explode(',', $hub_shipment_box->shipment_ids) as $key => $shipment_id) {
            Shipment::where('id', $shipment_id)->update(['shipping_status' => '5']);
            event(new ShipmentMovement($shipment_id, 'admin', Auth::guard('admin')->user()->id, 'sort-to-agnet-dispatch', 'Hub receivable', 'out-for-delivery'));
        }
    }

    // agent dispatch center view
    function agent_dispatch()
    {
        // dd(Session::has('admin_sub'));
        return view('admin.shipment.agent-dispatch');
    }

    function agent_dispatch_agentSide()
    {
        if (Session::has('admin_sub')) {
            $hub = Hub::where('id', Session::get('admin_hub')->hub_id)->first();
        } else $hub = null;

        if ($hub == null) {
            $boxes = Hub_shipment_box::where(['status' => 'on-delivery'])->get();
        } else {
            $boxes = Hub_shipment_box::where(['hub_id' => $hub->id, 'status' => 'on-delivery'])->get();
        }
        return view('admin.shipment.load.agent-dispatch.agent-side', compact('boxes'));
    }

    function agent_dispatch_driverSide()
    {
        if (Session::has('admin_sub')) {
            $hub = Hub::where('id', Session::get('admin_hub')->hub_id)->first();
        } else $hub = null;
        if ($hub == null) {
            $boxes = Hub_shipment_box::where(['status' => 'on-delivery'])->get();
        } else {
            $boxes = Hub_shipment_box::where(['hub_id' => $hub->id, 'status' => 'on-delivery'])->get();
        }
        $drivers = Courier::orderBy('first_name')->get();
        return view('admin.shipment.load.agent-dispatch.driver-side', compact('drivers', 'boxes'));
    }
    //ajax call
    function agentDispatch2DriverAssign(Hub_shipment_box $hub_shipment_box, Shipment $shipment)
    {
        Driver_hub_shipment_box::create([
            'hub_shipment_box_id' => $hub_shipment_box->id,
            'shipment_id' => $shipment->id,
            'admin_id' => Auth::guard('admin')->user()->id,
            'status' => 'assigning'
        ]);

        event(new ShipmentMovement($shipment->id, 'admin', Auth::guard('admin')->user()->id, 'assigned-driver-for-delivery', 'parcel hand over to Rider', 'assign-driver-for-delivery'));
    }
    //ajax call /get right side of dispatch agent with invoice id
    function agentDispatch2DriverAssignWithInvoice($invoice_id)
    {
        $shipment = Shipment::where('invoice_id', $invoice_id)->first();
        $box = Hub_shipment_box::select("id")->whereRaw("find_in_set($shipment->id ,shipment_ids)")->first();
        // dd($box->id);
        Driver_hub_shipment_box::create([
            'hub_shipment_box_id' => $box->id,
            'shipment_id' => $shipment->id,
            'admin_id' => Auth::guard('admin')->user()->id,
            'status' => 'assigning'
        ]);

        event(new ShipmentMovement($shipment->id, 'admin', Auth::guard('admin')->user()->id, 'assigned-driver-for-delivery', 'parcel hand over to Rider', 'assign-driver-for-delivery'));
    }

    //ajax call
    function driverAssign2Agent_dispatch(Hub_shipment_box $hub_shipment_box, Shipment $shipment)
    {
        Driver_hub_shipment_box::where([
            'hub_shipment_box_id' => $hub_shipment_box->id,
            'shipment_id' => $shipment->id,
            'status' => 'assigning'
        ])->delete();
    }

    function agent_dispatchAssigning(Request $request)
    {

        $box_ids = Driver_hub_shipment_box::where([
            'admin_id' => Auth::guard('admin')->user()->id, 'status' => 'assigning'
        ])->select('hub_shipment_box_id')->distinct()->get();
        Session::put('box_ids', $box_ids);

        Driver_hub_shipment_box::where([
            'admin_id' => Auth::guard('admin')->user()->id, 'status' => 'assigning'
        ])->update([
            'courier_id' => $request->courier_id, 'status' => 'assigned'
        ]);

        $count = 0;
        foreach (Session::get('box_ids') as $key => $box) {
            $query = Hub_shipment_box::where('id', $box->hub_shipment_box_id)->first();
            foreach (explode(',', $query->shipment_ids) as $key => $shipment_id) {
                $count += Driver_hub_shipment_box::where(['hub_shipment_box_id' => $box->hub_shipment_box_id, 'shipment_id' => $shipment_id])->count();
            }
            if ($count == COUNT(explode(',', $query->shipment_ids))) {
                Hub_shipment_box::where('id', $box->hub_shipment_box_id)->update([
                    'status' => 'delivery'
                ]);
            }
        }
        Session::forget('box_ids');

        $driver_hub_shipmentBox = Driver_hub_shipment_box::where([
            'admin_id' => Auth::guard('admin')->user()->id,
            'courier_id' => $request->courier_id,
            'status' => 'assigned'
        ])->get();

        $driver = Courier::find($request->courier_id)->first();

        foreach ($driver_hub_shipmentBox as $row) {
            $customer_message = 'Dear ' . $row->shipment->name . ', Your parcel on ' . basic_information()->website_link . ' is on delivery. ' . $driver->first_name . ' ' . $driver->last_name . ' (' . $driver->phone . ') will carry your parcel.';
            event(new SendingSMS('customer', $row->shipment->phone, $customer_message));
            $merchant_message = 'Dear ' . $row->shipment->user->first_name . ', Your parcel #' . $row->shipment->invoice_id . ' is on delivery. ' . $driver->first_name . ' ' . $driver->last_name . ' (' . $driver->phone . ') is responsible to delivery the parcel!';
            event(new SendingSMS('merchant', $row->shipment->user->phone, $merchant_message));
        }


        return back();
    }


    function reconcile()
    {
        $date = \Carbon\Carbon::today()->subDays(7);
        $shipments = Shipment::where(['status' => 1, 'shipping_status' => 2])
            ->where('time_starts', '<=', $date)->paginate(30);

        $reconciles = Reconcile_shipment::where('status', 'pending')->get();
        return view('admin.shipment.reconcile', compact('shipments', 'reconciles'));
    }
    function load_shipment_reconcilable()
    {
        $date = \Carbon\Carbon::today()->subDays(7);
        $shipments = Shipment::where(['status' => 1, 'shipping_status' => 2])
            ->where('time_starts', '<=', $date)->paginate(30);
        return view('admin.shipment.load.reconcile.shipment-side', compact('shipments'));
    }
    function load_reconcil_shipments()
    {
        $reconciles = Reconcile_shipment::where('status', 'pending')->get();
        return view('admin.shipment.load.reconcile.reconcile-side', compact('reconciles'));
    }
    function create_reconcile(Shipment $shipment)
    {
        $check = Reconcile_shipment::where(['shipment_id' => $shipment->id, 'status' => 'pending']);
        if ($check->count() < 1) {
            Reconcile_shipment::create([
                'shipment_id' => $shipment->id,
                'admin_id' => Auth::guard('admin')->user()->id,
                'status' => 'pending'
            ]);
        } else {
            Reconcile_shipment::where('shipment_id', $shipment->id)
                ->update(['status' => 'pending']);
        }
    }
    function remove_reconcile(Shipment $shipment)
    {
        $check = Reconcile_shipment::where(['shipment_id' => $shipment->id])->delete();
    }
    function return_shipments2receive()
    {
        $records = Reconcile_shipment::where(['admin_id' => Auth::guard('admin')->user()->id, 'status' => 'pending'])->get();
        foreach ($records as $key => $record) {
            Reconcile_shipment::where('id', $record->id)
                ->update(['status' => 'moved-to-receive', 'loops' => $record->loops + 1]);
            Shipment::where('id', $record->shipment_id)->update([
                'time_starts' => date("Y-m-d H:i:s")
            ]);
        }
        return back()->with('message', 'Shipments return to Receive for 7 days!');
    }
    public function receive_at_delivery_unit($shipment_id){
        try{
            // dd($shipment_id);
            Shipment::where('id',$shipment_id)->update(['logistic_status' => 8]);
            event(new ShipmentMovementEvent(Shipment::find($shipment_id),LogisticStep::find(8),Auth::guard('admin')->user()));
            return response()->json(['success'=>true,'message'=>'Shipment marked as receive at delivery unit'],200);
        }
        catch(Exception $e){
            throw $e;
        }
    }
    public function delivery_shipments(Request $request){
        $shipments = Shipment::whereBetween('logistic_status',[8,11])->deliverycousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->get('shipments.*');
        $users = User::where(['status'=>1,'is_verified'=>1])->get();
        $units= Unit::all();
        $locations = Location::all();
        return view('admin.shipment.delivery', compact('units', 'users', 'locations', 'shipments'));
    }
    function delivery(Request $request)
    {
        $shipments = Shipment::get();
        if ($request->area_id) {
            $shipments = $shipments->where('area_id', $request->area_id);
        }

        if ($request->phone) {
            $shipments = $shipments->where('phone', $request->phone);
        }

        if ($request->hub_id) {
            $shipment = Hub_shipment::where('hub_id', $request->hub_id)->select('shipment_id')->groupBy('shipment_id')->pluck('shipment_id')->toArray();
            $shipments = $shipments->where('id', $shipment);
        }

        if ($request->merchant_id) {
            $shipments = $shipments->where('merchant_id', $request->merchant_id);
        }

        if ($request->courier_id) {
            $CourierShipment = CourierShipment::where('courier_id', $request->courier_id)->select('shipment_id')->groupBy('shipment_id')->pluck('shipment_id')->toArray();
            $shipments = $shipments->where('id', $CourierShipment);
        }

        if ($request->invoice_id) {
            $shipments =  $shipments->whereIn('invoice_id', explode(',', $request->invoice_id));
        }

        if ($request->status) {
            $shipments =  $shipments->where('shipping_status', $request->status);
        }


        if ($request->date1 && $request->date2) {
            $date1 = date('Y-m-d', strtotime($request->date1));
            $date2 = date('Y-m-d', strtotime($request->date2));
            $shipments =  $shipments->whereBetween('created_at', [$date1 . " 00:00:00", $date2 . " 23:59:59"]);
        }

        // if(!$request->area_id && !$request->phone && !$request->hub_id && !$request->merchant_id && !$request->courier_id && !$request->invoice_id && !$request->status){
        //     $shipments =  $shipments->latest()->paginate(30);
        // }

        $users = User::where('status', '!=', '0')->get();
        $hubs = Hub::orderBy('name')->get();
        $areas = Area::orderBy('name')->get();

        return view('admin.shipment.delivery', compact('hubs', 'users', 'areas', 'shipments'));
    }

    function shipment_search($field, $keyword)
    {
        $shipments = Shipment::where($field, $keyword)->get();
        return view('admin.shipment.includes.delivery-parcels', compact('shipments'));
    }

    function CourierShipment_search(Courier $driver)
    {
        $CourierShipment = CourierShipment::where('courier_id', $driver->id)->select('shipment_id')->groupBy('shipment_id')->pluck('shipment_id')->toArray();
        $shipments = Shipment::whereIn('id', $CourierShipment)->get();
        return view('admin.shipment.includes.delivery-parcels', compact('shipments'));
    }

    function shipment_search_invoices($keyword)
    {
        $keywords = explode(',', $keyword);
        $shipments = Shipment::whereIn('invoice_id', $keywords)->get();
        // dd($keywords); exit;
        return view('admin.shipment.includes.delivery-parcels', compact('shipments'));
    }
    function shipment_search_withHub(Hub $hub)
    {
        $shipment = Hub_shipment::where('hub_id', $hub->id)->select('shipment_id')->groupBy('shipment_id')->pluck('shipment_id')->toArray();
        // dd($shipment);
        $shipments = Shipment::whereIn('id', $shipment)->get();
        return view('admin.shipment.includes.delivery-parcels', compact('shipments'));
    }

    function shipment_search_withStatus($status)
    {
        $shipments = Shipment::where('shipping_status', $status)->get();
        return view('admin.shipment.includes.delivery-parcels', compact('shipments'));
    }

    function shipment_search_withDates(Request $request, $date1, $date2)
    {
        $date1 = date('Y-m-d', strtotime($date1));
        $date2 = date('Y-m-d', strtotime($date2));
        // echo $date1.' = '.$date2.'<br/>';

        // dd($request->all());
        $CourierShipment = array();
        if ($request->courier_id != null) {
            $CourierShipment = CourierShipment::where('courier_id', $request->courier_id)
                ->whereBetween('created_at', [$date1 . " 00:00:00", $date2 . " 23:59:59"])
                ->select('shipment_id')->groupBy('shipment_id')->pluck('shipment_id')->toArray();
            // $shipments = Shipment::whereRaw(
            //     "(created_at >= ? AND created_at <= ?)", [$date1." 00:00:00", $date2." 23:59:59"]
            //   )->whereIn('id',$CourierShipment)->get();
            // dd('driver');
            $shipments = Shipment::where('id', $CourierShipment)
                ->whereBetween('created_at', [$date1 . " 00:00:00", $date2 . " 23:59:59"])
                ->orWhere('merchant_id', $request->merchant_id)
                ->orWhere('phone', $request->phone)
                ->orWhere('shipping_status', $request->status)
                ->orWhereIn('invoice_id', explode(',', $request->invoice_id))
                ->get();

            return view('admin.shipment.includes.delivery-parcels', compact('shipments'));
        }

        if ($request->hub_id != null) {
            $shipment = Hub_shipment::where('hub_id', $request->hub_id)
                ->whereBetween('created_at', [$date1 . " 00:00:00", $date2 . " 23:59:59"])
                ->select('shipment_id')->groupBy('shipment_id')->pluck('shipment_id')->toArray();
            // $shipments = Shipment::whereIn('id',$shipment)
            // ->whereRaw("(created_at >= ? AND created_at <= ?)", [$date1." 00:00:00", $date2." 23:59:59"])->get();

            $shipments = Shipment::whereIn('id', $shipment)
                ->whereBetween('created_at', [$date1 . " 00:00:00", $date2 . " 23:59:59"])
                ->orWhere('area_id', $request->area_id)
                ->orWhere('merchant_id', $request->merchant_id)
                ->orWhere('phone', $request->phone)
                ->orWhere('shipping_status', $request->status)
                ->orWhereIn('invoice_id', explode(',', $request->invoice_id))

                // ->whereRaw( "(created_at >= ? AND created_at <= ?)", [$date1." 00:00:00", $date2." 23:59:59"])
                ->get();
            return view('admin.shipment.includes.delivery-parcels', compact('shipments'));
        }

        if ($request->phone == null && $request->merchant_id == null && $request->courier_id == null && $request->status == null && $request->area_id == null && $request->hub_id == null && $request->agent == null && $request->invoice_id == null) {

            $shipments = Shipment::whereBetween('created_at', [$date1 . " 00:00:00", $date2 . " 23:59:59"])->get();
            return view('admin.shipment.includes.delivery-parcels', compact('shipments'));
        }

        $shipments = Shipment::whereBetween('created_at', [$date1 . " 00:00:00", $date2 . " 23:59:59"])
            ->orWhere('area_id', $request->area_id)
            ->orWhere('merchant_id', $request->merchant_id)
            ->orWhere('phone', $request->phone)
            ->orWhere('shipping_status', $request->status)
            ->orWhereIn('invoice_id', explode(',', $request->invoice_id))
            // ->whereRaw( "(created_at >= ? AND created_at <= ?)", [$date1." 00:00:00", $date2." 23:59:59"])
            ->get();
        return view('admin.shipment.includes.delivery-parcels', compact('shipments'));

        // dd($request->all());

        // $shipments = Shipment::whereBetween('created_at',$date1,$date2)->get();
        // return view('admin.shipment.includes.delivery-parcels',compact('shipments'));
    }

    function export_shipments($shipment_ids)
    {
        foreach (explode(',', $shipment_ids) as $key => $id) {
            $shipment = Shipment::find($id);
            $rows[] =  [$shipment->invoice_id, $shipment->name, $shipment->phone, $shipment->address, $shipment->zip_code, $shipment->cod_amount, $shipment->weight, ''];
        }
        $columnNames = ['Invoice', 'Customer Name', 'Contact No.', 'Customer Address', 'Post Code', 'COD Amount', 'Weight', 'Product Selling Price'];
        return self::getCsv($columnNames, $rows, date('d-m-Y - ') . COUNT(explode(',', $shipment_ids)) . '-parcels.csv');
    }

    function deliveryPaymentsForMerchant($shipment_ids)
    {
        $allshipments = Shipment::whereIn('id', explode(',', $shipment_ids))->whereIn('logistic_status',LogisticStep::where('slug','delivered')->orWhere('slug','delivery-confirmed')->pluck('id')->toArray())->get();   
        $shipments=array();
        foreach($allshipments as $item){
            if(is_shipment_payable($item)){
                array_push($shipments,$item);
            }
        }
        return view('admin.shipment.load.delivery.payment-delivery-form', compact('shipments'));
    }

    function save_delivery_payment(Request $request)
    {
        // dd($request->all());
        foreach ($request->shipment_ids as $key => $shipment_id) {
            ShipmentPayment::where('shipment_id',$shipment_id)->update(['status'=>'paid','paid_amount'=>$request->amount[$key]]);
            $new_payment=MerchantPayment::create([
                'shipment_id'=>$shipment_id,
                'merchant_id'=> Shipment::find($shipment_id)->merchant->id,
                'amount'=>$request->amount[$key]
            ]);
            $new_payment->paid_by()->associate(Auth::guard('admin')->user());
            $new_payment->save();
        }
        return back()->with('message', 'Shipment Payment for delivery is successfully saved!');
    }


    function shipment_audit(Shipment $shipment)
    {
        // $driverAssign = \App\Models\Shipment_movement::where(['shipment_id'=>$shipment->id,'status'=>'pickup','user_type'=>'driver'])->first();
        // $driverReceive = \App\Models\Shipment_movement::where(['shipment_id'=>$shipment->id,'status'=>'receive','user_type'=>'driver'])->first();
        // $dispatch = \App\Models\Shipment_movement::where(['shipment_id'=>$shipment->id,'status'=>'dispatch'])->first();
        // $transit = \App\Models\Shipment_movement::where(['shipment_id'=>$shipment->id,'status'=>'transit'])->first();
        // $outForDelivery = \App\Models\Shipment_movement::where(['shipment_id'=>$shipment->id,'status'=>'out-for-delivery'])->first();
        // $assignDriver = \App\Models\Shipment_movement::where(['shipment_id'=>$shipment->id,'status'=>'assign-driver-for-delivery'])->first();
        // $deliverReport = \App\Models\Shipment_movement::where(['shipment_id'=>$shipment->id,'user_type'=>'driver','report_type'=>'delivery-report'])->first();
        $audit_logs = \App\Models\ShipmentMovement::where('shipment_id', $shipment->id)->orderBy('updated_at','ASC')->get();


        return view('admin.shipment.load.delivery.audit', compact('shipment', 'audit_logs'));
    }

    function mark_shipment_delivery_confirmed(Shipment $shipment){
        try{
            $shipment->logistic_status = LogisticStep::where('slug','delivery-confirmed')->first()->id;
            $shipment->save();
            event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','delivery-confirmed')->first(),auth()->guard('admin')->user()));
        }
        catch(Exception $e){
            throw $e;
        }
    }
    function download()
    {
        return view('admin.shipment.download');
    }
    function shipment_search_withBulkID($bulk_id)
    {
        // $shipment = Hub_shipment_box::where('bulk_id', $bulk_id)->select('shipment_ids')->first();
        // if ($shipment == null) {
        //     dd('The given ID does not belongs To any shipment!!');
        // }
        $shipments = Shipment::where('tracking_code', $bulk_id)->orWhere('invoice_id',$bulk_id)->get();
        return view('admin.shipment.load.download.shipments', compact('shipments'));
    }

    function download_file($type, $shipment_id)
    {
        $shipment = Shipment::find($shipment_id);
        if ($shipment == null) {
            dd('The given input does not belong to any shipment!!');
        }

        // $shipments = Shipment::whereIn('id', explode(',', $shipment->shipment_ids))->get();

        if ($type == 'csv') {
            $rows[] =  [$shipment->invoice_id, $shipment->recipient['name'], $shipment->recipient['phone'], $shipment->recipient['address'], '', $shipment->amount, '', ''];
            $columnNames = ['Invoice', 'Customer Name', 'Contact No.', 'Customer Address', 'Post Code', 'COD Amount', 'Instruction', 'Product Selling Price'];
            return self::getCsv($columnNames, $rows, $shipment_id . '.csv');
        } else {
            return view('admin.shipment.load.download.shipment-pdf', compact('shipment', 'shipment_id'));
            $pdf = \PDF::loadView('admin.shipment.load.download.shipment-pdf', compact('shipment', 'shipment_id'));
            return $pdf->download('shipment-ID-' . $shipment_id . '.pdf');
        }
    }

    public static function getCsv($columnNames, $rows, $fileName = 'shipment-csv.csv')
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=" . $fileName,
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];
        $callback = function () use ($columnNames, $rows) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columnNames);
            foreach ($rows as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    function reset_shipment(Request $request)
    {

        if ($request->label == '0') {
            CourierShipment::where('shipment_id', $request->id)->delete();
            \App\Models\Shipment_movement::where('shipment_id', $request->id)->delete();
        } elseif ($request->label == '1') {
            CourierShipment::where('shipment_id', $request->id)
                ->where('status', '!=', 'pending')
                ->where('status', '!=', 'received')->delete();
            \App\Models\Shipment_movement::where('shipment_id', $request->id)
                ->where('report_type', '!=', 'assing-driver-to-pickup')->delete();
        } else {
            CourierShipment::where('shipment_id', $request->id)
                ->where('status', '!=', 'received')->delete();
            \App\Models\Shipment_movement::where('shipment_id', $request->id)
                ->where('report_type', '!=', 'receive-parcels')
                ->where('report_type', '!=', 'assing-driver-to-pickup')->delete();
        }

        // hold_shipments
        \App\Hold_shipment::where('shipment_id', $request->id)->delete();

        // hub_shipments
        // dd($request->id);
        Hub_shipment::where('shipment_id', $request->id)->delete();

        // driver_hub_shipment_box
        Driver_hub_shipment_box::where('shipment_id', $request->id)->delete();

        $box = Hub_shipment_box::select("id", 'shipment_ids')->whereRaw("find_in_set($request->id ,shipment_ids)")->first();
        if ($box != null) {
            $new_ids = explode(',', $box->shipment_ids);
            $pos = array_search($request->id, $new_ids);
            unset($new_ids[$pos]);
            // dd('count: '.count(explode(',',$box->shipment_ids)));
            if (count(explode(',', $box->shipment_ids)) == 1) {
                Hub_shipment_box::where('id', $box->id)->delete();
            } else {
                $box->update(['shipment_ids' => implode(',', $new_ids)]);
            }
        }

        // driver_return_shipment_box
        Driver_return_shipment_box::where('shipment_id', $request->id)->delete();

        $return_box = \App\Return_shipment_box::select("id", 'shipment_ids')->whereRaw("find_in_set($request->id ,shipment_ids)")->first();
        if ($return_box != null) {
            $return_new_ids = explode(',', $return_box->shipment_ids);
            $pos = array_search($request->id, $new_ids);
            unset($return_new_ids[$pos]);
            if (count(explode(',', $return_box->shipment_ids)) == 1) {
                \App\Return_shipment_box::where('id', $return_box->id)->delete();
            } else {
                \App\Return_shipment_box::whereRaw("find_in_set($request->id ,shipment_ids)")
                    ->update(['shipment_ids' => implode(',', $return_new_ids)]);
            }
        }

        // CourierShipment_delivery
        CourierShipment_delivery::where('shipment_id', $request->id)->delete();

        Reconcile_shipment::where('shipment_id', $request->id)->delete();

        \App\Return_shipment::where('shipment_id', $request->id)->delete();

        ShipmentPayment::where('shipment_id', $request->id)->delete();

        // shipment_opt_confirmations
        \App\Shipmnet_OTP_confirmation::where('shipment_id', $request->id)->delete();

        // thirdparty_shipments
        Thirdparty_shipment::where('shipment_id', $request->id)->delete();

        Shipment::where('id', $request->id)->update(['shipping_status' => $request->label]);
        return back()->with('message', 'The Shipment has been reset successfully!!');
    }


    public function get_csv_pdf($type)
    {

        if ($type == 'pdf') {
            $shipment_ids = Thirdparty_shipment::where('status_in', 'assigning')->get();
            // return view('admin.shipment.thirdparty.shipment-pdf',compact('shipment_ids'));
            $pdf = PDF::loadView('admin.shipment.thirdparty.shipment-pdf', compact('shipment_ids'));
            return $pdf->download('parcels for-' . $shipment_ids->count() . ' - ' . date('y-m-d h:i:s') . '.pdf');
        }
        if ($type == 'csv') {
            $shipment = Thirdparty_shipment::where('status_in', 'assigning')->select('shipment_id')->groupBy('shipment_id')->pluck('shipment_id')->toArray();
            $shipments = Shipment::whereIn('id', $shipment)->get();

            // dd($shipments);
            foreach ($shipments as $key => $shipment) {
                $rows[] =  [$shipment->invoice_id, $shipment->name, $shipment->phone, $shipment->address, $shipment->zip_code, $shipment->cod_amount, $shipment->weight, ''];
            }
            $columnNames = ['Invoice', 'Customer Name', 'Contact No.', 'Customer Address', 'Post Code', 'COD Amount', 'Weight', 'Product Selling Price'];

            return self::getCsv($columnNames, $rows, date('d/m/Y h i s') . '.csv');
        }
    }

    function get_hub_csv($id, $status = 1, $shipping_status = 2)
    {
        $date = \Carbon\Carbon::today()->subDays(7);
        $shipments = Shipment::where('merchant_id', $id)
            ->where(['status' => $status, 'shipping_status' => $shipping_status])
            ->where('time_starts', '>=', $date)->get();

        foreach ($shipments as $key => $shipment) {
            $rows[] =  [$shipment->invoice_id, $shipment->name, $shipment->phone, $shipment->address, $shipment->zip_code, $shipment->cod_amount, $shipment->weight, ''];
        }
        $columnNames = ['Invoice', 'Customer Name', 'Contact No.', 'Customer Address', 'Post Code', 'Price', 'Weight', 'Product Selling Price'];
        return self::getCsv($columnNames, $rows, date('d/m/Y h i s') . '.csv');
    }
}
