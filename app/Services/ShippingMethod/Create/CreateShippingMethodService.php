<?php

namespace App\Services\ShippingMethod\Create;

use App\Repositories\ShippingMethodRepository;
use App\Util\Constants;
use Illuminate\Http\Request;
use App\Models\ShippingMethod;
use App\Services\Service;
use App\Services\Shared\ValidatorService;

class CreateShippingMethodService extends Service
{
    private $repository;
    private $validatorService;

    public function __construct(
        ShippingMethodRepository $repository,
        ValidatorService $validatorService
    ) {
        $this->repository = $repository;
        $this->validatorService = $validatorService;
    }

    public function create(Request $request)
    {
        $model = new ShippingMethod();
        $model->fill($request->all());
        $errors = $this->validatorService->validate($request, $model);
        if (count($errors) > 0) {
            return $this->resolve(true, Constants::REGISTER_UNSUCESSFULL, $errors, Constants::STATUS_BAD_REQUEST);
        }
        $entity = $this->repository->save($model);
        if ($entity->id == null) {
            return $this->resolve(true, Constants::REGISTER_UNSUCESSFULL, $entity->errors, Constants::STATUS_BAD_REQUEST);
        }
        return $this->resolve(false, Constants::REGISTER_SUCESSFULL);
    }
}
