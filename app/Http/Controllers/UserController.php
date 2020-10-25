<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'user_type_id' => 'required|integer|max:8',
            'mobile_number' => 'required|string|max:32',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'per_token' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            $data['status'] = 'Failed';
            $data['description'] = 'Data validation failed';
            $data['status_code'] = 400;
            $data['user'] = [];
            $data['token'] = [];
            return response()->json($data, 400);
        }
        if($request->input('per_token') != env('JWT_SECRET')){
            $data['status'] = 'Failed';
            $data['description'] = 'Invalid Token';
            $data['status_code'] = 400;
            $data['user'] = [];
            $data['token'] = [];
            return response()->json($data, 400);
        }
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_type_id' => $request->get('user_type_id'),
            'mobile_number' => $request->get('mobile_number'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);
        $data = compact('user','token');
        $data['status'] = 'Succeed';
        $data['description'] = 'User register successfully';
        $data['status_code'] = 201;
        return response()->json($data,201);
    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }
}
