<?php

namespace App\Services\User\Create;

use App\Repositories\UserRepository;
use App\Util\Constants;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Service;
use App\Services\Shared\ValidatorService;

class CreateUserService extends Service
{
    private $repository;
    private $validatorService;
    private $encryptorService;

    public function __construct(
        UserRepository $repository,
        ValidatorService $validatorService,
        EncryptorService $encryptorService
    ) {
        $this->repository = $repository;
        $this->validatorService = $validatorService;
        $this->encryptorService = $encryptorService;
    }

    public function create(Request $request)
    {
        $model = new User();
        $model->fill($request->all());

        $errors = $this->validatorService->validate($request, $model);

        if (count($errors) > 0) {
            return $this->resolve(true, Constants::REGISTER_UNSUCESSFULL, $errors, Constants::STATUS_BAD_REQUEST);
        }

        $model->password = $this->encryptorService->encrypt($model->password);

        $user = $this->repository->save($model);

        if ($user->id == null) {
            return $this->resolve(true, Constants::REGISTER_UNSUCESSFULL, $user->errors, Constants::STATUS_BAD_REQUEST);
        }

        return $this->resolve(false, Constants::REGISTER_SUCESSFULL);
    }
}
