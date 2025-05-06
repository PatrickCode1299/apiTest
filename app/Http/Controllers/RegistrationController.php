<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegistrationController extends Controller
{
    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);

        return response()->json(['message' => 'User registered successfully']);
    }
}
