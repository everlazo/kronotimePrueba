<?php

namespace App\Services\PaymentMethod\Create;

use App\Repositories\PaymentMethodRepository;
use App\Util\Constants;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Services\Service;
use App\Services\Shared\ValidatorService;

class CreatePaymentMethodService extends Service
{
    private $repository;
    private $validatorService;

    public function __construct(
        PaymentMethodRepository $repository,
        ValidatorService $validatorService
    ) {
        $this->repository = $repository;
        $this->validatorService = $validatorService;
    }

    public function create(Request $request)
    {
        $model = new PaymentMethod();
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
