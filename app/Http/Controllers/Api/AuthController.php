<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\UserResource;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
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

        return response()->json([
            'status' => true,
            'user' => UserResource::make($user),
        ], Response::HTTP_OK);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        try {
            if (!Auth::attempt($validatedData)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Incorrect credentials.',
                ], 401);
            }

            $user = $this->service->getUserByEmail($validatedData['email']);
            $token = $user->createToken('auth_token');

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $token->plainTextToken,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

}
