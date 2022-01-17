<?php

use App\Models\Admin;
use App\Models\BasicInformation;
use App\Models\Courier;
use App\Models\CourierShipment;
use App\Models\Shipment;
use App\Models\Unit;

use App\Models\User;
use App\Models\Location;
use App\Models\UnitShipment;
// use Illuminate\Support\Facades\Auth;

function basic_information()
{
    $data = BasicInformation::all();
    if ($data->count() < 1) {
        $insert = new BasicInformation();
        $insert->status = 0;
        $insert->save();
    }
    $data = BasicInformation::all()->first();
    return $data;
}


function get_zone($id){
    return Unit::findOrFail($id);
}

function unit_from_location($id){
    $area = Location::find($id);
    return Unit::where('id',$area->hub_id)->first();
}

function is_user_filled($id){
    $user = User::find($id);
    if(empty($user->shop_name) || empty($user->address) || empty($user->unit_id) || (empty($user->id_value) && empty($user->id_type))){
        request()->session()->flash('message', 'Please complete your profile first!');
        return 0;
    }else return 1;
}

function user_shipment($id, $status = 1,$shipping_status=0)
{
    return Shipment::where('user_id', $id)->where(['status'=>$status,'shipping_status'=>$shipping_status])->get();
}

function driver_shipments($driver_id, $user_id)
{
    $shipments = Shipment::where('user_id',$user_id)->where(['status'=>1,'shipping_status'=>1])->get();
    $num = array();
    foreach ($shipments as $key => $shipment) {
        $num[] = CourierShipment::where(['driver_id'=>auth()->guard('driver')->user()->id,'shipment_id'=>$shipment->id])->count();
    }
    return COUNT($num);
}

// driver received shipments
function pick_shipments($driver_id, $user_id)
{
    $shipments = Shipment::where('user_id',$user_id)->where(['status'=>1,'shipping_status'=>2])->get();
    $num = array();
    foreach ($shipments as $key => $shipment) {
        $num[] = CourierShipment::where(['driver_id'=> auth()->guard('driver')->user()->id,'shipment_id'=>$shipment->id])->count();
    }
    return COUNT($num);
}

function is_belongsTo_hub($userHub,$authHub){
    if(auth()->guard('admin')->user()->role_id ==1)  {
        return true;
    }else{
        if($userHub==$authHub) return true;else return false;
    }
}


function is_shipment_On_dispatch($id){
    return UnitShipment::where(['shipment_id'=>$id,'status'=>'on-dispatch'])->count();
}

function unit_shipment_count($unit_id,$status){
    return UnitShipment::where(['unit_id'=>$unit_id,'status'=>$status])->count();
}

// helper function for agent-dispatch on logistic
function is_assigned2Driver($box_id, $shipment_id,$status){
    return UnitShipment::where([
        'hub_shipment_box_id'=>$box_id,'shipment_id'=>$shipment_id,'status'=>$status
    ])->count();
}

function checkAdminAccess(){
    if(auth()->guard('admin')->user()->type =='admin')  {
        return 1;
    }
    // $access = \App\Admin_role::where('admin_id',Auth::guard('admin')->user()->id)->where('route',$route);
    return 0;
}

if (! function_exists('custom_asset')) {
    function custom_asset($path, $secure = null)
    {
        return app('url')->asset('public/'.$path, $secure);
        //return app('url')->asset('public/'.$path, $secure);
    }
}
if (! function_exists('check_if_email_exists')) {
    function check_if_email_exists($email)
    {
        return Admin::where('email',$email)->exists() | User::where('email',$email)->exists() | Courier::where('email',$email)->exists();
    }
}
if (! function_exists('get_first_user_by_email')) {
    function get_first_user_by_email($email)
    {
        $user = null;
        if(Admin::where('email',$email)->exists()){
            $user = Admin::with('roles')->where('email',$email)->first();
        }
        else if(User::where('email',$email)->exists()){
            $user = User::where('email',$email)->first();
        }
        else if(Courier::where('email',$email)->exists()){
            $user = Courier::where('email',$email)->first();
        }
        return  $user;
    }
}
if (! function_exists('random_unique_string_generate')) {
    function random_unique_string_generate($model,$field)
    {
        $value=substr(md5(mt_rand()), 0, 7);
        while($model::where($field,$value)->exists()){
            $value=substr(md5(mt_rand()), 0, 7);
        }
        return 'ex1'.$value;
    }
}

if (! function_exists('active_guard')) {
    function active_guard()
    {
        foreach(array_keys(config('auth.guards')) as $guard){

            if(auth()->guard($guard)->check()) return $guard;
        }
        return null;
    }
}
