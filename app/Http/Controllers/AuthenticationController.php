<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
        'credential' => 'required',
        'password' => 'required',
    ]);

        $user = User::where('email', $request->credential)->first();

        if (!$user) {
            $user = User::where('code', $request->credential)->first();
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
            'message' => ['These credentials do not match our records.'],
        ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
        'user' => $user,
        'token' => $token,
    ];

        return response($response, 201);
    }
}
