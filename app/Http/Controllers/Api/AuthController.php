<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return ApiResponse::success($user, 'Register berhasil', 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {
            return ApiResponse::error('Email atau password salah', 401);
        }

        return ApiResponse::success([
            'token' => $token,
            'type' => 'bearer',
        ], 'Login berhasil');
    }

    public function me()
    {
        return ApiResponse::success(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return ApiResponse::success(null, 'Logout berhasil');
    }
}
