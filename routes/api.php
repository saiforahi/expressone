<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Courier\ShipmentController as CourierShipmentController;
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

Route::middleware('auth:sanctum')->get('/user', [App\Http\Controllers\Api\AuthController::class,'user_details']);
Route::post('/login',[App\Http\Controllers\Api\AuthController::class,'login']);
Route::post('/register',[App\Http\Controllers\Api\AuthController::class,'register']);
Route::middleware('auth:sanctum')->get('/logout',[App\Http\Controllers\Api\AuthController::class,'logout']);

//courier APIs [CourierShipmentController::class,'get_pickup_shipments']

// Route::group(['middleware' => 'auth:api_courier', 'prefix' => 'courier'], function () {
//     Route::get('/courier/shipments/pickup',[CourierShipmentController::class,'get_pickup_shipments']);
//     Route::put('/courier/shipments/mark_as_received',[CourierShipmentController::class,'mark_shipments_as_received']);
// });


// Route::put('/courier/shipments/mark_as_received',[CourierShipmentController::class,'mark_shipments_as_received']);

Route::middleware(['auth:api_courier'])->prefix('courier')->group(function () {
    Route::get('/shipments/{type}',[CourierShipmentController::class,'get_shipments']);
    Route::put('/shipments/mark_as_received',[CourierShipmentController::class,'mark_shipments_as_received']);
    Route::put('/shipments/mark_as_submitted',[CourierShipmentController::class,'mark_shipments_as_submitted']);
});