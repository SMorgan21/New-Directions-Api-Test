<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function getToken(Request $request)
    {
        Log::info('getToken method called');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Company::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            Log::error('Invalid credentials');
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        Log::info('Credentials are valid, returning token');

        return response()->json([
            'token' => $user->createToken($request->device_name)->plainTextToken
        ]);
    }
}
