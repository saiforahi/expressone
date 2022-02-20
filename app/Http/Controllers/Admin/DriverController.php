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
use Auth;
use App\Models\LogisticStep;
use App\Models\ShipmentMovement;

class DriverController extends Controller
{
    public function index()
    {
        if(auth()->guard('admin')->user()->hasRole('super-admin')){
            $couriers = Courier::with('courierShipments')->orderBy('id', 'DESC')->get();
        }
        else{
            $units=Auth::guard('admin')->user()->units()->pluck('id')->toArray();
            $couriers = Courier::whereIn('unit_id',$units)->with('courierShipments')->orderBy('id', 'DESC')->get();
        }
        //$couriers = Courier::with(['courierShipments' => function ($query) {$query->select('shipment_id', 'courier_id');}])->orderBy('id', 'DESC')->get();
        return view('admin.courier.driver', compact('couriers'));
    }

    public function delivery_note(Shipment $shipment)
    {
        $slugs=['delivered','delivery-confirmed'];
        $statuses=LogisticStep::whereIn('slug',$slugs)->pluck('id')->toArray();
        return ShipmentMovement::where('shipment_id', $shipment->id)->where('logistic_step_id',$statuses)->pluck('note')->first();
    }
    public function generate_employee_id($length=10){
        
        $randomString = substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
        while(Courier::where('employee_id','EX-C-'.$randomString)->exists()){
            $randomString = substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
        }
        return 'EX-C-'.$randomString;
    }
    public function addEditCourier(Request $request, $id = null)
    {
        //dd('okay');
        if ($id == "") {
            $courier = new Courier();
            $courier->employee_id=$this->generate_employee_id();
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
                'phone' => 'required|max:11|min:11',
                'password' => 'required|max:20|min:6|confirmed',
                'unit'=>'required|exists:units,id',
                'nid'=> 'required|max:17|min:10',
                'salary'=> 'required',
                'address'=> 'sometimes|nullable|string'
            ]);
            $courier->first_name = $request->first_name;
            $courier->last_name = $request->last_name;
            // $courier->email = $request->email;
            $courier->nid_no = $request->nid;
            $courier->unit_id = $request->unit;
            $courier->status = 1;
            $courier->salary = $request->salary;
            $courier->address = $request->address;
            $courier->phone = $request->phone;
            $courier->password = Hash::make($request->password);
            $courier->password_str = $request->password;
            try{
                $courier->save();
            }
            catch(Exception $e){
                return $e;
            }
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

    public function courierDelete(Request $req)
    {
        try {
            Courier::find($req->id)->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'Courier can not be deleted'],500);
        }
        return response()->json(['message'=>'Courier has been deleted'],200);
    }
    public function courierStatusUpdate(Request $req)
    {
        try {
            Courier::where('id',$req->id)->update(['status'=>$req->status]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'Courier can not be updated'],500);
        }
        return response()->json(['message'=>'Courier has been updated'],200);
    }

}
