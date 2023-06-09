<?php

namespace App\Business;

use App\Handler\CartHandler;
use App\Models\User;
use App\Repository\UserRepository;
use http\Client\Request;
use Illuminate\Support\Facades\Auth;

class AuthManager
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(array $credentials)
    {
        if (! $token = auth()->attempt($credentials)) {
            throw new CustomException(__('The provided credentials are incorrect.'), 401);
        }

        return response()->json([
            "status" => 1,
            "message" => "Logged in successfully",
            "access_token" => $token
        ]);
    }

    public function logout()
    {
        Auth::logout();
    }
}
