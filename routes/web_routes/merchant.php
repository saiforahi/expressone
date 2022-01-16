<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Merchant\ShipmentController;
use App\Http\Controllers\Merchant\ShippingChargeController;
use App\Http\Controllers\Merchant\DashboardController;


Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::get('/verify', [App\Http\Controllers\AuthController::class, 'verify'])->name('verify-user');
Route::post('/verify', [App\Http\Controllers\AuthController::class, 'verify_code'])->name('verify-user-code');
Route::post('/verification.resend', [App\Http\Controllers\AuthController::class, 'send_verification_code'])->name('verification.resend');
//Merchant
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.store');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'registerStore'])->name('register.store');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth:user', 'namespace' => 'Merchant'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('merchant.dashboard');
    //Profile
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/profile-edit', [DashboardController::class, 'ProfileEdit'])->name('ProfileEdit');
    Route::post('/profile-update', [DashboardController::class, 'profileUpdate'])->name('profileUpdate');
    //Account
    Route::get('/account', [DashboardController::class, 'account'])->name('account');
    Route::post('/change-email', [DashboardController::class, 'ChangeMail'])->name('ChangeMail');
    Route::post('/change-password', [DashboardController::class, 'ChangePassword'])->name('ChangePassword');
    //Merchant Shipment
    Route::match(['get', 'post'], 'add-edit-shipment/{id?}', [ShipmentController::class, 'addEditShipment'])->name('merchant.addShipment');
    Route::get('/shipments', [ShipmentController::class, 'index'])->name('merhcant_shipments');
    Route::get('/shipment-details/{shipment}', [ShipmentController::class, 'show'])->name('shipmentDetails');
    Route::get('/shipment-pdf/{shipment}', [ShipmentController::class, 'shipment_pdf'])->name('pdf.shipment');
    Route::get('/shipment-invoice/{id}', 'ShipmentController@shipmentInvoice')->name('shipmentInvoice');
    Route::get('/shipment-cnote/{shipment}', [ShipmentController::class, 'shipmentConsNote'])->name('merchant.shipmentCn');
    Route::post('set-shipment-charge/{id}', [ShippingChargeController::class, 'setShippingCharge'])->name('setShippingCharge');
    Route::delete('/shipment-delete/{id}', [ShipmentController::class, 'shipmentDelete'])->name('shipment.delete');
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
