<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\ShipmentController;
use App\Http\Controllers\Admin\ShippingChargeController;
use App\Http\Controllers\Admin\BasicInformationController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
/*
|--------------------------------------------------------------------------
| Admin Route
|--------------------------------------------------------------------------
*/
Route::get('admin/login', [App\Http\Controllers\Admin\AuthController::class,'index']);
Route::post('admin/login', [App\Http\Controllers\Admin\AuthController::class,'login'])->name('admin.login');
Route::post('admin/register', [App\Http\Controllers\Admin\AuthController::class,'store'])->name('admin.register');
Route::post('admin/logout', [App\Http\Controllers\Admin\AuthController::class,'logout'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {
    Route::get('/', [AdminDashboardController::class,'index'])->name('admin-dashboard');
    Route::get('/basic-information', [BasicInformationController::class,'index'])->name('basic-information');
    Route::post('/basic-information', [BasicInformationController::class,'update'])->name('basic-information.update');
    Route::post('/add-merchant-verify-message', [BasicInformationController::class,'addVerifyMsg'])->name('addVerifyMsg');
    Route::post('/update-verify-message/{id}', [BasicInformationController::class,'updateVerifyMsg'])->name('updateVerifyMsg');

    Route::get('/admin-change-unit/{unit}', [AdminDashboardController::class,'admin_changes_unit'])->name('admin-change-unit');
    Route::get('/get-admin-hub-ids/{admin}', 'DashboardController@get_admin_hub_ids')->name('get-admin-hub-ids');
    Route::get('/unit', [App\Http\Controllers\Admin\AreaController::class,'unit'])->name('unit');
    Route::post('/unit', [App\Http\Controllers\Admin\AreaController::class,'unit_store'])->name('unit.store');
    Route::get('/get-units', [App\Http\Controllers\Admin\AreaController::class,'get_units'])->name('AdminUnitsGet');
    Route::post('/unit-update', [App\Http\Controllers\Admin\AreaController::class,'unit_update'])->name('unit.update');
    Route::post('/unit-delete', [App\Http\Controllers\Admin\AreaController::class,'unit_delete'])->name('unit.delete');
    Route::get('/get-unit-single', [App\Http\Controllers\Admin\AreaController::class,'unit_detail'])->name('unit.single');

    Route::get('/point', [App\Http\Controllers\Admin\AreaController::class,'index'])->name('point');
    Route::post('/point', [App\Http\Controllers\Admin\AreaController::class,'point_create'])->name('point.store');
    Route::get('/get-points', [App\Http\Controllers\Admin\AreaController::class,'get_points'])->name('AdminPointGet');
    Route::post('/point-update', [App\Http\Controllers\Admin\AreaController::class,'update_point'])->name('point.update');
    Route::get('/get-point-single', [App\Http\Controllers\Admin\AreaController::class,'point_details'])->name('point.single');
    Route::post('/get-point-select', [App\Http\Controllers\Admin\AreaController::class,'select_point'])->name('select.point');
    Route::get('/delete-point/{point}', [App\Http\Controllers\Admin\AreaController::class,'delete_point'])->name('point.delete');

    Route::get('/location', [AreaController::class,'location'])->name('location');
    Route::post('/location', [AreaController::class,'location_store'])->name('location.store');
    Route::get('/get-locations', [AreaController::class,'get_locations'])->name('AdminLocationGet');
    Route::post('/location-update', [AreaController::class,'location_update'])->name('location.update');
    Route::get('/location-delete/{location}', [AreaController::class,'location_delete'])->name('location.delete');
    Route::get('/get-location-single', [AreaController::class,'location_detail'])->name('location.single');

    Route::get('merchant-list', [MerchantController::class,'index'])->name('merchant.list');
    Route::get('merchant-details/{user}', [MerchantController::class,'show'])->name('merchant.details');
    Route::post('merchant-store', [MerchantController::class,'store'])->name('merchant.store');
    Route::post('update-merchant-verify', [MerchantController::class,'updateMerchantStatus'])->name('admin.merchant.status');
    //Shipping routes
    Route::get('/shipping-price-set', 'ShippingPriceController@shippingPrice')->name('shippingPrice.set');
    Route::post('/shipping-price-set', 'ShippingPriceController@shippingPriceAdd')->name('shippingPrice.add');
    Route::post('/shipping-price-set-edit', 'ShippingPriceController@shippingPriceEdit')->name('shippingPrice.edit');
    Route::get('/delete-shipping-price/{shipping_price}', 'ShippingPriceController@destroy')->name('delete-shipping-price');
    Route::get('/show-shipping-price/{shipping_price}', 'ShippingPriceController@show')->name('show-shipping-price');
    //Admin Courier route
    Route::get('courier', [DriverController::class,'index'])->name('allCourier');
    Route::get('courier-delete/{id}', [DriverController::class,'courierDelete'])->name('courierDelete');
    Route::match(['get', 'post'], 'add-edit-courier/{id?}', [DriverController::class, 'addEditCourier'])->name('addEditCourier');
    Route::get('driver-shipments/{id}', [DriverController::class,'assigned_shipments'])->name('admin-driverShipments');
    //Shipping List
    Route::get('/shipping-list', [ShipmentController::class,'index'])->name('AdminShipment.index');
    Route::get('/shipping-list/more/{id}/{status}/{logistic_status}', [ShipmentController::class,'show'])->name('AdminShipmentMore');
    Route::post('/shipping-list/more/{id}/{status}/{shipping_status}', [ShipmentController::class,'save_courier_shipment'])->name('saveDriverShipments');
    Route::get('/shipping-list/received', [ShipmentController::class,'shipment_received'])->name('AdminShipmentReceived');
    Route::get('/shipping-list/cancelled', 'ShipmentController@shipment_cancelled')->name('AdminShipmentCancelled');

    Route::post('/add-parcelBy-admin', 'ShipmentController@add_parcel')->name('add-parcelBy-admin');
    Route::get('/assign-to-unit/{merchant_id}/{status}/{logistic_status}', [ShipmentController::class,'unit_received'])->name('AdminShipmentReceive');
    Route::get('/receiving-parcels/{user_id}/{status?}/{logistic_status?}', [ShipmentController::class,'receiving_parcels'])->name('receiving-parcels');
    Route::get('/get-hub-csv-files/{user_id}/{status}/{shipping_status}', 'ShipmentController@get_hub_csv')->name('get-hub-csv');

    Route::get('/move-to-hub', 'ShipmentController@MoveToHub')->name('ShipmentToHub');
    Route::get('/move2hub-withPhone', 'ShipmentController@MoveToHubWithPhone')->name('move2hub-withPhone');
    Route::get('/move2hub-withInvoice', 'ShipmentController@MoveToHubWithInvoice')->name('move2hub-withInvoice');

    Route::get('/user-hub-parcels/{hub}/{user}', 'ShipmentController@hub_parcels')->name('hub-parcels');
    Route::get('/user-hub-parcels-csv/{hub}/{user}', 'ShipmentController@hub_parcels_csv')->name('hub-parcels-csv');
    Route::get('/remove-hub-parcel/{hub_shipment}', 'ShipmentController@remove_hub_parcel')->name('remove-hub-parcel');
    Route::get('/change-hub-with-area/{id}', 'ShipmentController@change_bub')->name('change-hub-with-area');
    Route::get('/hub-sorting/{hub}', 'ShipmentController@hub_sorting')->name('hub-sorting');

    Route::get('/shipping-list/dispatch', 'ShipmentController@shipment_dispatch')->name('AdminShipmentDispatch');
    Route::get('/dispatch/view/{hub}', 'ShipmentController@dispatch_view')->name('dispatchView');
    Route::get('/status-dispatch/{hub}', 'ShipmentController@status_dispatch')->name('status-dispatch');
    Route::get('/status-on-transit/{hub}', 'ShipmentController@status_on_transit')->name('status-on-transit');
    Route::get('/dispatch-box-view/{hub_shipment_box}', 'ShipmentController@dispatch_box_view')->name('box-view');
    Route::get('/change-box-status/{hub_shipment_box}/{status}', 'ShipmentController@box_status_changes')->name('box-status-change');
    Route::get('/change-box-status-bulk-id/{hub_shipment_box}/{status}', 'ShipmentController@box_status_changes_bulk_id')->name('box-status-change-bulk-id');
    Route::get('/box-sorting/{hub}', 'ShipmentController@box_sorting')->name('box-sorting');

    Route::get('/hub-receivable', 'ShipmentController@hub_receivable')->name('hub-receivable');
    Route::get('/back2-dispatch/{hub_shipment_box}', 'ShipmentController@box_back2Dispatch')->name('box-sorting-back');

    Route::get('/sort-to-agent-dispatch/{hub_shipment_box}', 'ShipmentController@sort2agentDispatch')->name('sorting-to-agent');
    Route::get('/agent-dispatch', 'ShipmentController@agent_dispatch')->name('AdminAgentDispatch');

    //first login design , agent-dispatch with  bulk-id
    # Route::post('/agent-dispatch/', 'ShipmentController@assigDriverForDelivery')->name('assigDriverForDelivery');
    Route::get('/agent-dispatch-agentSide', 'ShipmentController@agent_dispatch_agentSide')->name('agent-dispatch-agentSide');
    Route::get('/agent-dispatch-driverSide', 'ShipmentController@agent_dispatch_driverSide')->name('agent-dispatch-driverSide');
    Route::get('/agentDispatch-to-driverAssign/{hub_shipment_box}/{shipment}', 'ShipmentController@agentDispatch2DriverAssign')->name('agent-dispatch-driverAssign');
    Route::get('/agentDispatch-to-driverAssign-withInvoice/{invce_id}', 'ShipmentController@agentDispatch2DriverAssignWithInvoice');
    Route::get('/driver-assign2agent-dispatch/{hub_shipment_box}/{shipment}', 'ShipmentController@driverAssign2Agent_dispatch')->name('driver-assign2agent-dispatch');

    Route::post('/agent-dispatch-assing-to-driver', 'ShipmentController@agent_dispatchAssigning')->name('agent-dispatch-assing2Driver');
    Route::get('/all-shipments', [ShipmentController::class,'all_shipments'])->name('all-shipments');
    Route::get('/shipment-details/{shipment}', [ShipmentController::class,'new_shipment_detail'])->name('shipment-details');
    Route::get('/shipment-print/{shipment}', 'ShipmentController@shipment_print')->name('shipment-print');
    Route::post('/reset-shipment', 'ShipmentController@reset_shipment')->name('reset-shipment');
    // ajax call, get zone wize area
    Route::get('/zone-to-area/{zone}', 'AreaController@zone_wize_area')->name('zone-to-area');
    // reconcile
    Route::get('/reconcile', 'ShipmentController@reconcile')->name('AdminReconcile');
    Route::get('/load-shipment-reconcilable', 'ShipmentController@load_shipment_reconcilable');
    Route::get('/load-reconcile-shipments', 'ShipmentController@load_reconcil_shipments');
    Route::get('/create-reconcile/{shipment}', 'ShipmentController@create_reconcile');
    Route::get('/remove-reconcile/{shipment}', 'ShipmentController@remove_reconcile');
    Route::get('/return-reconcile2receive', 'ShipmentController@return_shipments2receive');
    // delivery
    Route::get('/delivery', 'ShipmentController@delivery')->name('AdminDelivery');
    Route::get('/get-shipment/{field}/{keyword}', 'ShipmentController@shipment_search')->name('delivery-search');
    Route::get('/get-driver-shipment/{driver}', 'ShipmentController@driver_shipment_search')->name('delivery-search-driver');
    Route::get('/get-shipment-with-invoices/{keyword}', 'ShipmentController@shipment_search_invoices')->name('delivery-search-invoices');

    Route::get('/get-shipment-withHub/{hub}', 'ShipmentController@shipment_search_withHub')->name('delivery-search-hub');
    Route::get('/get-shipment-withStatus/{status}', 'ShipmentController@shipment_search_withStatus')->name('delivery-search-hub-status');
    Route::get('/get-shipment-withdate/{date1}/{date2}', 'ShipmentController@shipment_search_withDates')->name('delivery-search-dates');

    Route::get('/shipment-audit/{shipment}', 'ShipmentController@shipment_audit')->name('shipment-audit');
    //ajax call to show driver note during delivery
    Route::get('/driver-delivery-note/{shipment}', 'DriverController@delivery_note');
    Route::get('/export-selected/{shipment_ids}', 'ShipmentController@export_shipments')->name('export-selected');
    Route::get('/delivery-payment-form/{shipment_ids}', 'ShipmentController@deliveryPaymentsForMerchant')->name('delivery-payment-form');
    Route::post('/save-delivery-payment', 'ShipmentController@save_delivery_payment')->name('delivery-payment-save');
    Route::get('/return-selected-to-merchant/{shipment_ids}', 'ShipmentController@return_shipments');

    // download
    Route::get('/shipment-download', 'ShipmentController@download')->name('AdminDownload');
    Route::get('/get-shipment-withBulkID/{bulk_id}', 'ShipmentController@shipment_search_withBulkID')->name('delivery-search-bulkid');
    Route::get('/get-shipment-files/{type}/{bulk_id}', 'ShipmentController@download_file')->name('get-shipment-files');

    Route::get('/admin-upload-csv', 'CSVController@create')->name('AdminUploadCSV');
    Route::post('/admin-upload-csv', 'CSVController@get_csv_data')->name('AdminShowCSV');

    Route::get('/csv-temporary', 'CSVController@show')->name('admin-csv-temporary');
    Route::post('/csv-temporary', 'CSVController@store')->name('admin-csv-save');

    Route::get('/shipping-list/cencelled-items/{id}', 'ShipmentController@cencelled_shippings')->name('CencelledShipping');
    Route::get('/back-to-shipment/{id}', 'ShipmentController@back2shipment')->name('back2shipment');

    Route::get('delete-shipment/{id}', [ShipmentController::class,'destroy'])->name('destroy-shipment');
    Route::get('cencell-shipment/{id}', [ShipmentController::class,'cencel'])->name('cencel-shipment');

    // third party shipments
    Route::get('/thirdparty-shipments/{hub}', 'ThirdpartyShipmentController@index')->name('thirdparty-shipments');
    Route::get('/thirdparty-hub-shipments/{hub}', 'ThirdpartyShipmentController@show')->name('thirdparty-hub-shipments');
    Route::get('/thirdparty-left/{hub}', 'ThirdpartyShipmentController@show_left_side')->name('thirdparty-left');
    Route::get('/thirdparty-right/{hub}', 'ThirdpartyShipmentController@show_right_side')->name('thirdparty-right');
    Route::get('/thirdparty-moveTo-right/{thirdparty_shipment}', 'ThirdpartyShipmentController@moveToright')->name('thirdparty2right');
    Route::get('/thirdparty-moveTo-left/{thirdparty_shipment}', 'ThirdpartyShipmentController@moveToleft')->name('thirdparty2left');
    Route::get('/thirdparty-sendToSort', 'ThirdpartyShipmentController@sendToSort')->name('thirdpartySendToSort');
    Route::get('/thirdparty-csv-pdf/{type}', 'ShipmentController@get_csv_pdf');
    Route::get('/thirdparty-rightWithInvoice/{invoice_id}', 'ThirdpartyShipmentController@show_right_withInvoice')->name('thirdparty-rightWithInvoice');
    // hold
    Route::get('/hold-shipments/{hold}', 'HoldShipmentController@index')->name('hold-shipments');
    Route::get('/move-to-hold_shipment/{shipment}/{hub}', 'HoldShipmentController@move_to_hold_shipment')->name('move-to-hold_shipment');
    Route::get('/hold-agentDispatch-to-driverAssign-withInvoice/{invce_id}', 'HoldShipmentController@move_to_hold_shipmentWithInvoice');
    Route::get('/hold-agentDispatch-to-driverAssign-rider/{driver}', 'HoldShipmentController@move_to_hold_shipmentRider');
    Route::get('/hold-shipment-rows/{type}', 'HoldShipmentController@hold_shipment_rows');
    Route::get('/driver-hub-shipment-rows/{type}', 'HoldShipmentController@driver_hub_shipments');
    Route::get('/move-back-to-hold_shipment/{shipment}/{type}', 'HoldShipmentController@move_back2hold_shipment');
    Route::get('/sendToSorting-hold_shipment', 'HoldShipmentController@sendToSorting');

    Route::get('/move-to-return_shipment/{shipment}/{hub}', 'HoldShipmentController@move_to_return_shipment');
    Route::get('/move-to-return_shipment-withInvoice/{inviceid}', 'HoldShipmentController@move_to_return_shipment_withInvoice');
    Route::get('/move-to-return_shipment-withRider/{driver}', 'HoldShipmentController@move_to_return_shipment_withRider');

    Route::get('/return-shipment-rows/{type}', 'HoldShipmentController@return_shipment_rows');
    Route::get('/return-shipments-parcels/{hub}', 'HoldShipmentController@return_shipments_parcels');
    Route::get('/move-back-to-return_shipment/{return_shipment}/{type}', 'HoldShipmentController@move_back2return_shipment');

    Route::get('/return-sorting/{hub}', 'HoldShipmentController@return_sorting')->name('return-sorting');
    Route::get('/return-dispatch', 'HoldShipmentController@return_dispatch')->name('return-dispatch');
    Route::get('/return-dispatch/view/{hub}', 'HoldShipmentController@dispatch_view')->name('return-dispatch-view');
    Route::get('/return-status-dispatch/{hub}', 'HoldShipmentController@status_dispatch')->name('return-status-dispatch');
    Route::get('/return-status-on-transit/{hub}', 'HoldShipmentController@status_on_transit')->name('return-status-on-transit');
    Route::get('/return-dispatch-box-view/{return_shipment_box}', 'HoldShipmentController@dispatch_box_view')->name('return-box-view');
    Route::get('/return-change-box-status/{return_shipment_box}/{status}', 'HoldShipmentController@box_status_changes')->name('return-box-status-change');
    Route::get('/return-change-box-status-bulk-id/{return_shipment_box}/{status}', 'HoldShipmentController@box_status_changes_bulk_id')->name('return-box-status-change-bulk-id');
    Route::get('/return-box-sorting/{hub}', 'HoldShipmentController@box_sorting')->name('return-box-sorting');

    Route::get('/receive-from-hub', 'HoldShipmentController@receive_from_hub')->name('receive-from-hub');
    Route::get('/return-agent-dispatch', 'HoldShipmentController@agent_dispatch')->name('return-agent-dispatch');
    Route::get('/return-agent-dispatch-agentSide', 'HoldShipmentController@agent_dispatch_agentSide')->name('return-agent-dispatch-agentSide');
    Route::get('/return-agent-dispatch-driverSide', 'HoldShipmentController@agent_dispatch_driverSide')->name('return-agent-dispatch-driverSide');
    Route::get('/return-agentDispatch-to-driverAssign/{return_shipment_box}/{shipment}', 'HoldShipmentController@agentDispatch2DriverAssign')->name('return-agent-dispatch-driverAssign');
    Route::get('/return-driver-assign2agent-dispatch/{return_shipment_box}/{shipment}', 'HoldShipmentController@driverAssign2Agent_dispatch')->name('return-driver-assign2agent-dispatch');
    Route::post('/return-agent-dispatch-assing-to-driver', 'HoldShipmentController@agent_dispatchAssigning')->name('return-agent-dispatch-assing2Driver');

    Route::get('/return-to-return-delivery/{type}/{hub_shipmentBox}', 'HoldShipmentController@return2return_delivery')->name('return-to-return-delivery');
    // return to merchant
    Route::get('/return-merchant-handover', 'HoldShipmentController@merchant_handover')->name('merchant-handover');
    Route::get('/view-merchant-handover/{user}', 'HoldShipmentController@merchant_handover_parcels')->name('merchant-handover-parcels');
    Route::get('/handover-to-merchant/{user}', 'HoldShipmentController@handover2merchant')->name('handover-to-merchant');

    Route::get('/admin-list', 'AdminController@index')->name('admin-list');
    Route::get('/admins', 'AdminController@admins')->name('admins');
    Route::get('/admin/create', 'AdminController@create')->name('create-admin');
    Route::post('/save-admin', 'AdminController@store')->name('save-admin');
    Route::post('/update-admin', 'AdminController@update')->name('update-admin');
    Route::get('/admin/delete/{admin}', 'AdminController@destroy')->name('destroy-admin');
    Route::get('/admin/show', 'AdminController@show')->name('show-admin');
    Route::get('/role-assign', 'AdminController@role_assign')->name('role-assign');
    Route::post('/role-assign', 'AdminController@save_role_assign')->name('save-role-assign');
    Route::get('/get-employee-roles/{admin}', 'AdminController@employee_roles')->name('get-roles');

    Route::get('/sliders', 'SliderController@index')->name('adminSlider');
    Route::get('/sliders-show', 'SliderController@sliders')->name('sliders');
    Route::post('/save-slider', 'SliderController@store')->name('save-slider');
    Route::post('/update-slider', 'SliderController@update')->name('update-slider');
    Route::get('/slider-show/{slider}', 'SliderController@show')->name('show-slider');

    Route::get('/about-us', 'AboutController@index')->name('adminAbout');
    Route::get('/mission', 'AboutController@mission')->name('adminMission');
    Route::get('/vision', 'AboutController@vision')->name('adminVision');
    Route::get('/promise', 'AboutController@promise')->name('adminPromise');
    Route::get('/history', 'AboutController@history')->name('adminHistory');
    Route::get('/team', 'AboutController@team')->name('adminTeam');
    Route::get('/client-reviews', 'ClientReviewController@index')->name('adminClientReview');
    Route::get('/review-posts', 'ClientReviewController@ajax_get')->name('review-posts');

    Route::post('/save-review', 'ClientReviewController@store')->name('save-review');
    Route::post('/update-review', 'ClientReviewController@update')->name('update-review');
    Route::get('/view-review/{client_review}', 'ClientReviewController@show')->name('view-review');
    Route::get('/delete-review/{client_review}', 'ClientReviewController@destroy')->name('delete-review');

    Route::post('/save-about-1', 'AboutController@store')->name('save-about-1');
    Route::post('/save-mission-1', 'AboutController@storeMission')->name('save-mission-1');
    Route::post('/save-vision-1', 'AboutController@storeVision')->name('save-vision-1');
    Route::post('/save-promise-1', 'AboutController@storePromise')->name('save-promise-1');
    Route::post('/save-history-1', 'AboutController@storeHistory')->name('save-history-1');
    Route::post('/save-team-1', 'AboutController@storeTeam')->name('save-team-1');

    Route::post('/about-us', 'AboutController@save')->name('save-about-us');
    Route::post('/mission', 'AboutController@saveMission')->name('save-mission');
    Route::post('/vision', 'AboutController@saveVision')->name('save-vision');
    Route::post('/promise', 'AboutController@savePromise')->name('save-promise');
    Route::post('/team', 'AboutController@saveTeam')->name('save-team');
    Route::post('/history', 'AboutController@saveHistory')->name('save-history');

    Route::get('/about-posts', 'AboutController@about_posts')->name('about-posts');
    Route::get('/mission-posts', 'AboutController@mission_posts')->name('mission-posts');
    Route::get('/vision-posts', 'AboutController@vision_posts')->name('vision-posts');
    Route::get('/promise-posts', 'AboutController@promise_posts')->name('promise-posts');
    Route::get('/team-posts', 'AboutController@team_posts')->name('team-posts');
    Route::get('/history-posts', 'AboutController@history_posts')->name('history-posts');

    Route::get('/about-show/{about}', 'AboutController@show')->name('about-show');
    Route::get('/mission-show/{about}', 'AboutController@showMission')->name('mission-show');
    Route::get('/vision-show/{about}', 'AboutController@showVision')->name('vision-show');
    Route::get('/promise-show/{about}', 'AboutController@showPromise')->name('promise-show');
    Route::get('/history-show/{about}', 'AboutController@showHistory')->name('history-show');
    Route::get('/team-show/{about}', 'AboutController@showTeam')->name('team-show');

    Route::post('/update-about-post', 'AboutController@update')->name('update-about-post');
    Route::post('/update-mission-post', 'AboutController@updateMission')->name('update-mission-post');
    Route::post('/update-vision-post', 'AboutController@updateVision')->name('update-vision-post');
    Route::post('/update-promise-post', 'AboutController@updatePromise')->name('update-promise-post');
    Route::post('/update-history-post', 'AboutController@updateHistory')->name('update-history-post');
    Route::post('/update-team-post', 'AboutController@updateTeam')->name('update-team-post');

    Route::get('/delete-about-post/{about}', 'AboutController@destroy')->name('delete-about-post');
    Route::get('/delete-mission-post/{about}', 'AboutController@destroyMission')->name('delete-mission-post');
    Route::get('/delete-vision-post/{about}', 'AboutController@destroyVision')->name('delete-vision-post');
    Route::get('/delete-promise-post/{about}', 'AboutController@destroyPromise')->name('delete-promise-post');
    Route::get('/delete-history-post/{about}', 'AboutController@destroyHistory')->name('delete-history-post');
    Route::get('/delete-team-post/{about}', 'AboutController@destroyTeam')->name('delete-team-post');

    Route::get('/messages', 'MessageController@index')->name('contact-messages');
    Route::get('/view-messages', 'MessageController@messages')->name('messages');
    Route::get('/message-show/{message}', 'MessageController@show')->name('view-message');
    Route::get('/delete-message/{message}', 'MessageController@destroy')->name('delete-message');
    Route::get('/merchant-verify-message', 'MessageController@cms_page')->name('cms_page');

    Route::get('/blog/index', 'BlogController@index')->name('AdminBlog');
    Route::get('/blog-posts', 'BlogController@blogs')->name('blogs');
    Route::post('/update-blog', 'BlogController@update')->name('update-blog');
    Route::get('/show-blog/{blog}', 'BlogController@show')->name('show-blog-admin');
    Route::post('/save-blog', 'BlogController@store')->name('save-blog');
    Route::get('/blog/delete/{blog}', 'BlogController@destroy')->name('delete-blog');

    Route::get('/blog/category', 'Blog_categoryController@index')->name('blog-category');
    Route::get('/blog/categories', 'Blog_categoryController@categories')->name('blog-categories');
    Route::post('/blog/category/save', 'Blog_categoryController@store')->name('save-category');
    Route::get('/show-category/{blog_category}', 'Blog_categoryController@show')->name('show-category');
    Route::get('/blog/category/delete/{blog_category}', 'Blog_categoryController@destroy')->name('delete-category');
    Route::post('/blog/category/update', 'Blog_categoryController@update')->name('update-category');

    Route::get('set-mail-info', 'BasicInformationController@mailing_info')->name('mail-setup');
    Route::post('set-mail-info', 'BasicInformationController@save_mailing_info')->name('save-mail-setup');
    //Shipping Charge
    Route::match(['get', 'post'], 'add-edit-shipping-charge/{id?}', [ShippingChargeController::class, 'addEditCharge'])->name('addEditCharge');
    Route::get('shipping-charges', [ShippingChargeController::class, 'index'])->name('shippingCharges');
});

