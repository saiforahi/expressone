<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Courier;
use App\Models\Merchant;
use Auth;

class AuthController extends Controller
{
    protected $general_reg_rules=[
        'first_name' => 'required|string|between:2,100',
        'last_name' => 'required|string|between:2,100',
        'email' => 'required|string|email|max:100',
        "phone" => 'required|string|max:11|min:11',
        'password' => 'required|string|min:8',
    ];
    protected $merchant_reg_rules=[
        'email' => 'unique:users',
        "phone" => 'unique:users',
        'shop_name' => 'sometimes|nullable',
        'address' => 'sometimes|nullable',
        'nid_no'=> 'sometimes|required|string|max:10|min:10',
        'bin_no'=> 'sometimes|required|string|max:13|min:13',
    ];
    public function __construct() {
        $this->middleware('auth:sanctum', ['except' => ['login','register']]);
    }
    public function validator($data,$rules){
        return Validator::make($data, $data);
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
    
    public function register(Request $request) {
        $validator=Validator::make($request->all(),$this->general_reg_rules); 
        if($validator->fails()){                                            //validating general registration rules
            return response()->json(['success'=>false,'errors'=>$validator->errors()], 422);
        }
        
        try{
            $response='';
            $user = '';
            switch($request->type){
                case 'merchant':    //merchant creation
                    $validator=Validator::make($request->all(),$this->merchant_reg_rules);
                    if($validator->fails()){                                //merchant registration validation
                        return response()->json(['success'=>false,'errors'=>$validator->errors()], 422);
                    }
                    $user = User::create(array_merge($request->all(),['password' => bcrypt($request->password)]));
                    break;
                    
                case 'courier':  //courier creation
                    $user = Courier::create(array_merge($request->all(),['employee_id'=>random_unique_string_generate(Courier::class,'employee_id'),'password' => bcrypt($request->password)]));
                    break;
            }
            
            return response()->json([
                'success' => true,
                'message'=> 'Registration Successful',
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
