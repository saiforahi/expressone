<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hub;
use App\Models\Admin;
use App\Models\Admin_Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $hub = Admin_Unit::where('admin_id', Auth::guard('admin')->user()->id)->first();
        if ($hub != null) {
            Session::put('admin_unitb', $hub);
        }
        return view('admin.dashboard');
    }

    public function admin_changes_hub(Hub $hub)
    {
        Session::put('Admin_Unit', $hub);
        return back();
    }

    public function store(Request $request)
    {
        //
    }

    public function get_Admin_Unit_ids(Admin $admin)
    {
        $hubs = Admin_Unit::where('admin_id', $admin->id)->get();
        $ids = array();
        foreach ($hubs as $key => $value) {
            $ids[] = $value->hub_id;
        }
        return implode(',', $ids);
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
