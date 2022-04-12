<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;

class BuisnessController extends Controller
{
    //
    public function show(){
        $info=GeneralSettings::first();
        return view('admin.settings.buisness-settings',compact('info'));
    }
}
