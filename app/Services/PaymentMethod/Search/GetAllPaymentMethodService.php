<?php

namespace App\Services\PaymentMethod\Search;

use App\Repositories\PaymentMethodRepository;
use App\Util\Constants;
use App\Services\Service;

class GetAllPaymentMethodService extends Service
{
    private $repository;

    public function __construct(
        PaymentMethodRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function get()
    {
        $data = $this->repository->all();
        return $this->resolve(false, Constants::OK, $data);
    }
}
