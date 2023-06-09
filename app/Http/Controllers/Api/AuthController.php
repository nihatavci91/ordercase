<?php

namespace App\Http\Controllers\Api;

use App\Business\AuthManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    public function login(Request $request, AuthManager $authManager)
    {
        $validated = $request->validate([
            'email' => 'email|required',
            'password' => 'string|required'
        ]);

        $token = $authManager->login($validated);

        return $this->response_success(['token' => $token]);
    }

    public function logout(Request $request, AuthManager $authManager)
    {
        $authManager->logout();

        return redirect()->route('products')->with('message', 'Success...');
    }
}
