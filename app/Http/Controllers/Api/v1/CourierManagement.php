<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Models\Shipment;
use App\Events\SendingSMS;
use Illuminate\Http\Request;
use App\Models\CourierShipment;
use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CourierManagement extends Controller
{
    public function shipments()
    {
        //$query->select('id', 'merchant_id','recipient','logistic_status')->orderBy('merchant_id');
        // $courier_shipments = CourierShipment::with([
        //     'shipment' => function ($query) {
        //         $query->select('merchant_id')->groupBy('merchant_id');
        //     },
        // ])->where('status', 'received')->get();

        // $courier_shipments = CourierShipment::with('shipment')->where('status', 'received')->get();
        // foreach($courier_shipments as $value){
        //     $mShipment = Shipment::where('merchant_id', $value->shipment->merchant_id)->get();
        //     dd(count($mShipment));
        //     $merchant = User::where('id', $value->shipment->merchant_id)->first();
        // }
        // exit;
        $shipments = Shipment::where('status',1)->select('merchant_id')->groupBy('merchant_id')->pluck('merchant_id')->toArray();
        $merchants = User::whereIn('id', $shipments)->get();
        //dd($user);
        return response()->json([
            'success' => true,
            'data'    => $merchants
        ], 200);
    }

    //Accept a paracel assigned from admin
    public function receiveShipment($id, Request $request)
    {

        $shipment = Shipment::find($id);
        CourierShipment::where(['courier_id' => Auth::guard('courier')->user()->id, 'shipment_id' => $id])->update(['status' => 'received']);
        Shipment::where('id', $id)->update(['shipping_status' => 2]);
        $message = 'Dear ' . $shipment->name . ', We ' . basic_information()->company_name . ' has received your parcel & we at your hand soon. Price of parcel delivery is: ' . $shipment->amount;
        event(new SendingSMS('customer', $shipment->phone, $message));
        return back();
    }

    public function shipmentDetails($merchant_id, $shipment_status)
    {
        //$merchant_id = User::find($merchant_id);
        //$shipments = Shipment::where(['merchant_id' => $id, 'status' => 1])->get();
        $shipments = Shipment::where(['merchant_id' => $merchant_id, 'status' => $shipment_status])->get(); // check status on shipment assignment or movement
        //dd($shipments);
        return response()->json([
            'success' => true,
            'data'    => $shipments
        ], 200);
    }

    public function cencel_parcel($id, Request $request)
    {
        CourierShipment::where('shipment_id', $id)->update(['note' => $request->note, 'status' => 'cancelled']);
        Shipment::where('id', $id)->update(['shipping_status' => 6]);
        // dd($id);
        return back();
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



    function receiveAllParcel(User $user)
    {
        // dd($user);
        $shipments = Shipment::where('merchant_id', $user->id)->get();
        foreach ($shipments as $key => $shipment) {
            $check = CourierShipment::where(['shipment_id' => $shipment->id, 'status' => 'received'])->get();
            if ($check->count() == 0) {
                CourierShipment::where(['courier_id' => Auth::guard('courier')->user()->id, 'shipment_id' => $shipment->id])->update(['status' => 'received']);
                Shipment::where('id', $shipment->id)->update(['shipping_status' => 2]);
                event(new ShipmentMovement($shipment->id, 'driver', Auth::guard('courier')->user()->id, 'receive-parcels', 'Receive parcels for pickup', 'receive'));

                $message = 'Dear ' . $shipment->name . ', We ' . basic_information()->company_name . ' has received your parcel & we at your hand soon. Price of parcel delivery is: ' . $shipment->total_price;
                event(new SendingSMS('customer', $shipment->phone, $message));
            }
            // echo $shipment->id.' = '.$check->count().'<br/>';
        }
        // dd($user);
        return back();
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
