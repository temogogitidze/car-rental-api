<?php

namespace App\Repositories\Auth;

use App\Models\User;
use Symfony\Component\HttpFoundation\ParameterBag;

interface AuthRepositoryInterface
{
    public function register(ParameterBag $data): User;
}
