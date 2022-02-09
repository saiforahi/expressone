<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\CmsPage;
use Illuminate\Http\Request;
use App\Models\User_verification;
use App\Mail\UserRegistered;
use App\Mail\UserEmailVerification;
use App\Models\Mail_configuration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function send_mail($mail){
        
        try{
            $user=User::where('email',$mail)->first();
            Mail::to($mail)->send(new UserRegistered($user));
        }catch(\Swift_TransportException $e){

        }
    }
    public function index()
    {
        if (Auth::guard('user')->check()) {
            return Redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function register()
    {
        if (Auth::guard('user')->check()) {
            return Redirect('/dashboard');
        }
        return view('user.auth.register');
    }

    public function registerStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|max:100|unique:users,email',
            'phone' => 'required|max:15',
            'shop_name' => 'required|string',
            'password' => 'required|max:20|min:8|confirmed',
            'id_type'=> 'required|string',
            'id_value'=> 'required|string|unique:users,nid_no,bin_no'
        ]);
        
        try {
            $merchant = new User();
            $merchant->first_name = $request->first_name;
            $merchant->last_name = $request->last_name;
            $merchant->ip = $request->ip;
            $merchant->email = $request->email;
            $merchant->phone = $request->phone;
            $merchant->shop_name = $request->shop_name;
            $merchant->address = $request->address;
            if($request->id_type == 'nid'){
                $merchant->nid_no = $request->id_value;
            }
            else{
                $merchant->bin_no = $request->id_value;
            }
            $merchant->password = Hash::make($request->password);
            $merchant->password_str = $request->password;
            $merchant->save();
            // $this->registrationMail($merchant);
            return redirect()->back()->with('success', 'Your registration is successful, please contact with admin to get verified');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'Something went wrong, please try again later..');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|max:20|min:8',
        ]);
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            if (Auth::guard('user')->user()->is_verified == 1) {
                return redirect()->route('merchant.dashboard');
            } else {
                return redirect()->route('verify-user');
            }
        }
        $request->session()->flash('login_error', 'Wrong information or this account not login.');
        return back()->withInput($request->only('email', 'remember'));
    }



    public function verify()
    {
        if (Auth::guard('user')->check()) {
            Session::put('verification_email', Auth::guard('user')->user()->email);
            Auth::guard('user')->logout();
        }
        if (!Session::has('verification_email')) {
            return redirect('/login');
        }
        $data['verifyMessage'] = CmsPage::first();
        return view('auth.verify', $data);
    }

    public function verify_code(Request $request)
    {
        $check = User_verification::where([
            'verification_code' => $request->verification_code,
            'status' => 'waiting',
        ])->first();
        if ($check == null) {
            return back()->with('message', 'Verification code does not match!');
        } else {
            $userinfo = User::where('id', $check->merchant_id)->update(['is_verified' => '1']);
            $userinfo = User_verification::where('id', $check->id)
                ->update(['status' => 'verified']);
        }
        $user = User::find($userinfo);
        $this->registrationMail($user);
        // Auth::guard('user')->login($user);
        return redirect('/login');
    }

    public function send_verification_code()
    {
        // dd(Session::get('verification_email'));
        $subject = 'Verification code | ' . basic_information()->company_name;

        $code = rand();
        $user = User::where('email', Session::get('verification_email'))->first();
        $add = UserVerification::create([
            'merchant_id' => $user->id, 'verification_code' => $code,
        ]);

        $this->get_config($subject);
        Mail::to(Session::get('verification_email'))->send(new UserEmailVerification($subject, $code));
        return view('emails.users.UserVerificationMail', compact('subject', 'code'));
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        return redirect('/login');
    }

    private function registrationMail($user)
    {
        $email = basic_information()->email;
        if ($email != null) {
            $this->get_config('New merchant registered');
            Mail::to($email)->send(new UserRegistered($user));
            return view('emails.users.UserRegistrationMail', compact('user'));
        }
    }

    public function get_config($subject)
    {
        $data = Mail_configuration::where('type', 'config')->first();
        // dd($data);
        if ($data) {
            // $config = array(
            //     'host' =>'smtp.gmail.com',
            //     'port'=>'587',
            //     'encryption'=>'tls',
            //     'username'=>$data->username,
            //     'password'=>$data->password
            // );
            // Config::set('mail', $config);
            Config(['mail.mailers.smtp.username' => $data->username]);
            Config(['mail.mailers.smtp.password' => $data->password]);
            Config(['mail.from.address' => $data->send_email]);
            Config(['mail.from.name' => $subject]);
        }
    }
}
