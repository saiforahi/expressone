<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/share-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.shareReport',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Me5dBa5gjvBvu8SA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BMR99P8vo7P6h1CO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cc' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6nujxu0v5rqVx2xb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/about' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'about',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/team' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'team',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mission',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/vision' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vision',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/promise' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'promise',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'history',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/tracking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tracking',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/track-shipment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'track-shipment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'save-contact',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/blog' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/blog-search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search-post',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/check-rate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rate.check',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pricing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pricing',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jr6JfhMqtElZKcjD',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.register',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin-dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/basic-information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'basic-information',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'basic-information.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-merchant-verify-message' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'addVerifyMsg',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/zone' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'zone',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'zone.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-zone' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminZoneGet',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/zone-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'zone.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/zone-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'zone.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-zone-single' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'zone.single',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/hub' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hub',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'hub.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-hub' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminHubGet',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/hub-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hub.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/hub-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hub.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-hub-single' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hub.single',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-hub-select' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'SelectHub',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/area' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'area.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-area' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminAreaGet',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/area-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-area-single' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.single',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/merchant-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/update-merchant-verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.merchant.status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/shipping-price-set' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'shippingPrice.set',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'shippingPrice.add',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/shipping-price-set-edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'shippingPrice.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/driver-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'driver-list.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'driver-list.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/driver-list/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'driver-list.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/shipping-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminShipment.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/shipping-list/received' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminShipmentReceived',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/shipping-list/cancelled' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminShipmentCancelled',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-parcelBy-admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'add-parcelBy-admin',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/move-to-hub' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ShipmentToHub',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/move2hub-withPhone' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'move2hub-withPhone',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/move2hub-withInvoice' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'move2hub-withInvoice',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/shipping-list/dispatch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminShipmentDispatch',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/hub-receivable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hub-receivable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/agent-dispatch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminAgentDispatch',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/agent-dispatch-agentSide' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent-dispatch-agentSide',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/agent-dispatch-driverSide' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent-dispatch-driverSide',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/agent-dispatch-assing-to-driver' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent-dispatch-assing2Driver',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/all-shipments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'all-shipments',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reset-shipment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reset-shipment',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reconcile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminReconcile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/load-shipment-reconcilable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hAvwTcXOX5PoL0ki',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/load-reconcile-shipments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8evdr4W1DBW59Mcy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/return-reconcile2receive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zM9ZUpJ19Z3ce4iL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/delivery' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminDelivery',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-delivery-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delivery-payment-save',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/shipment-download' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminDownload',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/admin-upload-csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminUploadCSV',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'AdminShowCSV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/csv-temporary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin-csv-temporary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin-csv-save',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/thirdparty-sendToSort' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'thirdpartySendToSort',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sendToSorting-hold_shipment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gGIpZuiBd2bak3Mm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/return-dispatch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-dispatch',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/receive-from-hub' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'receive-from-hub',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/return-agent-dispatch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-agent-dispatch',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/return-agent-dispatch-agentSide' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-agent-dispatch-agentSide',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/return-agent-dispatch-driverSide' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-agent-dispatch-driverSide',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/return-agent-dispatch-assing-to-driver' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-agent-dispatch-assing2Driver',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/return-merchant-handover' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant-handover',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/admin-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin-list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/admins' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admins',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/admin/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create-admin',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'save-admin',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/update-admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-admin',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/admin/show' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'show-admin',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/role-assign' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role-assign',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'save-role-assign',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sliders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'adminSlider',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sliders-show' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sliders',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-slider' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'save-slider',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/update-slider' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-slider',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/about-us' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'adminAbout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'save-about-us',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/mission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'adminMission',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'save-mission',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/vision' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'adminVision',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'save-vision',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/promise' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'adminPromise',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'save-promise',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'adminHistory',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'save-history',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/team' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'adminTeam',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'save-team',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/client-reviews' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'adminClientReview',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/review-posts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'review-posts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-review' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'save-review',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/update-review' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-review',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-about-1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'save-about-1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-mission-1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'save-mission-1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-vision-1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'save-vision-1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-promise-1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'save-promise-1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-history-1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'save-history-1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-team-1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'save-team-1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/about-posts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'about-posts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/mission-posts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mission-posts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/vision-posts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vision-posts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/promise-posts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'promise-posts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/team-posts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'team-posts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/history-posts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'history-posts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/update-about-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-about-post',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/update-mission-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-mission-post',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/update-vision-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-vision-post',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/update-promise-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-promise-post',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/update-history-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-history-post',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/update-team-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-team-post',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/messages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact-messages',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/view-messages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'messages',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/merchant-verify-message' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cms_page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/blog/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminBlog',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/blog-posts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blogs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/update-blog' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-blog',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/save-blog' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'save-blog',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/blog/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog-category',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/blog/categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog-categories',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/blog/category/save' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'save-category',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/blog/category/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update-category',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/set-mail-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mail-setup',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'save-mail-setup',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/shipping-charges' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'shippingCharges',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'login.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verify-user',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'verify-user-code',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/verification.resend' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.resend',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'register.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile-edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ProfileEdit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ProfileUpdate',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/account' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/change-email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ChangeMail',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/change-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ChangePassword',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/prepare-shipment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merhcant_shipments',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/check-rate-merchant' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.rate.check',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/shipment-save' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'PrepareShipmentSubmit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payments',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payments-load' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payments-load',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/csv-upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'csv-upload',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'get-csv',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/csv-temporary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'csv-temporary',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'csv-save',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/driver/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::R6lUSYHMeUnJY4Jg',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'driver.login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/driver/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'driver.register',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/driver/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'driver.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/driver' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'driver.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/driver/shipments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'driverShipments.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/driver/agent-dispatch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'box-for-delivery',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/driver/shipment-delivery' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'shipment-delivery',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/driver/return-agent-dispatch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-box-for-delivery',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/driver/return-shipment-delivery' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-shipment-delivery',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/driver/confirm-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'confirm-opt',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/_ignition/s(?|cripts/([^/]++)(*:37)|tyles/([^/]++)(*:58))|/blog\\-(?|info/([^/]++)(*:89)|category/([^/]++)(*:113))|/admin/(?|u(?|pdate\\-verify\\-message/([^/]++)(*:167)|ser\\-hub\\-parcels(?|/([^/]++)/([^/]++)(*:213)|\\-csv/([^/]++)/([^/]++)(*:244)))|a(?|d(?|min(?|\\-change\\-hub/([^/]++)(*:290)|/delete/([^/]++)(*:314))|d\\-edit\\-shipping\\-charge(?:/([^/]++))?(*:362))|rea\\-delete/([^/]++)(*:391)|ssign\\-to\\-hub/([^/]++)/([^/]++)/([^/]++)(*:440)|gentDispatch\\-to\\-driverAssign(?|/([^/]++)/([^/]++)(*:499)|\\-withInvoice/([^/]++)(*:529))|bout\\-show/([^/]++)(*:557))|get\\-(?|admin\\-hub\\-ids/([^/]++)(*:598)|hub\\-csv\\-files/([^/]++)/([^/]++)/([^/]++)(*:648)|shipment(?|/([^/]++)/([^/]++)(*:685)|\\-(?|with(?|\\-invoices/([^/]++)(*:724)|Hub/([^/]++)(*:744)|Status/([^/]++)(*:767)|date/([^/]++)/([^/]++)(*:797)|BulkID/([^/]++)(*:820))|files/([^/]++)/([^/]++)(*:852)))|driver\\-shipment/([^/]++)(*:887)|employee\\-roles/([^/]++)(*:919))|d(?|el(?|ete\\-(?|h(?|ub/([^/]++)(*:960)|istory\\-post/([^/]++)(*:989))|ship(?|ping\\-price/([^/]++)(*:1025)|ment/([^/]++)(*:1047))|review/([^/]++)(*:1072)|about\\-post/([^/]++)(*:1101)|m(?|ission\\-post/([^/]++)(*:1135)|essage/([^/]++)(*:1159))|vision\\-post/([^/]++)(*:1190)|promise\\-post/([^/]++)(*:1221)|team\\-post/([^/]++)(*:1249))|ivery\\-payment\\-form/([^/]++)(*:1288))|river\\-(?|list/([^/]++)(?|(*:1324)|/edit(*:1338)|(*:1347))|shipments/([^/]++)(*:1375)|assign2agent\\-dispatch/([^/]++)/([^/]++)(*:1424)|delivery\\-note/([^/]++)(*:1456)|hub\\-shipment\\-rows/([^/]++)(*:1493))|ispatch(?|/view/([^/]++)(*:1527)|\\-box\\-view/([^/]++)(*:1556)))|m(?|e(?|rchant\\-details/([^/]++)(*:1599)|ssage\\-show/([^/]++)(*:1628))|ove\\-(?|to\\-(?|hold_shipment/([^/]++)/([^/]++)(*:1684)|return_shipment(?|/([^/]++)/([^/]++)(*:1729)|\\-with(?|Invoice/([^/]++)(*:1763)|Rider/([^/]++)(*:1786))))|back\\-to\\-(?|hold_shipment/([^/]++)/([^/]++)(*:1842)|return_shipment/([^/]++)/([^/]++)(*:1884)))|ission\\-show/([^/]++)(*:1916))|s(?|h(?|ow\\-(?|shipping\\-price/([^/]++)(*:1965)|blog/([^/]++)(*:1987)|category/([^/]++)(*:2013))|ip(?|ping\\-list/(?|more/([^/]++)/([^/]++)/([^/]++)(?|(*:2076))|cencelled\\-items/([^/]++)(*:2111))|ment\\-(?|details/([^/]++)(*:2146)|print/([^/]++)(*:2169)|audit/([^/]++)(*:2192))))|tatus\\-(?|dispatch/([^/]++)(*:2231)|on\\-transit/([^/]++)(*:2260))|ort\\-to\\-agent\\-dispatch/([^/]++)(*:2303)|lider\\-show/([^/]++)(*:2332))|re(?|ceiving\\-parcels/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?(*:2400)|move\\-(?|hub\\-parcel/([^/]++)(*:2438)|reconcile/([^/]++)(*:2465))|turn\\-(?|s(?|elected\\-to\\-merchant/([^/]++)(*:2518)|hipment(?|\\-rows/([^/]++)(*:2552)|s\\-parcels/([^/]++)(*:2580))|orting/([^/]++)(*:2605)|tatus\\-(?|dispatch/([^/]++)(*:2641)|on\\-transit/([^/]++)(*:2670)))|d(?|ispatch(?|/view/([^/]++)(*:2709)|\\-box\\-view/([^/]++)(*:2738))|river\\-assign2agent\\-dispatch/([^/]++)/([^/]++)(*:2795))|change\\-box\\-status(?|/([^/]++)/([^/]++)(*:2845)|\\-bulk\\-id/([^/]++)/([^/]++)(*:2882))|box\\-sorting/([^/]++)(*:2913)|agentDispatch\\-to\\-driverAssign/([^/]++)/([^/]++)(*:2971)|to\\-return\\-delivery/([^/]++)/([^/]++)(*:3018)))|c(?|hange\\-(?|hub\\-with\\-area/([^/]++)(*:3067)|box\\-status(?|/([^/]++)/([^/]++)(*:3108)|\\-bulk\\-id/([^/]++)/([^/]++)(*:3145)))|reate\\-reconcile/([^/]++)(*:3181)|encell\\-shipment/([^/]++)(*:3215))|h(?|ub\\-sorting/([^/]++)(*:3249)|old\\-(?|shipment(?|s/([^/]++)(*:3287)|\\-rows/([^/]++)(*:3311))|agentDispatch\\-to\\-driverAssign\\-(?|withInvoice/([^/]++)(*:3377)|rider/([^/]++)(*:3400)))|andover\\-to\\-merchant/([^/]++)(*:3441)|istory\\-show/([^/]++)(*:3471))|b(?|ox\\-sorting/([^/]++)(*:3505)|ack(?|2\\-dispatch/([^/]++)(*:3540)|\\-to\\-shipment/([^/]++)(*:3572))|log/(?|delete/([^/]++)(*:3604)|category/delete/([^/]++)(*:3637)))|zone\\-to\\-area/([^/]++)(*:3671)|export\\-selected/([^/]++)(*:3705)|t(?|hirdparty\\-(?|shipments/([^/]++)(*:3750)|hub\\-shipments/([^/]++)(*:3782)|left/([^/]++)(*:3804)|right(?|/([^/]++)(*:3830)|WithInvoice/([^/]++)(*:3859))|moveTo\\-(?|right/([^/]++)(*:3894)|left/([^/]++)(*:3916))|csv\\-pdf/([^/]++)(*:3943))|eam\\-show/([^/]++)(*:3971))|vi(?|ew\\-(?|merchant\\-handover/([^/]++)(*:4020)|review/([^/]++)(*:4044))|sion\\-show/([^/]++)(*:4073))|promise\\-show/([^/]++)(*:4105))|/s(?|h(?|ipment\\-(?|in(?|fo/([^/]++)(*:4151)|voice/([^/]++)(*:4174))|pdf/([^/]++)(*:4196)|cnote/([^/]++)(*:4219)|delete/([^/]++)(*:4243))|ow\\-payment/([^/]++)(*:4273))|et\\-shipping\\-charge/([^/]++)(*:4312))|/edit\\-shipment/([^/]++)(*:4346)|/update\\-shipment/([^/]++)(*:4381)|/prepare\\-shipment\\-details/([^/]++)(*:4426)|/driver/(?|get\\-shipments(?|/([^/]++)(*:4472)|\\-with\\-dates/([^/]++)/([^/]++)(*:4512))|my\\-(?|shipments/([^/]++)(*:4547)|parcels/([^/]++)(*:4572))|ship(?|ping\\-details/([^/]++)/([^/]++)(*:4620)|ment\\-info/([^/]++)(*:4648))|cencell\\-parcel/([^/]++)(*:4682)|receive\\-(?|shipment/([^/]++)(*:4720)|all\\-shipment/([^/]++)(*:4751))))/?$}sDu',
    ),
    3 => 
    array (
      37 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.scripts',
          ),
          1 => 
          array (
            0 => 'script',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      58 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.styles',
          ),
          1 => 
          array (
            0 => 'style',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      89 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'show-blog',
          ),
          1 => 
          array (
            0 => 'blog',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      113 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category-post',
          ),
          1 => 
          array (
            0 => 'blog_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      167 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateVerifyMsg',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      213 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hub-parcels',
          ),
          1 => 
          array (
            0 => 'hub',
            1 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hub-parcels-csv',
          ),
          1 => 
          array (
            0 => 'hub',
            1 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      290 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin-change-hub',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      314 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'destroy-admin',
          ),
          1 => 
          array (
            0 => 'admin',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      362 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'addEditCharge',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      391 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.delete',
          ),
          1 => 
          array (
            0 => 'area',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      440 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminShipmentReceive',
          ),
          1 => 
          array (
            0 => 'user_id',
            1 => 'status',
            2 => 'shipping_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      499 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent-dispatch-driverAssign',
          ),
          1 => 
          array (
            0 => 'hub_shipment_box',
            1 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      529 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::b4Ou2vPcqWTl2kQb',
          ),
          1 => 
          array (
            0 => 'invce_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      557 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'about-show',
          ),
          1 => 
          array (
            0 => 'about',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      598 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-admin-hub-ids',
          ),
          1 => 
          array (
            0 => 'admin',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      648 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-hub-csv',
          ),
          1 => 
          array (
            0 => 'user_id',
            1 => 'status',
            2 => 'shipping_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      685 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delivery-search',
          ),
          1 => 
          array (
            0 => 'field',
            1 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      724 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delivery-search-invoices',
          ),
          1 => 
          array (
            0 => 'keyword',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      744 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delivery-search-hub',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      767 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delivery-search-hub-status',
          ),
          1 => 
          array (
            0 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      797 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delivery-search-dates',
          ),
          1 => 
          array (
            0 => 'date1',
            1 => 'date2',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      820 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delivery-search-bulkid',
          ),
          1 => 
          array (
            0 => 'bulk_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      852 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-shipment-files',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'bulk_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      887 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delivery-search-driver',
          ),
          1 => 
          array (
            0 => 'driver',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      919 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-roles',
          ),
          1 => 
          array (
            0 => 'admin',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      960 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'deleet-hub',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      989 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-history-post',
          ),
          1 => 
          array (
            0 => 'about',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1025 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-shipping-price',
          ),
          1 => 
          array (
            0 => 'shipping_price',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1047 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'destroy-shipment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1072 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-review',
          ),
          1 => 
          array (
            0 => 'client_review',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1101 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-about-post',
          ),
          1 => 
          array (
            0 => 'about',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1135 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-mission-post',
          ),
          1 => 
          array (
            0 => 'about',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1159 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-message',
          ),
          1 => 
          array (
            0 => 'message',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1190 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-vision-post',
          ),
          1 => 
          array (
            0 => 'about',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1221 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-promise-post',
          ),
          1 => 
          array (
            0 => 'about',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1249 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-team-post',
          ),
          1 => 
          array (
            0 => 'about',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1288 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delivery-payment-form',
          ),
          1 => 
          array (
            0 => 'shipment_ids',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1324 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'driver-list.show',
          ),
          1 => 
          array (
            0 => 'driver_list',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1338 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'driver-list.edit',
          ),
          1 => 
          array (
            0 => 'driver_list',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1347 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'driver-list.update',
          ),
          1 => 
          array (
            0 => 'driver_list',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'driver-list.destroy',
          ),
          1 => 
          array (
            0 => 'driver_list',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1375 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin-driverShipments',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1424 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'driver-assign2agent-dispatch',
          ),
          1 => 
          array (
            0 => 'hub_shipment_box',
            1 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1456 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XIkEoNEoZKxWdCgG',
          ),
          1 => 
          array (
            0 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1493 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VxQJ55O9RDAPjTjd',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1527 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dispatchView',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1556 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'box-view',
          ),
          1 => 
          array (
            0 => 'hub_shipment_box',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1599 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.details',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1628 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'view-message',
          ),
          1 => 
          array (
            0 => 'message',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1684 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'move-to-hold_shipment',
          ),
          1 => 
          array (
            0 => 'shipment',
            1 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1729 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Nkpp86UQ4PenhMLW',
          ),
          1 => 
          array (
            0 => 'shipment',
            1 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1763 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5R8MLi7UYZdWdHpd',
          ),
          1 => 
          array (
            0 => 'inviceid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1786 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TwLWjULtK1JhY6NG',
          ),
          1 => 
          array (
            0 => 'driver',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1842 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::H0s2eN3nH9j7r1Pu',
          ),
          1 => 
          array (
            0 => 'shipment',
            1 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1884 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::39iPATGnvLEYILgu',
          ),
          1 => 
          array (
            0 => 'return_shipment',
            1 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1916 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mission-show',
          ),
          1 => 
          array (
            0 => 'about',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1965 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'show-shipping-price',
          ),
          1 => 
          array (
            0 => 'shipping_price',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1987 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'show-blog-admin',
          ),
          1 => 
          array (
            0 => 'blog',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2013 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'show-category',
          ),
          1 => 
          array (
            0 => 'blog_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2076 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'AdminShipmentMore',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'status',
            2 => 'shipping_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'saveDriverShipments',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'status',
            2 => 'shipping_status',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2111 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'CencelledShipping',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2146 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'shipment-details',
          ),
          1 => 
          array (
            0 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2169 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'shipment-print',
          ),
          1 => 
          array (
            0 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2192 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'shipment-audit',
          ),
          1 => 
          array (
            0 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2231 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'status-dispatch',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2260 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'status-on-transit',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2303 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sorting-to-agent',
          ),
          1 => 
          array (
            0 => 'hub_shipment_box',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2332 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'show-slider',
          ),
          1 => 
          array (
            0 => 'slider',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2400 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'receiving-parcels',
            'status' => NULL,
            'shipping_status' => NULL,
          ),
          1 => 
          array (
            0 => 'user_id',
            1 => 'status',
            2 => 'shipping_status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2438 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'remove-hub-parcel',
          ),
          1 => 
          array (
            0 => 'hub_shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2465 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KxcJzU4JD3B0HT6B',
          ),
          1 => 
          array (
            0 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2518 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kT66Kvo0AVhVg3yH',
          ),
          1 => 
          array (
            0 => 'shipment_ids',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2552 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YqriZddFJv13UdKt',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2580 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::h5ai1YGaDkYa7JOc',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2605 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-sorting',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2641 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-status-dispatch',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2670 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-status-on-transit',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2709 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-dispatch-view',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2738 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-box-view',
          ),
          1 => 
          array (
            0 => 'return_shipment_box',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2795 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-driver-assign2agent-dispatch',
          ),
          1 => 
          array (
            0 => 'return_shipment_box',
            1 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2845 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-box-status-change',
          ),
          1 => 
          array (
            0 => 'return_shipment_box',
            1 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2882 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-box-status-change-bulk-id',
          ),
          1 => 
          array (
            0 => 'return_shipment_box',
            1 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2913 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-box-sorting',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2971 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-agent-dispatch-driverAssign',
          ),
          1 => 
          array (
            0 => 'return_shipment_box',
            1 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3018 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'return-to-return-delivery',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'hub_shipmentBox',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3067 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'change-hub-with-area',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3108 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'box-status-change',
          ),
          1 => 
          array (
            0 => 'hub_shipment_box',
            1 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3145 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'box-status-change-bulk-id',
          ),
          1 => 
          array (
            0 => 'hub_shipment_box',
            1 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3181 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kU2QFrfpkoYmA9tY',
          ),
          1 => 
          array (
            0 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3215 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cencell-shipment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3249 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hub-sorting',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3287 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hold-shipments',
          ),
          1 => 
          array (
            0 => 'hold',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3311 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IenKOB22vUhKOAlB',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3377 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nsDEfU1woNXwuvbQ',
          ),
          1 => 
          array (
            0 => 'invce_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3400 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1CXE0wB3aA8U9hjH',
          ),
          1 => 
          array (
            0 => 'driver',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3441 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'handover-to-merchant',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3471 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'history-show',
          ),
          1 => 
          array (
            0 => 'about',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3505 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'box-sorting',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3540 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'box-sorting-back',
          ),
          1 => 
          array (
            0 => 'hub_shipment_box',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3572 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'back2shipment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3604 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-blog',
          ),
          1 => 
          array (
            0 => 'blog',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3637 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete-category',
          ),
          1 => 
          array (
            0 => 'blog_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3671 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'zone-to-area',
          ),
          1 => 
          array (
            0 => 'zone',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3705 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'export-selected',
          ),
          1 => 
          array (
            0 => 'shipment_ids',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3750 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'thirdparty-shipments',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3782 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'thirdparty-hub-shipments',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3804 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'thirdparty-left',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3830 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'thirdparty-right',
          ),
          1 => 
          array (
            0 => 'hub',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3859 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'thirdparty-rightWithInvoice',
          ),
          1 => 
          array (
            0 => 'invoice_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3894 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'thirdparty2right',
          ),
          1 => 
          array (
            0 => 'thirdparty_shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3916 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'thirdparty2left',
          ),
          1 => 
          array (
            0 => 'thirdparty_shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3943 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::K5XvvI6V81YlYA7q',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3971 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'team-show',
          ),
          1 => 
          array (
            0 => 'about',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4020 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant-handover-parcels',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4044 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'view-review',
          ),
          1 => 
          array (
            0 => 'client_review',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4073 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'vision-show',
          ),
          1 => 
          array (
            0 => 'about',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4105 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'promise-show',
          ),
          1 => 
          array (
            0 => 'about',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4151 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'single.shipment',
          ),
          1 => 
          array (
            0 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4174 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'shipmentInvoice',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4196 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pdf.shipment',
          ),
          1 => 
          array (
            0 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4219 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'merchant.shipmentCn',
          ),
          1 => 
          array (
            0 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4243 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'shipment.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4273 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payments-show',
          ),
          1 => 
          array (
            0 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4312 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setShippingCharge',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4346 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'editShipment',
          ),
          1 => 
          array (
            0 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4381 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateShipment',
          ),
          1 => 
          array (
            0 => 'shipment',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4426 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'PrepareShipmentEdit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4472 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-driver-shipments',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4512 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dateWize-driver-shipments',
          ),
          1 => 
          array (
            0 => 'dates',
            1 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4547 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'my-shipments',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4572 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'my-parcel',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4620 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'shipping-details',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4648 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'shipment-info',
          ),
          1 => 
          array (
            0 => 'shipment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4682 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cancel-parcel',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4720 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'receive-parcel',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4751 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'receive-all-parcel',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Facade\\Ignition\\Http\\Middleware\\IgnitionEnabled',
        ),
        'uses' => 'Facade\\Ignition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Facade\\Ignition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Facade\\Ignition\\Http\\Middleware\\IgnitionEnabled',
          1 => 'Facade\\Ignition\\Http\\Middleware\\IgnitionConfigValueEnabled:enableRunnableSolutions',
        ),
        'uses' => 'Facade\\Ignition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Facade\\Ignition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.shareReport' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/share-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Facade\\Ignition\\Http\\Middleware\\IgnitionEnabled',
          1 => 'Facade\\Ignition\\Http\\Middleware\\IgnitionConfigValueEnabled:enableShareButton',
        ),
        'uses' => 'Facade\\Ignition\\Http\\Controllers\\ShareReportController@__invoke',
        'controller' => 'Facade\\Ignition\\Http\\Controllers\\ShareReportController',
        'as' => 'ignition.shareReport',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.scripts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/scripts/{script}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Facade\\Ignition\\Http\\Middleware\\IgnitionEnabled',
        ),
        'uses' => 'Facade\\Ignition\\Http\\Controllers\\ScriptController@__invoke',
        'controller' => 'Facade\\Ignition\\Http\\Controllers\\ScriptController',
        'as' => 'ignition.scripts',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.styles' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/styles/{style}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Facade\\Ignition\\Http\\Middleware\\IgnitionEnabled',
        ),
        'uses' => 'Facade\\Ignition\\Http\\Controllers\\StyleController@__invoke',
        'controller' => 'Facade\\Ignition\\Http\\Controllers\\StyleController',
        'as' => 'ignition.styles',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Me5dBa5gjvBvu8SA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::Me5dBa5gjvBvu8SA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BMR99P8vo7P6h1CO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000069053850000000000045e636";}";s:4:"hash";s:44:"xarvRvRqPq6y6ue8zf7fdxmSVndNnF5yp+Mnc3e7eUE=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::BMR99P8vo7P6h1CO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6nujxu0v5rqVx2xb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cc',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:633:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:414:"function () {
    \\Illuminate\\Support\\Facades\\Artisan::call(\'cache:clear\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'config:clear\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'config:cache\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'view:clear\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'optimize:clear\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'route:cache\');
    return "Cleared!";
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000006905385e000000000045e636";}";s:4:"hash";s:44:"PJck2+AFWiDifiMcg25yeGW17yn0r/S/z1xRCKV+Dfk=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::6nujxu0v5rqVx2xb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'about' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'about',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@about',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@about',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'about',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'team' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'team',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@team',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@team',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'team',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mission' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@mission',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@mission',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vision' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'vision',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@vision',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@vision',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'vision',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'promise' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'promise',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@promise',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@promise',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'promise',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'history' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@history',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@history',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'history',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tracking' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tracking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@tracking',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@tracking',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'tracking',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'track-shipment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'track-shipment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@track_order',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@track_order',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'track-shipment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@contact',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@contact',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'contact',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-contact' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@save_contact',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@save_contact',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'save-contact',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'blog',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@blog',
        'controller' => 'App\\Http\\Controllers\\HomeController@blog',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'blog',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'show-blog' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'blog-info/{blog}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@show_blog',
        'controller' => 'App\\Http\\Controllers\\HomeController@show_blog',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'show-blog',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'blog-category/{blog_category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@category_post',
        'controller' => 'App\\Http\\Controllers\\HomeController@category_post',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'category-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'blog-search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@seach_blog',
        'controller' => 'App\\Http\\Controllers\\HomeController@seach_blog',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rate.check' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'check-rate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@rateCheck',
        'controller' => 'App\\Http\\Controllers\\HomeController@rateCheck',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'rate.check',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pricing' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pricing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@pricing',
        'controller' => 'App\\Http\\Controllers\\HomeController@pricing',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'pricing',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jr6JfhMqtElZKcjD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::jr6JfhMqtElZKcjD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.register' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin-dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\DashboardController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin-dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'basic-information' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/basic-information',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BasicInformationController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\BasicInformationController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'basic-information',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'basic-information.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/basic-information',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BasicInformationController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\BasicInformationController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'basic-information.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'addVerifyMsg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-merchant-verify-message',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BasicInformationController@addVerifyMsg',
        'controller' => 'App\\Http\\Controllers\\Admin\\BasicInformationController@addVerifyMsg',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'addVerifyMsg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateVerifyMsg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/update-verify-message/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BasicInformationController@updateVerifyMsg',
        'controller' => 'App\\Http\\Controllers\\Admin\\BasicInformationController@updateVerifyMsg',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'updateVerifyMsg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin-change-hub' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/admin-change-hub/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DashboardController@admin_changes_hub',
        'controller' => 'App\\Http\\Controllers\\Admin\\DashboardController@admin_changes_hub',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin-change-hub',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-admin-hub-ids' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-admin-hub-ids/{admin}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DashboardController@get_admin_hub_ids',
        'controller' => 'App\\Http\\Controllers\\Admin\\DashboardController@get_admin_hub_ids',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'get-admin-hub-ids',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'zone' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/zone',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@zone',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@zone',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'zone',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'zone.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/zone',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@zoneStore',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@zoneStore',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'zone.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminZoneGet' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-zone',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@zoneGet',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@zoneGet',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminZoneGet',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'zone.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/zone-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@zoneUpdate',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@zoneUpdate',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'zone.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'zone.delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/zone-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@zoneDelete',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@zoneDelete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'zone.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'zone.single' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-zone-single',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@zoneGetSingle',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@zoneGetSingle',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'zone.single',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hub' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/hub',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'hub',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hub.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/hub',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@hubStore',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@hubStore',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'hub.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminHubGet' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-hub',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@hubGet',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@hubGet',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminHubGet',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hub.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/hub-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@hubUpdate',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@hubUpdate',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'hub.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hub.delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/hub-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@hubDelete',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@hubDelete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'hub.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hub.single' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-hub-single',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@hubGetSingle',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@hubGetSingle',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'hub.single',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'SelectHub' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/get-hub-select',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@SelectHub',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@SelectHub',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'SelectHub',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'deleet-hub' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-hub/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@delete_hub',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@delete_hub',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'deleet-hub',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/area',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@area',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@area',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'area',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/area',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@areaStore',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@areaStore',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'area.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminAreaGet' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-area',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@areaGet',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@areaGet',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminAreaGet',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/area-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@areaUpdate',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@areaUpdate',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'area.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/area-delete/{area}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@areaDelete',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@areaDelete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'area.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.single' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-area-single',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@areaGetSingle',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@areaGetSingle',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'area.single',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/merchant-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\MerchantController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\MerchantController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'merchant.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/merchant-details/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\MerchantController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\MerchantController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'merchant.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/merchant-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\MerchantController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\MerchantController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'merchant.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.merchant.status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/update-merchant-verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\MerchantController@updateMerchantStatus',
        'controller' => 'App\\Http\\Controllers\\Admin\\MerchantController@updateMerchantStatus',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.merchant.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shippingPrice.set' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shipping-price-set',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShippingPriceController@shippingPrice',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShippingPriceController@shippingPrice',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'shippingPrice.set',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shippingPrice.add' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/shipping-price-set',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShippingPriceController@shippingPriceAdd',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShippingPriceController@shippingPriceAdd',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'shippingPrice.add',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shippingPrice.edit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/shipping-price-set-edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShippingPriceController@shippingPriceEdit',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShippingPriceController@shippingPriceEdit',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'shippingPrice.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-shipping-price' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-shipping-price/{shipping_price}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShippingPriceController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShippingPriceController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delete-shipping-price',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'show-shipping-price' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-shipping-price/{shipping_price}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShippingPriceController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShippingPriceController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'show-shipping-price',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver-list.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/driver-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'as' => 'driver-list.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\DriverController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\DriverController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => 'admin/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver-list.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/driver-list/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'as' => 'driver-list.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\DriverController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\DriverController@create',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => 'admin/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver-list.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/driver-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'as' => 'driver-list.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\DriverController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\DriverController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => 'admin/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver-list.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/driver-list/{driver_list}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'as' => 'driver-list.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\DriverController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\DriverController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => 'admin/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver-list.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/driver-list/{driver_list}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'as' => 'driver-list.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\DriverController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\DriverController@edit',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => 'admin/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver-list.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/driver-list/{driver_list}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'as' => 'driver-list.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\DriverController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\DriverController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => 'admin/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver-list.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/driver-list/{driver_list}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'as' => 'driver-list.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\DriverController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\DriverController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => 'admin/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin-driverShipments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/driver-shipments/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DriverController@assigned_shipments',
        'controller' => 'App\\Http\\Controllers\\Admin\\DriverController@assigned_shipments',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin-driverShipments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminShipment.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shipping-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminShipment.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminShipmentMore' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shipping-list/more/{id}/{status}/{shipping_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminShipmentMore',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'saveDriverShipments' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/shipping-list/more/{id}/{status}/{shipping_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@save_driver_shipment',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@save_driver_shipment',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'saveDriverShipments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminShipmentReceived' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shipping-list/received',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_received',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_received',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminShipmentReceived',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminShipmentCancelled' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shipping-list/cancelled',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_cancelled',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_cancelled',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminShipmentCancelled',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'add-parcelBy-admin' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-parcelBy-admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@add_parcel',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@add_parcel',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'add-parcelBy-admin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminShipmentReceive' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/assign-to-hub/{user_id}/{status}/{shipping_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@assignToHub',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@assignToHub',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminShipmentReceive',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'receiving-parcels' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/receiving-parcels/{user_id}/{status?}/{shipping_status?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@receving_parcels',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@receving_parcels',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'receiving-parcels',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-hub-csv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-hub-csv-files/{user_id}/{status}/{shipping_status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@get_hub_csv',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@get_hub_csv',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'get-hub-csv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ShipmentToHub' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/move-to-hub',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@MoveToHub',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@MoveToHub',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'ShipmentToHub',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'move2hub-withPhone' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/move2hub-withPhone',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@MoveToHubWithPhone',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@MoveToHubWithPhone',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'move2hub-withPhone',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'move2hub-withInvoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/move2hub-withInvoice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@MoveToHubWithInvoice',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@MoveToHubWithInvoice',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'move2hub-withInvoice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hub-parcels' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-hub-parcels/{hub}/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@hub_parcels',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@hub_parcels',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'hub-parcels',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hub-parcels-csv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-hub-parcels-csv/{hub}/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@hub_parcels_csv',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@hub_parcels_csv',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'hub-parcels-csv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'remove-hub-parcel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/remove-hub-parcel/{hub_shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@remove_hub_parcel',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@remove_hub_parcel',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'remove-hub-parcel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'change-hub-with-area' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/change-hub-with-area/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@change_bub',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@change_bub',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'change-hub-with-area',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hub-sorting' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/hub-sorting/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@hub_sorting',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@hub_sorting',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'hub-sorting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminShipmentDispatch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shipping-list/dispatch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_dispatch',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_dispatch',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminShipmentDispatch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dispatchView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/dispatch/view/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@dispatch_view',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@dispatch_view',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'dispatchView',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'status-dispatch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/status-dispatch/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@status_dispatch',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@status_dispatch',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'status-dispatch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'status-on-transit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/status-on-transit/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@status_on_transit',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@status_on_transit',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'status-on-transit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'box-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/dispatch-box-view/{hub_shipment_box}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@dispatch_box_view',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@dispatch_box_view',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'box-view',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'box-status-change' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/change-box-status/{hub_shipment_box}/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@box_status_changes',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@box_status_changes',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'box-status-change',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'box-status-change-bulk-id' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/change-box-status-bulk-id/{hub_shipment_box}/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@box_status_changes_bulk_id',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@box_status_changes_bulk_id',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'box-status-change-bulk-id',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'box-sorting' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/box-sorting/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@box_sorting',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@box_sorting',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'box-sorting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hub-receivable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/hub-receivable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@hub_receivable',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@hub_receivable',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'hub-receivable',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'box-sorting-back' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/back2-dispatch/{hub_shipment_box}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@box_back2Dispatch',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@box_back2Dispatch',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'box-sorting-back',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sorting-to-agent' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sort-to-agent-dispatch/{hub_shipment_box}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@sort2agentDispatch',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@sort2agentDispatch',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'sorting-to-agent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminAgentDispatch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/agent-dispatch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@agent_dispatch',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@agent_dispatch',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminAgentDispatch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent-dispatch-agentSide' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/agent-dispatch-agentSide',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@agent_dispatch_agentSide',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@agent_dispatch_agentSide',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'agent-dispatch-agentSide',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent-dispatch-driverSide' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/agent-dispatch-driverSide',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@agent_dispatch_driverSide',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@agent_dispatch_driverSide',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'agent-dispatch-driverSide',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent-dispatch-driverAssign' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/agentDispatch-to-driverAssign/{hub_shipment_box}/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@agentDispatch2DriverAssign',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@agentDispatch2DriverAssign',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'agent-dispatch-driverAssign',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::b4Ou2vPcqWTl2kQb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/agentDispatch-to-driverAssign-withInvoice/{invce_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@agentDispatch2DriverAssignWithInvoice',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@agentDispatch2DriverAssignWithInvoice',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::b4Ou2vPcqWTl2kQb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver-assign2agent-dispatch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/driver-assign2agent-dispatch/{hub_shipment_box}/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@driverAssign2Agent_dispatch',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@driverAssign2Agent_dispatch',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'driver-assign2agent-dispatch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent-dispatch-assing2Driver' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/agent-dispatch-assing-to-driver',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@agent_dispatchAssigning',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@agent_dispatchAssigning',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'agent-dispatch-assing2Driver',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'all-shipments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/all-shipments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@all_shipments',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@all_shipments',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'all-shipments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shipment-details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shipment-details/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@new_shipment_detail',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@new_shipment_detail',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'shipment-details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shipment-print' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shipment-print/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_print',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_print',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'shipment-print',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reset-shipment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/reset-shipment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@reset_shipment',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@reset_shipment',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'reset-shipment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'zone-to-area' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/zone-to-area/{zone}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@zone_wize_area',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@zone_wize_area',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'zone-to-area',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminReconcile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reconcile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@reconcile',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@reconcile',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminReconcile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hAvwTcXOX5PoL0ki' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/load-shipment-reconcilable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@load_shipment_reconcilable',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@load_shipment_reconcilable',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::hAvwTcXOX5PoL0ki',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8evdr4W1DBW59Mcy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/load-reconcile-shipments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@load_reconcil_shipments',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@load_reconcil_shipments',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::8evdr4W1DBW59Mcy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kU2QFrfpkoYmA9tY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/create-reconcile/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@create_reconcile',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@create_reconcile',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::kU2QFrfpkoYmA9tY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KxcJzU4JD3B0HT6B' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/remove-reconcile/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@remove_reconcile',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@remove_reconcile',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::KxcJzU4JD3B0HT6B',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zM9ZUpJ19Z3ce4iL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-reconcile2receive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@return_shipments2receive',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@return_shipments2receive',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::zM9ZUpJ19Z3ce4iL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminDelivery' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delivery',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@delivery',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@delivery',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminDelivery',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delivery-search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-shipment/{field}/{keyword}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_search',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_search',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delivery-search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delivery-search-driver' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-driver-shipment/{driver}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@driver_shipment_search',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@driver_shipment_search',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delivery-search-driver',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delivery-search-invoices' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-shipment-with-invoices/{keyword}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_search_invoices',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_search_invoices',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delivery-search-invoices',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delivery-search-hub' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-shipment-withHub/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_search_withHub',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_search_withHub',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delivery-search-hub',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delivery-search-hub-status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-shipment-withStatus/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_search_withStatus',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_search_withStatus',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delivery-search-hub-status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delivery-search-dates' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-shipment-withdate/{date1}/{date2}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_search_withDates',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_search_withDates',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delivery-search-dates',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shipment-audit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shipment-audit/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_audit',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_audit',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'shipment-audit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XIkEoNEoZKxWdCgG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/driver-delivery-note/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DriverController@delivery_note',
        'controller' => 'App\\Http\\Controllers\\Admin\\DriverController@delivery_note',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::XIkEoNEoZKxWdCgG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'export-selected' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/export-selected/{shipment_ids}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@export_shipments',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@export_shipments',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'export-selected',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delivery-payment-form' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delivery-payment-form/{shipment_ids}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@deliveryPaymentsForMerchant',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@deliveryPaymentsForMerchant',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delivery-payment-form',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delivery-payment-save' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-delivery-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@save_delivery_payment',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@save_delivery_payment',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delivery-payment-save',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kT66Kvo0AVhVg3yH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-selected-to-merchant/{shipment_ids}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@return_shipments',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@return_shipments',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::kT66Kvo0AVhVg3yH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminDownload' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shipment-download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@download',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@download',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminDownload',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delivery-search-bulkid' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-shipment-withBulkID/{bulk_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_search_withBulkID',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@shipment_search_withBulkID',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delivery-search-bulkid',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-shipment-files' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-shipment-files/{type}/{bulk_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@download_file',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@download_file',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'get-shipment-files',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminUploadCSV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/admin-upload-csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CSVController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\CSVController@create',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminUploadCSV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminShowCSV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/admin-upload-csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CSVController@get_csv_data',
        'controller' => 'App\\Http\\Controllers\\Admin\\CSVController@get_csv_data',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminShowCSV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin-csv-temporary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/csv-temporary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CSVController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\CSVController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin-csv-temporary',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin-csv-save' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/csv-temporary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CSVController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\CSVController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin-csv-save',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'CencelledShipping' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shipping-list/cencelled-items/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@cencelled_shippings',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@cencelled_shippings',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'CencelledShipping',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'back2shipment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/back-to-shipment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@back2shipment',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@back2shipment',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'back2shipment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'destroy-shipment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-shipment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'destroy-shipment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cencell-shipment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cencell-shipment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@cencell',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@cencell',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'cencell-shipment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'thirdparty-shipments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/thirdparty-shipments/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'thirdparty-shipments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'thirdparty-hub-shipments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/thirdparty-hub-shipments/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'thirdparty-hub-shipments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'thirdparty-left' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/thirdparty-left/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@show_left_side',
        'controller' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@show_left_side',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'thirdparty-left',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'thirdparty-right' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/thirdparty-right/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@show_right_side',
        'controller' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@show_right_side',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'thirdparty-right',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'thirdparty2right' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/thirdparty-moveTo-right/{thirdparty_shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@moveToright',
        'controller' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@moveToright',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'thirdparty2right',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'thirdparty2left' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/thirdparty-moveTo-left/{thirdparty_shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@moveToleft',
        'controller' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@moveToleft',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'thirdparty2left',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'thirdpartySendToSort' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/thirdparty-sendToSort',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@sendToSort',
        'controller' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@sendToSort',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'thirdpartySendToSort',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::K5XvvI6V81YlYA7q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/thirdparty-csv-pdf/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShipmentController@get_csv_pdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShipmentController@get_csv_pdf',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::K5XvvI6V81YlYA7q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'thirdparty-rightWithInvoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/thirdparty-rightWithInvoice/{invoice_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@show_right_withInvoice',
        'controller' => 'App\\Http\\Controllers\\Admin\\ThirdpartyShipmentController@show_right_withInvoice',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'thirdparty-rightWithInvoice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hold-shipments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/hold-shipments/{hold}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'hold-shipments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'move-to-hold_shipment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/move-to-hold_shipment/{shipment}/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_to_hold_shipment',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_to_hold_shipment',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'move-to-hold_shipment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nsDEfU1woNXwuvbQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/hold-agentDispatch-to-driverAssign-withInvoice/{invce_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_to_hold_shipmentWithInvoice',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_to_hold_shipmentWithInvoice',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::nsDEfU1woNXwuvbQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1CXE0wB3aA8U9hjH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/hold-agentDispatch-to-driverAssign-rider/{driver}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_to_hold_shipmentRider',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_to_hold_shipmentRider',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::1CXE0wB3aA8U9hjH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IenKOB22vUhKOAlB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/hold-shipment-rows/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@hold_shipment_rows',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@hold_shipment_rows',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::IenKOB22vUhKOAlB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VxQJ55O9RDAPjTjd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/driver-hub-shipment-rows/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@driver_hub_shipments',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@driver_hub_shipments',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::VxQJ55O9RDAPjTjd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::H0s2eN3nH9j7r1Pu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/move-back-to-hold_shipment/{shipment}/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_back2hold_shipment',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_back2hold_shipment',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::H0s2eN3nH9j7r1Pu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gGIpZuiBd2bak3Mm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sendToSorting-hold_shipment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@sendToSorting',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@sendToSorting',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::gGIpZuiBd2bak3Mm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Nkpp86UQ4PenhMLW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/move-to-return_shipment/{shipment}/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_to_return_shipment',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_to_return_shipment',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Nkpp86UQ4PenhMLW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5R8MLi7UYZdWdHpd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/move-to-return_shipment-withInvoice/{inviceid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_to_return_shipment_withInvoice',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_to_return_shipment_withInvoice',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::5R8MLi7UYZdWdHpd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TwLWjULtK1JhY6NG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/move-to-return_shipment-withRider/{driver}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_to_return_shipment_withRider',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_to_return_shipment_withRider',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::TwLWjULtK1JhY6NG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YqriZddFJv13UdKt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-shipment-rows/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@return_shipment_rows',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@return_shipment_rows',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::YqriZddFJv13UdKt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::h5ai1YGaDkYa7JOc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-shipments-parcels/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@return_shipments_parcels',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@return_shipments_parcels',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::h5ai1YGaDkYa7JOc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::39iPATGnvLEYILgu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/move-back-to-return_shipment/{return_shipment}/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_back2return_shipment',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@move_back2return_shipment',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::39iPATGnvLEYILgu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-sorting' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-sorting/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@return_sorting',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@return_sorting',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-sorting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-dispatch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-dispatch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@return_dispatch',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@return_dispatch',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-dispatch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-dispatch-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-dispatch/view/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@dispatch_view',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@dispatch_view',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-dispatch-view',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-status-dispatch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-status-dispatch/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@status_dispatch',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@status_dispatch',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-status-dispatch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-status-on-transit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-status-on-transit/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@status_on_transit',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@status_on_transit',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-status-on-transit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-box-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-dispatch-box-view/{return_shipment_box}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@dispatch_box_view',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@dispatch_box_view',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-box-view',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-box-status-change' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-change-box-status/{return_shipment_box}/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@box_status_changes',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@box_status_changes',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-box-status-change',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-box-status-change-bulk-id' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-change-box-status-bulk-id/{return_shipment_box}/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@box_status_changes_bulk_id',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@box_status_changes_bulk_id',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-box-status-change-bulk-id',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-box-sorting' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-box-sorting/{hub}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@box_sorting',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@box_sorting',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-box-sorting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'receive-from-hub' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/receive-from-hub',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@receive_from_hub',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@receive_from_hub',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'receive-from-hub',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-agent-dispatch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-agent-dispatch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@agent_dispatch',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@agent_dispatch',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-agent-dispatch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-agent-dispatch-agentSide' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-agent-dispatch-agentSide',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@agent_dispatch_agentSide',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@agent_dispatch_agentSide',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-agent-dispatch-agentSide',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-agent-dispatch-driverSide' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-agent-dispatch-driverSide',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@agent_dispatch_driverSide',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@agent_dispatch_driverSide',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-agent-dispatch-driverSide',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-agent-dispatch-driverAssign' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-agentDispatch-to-driverAssign/{return_shipment_box}/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@agentDispatch2DriverAssign',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@agentDispatch2DriverAssign',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-agent-dispatch-driverAssign',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-driver-assign2agent-dispatch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-driver-assign2agent-dispatch/{return_shipment_box}/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@driverAssign2Agent_dispatch',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@driverAssign2Agent_dispatch',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-driver-assign2agent-dispatch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-agent-dispatch-assing2Driver' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/return-agent-dispatch-assing-to-driver',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@agent_dispatchAssigning',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@agent_dispatchAssigning',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-agent-dispatch-assing2Driver',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-to-return-delivery' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-to-return-delivery/{type}/{hub_shipmentBox}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@return2return_delivery',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@return2return_delivery',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'return-to-return-delivery',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant-handover' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/return-merchant-handover',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@merchant_handover',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@merchant_handover',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'merchant-handover',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant-handover-parcels' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/view-merchant-handover/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@merchant_handover_parcels',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@merchant_handover_parcels',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'merchant-handover-parcels',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'handover-to-merchant' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/handover-to-merchant/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@handover2merchant',
        'controller' => 'App\\Http\\Controllers\\Admin\\HoldShipmentController@handover2merchant',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'handover-to-merchant',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin-list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/admin-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin-list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admins' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/admins',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@admins',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@admins',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admins',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'create-admin' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/admin/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@create',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'create-admin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-admin' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-admin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-admin' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/update-admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'update-admin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'destroy-admin' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/admin/delete/{admin}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'destroy-admin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'show-admin' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/admin/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'show-admin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role-assign' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/role-assign',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@role_assign',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@role_assign',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'role-assign',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-role-assign' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/role-assign',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@save_role_assign',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@save_role_assign',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-role-assign',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-roles' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-employee-roles/{admin}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@employee_roles',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@employee_roles',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'get-roles',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'adminSlider' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sliders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SliderController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\SliderController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'adminSlider',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sliders' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sliders-show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SliderController@sliders',
        'controller' => 'App\\Http\\Controllers\\Admin\\SliderController@sliders',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'sliders',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-slider' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-slider',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SliderController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\SliderController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-slider',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-slider' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/update-slider',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SliderController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\SliderController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'update-slider',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'show-slider' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/slider-show/{slider}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SliderController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\SliderController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'show-slider',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'adminAbout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/about-us',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'adminAbout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'adminMission' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/mission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@mission',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@mission',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'adminMission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'adminVision' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/vision',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@vision',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@vision',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'adminVision',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'adminPromise' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/promise',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@promise',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@promise',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'adminPromise',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'adminHistory' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@history',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@history',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'adminHistory',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'adminTeam' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/team',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@team',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@team',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'adminTeam',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'adminClientReview' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/client-reviews',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientReviewController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientReviewController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'adminClientReview',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'review-posts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/review-posts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientReviewController@ajax_get',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientReviewController@ajax_get',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'review-posts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-review' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-review',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientReviewController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientReviewController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-review',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-review' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/update-review',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientReviewController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientReviewController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'update-review',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'view-review' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/view-review/{client_review}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientReviewController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientReviewController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'view-review',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-review' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-review/{client_review}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientReviewController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientReviewController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delete-review',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-about-1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-about-1',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-about-1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-mission-1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-mission-1',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@storeMission',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@storeMission',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-mission-1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-vision-1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-vision-1',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@storeVision',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@storeVision',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-vision-1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-promise-1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-promise-1',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@storePromise',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@storePromise',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-promise-1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-history-1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-history-1',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@storeHistory',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@storeHistory',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-history-1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-team-1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-team-1',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@storeTeam',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@storeTeam',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-team-1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-about-us' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/about-us',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@save',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@save',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-about-us',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-mission' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/mission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@saveMission',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@saveMission',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-mission',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-vision' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/vision',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@saveVision',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@saveVision',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-vision',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-promise' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/promise',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@savePromise',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@savePromise',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-promise',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-team' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/team',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@saveTeam',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@saveTeam',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-team',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-history' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@saveHistory',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@saveHistory',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-history',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'about-posts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/about-posts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@about_posts',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@about_posts',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'about-posts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mission-posts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/mission-posts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@mission_posts',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@mission_posts',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'mission-posts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vision-posts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/vision-posts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@vision_posts',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@vision_posts',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'vision-posts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'promise-posts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/promise-posts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@promise_posts',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@promise_posts',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'promise-posts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'team-posts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/team-posts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@team_posts',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@team_posts',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'team-posts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'history-posts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/history-posts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@history_posts',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@history_posts',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'history-posts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'about-show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/about-show/{about}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'about-show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mission-show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/mission-show/{about}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@showMission',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@showMission',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'mission-show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'vision-show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/vision-show/{about}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@showVision',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@showVision',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'vision-show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'promise-show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/promise-show/{about}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@showPromise',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@showPromise',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'promise-show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'history-show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/history-show/{about}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@showHistory',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@showHistory',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'history-show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'team-show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/team-show/{about}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@showTeam',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@showTeam',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'team-show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-about-post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/update-about-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'update-about-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-mission-post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/update-mission-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@updateMission',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@updateMission',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'update-mission-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-vision-post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/update-vision-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@updateVision',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@updateVision',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'update-vision-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-promise-post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/update-promise-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@updatePromise',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@updatePromise',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'update-promise-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-history-post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/update-history-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@updateHistory',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@updateHistory',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'update-history-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-team-post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/update-team-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@updateTeam',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@updateTeam',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'update-team-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-about-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-about-post/{about}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delete-about-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-mission-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-mission-post/{about}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@destroyMission',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@destroyMission',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delete-mission-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-vision-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-vision-post/{about}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@destroyVision',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@destroyVision',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delete-vision-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-promise-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-promise-post/{about}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@destroyPromise',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@destroyPromise',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delete-promise-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-history-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-history-post/{about}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@destroyHistory',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@destroyHistory',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delete-history-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-team-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-team-post/{about}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AboutController@destroyTeam',
        'controller' => 'App\\Http\\Controllers\\Admin\\AboutController@destroyTeam',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delete-team-post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact-messages' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/messages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\MessageController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\MessageController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'contact-messages',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'messages' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/view-messages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\MessageController@messages',
        'controller' => 'App\\Http\\Controllers\\Admin\\MessageController@messages',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'messages',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'view-message' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/message-show/{message}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\MessageController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\MessageController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'view-message',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-message' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-message/{message}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\MessageController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\MessageController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delete-message',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cms_page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/merchant-verify-message',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\MessageController@cms_page',
        'controller' => 'App\\Http\\Controllers\\Admin\\MessageController@cms_page',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'cms_page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'AdminBlog' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/blog/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BlogController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\BlogController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'AdminBlog',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blogs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/blog-posts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BlogController@blogs',
        'controller' => 'App\\Http\\Controllers\\Admin\\BlogController@blogs',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'blogs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-blog' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/update-blog',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BlogController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\BlogController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'update-blog',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'show-blog-admin' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-blog/{blog}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BlogController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\BlogController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'show-blog-admin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-blog' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/save-blog',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BlogController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\BlogController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-blog',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-blog' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/blog/delete/{blog}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BlogController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\BlogController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delete-blog',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog-category' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/blog/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Blog_categoryController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Blog_categoryController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'blog-category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog-categories' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/blog/categories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Blog_categoryController@categories',
        'controller' => 'App\\Http\\Controllers\\Admin\\Blog_categoryController@categories',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'blog-categories',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-category' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/blog/category/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Blog_categoryController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Blog_categoryController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'show-category' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/show-category/{blog_category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Blog_categoryController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\Blog_categoryController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'show-category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delete-category' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/blog/category/delete/{blog_category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Blog_categoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Blog_categoryController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'delete-category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update-category' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/blog/category/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Blog_categoryController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Blog_categoryController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'update-category',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mail-setup' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/set-mail-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BasicInformationController@mailing_info',
        'controller' => 'App\\Http\\Controllers\\Admin\\BasicInformationController@mailing_info',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'mail-setup',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-mail-setup' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/set-mail-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BasicInformationController@save_mailing_info',
        'controller' => 'App\\Http\\Controllers\\Admin\\BasicInformationController@save_mailing_info',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'save-mail-setup',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'addEditCharge' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/add-edit-shipping-charge/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShippingChargeController@addEditCharge',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShippingChargeController@addEditCharge',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'addEditCharge',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shippingCharges' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/shipping-charges',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShippingChargeController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShippingChargeController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'shippingCharges',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@index',
        'controller' => 'App\\Http\\Controllers\\AuthController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verify-user' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@verify',
        'controller' => 'App\\Http\\Controllers\\AuthController@verify',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'verify-user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verify-user-code' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@verify_code',
        'controller' => 'App\\Http\\Controllers\\AuthController@verify_code',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'verify-user-code',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.resend' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'verification.resend',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@send_verification_code',
        'controller' => 'App\\Http\\Controllers\\AuthController@send_verification_code',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'verification.resend',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\AuthController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@register',
        'controller' => 'App\\Http\\Controllers\\AuthController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@registerStore',
        'controller' => 'App\\Http\\Controllers\\AuthController@registerStore',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\AuthController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\User\\DashboardController@index',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'single.shipment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'shipment-info/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\ShipmentController@show',
        'controller' => 'App\\Http\\Controllers\\User\\ShipmentController@show',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'single.shipment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pdf.shipment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'shipment-pdf/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\ShipmentController@shipment_pdf',
        'controller' => 'App\\Http\\Controllers\\User\\ShipmentController@shipment_pdf',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'pdf.shipment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shipmentInvoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'shipment-invoice/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\ShipmentController@shipmentInvoice',
        'controller' => 'App\\Http\\Controllers\\User\\ShipmentController@shipmentInvoice',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'shipmentInvoice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.shipmentCn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'shipment-cnote/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\ShipmentController@shipmentConsNote',
        'controller' => 'App\\Http\\Controllers\\User\\ShipmentController@shipmentConsNote',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'merchant.shipmentCn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shipment.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'shipment-delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => '\\App\\Http\\Controllers\\User\\ShipmentController@shipmentDelete',
        'controller' => '\\App\\Http\\Controllers\\User\\ShipmentController@shipmentDelete',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'shipment.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setShippingCharge' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'set-shipping-charge/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ShippingChargeController@setShippingCharge',
        'controller' => 'App\\Http\\Controllers\\Admin\\ShippingChargeController@setShippingCharge',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'setShippingCharge',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\DashboardController@profile',
        'controller' => 'App\\Http\\Controllers\\User\\DashboardController@profile',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ProfileEdit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile-edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\DashboardController@ProfileEdit',
        'controller' => 'App\\Http\\Controllers\\User\\DashboardController@ProfileEdit',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ProfileEdit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ProfileUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'profile-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\DashboardController@ProfileUpdate',
        'controller' => 'App\\Http\\Controllers\\User\\DashboardController@ProfileUpdate',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ProfileUpdate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'account',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\DashboardController@account',
        'controller' => 'App\\Http\\Controllers\\User\\DashboardController@account',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'account',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ChangeMail' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'change-email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\DashboardController@ChangeMail',
        'controller' => 'App\\Http\\Controllers\\User\\DashboardController@ChangeMail',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ChangeMail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ChangePassword' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'change-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\DashboardController@ChangePassword',
        'controller' => 'App\\Http\\Controllers\\User\\DashboardController@ChangePassword',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ChangePassword',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merhcant_shipments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'prepare-shipment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\ShipmentController@index',
        'controller' => 'App\\Http\\Controllers\\User\\ShipmentController@index',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'merhcant_shipments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'merchant.rate.check' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'check-rate-merchant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\ShipmentController@rateCheck',
        'controller' => 'App\\Http\\Controllers\\User\\ShipmentController@rateCheck',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'merchant.rate.check',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'PrepareShipmentSubmit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'shipment-save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\ShipmentController@shipmentSave',
        'controller' => 'App\\Http\\Controllers\\User\\ShipmentController@shipmentSave',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'PrepareShipmentSubmit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'editShipment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-shipment/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\ShipmentController@edit',
        'controller' => 'App\\Http\\Controllers\\User\\ShipmentController@edit',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'editShipment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateShipment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-shipment/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\ShipmentController@update',
        'controller' => 'App\\Http\\Controllers\\User\\ShipmentController@update',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'updateShipment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\ShipmentController@payments',
        'controller' => 'App\\Http\\Controllers\\User\\ShipmentController@payments',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payments-load' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payments-load',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\ShipmentController@payments_loading',
        'controller' => 'App\\Http\\Controllers\\User\\ShipmentController@payments_loading',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payments-load',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payments-show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'show-payment/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\ShipmentController@show_payment',
        'controller' => 'App\\Http\\Controllers\\User\\ShipmentController@show_payment',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payments-show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'csv-upload' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'csv-upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\CSVController@create',
        'controller' => 'App\\Http\\Controllers\\User\\CSVController@create',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'csv-upload',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-csv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'csv-upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\CSVController@get_csv_data',
        'controller' => 'App\\Http\\Controllers\\User\\CSVController@get_csv_data',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-csv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'csv-temporary' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'csv-temporary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\CSVController@show',
        'controller' => 'App\\Http\\Controllers\\User\\CSVController@show',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'csv-temporary',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'csv-save' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'csv-temporary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\CSVController@store_new',
        'controller' => 'App\\Http\\Controllers\\User\\CSVController@store_new',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'csv-save',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'PrepareShipmentEdit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'prepare-shipment-details/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
        ),
        'uses' => 'App\\Http\\Controllers\\User\\ShipmentController@PrepareShipmentEdit',
        'controller' => 'App\\Http\\Controllers\\User\\ShipmentController@PrepareShipmentEdit',
        'namespace' => 'App\\Http\\Controllers\\User',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'PrepareShipmentEdit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::R6lUSYHMeUnJY4Jg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'DriverAuthController@index',
        'controller' => 'DriverAuthController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::R6lUSYHMeUnJY4Jg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver.login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'driver/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'DriverAuthController@login',
        'controller' => 'DriverAuthController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'driver.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver.register' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'driver/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\AuthController@store',
        'controller' => 'App\\Http\\Controllers\\Driver\\AuthController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'driver.register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'driver/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Driver\\AuthController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'driver.logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driver.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'DriverDashboardController@index',
        'controller' => 'DriverDashboardController@index',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'driver.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-driver-shipments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver/get-shipments/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\DashboardController@shipments',
        'controller' => 'App\\Http\\Controllers\\Driver\\DashboardController@shipments',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'get-driver-shipments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dateWize-driver-shipments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver/get-shipments-with-dates/{dates}/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\DashboardController@shipments_dates',
        'controller' => 'App\\Http\\Controllers\\Driver\\DashboardController@shipments_dates',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'dateWize-driver-shipments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'driverShipments.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver/shipments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\ShipmentController@index',
        'controller' => 'App\\Http\\Controllers\\Driver\\ShipmentController@index',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'driverShipments.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'my-shipments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver/my-shipments/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\ShipmentController@my_shipments',
        'controller' => 'App\\Http\\Controllers\\Driver\\ShipmentController@my_shipments',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'my-shipments',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shipping-details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver/shipping-details/{id}/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\ShipmentController@show',
        'controller' => 'App\\Http\\Controllers\\Driver\\ShipmentController@show',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'shipping-details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cancel-parcel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver/cencell-parcel/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\ShipmentController@cencel_parcel',
        'controller' => 'App\\Http\\Controllers\\Driver\\ShipmentController@cencel_parcel',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'cancel-parcel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'receive-parcel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver/receive-shipment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\ShipmentController@receive_parcel',
        'controller' => 'App\\Http\\Controllers\\Driver\\ShipmentController@receive_parcel',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'receive-parcel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'receive-all-parcel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver/receive-all-shipment/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\ShipmentController@receive_all_parcel',
        'controller' => 'App\\Http\\Controllers\\Driver\\ShipmentController@receive_all_parcel',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'receive-all-parcel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'my-parcel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver/my-parcels/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\ShipmentController@my_parcels',
        'controller' => 'App\\Http\\Controllers\\Driver\\ShipmentController@my_parcels',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'my-parcel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'box-for-delivery' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver/agent-dispatch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\ShipmentController@agent_dispatch',
        'controller' => 'App\\Http\\Controllers\\Driver\\ShipmentController@agent_dispatch',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'box-for-delivery',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shipment-info' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver/shipment-info/{shipment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\ShipmentController@shipment_info',
        'controller' => 'App\\Http\\Controllers\\Driver\\ShipmentController@shipment_info',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'shipment-info',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'shipment-delivery' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'driver/shipment-delivery',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\ShipmentController@delivery_report',
        'controller' => 'App\\Http\\Controllers\\Driver\\ShipmentController@delivery_report',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'shipment-delivery',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-box-for-delivery' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'driver/return-agent-dispatch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\ShipmentController@return_agent_dispatch',
        'controller' => 'App\\Http\\Controllers\\Driver\\ShipmentController@return_agent_dispatch',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'return-box-for-delivery',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'return-shipment-delivery' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'driver/return-shipment-delivery',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\ShipmentController@return_delivery_report',
        'controller' => 'App\\Http\\Controllers\\Driver\\ShipmentController@return_delivery_report',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'return-shipment-delivery',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'confirm-opt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'driver/confirm-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:driver',
        ),
        'uses' => 'App\\Http\\Controllers\\Driver\\ShipmentController@otp_confirmation',
        'controller' => 'App\\Http\\Controllers\\Driver\\ShipmentController@otp_confirmation',
        'namespace' => 'App\\Http\\Controllers\\Driver',
        'prefix' => '/driver',
        'where' => 
        array (
        ),
        'as' => 'confirm-opt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
