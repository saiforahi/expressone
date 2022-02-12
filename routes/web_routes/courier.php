<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Courier\ShipmentController;
use App\Http\Controllers\Courier\AuthController as CourierAuthController;
use App\Http\Controllers\Courier\DashboardController as CourierDashboardController;


Route::get('courier/login', [CourierAuthController::class,'index'])->name('courier.login.show');
Route::post('courier/login', [CourierAuthController::class,'login'])->name('courier.login');
Route::post('courier/register', [CourierAuthController::class,'store'])->name('courier.register');
Route::post('courier/logout', [CourierAuthController::class,'logout'])->name('courier.logout');

Route::group(['middleware' => 'auth:courier', 'namespace' => 'Courier', 'prefix' => 'courier'], function () {
    Route::get('/', [CourierDashboardController::class,'index'])->name('courier.dashboard');
    Route::get('/profile', [CourierDashboardController::class,'show_profile'])->name('courier.profile');
    Route::get('/profile-edit', [CourierDashboardController::class,'show_profile_edit'])->name('courier.profileEdit');
    Route::post('/profile-update', [CourierDashboardController::class,'profile_update'])->name('courier.profileUpdate');
    Route::get('get-shipments/{type}', [CourierDashboardController::class,'shipments'])->name('get-driver-shipments');
    Route::get('get-shipments-with-dates/{dates}/{type}', [CourierDashboardController::class,'shipments_dates'])->name('dateWize-driver-shipments');

    Route::get('shipments', [ShipmentController::class,'index'])->name('courierShipments');
    Route::get('my-shipments/{type}', [ShipmentController::class,'my_shipments'])->name('my-shipments');
    //Route::get('shipping-details/{id}/{status}', [ShipmentController::class,'show'])->name('shipping-details');
    Route::get('shipping-details/{id}/', [ShipmentController::class,'show'])->name('shipping-details');

    Route::get('cencell-parcel/{id}', [ShipmentController::class,'cencel_parcel'])->name('cancel-parcel');
    Route::get('receive-shipment/{id}', [ShipmentController::class,'receive_parcel'])->name('receive-parcel');
    Route::get('submit-shipment/{id}', [ShipmentController::class,'submit_parcel'])->name('submit-parcel');
    Route::get('receive-all-shipment/{user}', [ShipmentController::class,'receive_all_parcel'])->name('receive-all-parcel');
    Route::get('submit-all-shipments/{shipments}', [ShipmentController::class,'submit_at_unit'])->name('submit-all-shipments');

    Route::get('my-parcels/{type}', [ShipmentController::class,'my_parcels'])->name('my-parcel');

    Route::get('agent-dispatch', [ShipmentController::class,'agent_dispatch'])->name('box-for-delivery');
    Route::get('shipment-details/{shipment}', [ShipmentController::class,'shipment_info'])->name('shipment-details');

    Route::post('shipment-delivery', [ShipmentController::class,'shipment_delivery_report'])->name('shipment-delivery');
    Route::post('shipment-return-delivery', [ShipmentController::class,'shipment_return_delivery_report'])->name('shipment-return-delivery');

    Route::get('return-agent-dispatch', [ShipmentController::class,'return_agent_dispatch'])->name('return-box-for-delivery');

    Route::post('return-shipment-delivery', [ShipmentController::class,'return_delivery_report'])->name('return-shipment-delivery');
    Route::post('confirm-otp', [ShipmentController::class,'otp_confirmation'])->name('confirm-opt');
    Route::get('return-shipment/{shipment_id}', [ShipmentController::class,'return_shipment'])->name('return-shipment');
});
