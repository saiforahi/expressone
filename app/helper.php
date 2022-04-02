<?php

use App\Models\Admin;
use App\Models\BasicInformation;
use App\Models\Courier;
use App\Models\CourierShipment;
use App\Models\Shipment;
use App\Models\Unit;
use App\Models\MerchantPayment;
use App\Models\User;
use App\Models\Location;
use App\Models\LogisticStep;
use App\Models\UnitShipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Hash;
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
    function get_shipments_for_logged_in_admin($logistic_step_slug_array,$user)
    {
        $statuses=LogisticStep::whereIn('slug',$logistic_step_slug_array)->pluck('id')->toArray();
        // dd($statuses);
        $shipments=array();
        if(auth()->guard('admin')->user()->hasRole('super-admin')){
            $shipments=Shipment::where('merchant_id',$user->id)->cousins()->whereIn('logistic_steps.id',$statuses)->get(['shipments.*']);
        }
        else{
            $shipments = Shipment::whereIn('logistic_status',$statuses)->where('merchant_id',$user->id)->cousins()->where('units.admin_id',auth()->guard('admin')->user()->id)->get(['shipments.*']);
        }
        // dd($shipments);
        return $shipments;
    }
}
if (!function_exists('unit_wise_in_transit_shipments')) {
    function unit_wise_in_transit_shipments($unit_id,$logistic_step_slug_array=array('in-transit'))
    {
        $statuses=LogisticStep::whereIn('slug',$logistic_step_slug_array)->pluck('id')->toArray();
        $shipments=array();
        if(Auth::guard('admin')->user()->hasRole('super-admin')){
            $shipments=Shipment::cousins()->whereIn('logistic_steps.id',$statuses)->where('units.id',$unit_id)->get();
        }
        else{
            $shipments = Unit::join('points','points.unit_id','units.id')->join('locations','locations.point_id','points.id')->join('shipments','shipments.delivery_location_id','locations.id')
            ->where('units.id',$unit_id)->whereIn('shipments.logistic_status',$statuses)->get(['shipments.*']);
            
        }
        return $shipments->count();
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
if (!function_exists('is_courier_assigned_for_return_delivery')) {
    function is_courier_assigned_for_return_delivery($shipment)
    {
        // dd($shipment);
        return CourierShipment::where(['shipment_id'=>$shipment->id,'type'=>'return'])->exists();
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
        $statuses=LogisticStep::where('slug','to-pick-up')->orWhere('slug','picked-up')->pluck('id')->toArray();
        // dd($statuses);
        $total=Shipment::whereIn('logistic_status',$statuses)->join('courier_shipment','courier_shipment.shipment_id','shipments.id')
            ->where('shipments.merchant_id',$user->id)
            ->where(['courier_shipment.courier_id'=>$courier->id,'courier_shipment.type'=>'pickup'])->count();
            // dd($total);
        return $total;
    }
}

if (!function_exists('delivery_units')) {
    function delivery_units()
    {
        $units=Shipment::where('logistic_status',LogisticStep::where('slug','unit-received')->first()->id)->deliverycousins()->select('units.*')->distinct()->get();
        return $units;
    }
}

if (!function_exists('unit_wise_return_shipment_count')) {
    function unit_wise_return_shipment_count($unit_id,$logistic_step_slug_array=array('returned-sorted'))
    {
        $statuses=LogisticStep::whereIn('slug',$logistic_step_slug_array)->pluck('id')->toArray();
        $shipments=array();
        if(Auth::guard('admin')->user()->hasRole('super-admin')){
            $shipments=Shipment::cousins()->whereIn('logistic_steps.id',$statuses)->where('units.id',$unit_id)->get();
        }
        else{
            $shipments = DB::table('units')->join('points','points.unit_id','units.id')
            ->join('locations','locations.point_id','points.id')
            ->join('shipments','shipments.pickup_location_id','locations.id')
            ->where('units.id',$unit_id)->whereIn('shipments.logistic_status',$statuses)->get(['shipments.*']);
            
        }
        return $shipments->count();
    }
}
if (!function_exists('payable_amount')) {
    function payable_amount(Shipment $shipment)
    {
        return $shipment->payment_detail->cod_amount-($shipment->payment_detail->delivery_charge+$shipment->payment_detail->weight_charge);
    }
}
if (!function_exists('total_paid')) {
    function total_paid(Shipment $shipment)
    {
        return MerchantPayment::where('shipment_id',$shipment->id)->sum('amount');
    }
}

if (!function_exists('is_shipment_payable')) {
    function is_shipment_payable(Shipment $shipment)
    {
        // dd(payable_amount($shipment));
        return MerchantPayment::where('shipment_id',$shipment->id)->sum('amount') < payable_amount($shipment);
    }
}

if (!function_exists('total_pickup_shipments')) {
    function total_pickup_shipments(Admin $admin)
    {
        $statuses=LogisticStep::where('slug','unit-received')->orWhere('slug','picked-up')->orWhere('slug','dropped-at-pickup-unit')->pluck('id')->toArray();
        if($admin->hasRole('super-admin')){
            return Shipment::whereIn('logistic_status',$statuses)->count();
        }
        else{
            return Shipment::whereIn('logistic_status',$statuses)->cousins()->where('units.admin_id',$admin->id)->count();
        }
    }
}

if (!function_exists('total_delivered_shipments')) {
    function total_delivered_shipments(Admin $admin)
    {
        $statuses=LogisticStep::where('slug','delivery-confirmed')->pluck('id')->toArray();
        if($admin->hasRole('super-admin')){
            return Shipment::whereIn('logistic_status',$statuses)->count();
        }
        else{
            return Shipment::whereIn('logistic_status',$statuses)->deliverycousins()->where('units.admin_id',$admin->id)->count();
        }
    }
}

if (!function_exists('total_cod_outstanding')) {
    function total_cod_outstanding(Admin $admin)
    {
        $statuses=LogisticStep::where('slug','delivery-confirmed')->pluck('id')->toArray();
        if($admin->hasRole('super-admin')){
            $total_cod=Shipment::whereIn('logistic_status',$statuses)
            ->join('shipment_payments','shipment_payments.shipment_id','=','shipments.id')->sum('shipment_payments.cod_amount');
            
            $total_paid=Shipment::whereIn('logistic_status',$statuses)
            ->join('merchant_payments','merchant_payments.shipment_id','=','shipments.id')->sum('merchant_payments.amount');
            
            return $total_cod-$total_paid;
            // return Shipment::whereIn('logistic_status',$statuses)->count();
        }
        else{
            $total_cod=Shipment::whereIn('logistic_status',$statuses)->deliverycousins()->where('units.admin_id',$admin->id)
            ->join('shipment_payments','shipment_payments.shipment_id','=','shipments.id')->sum('shipment_payments.cod_amount');
            
            $total_paid=Shipment::whereIn('logistic_status',$statuses)->deliverycousins()->where('units.admin_id',$admin->id)
            ->join('merchant_payments','merchant_payments.shipment_id','=','shipments.id')->sum('merchant_payments.amount');
            
            return $total_cod-$total_paid;
        }
    }
}

if (!function_exists('unit_collected_cod_amount')) {
    function unit_collected_cod_amount($unit_id)
    {
        $total_collected = DB::table('shipments')
        ->join('shipment_payments','shipment_payments.shipment_id','=','shipments.id')
        ->join('locations','locations.id','=','shipments.delivery_location_id')
        ->join('points','points.id','=','locations.point_id')
        ->join('units','units.id','=','points.unit_id')
        ->where('shipment_payments.collected_by_id','!=','null')
        ->where('units.id','=',$unit_id)->sum('shipment_payments.cod_amount');
        return $total_collected;
    }
}

if (!function_exists('unit_paid_amount')) {
    function unit_paid_amount($unit_id)
    {
        $total_paid = DB::table('shipments')
        ->join('shipment_payments','shipment_payments.shipment_id','=','shipments.id')
        ->join('locations','locations.id','=','shipments.delivery_location_id')
        ->join('points','points.id','=','locations.point_id')
        ->join('units','units.id','=','points.unit_id')
        ->where('shipment_payments.collected_by_id','!=','null')
        ->where('shipment_payments.paid_amount','!=','null')
        ->where('units.id','=',$unit_id)->sum('shipment_payments.paid_amount');
        return $total_paid;
    }
}