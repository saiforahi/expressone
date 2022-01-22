<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\CourierManagement;
use App\Models\Courier;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', [App\Http\Controllers\Api\AuthController::class, 'user_details']);
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::middleware('auth:sanctum')->get('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
/*
|--------------------------------------------------------------------------
| courier Route
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'courier'], function () {
        Route::get('shipments', [CourierManagement::class, 'shipments']);
        Route::get('shipment-details/{id}/{status}', [CourierManagement::class, 'shipmentDetails']);
        Route::get('receive-shipment/{id}', [CourierManagement::class, 'receiveShipment']);
        Route::get('receive-all-parcel/{user}', [CourierManagement::class, 'receiveAllParcel']);
    });
});
