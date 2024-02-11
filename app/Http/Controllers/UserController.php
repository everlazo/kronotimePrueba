<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\User\Create\CreateUserService;

class UserController extends Controller
{
    private $createUserService;
    public function __construct(CreateUserService $createUserService)
    {
        $this->createUserService = $createUserService;
    }

    public function create(Request $request)
    {
        return $this->createUserService->create($request);
    }
}
