<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\CustomResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return CustomResponse::invalid();
            }
        } catch (JWTException $e) {
            return CustomResponse::unableToProcess();
        }
        $user = JWTAuth::setToken($token)->toUser();
        return CustomResponse::success('Login Succes', compact('user', 'token'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return CustomResponse::invalid($validator->errors()->toJson());
        }
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        $token = JWTAuth::fromUser($user);
        return CustomResponse::created('Register Success', compact('user', 'token'));
    }

    public function profile(Request $request)
    {
        $uid = $request->get('user')->id;
        $user = User::find($uid);
        $user->addresses;
        return response()->json(compact('user'));
    }
}
