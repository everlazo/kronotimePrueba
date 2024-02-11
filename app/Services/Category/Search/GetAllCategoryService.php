<?php

namespace App\Services\Category\Search;

use App\Repositories\CategoryRepository;
use App\Util\Constants;
use App\Services\Service;

class GetAllCategoryService extends Service
{
    private $repository;

    public function __construct(
        CategoryRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function get()
    {
        $data = $this->repository->all();
        return $this->resolve(false, Constants::OK, $data);
    }
}
