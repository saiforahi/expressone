<?php

namespace App\Http\Controllers\Admin;

use App\Models\Courier;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourierShipment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DriverController extends Controller
{
    public function index()
    {
        $couriers = Courier::orderBy('id', 'DESC')->get();
        return view('admin.driver.driver', compact('couriers'));
    }

    public function delivery_note(Shipment $shipment)
    {
        return Driver_hub_shipment_box::where('shipment_id',$shipment->id)->pluck('driver_note')->first();
    }

    public function addEditCourier(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'email|max:191',
            'phone' => 'required|max:191',
            'password' => 'required|max:20|min:6|confirmed',
        ]);

        $register_user = new Courier();
        $register_user->courier_id = 'DR' . rand(100, 999) . time();
        $register_user->first_name = $request->first_name;
        $register_user->last_name = $request->last_name;
        $register_user->email = $request->email;
        $register_user->phone = $request->phone;
        $register_user->password = Hash::make($request->password);
        $register_user->save();

        Session::flash('message', 'Courier add successfully');
        return redirect('/admin/driver-list');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function courierDelete($id)
    {
        dd($id);
        try {
            Courier::find($id)->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('success','Courier not delete');
        }
        return redirect('/admin/driver-list')->with('success','Courier Delete successfully');
    }

    public function assigned_shipments($id){
        //$shipments = CourierShipment::with('shipment')->where('courier_id',$id)->get();
        $shipments = CourierShipment::with([
			'shipment' => function ($query) {
				$query->select('id', 'recipient','amount','weight');
			}
		])->where('courier_id',$id)->orderBy('id', 'DESC')->get();
        return view('admin.driver.shipments', compact('shipments'))->with('success','Courier assigned shipments');
    }
}
