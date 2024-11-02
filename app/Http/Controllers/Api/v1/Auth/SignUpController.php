<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\UserRegistrationRequest;
use App\Repositories\Auth\AuthRepositoryInterface;

class SignUpController extends Controller
{
    private AuthRepositoryInterface $auth;

    public function __construct(AuthRepositoryInterface $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(UserRegistrationRequest $request)
    {
        $credentials = $request->validated();
        return $this->auth->create($credentials);
    }
}
