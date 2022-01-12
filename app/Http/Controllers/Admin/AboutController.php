<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use App\History;
use App\Mission;
use App\Promise;
use App\Team;
use App\Vision;
use Session;
use DataTables;
use Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (About::find(1) == null) $about = new About;
        else $about = About::find(1);
        return view('admin.website_manage.about.index', compact('about'));
    }
    public function mission()
    {
        if (Mission::find(1) == null) $about = new Mission;
        else $about = Mission::find(1);
        return view('admin.website_manage.mission.index', compact('about'));
    }
    public function vision()
    {
        if (Vision::find(1) == null) $about = new Vision;
        else $about = Vision::find(1);
        return view('admin.website_manage.vision.index', compact('about'));
    }
    public function promise()
    {
        if (Promise::find(1) == null) $about = new Promise;
        else $about = Promise::find(1);
        return view('admin.website_manage.promise.index', compact('about'));
    }
    public function history()
    {
        if (History::find(1) == null) $about = new History;
        else $about = History::find(1);
        return view('admin.website_manage.history.index', compact('about'));
    }
    public function team()
    {
        if (Team::find(1) == null) $about = new Team;
        else $about = Team::find(1);
        return view('admin.website_manage.team.index', compact('about'));
    }


    public function store(Request $request)
    {

        if (empty(strip_tags($request->description))) {
            // echo 'empty';
            return back()->with('message', 'Description field is need to setUp!');
        }
        $data = [
            'title' => 'About Us',
            'description' => $request->description,
            'status' => '1'
        ];
        if ($request->submit == 'save') {
            About::create($data);
            return back()->with('message', 'Initional setup is Created for About us page!');
        } else {
            About::where('id', 1)->update($data);
            return back()->with('message', 'Initional setup is updated for About us page!');
        }
    }
    public function storeMission(Request $request)
    {

        if (empty(strip_tags($request->description))) {
            // echo 'empty';
            return back()->with('message', 'Description field is need to setUp!');
        }
        $data = [
            'title' => 'Our Mission',
            'description' => $request->description,
            'status' => '1'
        ];
        if ($request->submit == 'save') {
            Mission::create($data);
            return back()->with('message', 'Initional setup is Created for Mission page!');
        } else {
            Mission::where('id', 1)->update($data);
            return back()->with('message', 'Initional setup is updated for Mission page!');
        }
    }
    public function storeVision(Request $request)
    {

        if (empty(strip_tags($request->description))) {
            // echo 'empty';
            return back()->with('message', 'Description field is need to setUp!');
        }
        $data = [
            'title' => 'Our Vision',
            'description' => $request->description,
            'status' => '1'
        ];
        if ($request->submit == 'save') {
            Vision::create($data);
            return back()->with('message', 'Initional setup is Created for Vision page!');
        } else {
            Vision::where('id', 1)->update($data);
            return back()->with('message', 'Initional setup is updated for Vision page!');
        }
    }
    public function storePromise(Request $request)
    {

        if (empty(strip_tags($request->description))) {
            // echo 'empty';
            return back()->with('message', 'Description field is need to setUp!');
        }
        $data = [
            'title' => 'Our Promise',
            'description' => $request->description,
            'status' => '1'
        ];
        if ($request->submit == 'save') {
            Promise::create($data);
            return back()->with('message', 'Initional setup is Created for Promise page!');
        } else {
            Promise::where('id', 1)->update($data);
            return back()->with('message', 'Initional setup is updated for Promise page!');
        }
    }
    public function storeHistory(Request $request)
    {

        if (empty(strip_tags($request->description))) {
            // echo 'empty';
            return back()->with('message', 'Description field is need to setUp!');
        }
        $data = [
            'title' => 'Company History',
            'description' => $request->description,
            'status' => '1'
        ];
        if ($request->submit == 'save') {
            History::create($data);
            return back()->with('message', 'Initional setup is Created for Company History page!');
        } else {
            History::where('id', 1)->update($data);
            return back()->with('message', 'Initional setup is updated for Company History page!');
        }
    }
    public function storeTeam(Request $request)
    {

        if (empty(strip_tags($request->description))) {
            // echo 'empty';
            return back()->with('message', 'Description field is need to setUp!');
        }
        $data = [
            'title' => 'Management Team',
            'description' => $request->description,
            'status' => '1'
        ];
        if ($request->submit == 'save') {
            Team::create($data);
            return back()->with('message', 'Initional setup is Created for Management Team page!');
        } else {
            Team::where('id', 1)->update($data);
            return back()->with('message', 'Initional setup is updated for Management Team page!');
        }
    }

    public function save(Request $request)
    {
        $validator = $this->fields();

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ];
        $slider = About::create($data);
        return response()->json(['success' => 'About-post has been created successfully.']);
    }
    public function saveMission(Request $request)
    {
        $validator = $this->fields();

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ];
        $slider = Mission::create($data);
        return response()->json(['success' => 'Mission-post has been created successfully.']);
    }
    public function saveVision(Request $request)
    {
        $validator = $this->fields();

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ];
        $slider = Vision::create($data);
        return response()->json(['success' => 'Vision-post has been created successfully.']);
    }
    public function saveTeam(Request $request)
    {
        $validator = $this->fields();

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ];
        $slider = Team::create($data);
        return response()->json(['success' => 'Team-post has been created successfully.']);
    }

    public function savePromise(Request $request)
    {
        $validator = $this->fields();

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ];
        $slider = Promise::create($data);
        return response()->json(['success' => 'Promise-post has been created successfully.']);
    }

    public function saveHistory(Request $request)
    {
        $validator = $this->fields();

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ];
        $slider = History::create($data);
        return response()->json(['success' => 'History-post has been created successfully.']);
    }


    function about_posts()
    {
        return DataTables::of(About::where('id', '!=', '1')->get())->addColumn('action', function ($about) {
            $data = '<div class="btn-group btn-group-sm">
                <button class="btn btn-success edit" id="' . $about->id . '" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>';

            $data .= ' <button class="btn btn-danger delete" id="' . $about->id . '" type="button"><i class="mdi mdi-delete m-r-3"></i>Delete</button>';

            $data .= '</div>';
            return $data;
        })

            ->addColumn('title', function ($about) {
                return $about->title;
            })
            ->addColumn('description', function ($about) {
                if (strlen($about->description) > 80) {
                    return substr($about->description, 0, 80) . ' ...';
                } else return $about->description;
            })
            ->addColumn('status', function ($about) {
                if ($about->status == '1') {
                    $data = ' <button class="btn btn-info btn-xs pull-right" type="button"><i class="mdi mdi-check m-r-3"></i>Published</button>';
                } else {
                    $data = ' <button class="btn btn-warning btn-xs pull-right" type="button"><i class="mdi mdi-times m-r-3"></i>Unpublished</button>';
                }
                return $data;
            })->rawColumns(['title', 'description', 'status', 'action'])->make(true);
    }

    function mission_posts()
    {
        return DataTables::of(Mission::where('id', '!=', '1')->get())->addColumn('action', function ($about) {
            $data = '<div class="btn-group btn-group-sm">
               <button class="btn btn-success edit" id="' . $about->id . '" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>';

            $data .= ' <button class="btn btn-danger delete" id="' . $about->id . '" type="button"><i class="mdi mdi-delete m-r-3"></i>Delete</button>';

            $data .= '</div>';
            return $data;
        })

            ->addColumn('title', function ($about) {
                return $about->title;
            })
            ->addColumn('description', function ($about) {
                if (strlen($about->description) > 80) {
                    return substr($about->description, 0, 80) . ' ...';
                } else return $about->description;
            })
            ->addColumn('status', function ($about) {
                if ($about->status == '1') {
                    $data = ' <button class="btn btn-info btn-xs pull-right" type="button"><i class="mdi mdi-check m-r-3"></i>Published</button>';
                } else {
                    $data = ' <button class="btn btn-warning btn-xs pull-right" type="button"><i class="mdi mdi-times m-r-3"></i>Unpublished</button>';
                }
                return $data;
            })->rawColumns(['title', 'description', 'status', 'action'])->make(true);
    }
    function vision_posts()
    {
        return DataTables::of(Vision::where('id', '!=', '1')->get())->addColumn('action', function ($about) {
            $data = '<div class="btn-group btn-group-sm">
           <button class="btn btn-success edit" id="' . $about->id . '" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>';

            $data .= ' <button class="btn btn-danger delete" id="' . $about->id . '" type="button"><i class="mdi mdi-delete m-r-3"></i>Delete</button>';

            $data .= '</div>';
            return $data;
        })

            ->addColumn('title', function ($about) {
                return $about->title;
            })
            ->addColumn('description', function ($about) {
                if (strlen($about->description) > 80) {
                    return substr($about->description, 0, 80) . ' ...';
                } else return $about->description;
            })
            ->addColumn('status', function ($about) {
                if ($about->status == '1') {
                    $data = ' <button class="btn btn-info btn-xs pull-right" type="button"><i class="mdi mdi-check m-r-3"></i>Published</button>';
                } else {
                    $data = ' <button class="btn btn-warning btn-xs pull-right" type="button"><i class="mdi mdi-times m-r-3"></i>Unpublished</button>';
                }
                return $data;
            })->rawColumns(['title', 'description', 'status', 'action'])->make(true);
    }
    function promise_posts()
    {
        return DataTables::of(Promise::where('id', '!=', '1')->get())->addColumn('action', function ($about) {
            $data = '<div class="btn-group btn-group-sm">
           <button class="btn btn-success edit" id="' . $about->id . '" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>';

            $data .= ' <button class="btn btn-danger delete" id="' . $about->id . '" type="button"><i class="mdi mdi-delete m-r-3"></i>Delete</button>';

            $data .= '</div>';
            return $data;
        })

            ->addColumn('title', function ($about) {
                return $about->title;
            })
            ->addColumn('description', function ($about) {
                if (strlen($about->description) > 80) {
                    return substr($about->description, 0, 80) . ' ...';
                } else return $about->description;
            })
            ->addColumn('status', function ($about) {
                if ($about->status == '1') {
                    $data = ' <button class="btn btn-info btn-xs pull-right" type="button"><i class="mdi mdi-check m-r-3"></i>Published</button>';
                } else {
                    $data = ' <button class="btn btn-warning btn-xs pull-right" type="button"><i class="mdi mdi-times m-r-3"></i>Unpublished</button>';
                }
                return $data;
            })->rawColumns(['title', 'description', 'status', 'action'])->make(true);
    }
    function history_posts()
    {
        return DataTables::of(History::where('id', '!=', '1')->get())->addColumn('action', function ($about) {
            $data = '<div class="btn-group btn-group-sm">
           <button class="btn btn-success edit" id="' . $about->id . '" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>';

            $data .= ' <button class="btn btn-danger delete" id="' . $about->id . '" type="button"><i class="mdi mdi-delete m-r-3"></i>Delete</button>';

            $data .= '</div>';
            return $data;
        })

            ->addColumn('title', function ($about) {
                return $about->title;
            })
            ->addColumn('description', function ($about) {
                if (strlen($about->description) > 80) {
                    return substr($about->description, 0, 80) . ' ...';
                } else return $about->description;
            })
            ->addColumn('status', function ($about) {
                if ($about->status == '1') {
                    $data = ' <button class="btn btn-info btn-xs pull-right" type="button"><i class="mdi mdi-check m-r-3"></i>Published</button>';
                } else {
                    $data = ' <button class="btn btn-warning btn-xs pull-right" type="button"><i class="mdi mdi-times m-r-3"></i>Unpublished</button>';
                }
                return $data;
            })->rawColumns(['title', 'description', 'status', 'action'])->make(true);
    }
    function team_posts()
    {
        return DataTables::of(Team::where('id', '!=', '1')->get())->addColumn('action', function ($about) {
            $data = '<div class="btn-group btn-group-sm">
           <button class="btn btn-success edit" id="' . $about->id . '" type="button"><i class="mdi mdi-table-edit m-r-3"></i>Edit</button>';

            $data .= ' <button class="btn btn-danger delete" id="' . $about->id . '" type="button"><i class="mdi mdi-delete m-r-3"></i>Delete</button>';

            $data .= '</div>';
            return $data;
        })

            ->addColumn('title', function ($about) {
                return $about->title;
            })
            ->addColumn('description', function ($about) {
                if (strlen($about->description) > 80) {
                    return substr($about->description, 0, 80) . ' ...';
                } else return $about->description;
            })
            ->addColumn('status', function ($about) {
                if ($about->status == '1') {
                    $data = ' <button class="btn btn-info btn-xs pull-right" type="button"><i class="mdi mdi-check m-r-3"></i>Published</button>';
                } else {
                    $data = ' <button class="btn btn-warning btn-xs pull-right" type="button"><i class="mdi mdi-times m-r-3"></i>Unpublished</button>';
                }
                return $data;
            })->rawColumns(['title', 'description', 'status', 'action'])->make(true);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return About::find($id);
    }
    public function showMission($id)
    {
        return Mission::find($id);
    }
    public function showVision($id)
    {
        return Vision::find($id);
    }
    public function showPromise($id)
    {
        return Promise::find($id);
    }
    public function showHistory($id)
    {
        return History::find($id);
    }
    public function showTeam($id)
    {
        return Team::find($id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required', 'id' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ];
        About::where('id', $request->id)->update($data);

        return response()->json(['success' => 'Post hasn been updated successfully.']);
    }
    public function updateMission(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required', 'id' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ];
        Mission::where('id', $request->id)->update($data);

        return response()->json(['success' => 'Post hasn been updated successfully.']);
    }
    public function updateVision(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required', 'id' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ];
        Vision::where('id', $request->id)->update($data);

        return response()->json(['success' => 'Post hasn been updated successfully.']);
    }
    public function updatePromise(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required', 'id' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ];
        Promise::where('id', $request->id)->update($data);

        return response()->json(['success' => 'Post hasn been updated successfully.']);
    }
    public function updateHistory(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required', 'id' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ];
        History::where('id', $request->id)->update($data);

        return response()->json(['success' => 'Post hasn been updated successfully.']);
    }
    public function updateTeam(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required', 'id' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ];
        Team::where('id', $request->id)->update($data);

        return response()->json(['success' => 'Post hasn been updated successfully.']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $about->delete();
        return response()->json(['success' => 'Post hasn been updated successfully.']);
    }
    public function destroyMission(Mission $about)
    {
        $about->delete();
        return response()->json(['success' => 'Post hasn been deleted successfully.']);
    }
    public function destroyVision(Vision $about)
    {
        $about->delete();
        return response()->json(['success' => 'Post hasn been deleted successfully.']);
    }
    public function destroyPromise(Promise $about)
    {
        $about->delete();
        return response()->json(['success' => 'Post hasn been deleted successfully.']);
    }
    public function destroyHistory(History $about)
    {
        $about->delete();
        return response()->json(['success' => 'Post hasn been deleted successfully.']);
    }
    public function destroyTeam(Team $about)
    {
        $about->delete();
        return response()->json(['success' => 'Post hasn been deleted successfully.']);
    }
    private function fields($id = null)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        return $validator;
    }
}
