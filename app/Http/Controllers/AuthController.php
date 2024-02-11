<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\User\Auth\AuthService;
use App\Services\User\Auth\LogoutService;

class AuthController extends Controller
{
    private $authService;
    private $logoutService;

    public function __construct(AuthService $authService, LogoutService $logoutService)
    {
        $this->authService = $authService;
        $this->logoutService = $logoutService;
    }

    public function login(Request $request)
    {
        return $this->authService->login($request);
    }

    public function logout()
    {
        return $this->logoutService->logout();
    }
}
