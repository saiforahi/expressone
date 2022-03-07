<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipment;

class ReportController extends Controller
{
    //
    public function show_report_pickup_from_merchant($type){
        $title="";
        $shipments=Shipment::all();
        switch($type){
            case "pickup-from-merchant":
                $title="Pick up from merchant";
                break;

            default:
                $title="Pick up from merchant";
                break;
        }
        return view('admin.reports.show',compact(['type','title','shipments']));
    }
}
