<?php

namespace App\Repositories\Auth;

use App\Helpers\Api\AuthHelper;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{

    public function create(array $credentials): \Illuminate\Http\JsonResponse|array
    {
        try {
            $credentials['password'] = Hash::make($credentials['password']);

            $user = User::create($credentials);

            $token = auth()->login($user);

            return AuthHelper::authenticate($token);

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'User not created'
            ];
        }
    }
}
