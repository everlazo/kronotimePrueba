<?php

namespace App\Services\Product\Search;

use App\Repositories\ProductRepository;
use App\Util\Constants;
use App\Services\Service;

class GetAllProductService extends Service
{
    private $repository;

    public function __construct(
        ProductRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function get()
    {
        $data = $this->repository->all();
        return $this->resolve(false, Constants::OK, $data);
    }
}
