<?php

namespace App\Http\Middleware;

use App\Util\Constants;
use Closure;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware extends BaseMiddleware
{

    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            return response()->json(null, Constants::STATUS_UNAUTHORIZED);
        }
        return $next($request);
    }
}
