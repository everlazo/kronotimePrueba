<?php

namespace App\Services;

use App\Util\Constants;

class Service
{
    public function resolve($error = false, $message = "", $data = null, $status = null)
    {
        $status = $status == null ? Constants::STATUS_OK : $status;
        return response()->json((object)[
            "error" => $error,
            "message" => $message,
            "data" => $data
        ], $status);
    }
}
