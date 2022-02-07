<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use App\Models\ShipmentPayment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ShippingChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataSet['title'] = "Shipping/Consignment Charge";
        $dataSet['shippingCharges'] = ShippingCharge::orderBy('id', 'desc')->get();
        return view('admin.shipping_charge.shipping_charge', $dataSet);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addEditCharge(Request $request, $id = null)
    {
        if ($id == "") {
            //Add Shipping Charge
            $charge = new ShippingCharge();
            $title = "Add Charge";
            $buttonText = "Save";
            $message = "Shipping Charge has been saved successfully!";
            //dd($message);
        } else {
            //Update Shipping Shipping Charge
            $charge = ShippingCharge::find($id);
            $title = "Update";
            $buttonText = "Update";
            $message = "Shipping Charge has been saved successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            //dd($data);
            //Validation rules
            $rules = [
                'consignment_type' => 'required',
                'shipping_amount' => 'required'
            ];
            //Validation message
            $customMessage = [
                'consignment_type.required' => 'Consignment type required',
                'shipping_amount.required' => 'Shipping amount required'
            ];

            $this->validate($request, $rules, $customMessage);
            //Saving other field to posts table
            $charge->consignment_type = $data['consignment_type'];
            $charge->shipping_amount = $data['shipping_amount'];
            $charge->save();
            return redirect()->route('shippingCharges')->with('success', $message);
        }
        return view('admin.shipping_charge.addEditCharge', compact('title', 'buttonText', 'message', 'charge'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setShippingCharge(Request $request, $id)
    {
        try {
            // dd($request->all());
            $parcel = Shipment::findOrFail($id);
            $parcel->service_type = $request->result[$id];
            $parcel->save();
            
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ShippingCharge  $shippingCharge
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingCharge $shippingCharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShippingCharge  $shippingCharge
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingCharge $shippingCharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShippingCharge  $shippingCharge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingCharge $shippingCharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShippingCharge  $shippingCharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingCharge $shippingCharge)
    {
        //
    }
}
