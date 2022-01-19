<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Courier;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    public function index()
    {
        $driver = Courier::orderBy('id', 'DESC')->get();
        return view('admin.driver.driver', compact('driver'));
    }

    public function delivery_note(Shipment $shipment)
    {
        return Driver_hub_shipment_box::where('shipment_id',$shipment->id)->pluck('driver_note')->first();
    }

    public function store(Request $request)
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

    public function destroy($id)
    {
        Courier::find($id)->delete();
        Session::flash('message', 'Courier Delete successfully');
        return redirect('/admin/driver-list');
    }


    public function assigned_shipments($id){
        Session::flash('message', 'Courier assigned shipments');
        $shipments = Driver_shipment::where('courier_id',$id)->get();
        //dd($shipments);
        return view('admin.driver.shipments', compact('shipments'));
    }
}
