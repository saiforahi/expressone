<?php

use App\Models\Admin;
use App\Models\BasicInformation;
use App\Models\Courier;
use App\Models\CourierShipment;
use App\Models\Shipment;
use App\Models\Unit;

use App\Models\User;
use App\Models\Location;
use App\Models\LogisticStep;
use App\Models\UnitShipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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


function get_zone($id)
{
    return Unit::findOrFail($id);
}

function unit_from_location($id)
{
    $area = Location::find($id);
    return Unit::where('id', $area->hub_id)->first();
}

function is_user_filled($id)
{
    $user = User::find($id);
    if (empty($user->shop_name) || empty($user->address) || empty($user->unit_id) || (empty($user->nid_no))) {
        request()->session()->flash('message', 'Please complete your profile first!');
        return 0;
    } else return 1;
}

function user_shipment($id, $status = 1, $shipping_status = 0)
{
    return Shipment::where('merchant_id', $id)->where(['status' => $status, 'shipping_status' => $shipping_status])->get();
}

function courier_shipments($courier_id, $merchant_id)
{
    $num=DB::table('courier_shipment')->where(['type'=>'pickup','courier_id'=>$courier_id])->join('shipments','courier_shipment.shipment_id','shipments.id')->where('shipments.merchant_id',$merchant_id)->select('shipments.merchant_id')->groupBy('shipments.merchant_id')->pluck('shipments.merchant_id')->toArray();
    return COUNT($num);
}

// driver received shipments
function pick_shipments($courier_id, $merchant_id)
{
    $shipments = Shipment::where('merchant_id', $merchant_id)->where(['status' => 1, 'shipping_status' => 2])->get();
    $num = array();
    foreach ($shipments as $key => $shipment) {
        $num[] = CourierShipment::where(['courier_id' => auth()->guard('courier')->user()->id, 'shipment_id' => $shipment->id])->count();
    }
    return COUNT($num);
}

function is_belongsTo_hub($userHub, $authHub)
{
    if (auth()->guard('admin')->user()->hasRole('super-admin')) {
        return true;
    } else {
        if ($userHub == $authHub) return true;
        else return false;
    }
}


function is_shipment_On_dispatch($id)
{
    return UnitShipment::where(['shipment_id' => $id, 'status' => 'on-dispatch'])->count();
}

function unit_shipment_count($unit_id, $status)
{
    return UnitShipment::where(['unit_id' => $unit_id, 'status' => $status])->count();
}

// helper function for agent-dispatch on logistic
function is_assigned2Driver($box_id, $shipment_id, $status)
{
    return UnitShipment::where([
        'hub_shipment_box_id' => $box_id, 'shipment_id' => $shipment_id, 'status' => $status
    ])->count();
}

function checkAdminAccess()
{
    if (auth()->guard('admin')->user()->type == 'admin') {
        return 1;
    }
    // $access = \App\Admin_role::where('admin_id',Auth::guard('admin')->user()->id)->where('route',$route);
    return 0;
}

if (!function_exists('custom_asset')) {
    function custom_asset($path, $secure = null)
    {
        return app('url')->asset('public/' . $path, $secure);
        //return app('url')->asset('public/'.$path, $secure);
    }
}
if (!function_exists('check_if_email_exists')) {
    function check_if_email_exists($email)
    {
        return Admin::where('email', $email)->exists() | User::where('email', $email)->exists() | Courier::where('email', $email)->exists();
    }
}
if (!function_exists('get_first_user_by_email')) {
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
if (!function_exists('random_unique_string_generate')) {
    function random_unique_string_generate($model, $field)
    {
        $value = substr(md5(mt_rand()), 0, 7);
        while ($model::where($field, $value)->exists()) {
            $value = substr(md5(mt_rand()), 0, 7);
        }
        return 'ex1' . $value;
    }
}

if (!function_exists('active_guard')) {
    function active_guard()
    {
        foreach (array_keys(config('auth.guards')) as $guard) {

            if (auth()->guard($guard)->check()) return $guard;
        }
        return null;
    }
}

if (!function_exists('get_shipments_for_logged_in_admin')) {
    function get_shipments_for_logged_in_admin($logistic_step_slug_array)
    {
        $shipments=array();
        if(auth()->guard('admin')->user()->hasRole('super-admin')){
            $shipments=Shipment::cousins()->whereIn('logistic_steps.slug',$logistic_step_slug_array)->get();
        }
        else{
            $shipments = Shipment::cousins()->where('admins.id',auth()->guard('admin')->user()->id)->whereIn('logistic_steps.slug',$logistic_step_slug_array)->get();
        }
        return $shipments;
    }
}

if (!function_exists('user_hub_count')) {
    function user_hub_count($logistic_step_slug_array)
    {
        $shipments=array();
        if(auth()->guard('admin')->user()->hasRole('super-admin')){
            $shipments=Shipment::cousins()->whereIn('shipments.logistic_status',$logistic_step_slug_array)->get();
        }
        else{
            $shipments = Shipment::cousins()->where('admins.id',auth()->guard('admin')->user()->id)->whereIn('logistic_steps.slug',$logistic_step_slug_array)->get();
        }
        return $shipments;
    }
}

if (!function_exists('count_shipment_for_delivery_unit')) {
    function count_shipment_for_delivery_unit($unit_id,$merchant_id)
    {
        $shipments = Shipment::where(['merchant_id'=>$merchant_id,'logistic_status'=>6])->deliverycousins()->join('unit_shipment','unit_shipment.shipment_id','shipments.id')->where('units.id',$unit_id)->get(['shipments.*'])->count();
        return $shipments;
    }
}

if (!function_exists('is_courier_assign_available_for_pickup')) {
    function is_courier_assign_available_for_pickup($shipments)
    {
        dd($shipments->select('id')->toArray());
    }
}

if (!function_exists('is_courier_assigned_for_delivery')) {
    function is_courier_assigned_for_delivery($shipment)
    {
        return CourierShipment::where(['shipment_id'=>$shipment->id,'type'=>'delivery'])->exists();
    }
}

if (!function_exists('merchant_wise_reurn_in_transit_shipments_for_logged_in_admin')) {
    function merchant_wise_reurn_in_transit_shipments_for_logged_in_admin($user,$logistic_statuses)
    {
        $total=Shipment::whereIn('logistic_status',$logistic_statuses)->where('merchant_id',$user->id)->cousins()->where('units.admin_id',Auth::guard('admin')->user()->id)->count();
        return $total;
    }
}

if (!function_exists('merchant_wise_total_shipments_for_logged_in_courier_to_pickup')) {
    function merchant_wise_total_shipments_for_logged_in_courier_to_pickup($user,$courier)
    {
        $statuses=LogisticStep::where('slug','to-pick-up')->orWhere('slug','picked-up')->orWhere('slug','dropped-at-pickup-unit')->pluck('id')->toArray();
        $total=Shipment::where('merchant_id',$user->id)->whereIn('logistic_status',$statuses)
            ->join('courier_shipment','courier_shipment.shipment_id','shipments.id')
            ->where(['courier_shipment.courier_id'=>$courier->id,'courier_shipment.type'=>'pickup'])->count();
            // dd($total);
        return $total;
    }
}

if (!function_exists('delivery_units')) {
    function delivery_units()
    {
        $units=Shipment::where('logistic_status',LogisticStep::where('slug','unit-received')->first()->id)->deliverycousins()->get(['units.*']);
        return $units;
    }
}