<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::user()) {
            return response()->json([
                'message' => 'User is already authenticated',
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'email not found'
            ], 404);
        }

        if ($user && !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'password is incorect'
            ], 401);
        }

        $token = $user->createToken('token login')->plainTextToken;

        return response()->json([
            'message' => 'Successful login',
            'token' => $token
        ], 200);
    }

    public function logout()
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json([
            'message' => 'Successful logout'
        ], 200);
    }
}
