<?php

namespace App\Services\Cart\Search;

use App\Repositories\CartRepository;
use App\Util\Constants;
use App\Services\Service;

class GetAllCartService extends Service
{
    private $repository;

    public function __construct(
        CartRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function get()
    {
        $data = $this->repository->all();
        return $this->resolve(false, Constants::OK, $data);
    }
}
