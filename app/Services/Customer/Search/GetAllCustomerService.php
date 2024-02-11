<?php

namespace App\Services\Customer\Search;

use App\Repositories\CustomerRepository;
use App\Util\Constants;
use App\Services\Service;

class GetAllCustomerService extends Service
{
    private $repository;

    public function __construct(
        CustomerRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function get()
    {
        $data = $this->repository->all();
        return $this->resolve(false, Constants::OK, $data);
    }
}
