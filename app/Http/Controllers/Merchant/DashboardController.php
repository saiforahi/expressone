<?php

namespace App\Http\Controllers\Merchant;

use App\Models\Area;
use App\Models\User;
use App\Models\Shipment;
use App\Models\ShippingCharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct(){

    }
    public function index()
    {
        // dd(Auth::user()->morphClass);
        // dd(Auth::user()->inheritable->getMorphClass());
        $shipment = Shipment::orderBy('created_at', 'DESC')->where('merchant_id', Auth::guard('user')->user()->id)->get()->toArray();
        $shippingCharges =  DB::table('shipping_charges')->select('id', 'consignment_type', 'shipping_amount')->get();
        return view('dashboard.index', compact('shipment', 'shippingCharges'));
    }

    public function account()
    {
        return view('dashboard.account');
    }

    public function ChangeMail(Request $request)
    {
        $request->validate([
            'email' => 'required|max:100',
            'password' => 'required|max:20',
        ]);

        $admin = User::where('id', $request->id)->first();
        if (!empty($admin)) {
            if ($admin && Hash::check($request->password, $admin->password)) {
                $admin->email = $request->email;
                $admin->save();
                $request->session()->flash('message', 'Email Change successfully');
                return redirect('/account');
            } else {
                $request->session()->flash('message', 'Password not match');
                return redirect('/account');
            }
        } else {
            $request->session()->flash('message', 'Something wrong try again later');
            return redirect('/account');
        }
    }

    public function ChangePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|max:20',
            'password' => 'required|max:20|confirmed',
        ]);

        $admin = user::where('id', $request->id)->first();
        if (!empty($admin)) {
            if ($admin && Hash::check($request->old_password, $admin->password)) {
                $admin->password = Hash::make($request->password);
                $admin->save();
                $request->session()->flash('message', 'Password Change successfully');
                return redirect('/account');
            } else {
                $request->session()->flash('message', 'Password not match');
                return redirect('/account');
            }
        } else {
            $request->session()->flash('message', 'Something wrong try again later');
            return redirect('/account');
        }
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function ProfileEdit()
    {
        $areas = Area::all();
        return view('dashboard.profile_edit', compact('areas'));
    }

    public function ProfileUpdate(Request $request)
    {

        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $request->validate([
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            //'phone' => ['required', 'regex:/^(?:\+88|01)?(?:\d{11}|\d{13})$'],
            'phone' => ['required', 'regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
            'nid_no' => 'required',
            'bin_no' => 'required',
            'shop_name' => 'required|min:3',
            'address' => 'required|max:255',
            'website_link' => 'required|regex:' . $regex,
            'bank_name' => 'required|min:3',
            'bank_br_name' => 'required|max:100',
            'bank_acc_name' => 'required|max:255',
            'bank_acc_no' => 'required|numeric',
            'unit_id' => 'required|exists:units,id'
        ]);

        $register_user = User::find($request->id);
        $register_user->first_name = $request->first_name;
        $register_user->last_name = $request->last_name;
        $register_user->phone = $request->phone;
        $register_user->nid_no = $request->nid_no;
        $register_user->bin_no = $request->bin_no;
        $register_user->shop_name = $request->shop_name;
        $register_user->address = $request->address;
        $register_user->unit_id = $request->unit_id;
        $register_user->website_link = $request->website_link;
        $register_user->bank_name = $request->bank_name;
        $register_user->bank_br_name = $request->bank_br_name;
        $register_user->bank_acc_name = $request->bank_acc_name;
        $register_user->bank_acc_no = $request->bank_acc_no;
        
        $register_user->save();
        $request->session()->flash('message', 'Profile update successfully');
        return redirect('/profile');
    }
}
