<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.merchant.merchant', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|max:100',
            'phone' => 'required|max:15',
            'password' => 'required|max:20|min:8|confirmed',
            'shop_name' => 'max:100',
            'address' => 'max:255',
            'website_link' => 'max:255',
        ]);
        $register_user = new User();
        $register_user->user_id = 'UR' . rand(100, 999) . time();
        $register_user->first_name = $request->first_name;
        $register_user->last_name = $request->last_name;
        $register_user->email = $request->email;
        $register_user->phone = $request->phone;
        $register_user->shop_name = $request->shop_name;
        $register_user->address = $request->address;
        $register_user->website_link = $request->website_link;
        $register_user->password = Hash::make($request->password);
        $register_user->is_verified = '1';
        $register_user->save();

        return redirect('/admin/merchant-list');
    }

    public function show(User $user)
    {
        $shipments = Shipment::where('merchant_id', $user->id)->get();
        return view('admin.merchant.merchant-details', compact('user', 'shipments'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function updateMerchantStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['is_verified'] == "Verified") {
                $is_verified = 0;
            } else {
                $is_verified = 1;
            }
            User::where('id', $data['merchant_id'])->update(['is_verified' => $is_verified]);
            return response()->json(['is_verified' => $is_verified, 'merchant_id' => $data['merchant_id']]);
        }
    }
}
