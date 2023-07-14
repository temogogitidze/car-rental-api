<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\UserResource;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{

    public function __construct(private AuthServiceInterface $service)
    {
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $user = $this->service->register(new ParameterBag($request->validated()));
        $token = $user->createToken('auth_token');

        return response()->json([
            'user' => UserResource::make($user),
            'token' => $token->plainTextToken,
        ], Response::HTTP_OK);
    }

}
