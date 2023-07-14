<?php

namespace App\Services\Auth;

use App\Exceptions\ModelNotFoundExceptionHandler;
use App\Models\User;
use App\Repositories\Auth\AuthRepositoryInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class AuthService implements AuthServiceInterface
{

    public function __construct(private AuthRepositoryInterface $repository)
    {
    }

    public function register(ParameterBag $data): User
    {
        return $this->repository->register($data);
    }

    public function getUserByEmail(string $email): ?User
    {
        $user = $this->repository->getUserByEmail($email);

        ModelNotFoundExceptionHandler::checkModelExists($user, 404, 'User not found.');

        return $user;
    }

}
