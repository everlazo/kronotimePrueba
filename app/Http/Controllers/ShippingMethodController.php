<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ShippingMethod\Create\CreateShippingMethodService;
use App\Services\ShippingMethod\Search\GetAllShippingMethodService;;

class ShippingMethodController extends Controller
{
    private $createShippingMethodService;
    private $getAllShippingMethodService;

    public function __construct(CreateShippingMethodService $createShippingMethodService, GetAllShippingMethodService $getAllShippingMethodService)
    {
        $this->createShippingMethodService = $createShippingMethodService;
        $this->getAllShippingMethodService = $getAllShippingMethodService;
    }

    public function create(Request $request)
    {
        return $this->createShippingMethodService->create($request);
    }

    public function all()
    {
        return $this->getAllShippingMethodService->get();
    }
}
