<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Courier;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Models\CourierShipment;

use App\Driver_hub_shipment_box;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DriverController extends Controller
{
    public function index()
    {
        $driver = Courier::orderBy('id', 'DESC')->get();
        return view('admin.driver.driver', compact('driver'));
    }

    public function delivery_note(Shipment $shipment)
    {
        return Driver_hub_shipment_box::where('shipment_id', $shipment->id)->pluck('driver_note')->first();
    }

    public function addEditCourier(Request $request, $id = null)
    {
        //dd('okay');
        if ($id == "") {
            $courier = new Courier();
            $title = "Add Courier";
            $buttonText = "Save";
            $message = "Courier has been created successfully!";
        } else {
            $courier =  Courier::find($id);
            $title = "Update Courier";
            $buttonText = "Save";
            $message = "Courier information has been updated successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $request->validate([
                'first_name' => 'required|max:191',
                'last_name' => 'required|max:191',
                'email' => 'email|max:191',
                'phone' => 'required|max:191',
                'password' => 'required|max:20|min:6|confirmed',
            ]);
            $courier->first_name = $request->first_name;
            $courier->employee_id = 'EX' . rand(100, 999);
            $courier->last_name = $request->last_name;
            $courier->email = $request->email;
            $courier->phone = $request->phone;
            $courier->password = Hash::make($request->password);
            $courier->save();
            return redirect()->route('allCourier')->with('success', $message);
        }
        return view('admin.courier.addEditCourier', compact('title', 'buttonText', 'message', 'courier'));
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
        $register_user->employee_id = 'DR' . rand(100, 999) . time();
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
        Courier::find($id)->delete();
        Session::flash('message', 'Courier Delete successfully');
        return redirect()->back();
    }


    public function assigned_shipments($id)
    {
        Session::flash('message', 'Courier assigned shipments');
        $shipments = CourierShipment::where('courier_id', $id)->get();
        //dd($shipments);
        return view('admin.driver.shipments', compact('shipments'));
    }
}
