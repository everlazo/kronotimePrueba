<?php

namespace App\Services\Product\Create;

use App\Repositories\ProductRepository;
use App\Util\Constants;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\Service;
use App\Services\Shared\ValidatorService;

class CreateProductService extends Service
{
    private $repository;
    private $validatorService;

    public function __construct(
        ProductRepository $repository,
        ValidatorService $validatorService
    ) {
        $this->repository = $repository;
        $this->validatorService = $validatorService;
    }

    public function create(Request $request)
    {
        $model = new Product();
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
