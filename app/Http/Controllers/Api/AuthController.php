<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\AuthServiceInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class AuthController extends Controller
{

    public function __construct(private AuthServiceInterface $service)
    {
    }

    public function register(RegisterRequest $request)
    {
        $this->service->register(new ParameterBag($request->validated()));
    }
}
