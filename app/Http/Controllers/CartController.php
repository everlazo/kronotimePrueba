<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Cart\Create\CreateCartService;
use App\Services\Cart\Search\GetAllCartService;;

class CartController extends Controller
{
    private $createCartService;
    private $getAllCartService;

    public function __construct(CreateCartService $createCartService, GetAllCartService $getAllCartService)
    {
        $this->createCartService = $createCartService;
        $this->getAllCartService = $getAllCartService;
    }

    public function create(Request $request)
    {
        return $this->createCartService->create($request);
    }

    public function all()
    {
        return $this->getAllCartService->get();
    }
}
