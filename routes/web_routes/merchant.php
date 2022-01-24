<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Merchant\ShipmentController;
use App\Http\Controllers\Admin\ShippingChargeController;
use App\Http\Controllers\Merchant\DashboardController;
use App\Http\Controllers\Merchant\CSVController;

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
    Route::get('add-shipment', [ShipmentController::class, 'addShipment'])->name('merchant.addShipment');
    Route::post('save-shipment', [ShipmentController::class, 'saveShipment'])->name('merchant.saveShipment');
    Route::get('edit-shipment/{shipment}', [ShipmentController::class, 'editShipment'])->name('merchant.editShipment');
    Route::put('update-shipment/{shipment}', [ShipmentController::class, 'updateShipment'])->name('merchant.updateShipment');


    Route::get('/shipments', [ShipmentController::class, 'index'])->name('merhcant_shipments');
    Route::get('/shipment-details/{shipment}', [ShipmentController::class, 'show'])->name('shipmentDetails');
    Route::get('/shipment-pdf/{shipment}', [ShipmentController::class, 'shipment_pdf'])->name('pdf.shipment');
    Route::get('/shipment-invoice/{id}', 'ShipmentController@shipmentInvoice')->name('shipmentInvoice');
    Route::get('/shipment-cnote/{shipment}', [ShipmentController::class, 'shipmentConsNote'])->name('merchant.shipmentCn');
    Route::post('set-shipment-charge/{id}', [ShippingChargeController::class, 'setShippingCharge'])->name('setShippingCharge');
    Route::delete('/shipment-delete/{id}', [ShipmentController::class, 'shipmentDelete'])->name('shipment.delete');
    Route::post('/check-rate-merchant', 'ShipmentController@rateCheck')->name('merchant.rate.check');
    //Merchant Payment routes
    Route::get('payments', [ShipmentController::class, 'payments'])->name('payments');
    Route::get('payments-load', [ShipmentController::class, 'payments_loading'])->name('payments-load');
    Route::get('show-payment/{shipment}', [ShipmentController::class, 'show_payment'])->name('show_payment');
    //Merchant CSV
    Route::get('csv-upload', [CSVController::class, 'create'])->name('csv-upload');
    Route::post('csv-upload', [CSVController::class, 'get_csv_data'])->name('get-csv');
    Route::get('csv-temporary', [CSVController::class, 'csvTemp'])->name('csv-temporary');
    Route::post('csv-temporary', [CSVController::class, 'store_new'])->name('csv-save');
    Route::get('prepare-shipment-details/{id}', 'ShipmentController@PrepareShipmentEdit')->name('PrepareShipmentEdit');
});
