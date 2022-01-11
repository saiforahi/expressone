<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Driver;
use App\Models\Merchant;
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
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            $user = Auth::user();
            $token=$user->createToken('api_token')->plainTextToken;
            return response()->json(['success'=>true,'token'=>$token,'message'=>'User Signed in!',"user"=>$user],200);
        }
        
        return response()->json(['success'=>false,'message' => 'Wrong credentials'], 401);
    }
    public function merchant_registration_request_validate($user_type){
        return Validator::make($request->all(), [
            'shop_name' => 'sometimes|nullable',
            'address' => 'sometimes|nullable',
            'NID'=> 'required|string|max:10|min:10',
            'BIN'=> 'sometimes|required|max:13|min:13',
        ]);
    }
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|between:2,100',
            'last_name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            "phone" => 'required|string|max:11|min:11|unique:users,phone',
            'password' => 'required|string|min:6',
            'type'=> 'required|string'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()], 400);
        }
        
        try{
            $response='';
            $associate = '';
            switch($request->type){
                case 'merchant':
                    $associate = Merchant::create($request->all());
                    
                case 'driver':
                    $associate = Driver::create();
            }
            $user = User::create(array_merge($request->all(),['password' => bcrypt($request->password)]));
            $user->inheritable()->associate($associate)->save();
            return response()->json([
                'success' => true,
                'data' => $user,
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
