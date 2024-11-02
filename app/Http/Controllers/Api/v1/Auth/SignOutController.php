<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignOutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
