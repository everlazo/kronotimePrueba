<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Order\Search\GetAllOrderService;
use App\Services\Order\Create\CreateOrderService;

class OrderController extends Controller
{
    private $createOrderService;
    private $getAllOrderService;

    public function __construct(GetAllOrderService $getAllOrderService, CreateOrderService $createOrderService)
    {
        $this->getAllOrderService = $getAllOrderService;
        $this->createOrderService = $createOrderService;
    }

    public function create(Request $request)
    {
        return $this->createOrderService->create($request);
    }

    public function all()
    {
        return $this->getAllOrderService->get();
    }
}
