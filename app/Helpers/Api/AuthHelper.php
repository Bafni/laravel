<?php

namespace App\Helpers\Api;

class AuthHelper
{
   public static function authenticate($token): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => true,
            'access_token' => $token,
            'expires_in' => auth()->factory()->getTTL() * 60,
            'message' => 'User logged in successfully'
        ]);
    }
}
