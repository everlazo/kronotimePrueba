<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Category\Create\CreateCategoryService;
use App\Services\Category\Search\GetAllCategoryService;;

class CategoryController extends Controller
{
    private $createCategoryService;
    private $getAllCategoryService;

    public function __construct(CreateCategoryService $createCategoryService, GetAllCategoryService $getAllCategoryService)
    {
        $this->createCategoryService = $createCategoryService;
        $this->getAllCategoryService = $getAllCategoryService;
    }

    public function create(Request $request)
    {
        return $this->createCategoryService->create($request);
    }

    public function all()
    {
        return $this->getAllCategoryService->get();
    }
}
