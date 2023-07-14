<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\UserResource;
use App\Services\Auth\AuthServiceInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class AuthController extends Controller
{

    public function __construct(private AuthServiceInterface $service)
    {
    }

    public function register(RegisterRequest $request): UserResource
    {
        return UserResource::make($this->service->register(new ParameterBag($request->validated())));
    }
}
