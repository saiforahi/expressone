<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Driver;
use Auth;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:sanctum', ['except' => ['login','register']]);
    }
    public function logout(Request $request) {
        $request->user()->tokens()->delete(); //deleting all the tokens
        return response()->json(['success'=>true,'message' => 'User successfully signed out'],201);
    }

    public function user_details() {
        return response()->json(['success'=>true,'data'=>auth()->user()]);
    }

    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['success'=>false,'errors'=>$validator->errors()], 422);
        }
        
        // $user->last_login_ip = request()->ip();
        // $user->save();
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password], true)) {
            $user = Auth::guard('user')->user();
            $token=$user->createToken('api_token')->plainTextToken;
            return response()->json(['success'=>true,'token'=>$token,'message'=>'User Signed in!',"user"=>$user],200);
        }
        else if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], true)) {
            $user = Auth::guard('admin')->user();
            $token=$user->createToken('api_token')->plainTextToken;
            return response()->json(['success'=>true,'token'=>$token,'message'=>'User Signed in!',"user"=>$user],200);
        }
        else if(Auth::guard('driver')->attempt(['email' => $request->email, 'password' => $request->password], true)) {
            $user = Auth::guard('driver')->user();
            $token=$user->createToken('api_token')->plainTextToken;
            return response()->json(['success'=>true,'token'=>$token,'message'=>'User Signed in!',"user"=>$user],200);
        }
        return response()->json(['success'=>false,'message' => 'Wrong credentials'], 401);
    }
    public function createMerchant(array $data){
        try{
            $user = User::create(array_merge($data,['user_id' => 'UR'.rand(100, 999).time(),'password' => bcrypt($data['password'])]));
            return $user;
        }
        catch(Exception $e){
            return $e;
        }
    }
    public function createDriver(array $data){
        try{
            $user = Driver::create(array_merge($data,['driver_id' => rand(),'password' => bcrypt($data['password'])]));
            return $user;
        }
        catch(Exception $e){
            return $e;
        }
    }
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|between:2,100',
            'last_name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users,email|unique:drivers,email|unique:admins,email',
            "phone" => 'required|string|max:11|min:11|unique:users,phone|unique:drivers,phone|unique:admins,phone',
            'password' => 'required|string|min:6',
            'shop_name' => 'sometimes|nullable',
            'address' => 'sometimes|nullable',
            'type'=> 'required|string'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()], 400);
        }
        
        try{
            $response='';
            switch($request->type){
                case 'merchant':
                    $response=$this->createMerchant($request->all());
                case 'driver':
                    $response=$this->createDriver($request->except('shop_name','address'));
            }
            return response()->json([
                'success' => true,
                'data' => $response,
            ], 201);
        }
        catch (Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'User registration failed!',
            ], 500);
        }
    }
}
