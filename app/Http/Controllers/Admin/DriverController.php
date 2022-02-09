<?php

namespace App\Http\Controllers\Admin;

use App\Models\Courier;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourierShipment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\LinesOfCode\Counter;
use App\Models\LogisticStep;
use App\Models\ShipmentMovement;

class DriverController extends Controller
{
    public function index()
    {
        $couriers = Courier::with('courierShipments')->orderBy('id', 'DESC')->get();
        //$couriers = Courier::with(['courierShipments' => function ($query) {$query->select('shipment_id', 'courier_id');}])->orderBy('id', 'DESC')->get();
        return view('admin.courier.driver', compact('couriers'));
    }

    public function delivery_note(Shipment $shipment)
    {
        $slugs=['delivered','delivery-confirmed'];
        $statuses=LogisticStep::whereIn('slug',$slugs)->pluck('id')->toArray();
        return ShipmentMovement::where('shipment_id', $shipment->id)->where('logistic_step_id',$statuses)->pluck('note')->first();
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
            $courier->last_name = $request->last_name;
            $courier->email = $request->email;
            $courier->phone = $request->phone;
            $courier->password = Hash::make($request->password);
            $courier->save();
            return redirect()->route('allCourier')->with('success', $message);
        }
        return view('admin.courier.addEditCourier', compact('title', 'buttonText', 'message','courier'));
    }
    public function assigned_shipments($id)
    {
        //$shipments = CourierShipment::with('shipment')->where('courier_id',$id)->get();
        $shipments = CourierShipment::with([
            'shipment' => function ($query) {$query->select('id', 'recipient', 'amount', 'weight');}])->where('courier_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.courier.shipments', compact('shipments'))->with('success', 'Courier assigned shipments');
    }

    public function courierDelete($id)
    {
        try {
            Courier::find($id)->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('success', 'Courier not delete');
        }
        return redirect('admin/courier')->with('success', 'Courier Delete successfully');
    }


}
