<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use App\Models\Admin;
use App\Models\Admin_Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // $salesToday = \DB::table('driver_hub_shipment_box')
        //             ->where('status', 'partial')
        //             ->orWhere('status', 'delivery')
        //             ->whereDate('created_at', \Carbon\Carbon::today())
        //             ->count();
        $unit = Unit::where('admin_id',Auth::guard('admin')->user()->id)->first();
        if($unit!=null){
            Session::put('admin_unit',$unit);
        }
        return view('admin.dashboard')->with('salesToday','');
    }

    public function admin_changes_hub(Hub $hub)
    {
        Session::put('admin_hub',$hub);
        return back();
    }

    public function store(Request $request)
    {
        //
    }

    public function get_admin_hub_ids(Admin $admin)
    {
        $hubs = \App\Admin_hub::where('admin_id',$admin->id)->get();
        $ids = array();
        foreach ($hubs as $key => $value) {
            $ids[] = $value->hub_id;
        }
        return implode(',',$ids);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
