<?php

namespace App\Services\User\Auth;

use App\Services\Service;
use App\Util\Constants;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService extends Service
{
    public function login(Request $request)
    {
        $credentials = $request->only(Constants::USERNAME, Constants::PASSWORD);

        if (!$token = JWTAuth::attempt($credentials)) {
            return $this->resolve(true, Constants::CREDENTIALS_INVALID, null, Constants::STATUS_UNAUTHORIZED);
        }

        return $this->resolve(false, '', $token);
    }
}
