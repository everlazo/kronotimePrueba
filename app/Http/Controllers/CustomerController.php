<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Customer\Create\CreateCustomerService;
use App\Services\Customer\Search\GetAllCustomerService;;

class CustomerController extends Controller
{
    private $createCustomerService;
    private $getAllCustomerService;

    public function __construct(CreateCustomerService $createCustomerService, GetAllCustomerService $getAllCustomerService)
    {
        $this->createCustomerService = $createCustomerService;
        $this->getAllCustomerService = $getAllCustomerService;
    }

    public function create(Request $request)
    {
        return $this->createCustomerService->create($request);
    }

    public function all()
    {
        return $this->getAllCustomerService->get();
    }
}
