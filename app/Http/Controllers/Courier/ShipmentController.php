<?php

namespace App\Http\Controllers\Courier;

use App\Models\User;
use App\Models\Shipment;
use App\Events\SendingSMS;
use Illuminate\Http\Request;
use App\Models\CourierShipment;
use App\Models\ShipmentPayment;
use App\Events\ShipmentMovement;
use App\CourierShipment_delivery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipment = Shipment::where('status',1)->select('merchant_id')->groupBy('merchant_id')->pluck('merchant_id')->toArray();
        $user = User::whereIn('id',$shipment)->get();
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
        return back()->with('success','This parcel submittd to unit');
    }

    public function my_shipments($type)
    {
        if ($type = 'return') {
            $shipments = Driver_hub_shipment_box::latest()->where(['courier_id' => Auth::guard('courier')->user()->id, 'status' => $type])->get();
        }

        return view('driver.shipment.my-shipments', compact('shipments', 'type'));
    }

    function my_parcels($type)
    {
        $shipments = CourierShipment::latest()->where(['courier_id' => Auth::guard('courier')->user()->id, 'status' => $type])->get();
        return view('driver.shipment.my-parcels', compact('shipments', 'type'));
    }

    public function show($id, $status)
    {
        // $shipments = CourierShipment::where(['courier_id' => Auth::guard('courier')->user()->id, 'status' => $status])->get();
        // $user = User::find($id);
        // return view('courier.shipment.shipment-more', compact('shipments', 'user'));
        //dd($id);
        // $shipments = Shipment::where('user_id',$id)->where(['status'=>1,'shipping_status'=>1])->get();
        $shipments = CourierShipment::where(['courier_id'=> Auth::guard('courier')->user()->id,'status'=>$status])->get();
        // dd($status);
        $user = User::find($id);
        return view('courier.shipment.shipment-more', compact('shipments', 'user'));
    }

    function receive_all_parcel(User $user)
    {
        // dd($user);
        $shipments = Shipment::where('merchant_id', $user->id)->get();
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
            CourierShipment::where('shipment_id',$value)->update(['status'=>'submitted_to_unit']);
            $shipment=Shipment::where(['id'=>$value,'logistic_status'=>4])->update(['logistic_status'=>5]);//updating status to unit-received

            event(new ShipmentMovementEvent(Shipment::find($shipment),LogisticStep::find(5),Auth::guard('courier')->user()));
        }
        // dd($user);
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
            'status' => 'delivered'
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

    function delivery_report(Request $request)
    {
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
        $shipment = Shipment::where('id', $request->shipment_id);
        $status = substr($shipment->first()->shipping_status, -1, strpos($shipment->first()->shipping_status, '-'));
        Shipmnet_OTP_confirmation::create([
            'otp' => $request->otp,
            'collect_by' => $request->collect_by,
            'shipment_id' => $shipment->first()->id,
            'courier_id' => Auth::guard('courier')->user()->id,
        ]);
        $shipment->update(['shipping_status' => $status]);
        return back()->with('message', 'The Shipment OTP has been confirmed successfully!');
    }
}
