<?php

namespace App\Services\User\Create;

use App\Services\Service;

class EncryptorService extends Service
{
    public function encrypt($data)
    {
        return bcrypt($data);
    }
}
