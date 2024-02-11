<?php

namespace App\Services\Category\Create;

use App\Repositories\CategoryRepository;
use App\Util\Constants;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\Service;
use App\Services\Shared\ValidatorService;

class CreateCategoryService extends Service
{
    private $repository;
    private $validatorService;

    public function __construct(
        CategoryRepository $repository,
        ValidatorService $validatorService
    ) {
        $this->repository = $repository;
        $this->validatorService = $validatorService;
    }

    public function create(Request $request)
    {
        $model = new Category();
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
