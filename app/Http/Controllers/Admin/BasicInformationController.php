<?php

namespace App\Http\Controllers\Admin;

use App\Models\CmsPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BasicInformation;
use App\Models\Mail_configuration;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BasicInformationController extends Controller
{
    public function index()
    {
        $verifyMsg = CmsPage::get();
        return view('admin.website_manage.basic_information', compact('verifyMsg'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);
        $insert = BasicInformation::find($request->id);
        $insert->website_title = $request->website_title;
        $insert->company_name = $request->company_name;
        $insert->meet_time = $request->meet_time;
        $insert->phone_number_one = $request->phone_number_one;
        $insert->phone_number_two = $request->phone_number_two;
        $insert->email = $request->email;
        $insert->website_link = $request->website_link;
        $insert->facebook_link = $request->facebook_link;
        $insert->twiter_link = $request->twiter_link;
        $insert->google_plus_link = $request->google_plus_link;
        $insert->linkedin_link = $request->linkedin_link;
        $insert->footer_text = $request->footer_text;
        $insert->address = $request->address;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore3 = time() . "." . $extension;
            $request->file('image')->storeAs('logo', $fileStore3);
            $insert->company_logo = $fileStore3;
        }
        $insert->save();
        return redirect('admin/basic-information');
    }

    public function mailing_info()
    {
        $info = Mail_configuration::where('type', 'config')->first();
        return view('admin.settings.mail_configuration', compact('info'));
    }

    function save_mailing_info(Request $request)
    {
        Mail_configuration::where('type', 'config')->update([
            'username' => $request->username,
            'password' => $request->password,
            'send_email' => $request->send_email
        ]);
        return back()->with('message', 'Configuring email setup updated successfully!', 'success');
    }
    public function addVerifyMsg(Request $request)
    {
        $user = CmsPage::create([
            'title' =>  $request->title,
            'slug' =>  Str::slug($request->title),
            'description' => $request->description
        ]);
        return back()->with('message', 'Created successfully!', 'success');
    }
    public function updateVerifyMsg(Request $request, $id)
    {

        $verifyMsg = CmsPage::findOrFail($id);
        $verifyMsg->title = $request->title;
        $verifyMsg->slug = Str::slug($verifyMsg->title);
        $verifyMsg->description = $request->description;
        $verifyMsg->update();
        return back()->with('message', 'Updated successfully!', 'success');
    }
}
