<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Helpers\Api\AuthHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\UserLoginRequest;

class SignInController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UserLoginRequest $request)
    {
        $credentials = $request->validated();

        !$token = auth()->attempt($credentials);
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return AuthHelper::authenticate($token);
    }
}
