<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BuisnessController extends Controller
{
    //
    public function show(){
        $info=GeneralSettings::first();
        return view('admin.settings.buisness-settings',compact('info'));
    }
    public function update(Request $req){
        $info=GeneralSettings::first();
        $info->incentive_val=$req->incentive_val;
        $info->save();
        Session::flash('message', 'Configuration has been updated successfully!');
        return view('admin.settings.buisness-settings',compact('info'));
    }
}
