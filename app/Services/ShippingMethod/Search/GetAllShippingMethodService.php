<?php

namespace App\Services\ShippingMethod\Search;

use App\Repositories\ShippingMethodRepository;
use App\Util\Constants;
use App\Services\Service;

class GetAllShippingMethodService extends Service
{
    private $repository;

    public function __construct(
        ShippingMethodRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function get()
    {
        $data = $this->repository->all();
        return $this->resolve(false, Constants::OK, $data);
    }
}
