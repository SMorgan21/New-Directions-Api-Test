<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getToken(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the credentials are valid
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Get the authenticated company
        $company = Auth::user();

        // Create a token for the company
        $token = $company->createToken('company-specific-auth-token')->plainTextToken;

        // Return the token
        return response()->json(['token' => $token]);
    }
}
