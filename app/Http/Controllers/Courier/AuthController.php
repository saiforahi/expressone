<?php

namespace App\Http\Controllers\Courier;

use App\Models\Courier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('courier.auth.login');
    }
    public function login(Request $request)
    {
        $messages = [
            "email.required" => "Username is required",
            "password.required" => "Password is required",
            "password.min" => "Password must be at least 8 characters"
        ];

        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required|min:3'
        ],$messages);
        
        if (Courier::where('email',$request->email)->exists() && Courier::where('email',$request->email)->first()->status == 1 ) {
            if(Auth::guard('courier')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))){
                return redirect()->route('courier.dashboard');
            }
            else{
                return back()->withInput($request->only('email', 'remember'))->withErrors([
                    'email' => 'Wrong information',
                ]);
            }
        }
        return back()->withInput($request->only('email', 'remember'))->with(
            'error','Account does not exist or is not approved yet'
        );
        
    }
    public function generate_employee_id($length=10){
        
        $randomString = substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
        while(Courier::where('employee_id','EX-C-'.$randomString)->exists()){
            $randomString = substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
        }
        return 'EX-C-'.$randomString;
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:40',
            'last_name' => 'required|max:40',
            'phone' => 'required|max:15',
            'email' => 'required|email|max:255',
            'password' => 'required|min:3|max:20',
            'unit'=>'required|exists:units,id',
            'nid'=> 'required|unique:couriers,nid_no',
            'address'=> 'sometimes|nullable|string'
        ]);

        $driver = Courier::create([
            'courier_id' => rand(),
            'employee_id'=> $this->generate_employee_id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_str' => $request->password,
            'address'=>$request->address,
            'unit_id'=> $request->unit,
            'nid_no'=>$request->nid
        ]);

        // Auth::guard('courier')->login($driver);
        return redirect()->route('courier.login')->with('message','Your account has been created, please wait for approval');
    }
    public function logout(Request $request)
    {
        Auth::guard('courier')->logout();
        return redirect('courier/login');
    }
}
