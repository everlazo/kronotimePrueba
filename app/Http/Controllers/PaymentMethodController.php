<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PaymentMethod\Create\CreatePaymentMethodService;
use App\Services\PaymentMethod\Search\GetAllPaymentMethodService;;

class PaymentMethodController extends Controller
{
    private $createPaymentMethodService;
    private $getAllPaymentMethodService;

    public function __construct(CreatePaymentMethodService $createPaymentMethodService, GetAllPaymentMethodService $getAllPaymentMethodService)
    {
        $this->createPaymentMethodService = $createPaymentMethodService;
        $this->getAllPaymentMethodService = $getAllPaymentMethodService;
    }

    public function create(Request $request)
    {
        return $this->createPaymentMethodService->create($request);
    }

    public function all()
    {
        return $this->getAllPaymentMethodService->get();
    }
}
