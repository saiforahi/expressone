<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Http\Controllers\Controller;
use App\Hub;
use App\Models\Location;
use App\Models\Point;
use App\Models\Unit;
use App\Zone;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Session\Session;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class AreaController extends Controller
{
    public function index()
    {
        $point = Point::all();
        return view('admin.area.point', compact('point'));
    }

    public function get_points()
    {
        return FacadesDataTables::of(Point::orderBy('id', 'DESC')->get())->addColumn('action', function ($point) {
            return '
            <div class="btn-group  btn-group-sm">
                <button class="btn btn-success edit" id="' . $point->id . '" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>
                <button class="btn btn-danger delete" id="' . $point->id . '" type="button"><i class="mdi mdi-delete m-r-3"></i>Delete</button>
              </div>';
        })->addColumn('status', function ($point) {
            if ($point->status == 1) {
                return "<button type = 'button' id = '$point->id' class='btn btn-success btn-xs Change'> Active</button>";
            } else {
                return "<button type = 'button' id = '$point->id' class='btn btn-info btn-xs Change'> Inactive</button>";
            }
        })->addColumn('unit', function ($point) {
            return Unit::where('id', $point->unit_id)->pluck('name')->first();
        })->rawColumns(['status', 'action'])->make(true);
    }

    public function update_point(Request $request)
    {
        if ($request->action == 'inactive') {
            $insert = Point::find($request->id);
            $insert->status = 0;
            $insert->save();
        } else {
            $insert = Point::find($request->id);
            $insert->status = 1;
            $insert->save();
        }
    }

    public function point_create(Request $request)
    {
        $this->validate($request, [
            'unit_id' => 'Required',
            'name' => 'Required|max:255|unique:points,name,' . $request->id,
        ]);

        if ($request->id == '') {
            $insert = new Point();
        } else {
            $insert = Point::find($request->id);
        }
        $insert->unit_id = $request->unit_id;
        $insert->name = $request->name;
        $insert->save();

        return 1;
    }

    public function point_details(Request $request)
    {
        return Point::findOrFail($request->id);
    }

    public function select_point(Request $request)
    {
        $points = Point::where('unit_id', $request->id)->where('status', 1)->get();
        return json_encode($points);
    }

    public function delete_point(Point $point)
    {
        if (!auth()->guard('admin')->user()->hasRole(Role::where('name','super-admin')->first()->id)) return 0;
        $locations = Location::where('point_id', $point->id)->count();
        if ($locations > 0) return 0;
        $point->delete();
        return 1;
    }


    public function unit()
    {
        return view('admin.area.unit');
    }

    public function get_units()
    {
        return FacadesDataTables::of(Unit::orderBy('created_at'))->addColumn('action', function ($unit) {
            return '<div class="btn-group  btn-group-sm">
                <button class="btn btn-success edit" id="' . $unit->id . '" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>
                <button class="btn btn-danger delete" id="' . $unit->id . '" type="button"><i class="mdi mdi-delete m-r-3"></i>Delete</button>
            </div> ';
        })->addColumn('status', function ($unit) {
            if ($unit->status == 1) {
                return "<button type = 'button' id = '$unit->id' class='btn btn-success btn-xs Change'> Active</button>";
            } else {
                return "<button type = 'button' id = '$unit->id' class='btn btn-info btn-xs Change'> Inactive</button>";
            }
        })->rawColumns(['status', 'action'])->make(true);
    }

    public function unit_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'Required|max:255|unique:units,name',
        ]);

        if ($request->id == '') {
            $insert = new Unit();
        } else {
            $insert = Unit::find($request->id);
        }
        $insert->name = $request->name;
        $insert->save();

        return 1;
    }

    public function unit_update(Request $request)
    {
        if ($request->action == 'inactive') {
            $insert = Unit::find($request->id);
            $insert->status = 0;
            $insert->save();
        } else {
            $insert = Unit::find($request->id);
            $insert->status = 1;
            $insert->save();
        }
    }

    public function unit_delete(Request $request)
    {
        try{
            Unit::where('id', $request->id)->delete();
            return true;
        }
        catch(Exception $e){
            throw $e;
        }
    }

    public function unit_detail(Request $request)
    {
        return Unit::findOrFail($request->id);
    }

    public function location()
    {
        $locations = Location::latest()->get();
        return view('admin.area.location', compact('locations'));
    }

    function location_detail(Request $request)
    {
        return Location::with('point')->findOrFail($request->id);
    }
    public function location_store(Request $request)
    {
        // dd($request)
        $this->validate($request, [
            'point_id' => 'required|exists:points,id', 
            'name' => 'required|max:255|unique:locations,name',
        ]);

        if ($request->id == '') {
            $insert = new Location();
        } else {
            $insert = Location::find($request->id);
        }
        $insert->point_id = $request->point_id;
        $insert->unit_id = $request->unit_id;
        $insert->name = $request->name;
        $insert->save();

        return 1;
    }

    public function get_locations()
    {
        return FacadesDataTables::of(Location::orderBy('id', 'DESC'))->addColumn('action', function ($country) {
            return '
            <div class="btn-group  btn-group-sm text-right">
                <button class="btn btn-info btn-xs edit" id="' . $country->id . '"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-xs delete" id="' . $country->id . '"><i class="fa fa-trash"></i> Delete</button>
            </div>
            ';
        })->addColumn('status', function ($location) {
            if ($location->status == 1) {
                return "<button type = 'button' id = '$location->id' class='btn btn-success btn-xs Change'> Active</button>";
            } else {
                return "<button type = 'button' id = '$location->id' class='btn btn-info btn-xs Change'> Inactive</button>";
            }
        })->addColumn('unit', function ($location) {
            return Unit::where('id', Point::where('id', $location->point_id)->pluck('unit_id')->first())->pluck('name')->first();
        })->addColumn('point', function ($location) {
            return Point::where('id', $location->point_id)->pluck('name')->first();
        })->rawColumns(['status', 'action'])->make(true);
    }

    public function location_update(Request $request)
    {
        if ($request->action == 'inactive') {
            $insert = Location::find($request->id);
            $insert->status = 0;
            $insert->save();
        } else {
            $insert = Location::find($request->id);
            $insert->status = 1;
            $insert->save();
        }
    }

    public function location_delete(Location $location)
    {
        $location->delete();
        return true;
    }

    // ajax call
    function zone_wize_area(Zone $zone)
    {
        return Area::where('zone_id', $zone->id)->select('id', 'name')->get();
    }
}
