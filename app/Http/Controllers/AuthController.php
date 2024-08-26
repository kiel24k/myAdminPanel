<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json($user);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logged out']);
    }

    public function user1()
    {
        return response()->json(Auth::user());
    }
    public function loginCookies(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('TokenName')->plainTextToken;

            // Set token in cookies
            return response()->json([
                'message' => 'Logged in successfully',
                'token' => $token,
            ])->cookie('auth_token', $token, 60 * 24 * 7); // 1 week expiration
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function getUser(Request $request) {
        return response()->json($request->user());
    }
    public function logoutCookies(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Logout successful']);
    }
}