<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        
    $credentials=  $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]); 
    
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json(['token' => $token, "reply" => "Login Successful"]);
    }
}
