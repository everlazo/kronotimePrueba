<?php

namespace App\Services\Order\Search;

use App\Repositories\OrderRepository;
use App\Util\Constants;
use App\Services\Service;

class GetAllOrderService extends Service
{
    private $repository;

    public function __construct(
        OrderRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function get()
    {
        $data = $this->repository->allComplete();
        return $this->resolve(false, Constants::OK, $data);
    }
}
