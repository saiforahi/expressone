<?php

namespace App\Http\Controllers\Courier;

use App\Models\User;
use App\Models\Shipment;
use App\Events\SendingSMS;
use Illuminate\Http\Request;
use App\Models\CourierShipment;
use App\Models\ShipmentOTP;
use App\Events\ShipmentMovement;
use App\Events\ShipmentMovementEvent;
use App\Http\Controllers\Controller;
use App\Models\LogisticStep;
use App\Models\UnitShipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ShipmentController extends Controller
{
    public function index()
    {
        $merchants = DB::table('courier_shipment')->where('courier_id',Auth::guard('courier')->user()->id)->join('shipments','courier_shipment.shipment_id','shipments.id')->whereIn('shipments.logistic_status',LogisticStep::where('slug','to-pick-up')->orWhere('slug','picked-up')->pluck('id')->toArray())->select('shipments.merchant_id')->groupBy('shipments.merchant_id')->pluck('shipments.merchant_id')->toArray();
        $user = User::whereIn('id',$merchants)->get();
        return view('courier.shipment.index',compact('user'));
    }


    public function cencel_parcel($id, Request $request)
    {
        CourierShipment::where('shipment_id', $id)->update(['note' => $request->note, 'status' => 'cancelled']);
        Shipment::where('id', $id)->update(['shipping_status' => 6]);
        // dd($id);
        return back();
    }
    // accept a paracel assigned from admin
    public function receive_parcel($id, Request $request)
    {
        CourierShipment::where(['courier_id' => Auth::guard('courier')->user()->id,'shipment_id' => $id])->update(['status' => 'received']);
        Shipment::where('id', $id)->where('logistic_status', '<=',4)->update(['logistic_status' => 4]);
        event(new ShipmentMovementEvent(Shipment::find($id),LogisticStep::where('slug','picked-up')->first(),Auth::guard('courier')->user()));
        return back()->with('success','Shipment received');
    }
    public function submit_parcel($id, Request $request)
    {
        CourierShipment::where(['courier_id' => Auth::guard('courier')->user()->id,'shipment_id' => $id])->update(['status' => 'submitted_to_unit']);
        Shipment::where('id', $id)->update(['logistic_status' => LogisticStep::where('slug','dropped-at-pickup-unit')->first()->id]);
        event(new ShipmentMovementEvent(Shipment::find($id),LogisticStep::where('slug','dropped-at-pickup-unit')->first(),Auth::guard('courier')->user()));
        return back()->with('success','This parcel submittd to unit');
    }
    public function my_shipments($type){
        if ($type == 'return') {
            $shipments = CourierShipment::latest()->where(['courier_id' => Auth::guard('courier')->user()->id, 'type'=>'return'])->join('shipments','shipments.id','courier_shipment.shipment_id')->where('shipments.logistic_status',LogisticStep::where('slug','courier-assigned-to-return')->first()->id)->get(['courier_shipment.*']);
        }
        elseif($type=='hold'){
            $shipments = CourierShipment::latest()->where(['courier_id' => Auth::guard('courier')->user()->id, 'type'=>'delivery'])->join('shipments','shipments.id','courier_shipment.shipment_id')->where('shipments.logistic_status',12)->get(['courier_shipment.*']);
        }
        return view('courier.shipment.my-shipments', compact('shipments', 'type'));
    }
    public function return_shipment($shipment_id){
        try{
            Shipment::where('id',$shipment_id)->update(['logistic_status'=>13]);
            CourierShipment::where(['shipment_id'=>$shipment_id,'courier_id'=>Auth::guard('courier')->user()->id,'type'=>'delivery'])->update(['status'=>'returned']);
            return redirect()->route('my-shipments',['type'=>'return']);
        }
        catch(Exception $e){
            throw $e;
        }
    }
    function my_parcels($type)
    {
        $shipments = CourierShipment::latest()->where(['courier_id' => Auth::guard('courier')->user()->id, 'status' => $type])->get();
        return view('driver.shipment.my-parcels', compact('shipments', 'type'));
    }

    public function show($id)
    {
        $statuses=LogisticStep::where('slug','to-pick-up')->orWhere('slug','picked-up')->pluck('id')->toArray();
        $shipments = CourierShipment::where(['type'=>'pickup','courier_id' => Auth::guard('courier')->user()->id])->join('shipments','shipments.id','courier_shipment.shipment_id')->where('shipments.merchant_id',$id)->whereIn('shipments.logistic_status',$statuses)->get(['courier_shipment.*']);
        $user = User::find($id);
        return view('courier.shipment.shipment-more', compact('shipments', 'user'));
    }

    function receive_all_parcel(User $user)
    {
        $shipments = DB::table('courier_shipment')
                    ->where(['type'=>'pickup','courier_id'=>Auth::guard('courier')->user()->id])
                    ->join('shipments','courier_shipment.shipment_id','shipments.id')
                    ->where(['shipments.merchant_id'=>$user->id,'shipments.logistic_status'=>LogisticStep::where('slug','to-pick-up')->first()->id])
                    ->get(['courier_shipment.*','shipments.*','courier_shipment.id as courier_shipment_id']);
        // $shipments = CourierShipment::with('shipment')->where(['type'=>'pickup','courier_id'=>Auth::guard('courier')->user()->id])->where('shipments.merchant_id',$user->id)->get();
        // dd($shipments);
        foreach ($shipments as $key => $shipment) {
            // dd($shipment);
            // dd(Shipment::find($shipment->shipment_id)->logistic_status);
            CourierShipment::find($shipment->courier_shipment_id)->update(['status'=>'received']);
            Shipment::where('id',$shipment->shipment_id)->where('logistic_status','<=',4)->update(['logistic_status'=>4]);
            event(new ShipmentMovementEvent(Shipment::find($shipment->shipment_id),LogisticStep::find(4),Auth::guard('courier')->user()));
        }
        return back();
    }
    function submit_at_unit($shipments)
    {
        foreach(explode(",",$shipments) as $key=>$value){
            $courier_shipment=CourierShipment::find($value);
            if($courier_shipment->shipment->logistic_status == 4){
                $courier_shipment->update(['status'=>'submitted_to_unit']);
                Shipment::where(['id'=>$courier_shipment->shipment_id,'logistic_status'=>LogisticStep::where('slug','picked-up')->first()->id])->update(['logistic_status'=>LogisticStep::where('slug','dropped-at-pickup-unit')->first()->id]);//updating status to unit-received
                event(new ShipmentMovementEvent(Shipment::find($courier_shipment->shipment_id)->first(),LogisticStep::find(5),Auth::guard('courier')->user()));
            }
            
        }
        return back();
    }
    public function agent_dispatch()
    {
        // show paracels date-wize
        // $boxes = Driver_hub_shipment_box::where('courier_id',Auth::guard('courier')->user()->id)
        // ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as date_count'))
        // ->groupBy('date')->get();
        $parcels = CourierShipment::where([
            'courier_id' => Auth::guard('courier')->user()->id,
            'type' => 'delivery','status'=>'pending'
        ])->get();
        //dd($parcels);
        return view('courier.shipment.agent-dispatch', compact('parcels'));
    }
    //Courier shipment details form shipments table
    function shipment_info(Shipment $shipment)
    {
        $crShipment = $shipment;
        return view('courier.shipment.includes.shipment-details', compact('crShipment'));
    }
    public function shipment_delivery_report(Request $req){
        try{
            // dd($req->all());
            $shipment = Shipment::find(CourierShipment::find($req->id)->shipment_id);
            // dd($shipment);
            switch($req->status){
                case 'delivered':
                    $shipment->logistic_status = LogisticStep::where('slug','delivered')->first()->id;
                    $shipment->save();
                    CourierShipment::where('id',$req->id)->update(['status'=>'delivered']);
                    ShipmentOTP::create([
                        'shipment_id'=>$shipment->id,
                        'courier_id'=> auth()->guard('courier')->user()->id,
                        'otp'=>'1234',
                        'sent_to_phone_number'=>$req->otp=='merchant'?$shipment->merchant->phone:$shipment->recipient['phone'],
                        'sent_to'=>$req->otp
                    ]);
                    event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','delivered')->first(),Auth::guard('courier')->user(),$req->note));
                    break;

                case 'hold':
                    $shipment->logistic_status = LogisticStep::where('slug','on-hold')->first()->id;
                    $shipment->save();
                    CourierShipment::where('id',$req->id)->update(['status'=>'hold']);
                    event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','on-hold')->first(),Auth::guard('courier')->user()));
                    break;
                
                case 'partial':
                    $shipment->logistic_status = LogisticStep::where('slug','partially-delivered')->first()->id;
                    $shipment->save();
                    CourierShipment::where('id',$req->id)->update(['status'=>'partially-delivered']);
                    event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','partially-delivered')->first(),Auth::guard('courier')->user()));
                    break;

                case 'return':
                    $shipment->logistic_status = LogisticStep::where('slug','returned-by-recipient')->first()->id;
                    $shipment->save();
                    CourierShipment::where('id',$req->id)->update(['status'=>'returned']);
                    
                    ShipmentOTP::create([
                        'shipment_id'=>$shipment->id,
                        'courier_id'=> auth()->guard('courier')->user()->id,
                        'otp'=>'1234',
                        'sent_to_phone_number'=>$req->otp=='merchant'?$shipment->merchant->phone:$shipment->recipient['phone'],
                        'sent_to'=>$req->otp
                    ]);
                    event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','returned-by-recipient')->first(),Auth::guard('courier')->user()));
                    break;

                case 'return-to-merchant':
                    $shipment->logistic_status = LogisticStep::where('slug','returned-handover-to-merchant')->first()->id;
                    $shipment->save();
                    CourierShipment::where('id',$req->id)->update(['status'=>'delivered']);
                    
                    ShipmentOTP::create([
                        'shipment_id'=>$shipment->id,
                        'courier_id'=> auth()->guard('courier')->user()->id,
                        'otp'=>'1234',
                        'sent_to_phone_number'=>$shipment->merchant->phone,
                        'sent_to'=>'merchant'
                    ]);
                    event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','returned-handover-to-merchant')->first(),Auth::guard('courier')->user()));
                    break;
            }
            return back()->with('message', 'Your report has been successfully submited!');
            // CourierShipment::where
        }
        catch(Exception $e){
            throw $e;
        }
    }
    function delivery_report(Request $request)
    {
        dd($request->all());
        if ($request->status == 'partial' && $request->price == '') {
            dd('Please set customer given price field');
        }
        $shipment_id = Driver_hub_shipment_box::where('id', $request->id)->pluck('shipment_id')->first();
        Session::put('shipment_id', $shipment_id);

        if ($request->status == 'delivered') {
            $number = 'on-6';
        } elseif ($request->status == 'partial') $number = 'on-6.5';
        elseif ($request->status == 'hold') $number = '7';
        elseif ($request->status == 'return') $number = 'on-8';
        else $number = '9';

        Shipment::where('id', Session::get('shipment_id'))->update(['shipping_status' => $number]);

        if ($request->status == 'partial' && $request->price != '') {
            Shipment::where('id', Session::get('shipment_id'))->update(['price' => $request->price]);
        }

        CourierShipment::create([
            'courier_id' => Auth::guard('courier')->user()->id, 'shipment_id' => Session::get('shipment_id'),
            'type' => $request->status
        ]);

        event(new ShipmentMovement(Session::get('shipment_id'), 'driver', Auth::guard('courier')->user()->id, 'delivery-report', 'Delivery Report for the shipment', $request->status));
        echo '<p class="alert alert-success">Your report has been successfully submited</p>';


        if ($request->price == '0') {
            $this->send_otp(Session::get('shipment_id'), $request->status, $request->otp);
        }

        if ($request->status != 'hold' && $request->status != 'delivered') {
            $this->send_otp(Session::get('shipment_id'), $request->status, $request->otp);
        }


        Driver_hub_shipment_box::where('id', $request->id)->update([
            'status' => $request->status, 'driver_note' => $request->driver_note,
        ]);
        // dd($shipment_id);
        return back()->with('message', 'Your report has been successfully submited!');
    }

    private function send_otp($shipment_id, $status, $otp)
    {
        if ($status == 'return') {
            // send sms to customer
            $shipment = Shipment::find($shipment_id);
            $message = 'Dear ' . $shipment->name . ', You got an TOP for verifying your parcel on ' . basic_information()->wensote_link . ' is #' . rand(999, 88888) . '. Please save the code till your parcels on your hand!';
            event(new SendingSMS('customer', $shipment->phone, $message));

            // send sms to merchant
            $shipment = Shipment::find($shipment_id);
            $message = 'Dear ' . $shipment->user->first_name . ', You got an TOP for verifying parcel delivery for the item #' . $shipment->invoice_id . '.  Your OTP is: ' . rand(999, 88888) . '. Please save the code till your parcels on your hand!';
            event(new SendingSMS('customer', $shipment->phone, $message));
        } else if ($status == 'hold') {
            // send sms to customer
            $shipment = Shipment::find($shipment_id);
            $message = 'Dear ' . $shipment->name . ', You got an TOP for verifying your parcel on ' . basic_information()->wensote_link . ' is #' . rand(999, 88888) . '. Please save the code till your parcels on your hand!';
            event(new SendingSMS('customer', $shipment->phone, $message));
        } else {
            if ($otp == 'customer') {
                // send sms to customer
                $shipment = Shipment::find($shipment_id);
                $message = 'Dear ' . $shipment->name . ', You got an TOP for verifying your parcel on ' . basic_information()->wensote_link . ' is #' . rand(999, 88888) . '. Please save the code till your parcels on your hand!';
                event(new SendingSMS('customer', $shipment->phone, $message));
            }
            if ($otp == 'merchant') {
                $shipment = Shipment::find($shipment_id);
                $message = 'Dear ' . $shipment->user->first_name . ', You got an TOP for verifying parcel delivery for the item #' . $shipment->invoice_id . '.  Your OTP is: ' . rand(999, 88888) . '. Please save the code till your parcels on your hand!';
                event(new SendingSMS('customer', $shipment->phone, $message));
            }
        }
    }
    public function return_agent_dispatch()
    {
        $paracels = Driver_return_shipment_box::where([
            'courier_id' => Auth::guard('courier')->user()->id,
            'status_in' => 'assigned'
        ])->get();
        // dd($paracels);
        return view('driver.shipment.return-agent-dispatch', compact('paracels'));
    }

    function return_delivery_report(Request $request)
    {
        dd($request->all());
    }


    function otp_confirmation(Request $request)
    {
        try{
            $shipment = Shipment::where('id', $request->shipment_id)->first();
            $shipment_otp=ShipmentOTP::where('shipment_id',$request->shipment_id)->where('courier_id',auth()->guard('courier')->user()->id)->first();
            if($request->otp == $shipment_otp->otp){
                $shipment_otp->collect_by()->associate(Auth::guard('courier')->user());
                $shipment_otp->confirmed=true;
                $shipment_otp->save();
                
                if($shipment->logistic_step->slug=='returned-by-recipient'){
                    // dd($shipment->logistic_step->slug);
                    $shipment->logistic_status = LogisticStep::where('slug','returned-by-recipient-confirmed')->first()->id;
                    $shipment->save();
                    event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','returned-by-recipient-confirmed')->first(),Auth::guard('courier')->user()));
                }
                else if($shipment->logistic_step->slug=='delivered'){
                    $shipment->logistic_status = LogisticStep::where('slug','delivery-confirmed')->first()->id;
                    $shipment->save();
                    event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','delivery-confirmed')->first(),Auth::guard('courier')->user()));
                }
                else if($shipment->logistic_step->slug=='returned-handover-to-merchant'){
                    $shipment->logistic_status = LogisticStep::where('slug','received-shipment-back')->first()->id;
                    $shipment->save();
                    event(new ShipmentMovementEvent($shipment,LogisticStep::where('slug','received-shipment-back')->first(),Auth::guard('courier')->user()));
                }
                
                return back()->with('message', 'The Shipment OTP has been confirmed successfully!');
            }
            return back()->with('message', 'OTP mismatched!');
        }
        catch(Exception $e){
            throw $e;
        }
        
    }

    public function drop_in_unit_shipment(){

    }
}
