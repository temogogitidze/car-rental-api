<?php

namespace App\Services\Auth;

use App\Models\User;
use Symfony\Component\HttpFoundation\ParameterBag;

interface AuthServiceInterface
{
    public function register(ParameterBag $data): User;

    public function getUserByEmail(string $email): ?User;
}
