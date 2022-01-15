<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Merchant\ShipmentController;
use App\Http\Controllers\Merchant\ShippingChargeController;
use App\Http\Controllers\Merchant\DashboardController;


Route::get('/login', [App\Http\Controllers\AuthController::class,'index'])->name('login');
Route::get('/verify', [App\Http\Controllers\AuthController::class,'verify'])->name('verify-user');
Route::post('/verify', [App\Http\Controllers\AuthController::class,'verify_code'])->name('verify-user-code');
Route::post('/verification.resend', [App\Http\Controllers\AuthController::class,'send_verification_code'])->name('verification.resend');
//Merchant
Route::post('/login', [App\Http\Controllers\AuthController::class,'login'])->name('login.store');
Route::get('/register', [App\Http\Controllers\AuthController::class,'register'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class,'registerStore'])->name('register.store');
Route::post('/logout', [App\Http\Controllers\AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => 'auth:user', 'namespace' => 'Merchant'], function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('merchant.dashboard');
    Route::get('/shipment-info/{shipment}', 'ShipmentController@show')->name('single.shipment');
    Route::get('/shipment-pdf/{shipment}', 'ShipmentController@shipment_pdf')->name('pdf.shipment');
    Route::get('/shipment-invoice/{id}', 'ShipmentController@shipmentInvoice')->name('shipmentInvoice');
    Route::get('/shipment-cnote/{shipment}', 'ShipmentController@shipmentConsNote')->name('merchant.shipmentCn');
    Route::post('set-shipping-charge/{id}', [ShippingChargeController::class, 'setShippingCharge'])->name('setShippingCharge');
    //Profile
    Route::get('/profile', [MerchantDashboardController::class,'profile'])->name('profile');
    Route::get('/profile-edit', [MerchantDashboardController::class,'ProfileEdit'])->name('ProfileEdit');
    Route::post('/profile-update', [MerchantDashboardController::class,'ProfileUpdate'])->name('ProfileUpdate');
    //Account
    Route::get('/account', [MerchantDashboardController::class,'account'])->name('account');
    Route::post('/change-email', [MerchantDashboardController::class,'ChangeMail'])->name('ChangeMail');
    Route::post('/change-password', [MerchantDashboardController::class,'ChangePassword'])->name('ChangePassword');
    //Merchant Shipment
    Route::match(['get', 'post'], 'add-edit-shipment/{id?}', [ShipmentController::class, 'addEditShipment'])->name('merchant.addShipment');
    Route::get('/shipments', [ShipmentController::class,'index'])->name('merhcant_shipments');
    Route::delete('/shipment-delete/{id}', [ShipmentController::class,'shipmentDelete'])->name('shipment.delete');
    Route::post('/check-rate-merchant', 'ShipmentController@rateCheck')->name('merchant.rate.check');
    //Merchant Payment routes
    Route::get('payments', 'ShipmentController@payments')->name('payments');
    Route::get('payments-load', 'ShipmentController@payments_loading')->name('payments-load');
    Route::get('/show-payment/{shipment}', 'ShipmentController@show_payment')->name('payments-show');
    //Merchant CSV
    Route::get('/csv-upload', 'CSVController@create')->name('csv-upload');
    Route::post('/csv-upload', 'CSVController@get_csv_data')->name('get-csv');
    Route::get('/csv-temporary', 'CSVController@show')->name('csv-temporary');
    Route::post('/csv-temporary', 'CSVController@store_new')->name('csv-save');
    Route::get('prepare-shipment-details/{id}', 'ShipmentController@PrepareShipmentEdit')->name('PrepareShipmentEdit');
});
