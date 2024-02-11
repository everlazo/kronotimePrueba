<?php

namespace App\Services\Shared;

use Illuminate\Support\Facades\Validator;
use App\Services\Service;

class ValidatorService extends Service
{
    public function validate($request, $model)
    {
        $validator = Validator::make($request->all(), $model->rules);

        if ($validator->fails()) {
            return $validator->errors();
        }
        return [];
    }
}
