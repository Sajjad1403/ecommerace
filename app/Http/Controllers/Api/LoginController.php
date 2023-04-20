<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\ApiKey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function __construct()
    {
      $this->middleware('apikey');
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 422,
                'message' => 'something went wrong',
                'errors' => $validator->errors()->all(),
            ]);
        }

        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            $user = User::create([
                'first_name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response(
                [
                    'status' => 200,
                    'message' => 'User Register successfully!',
                    'data' => $user,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => '422',
                    'message' => 'User already exist',
                ],
                422
            );
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('sajjad')->plainTextToken;
            return response()->json(['user' => $user, 'token' => $token], 200);
        }
        return response()->json(
            [
                'status' => '422',
                'message' => 'Unauthorized User',
            ],
            422
        );
    }

    public function apikey(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'api_key' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'status' => 422,
                'message' => 'Api Key not valid.',
                'errors' => $validator->errors()->all(),
            ]);
        }

        $apikey = ApiKey::where('key', $request->api_key)->first();
        
        if ($apikey) {
            return response(
                [
                    'status' => 200,
                    'message' => 'Api key is valid',
                    'token' => $apikey,
                ],
                200
            );
        } else {
            return response(
                [
                    'status' => 422,
                    'message' => 'Api key is invalid',
                ],
                422
            );
        }
    }

    public function refreshtoken(Request $request)
    {
        if(Auth::user())
        {
            $user = Auth::user();
            $token = $user->createToken('sajjad')->plainTextToken;
            return response()->json(['user' => $user, 'token' => $token], 200);
            
        }else{
            return response()->json([
                'status' => 422,
                'message' => 'user is not authenticated.'
            ]);
        }
    }

    public function test(Request $request)
    {
      dd('here');
    } 
}