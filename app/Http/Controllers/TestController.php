<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Shipment;
use App\Models\Blog;
use App\Models\Blog_category;
use App\Models\Area;
use App\Models\ShippingPrice;

use Validator;
class TestController extends Controller
{

    public function index()
    {
        $admins = Admin::with('roles')->get();
        return $admins;
    }

    
}
