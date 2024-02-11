<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Product\Create\CreateProductService;
use App\Services\Product\Search\GetAllProductService;;

class ProductController extends Controller
{
    private $createProductService;
    private $getAllProductService;

    public function __construct(CreateProductService $createProductService, GetAllProductService $getAllProductService)
    {
        $this->createProductService = $createProductService;
        $this->getAllProductService = $getAllProductService;
    }

    public function create(Request $request)
    {
        return $this->createProductService->create($request);
    }

    public function all()
    {
        return $this->getAllProductService->get();
    }
}
