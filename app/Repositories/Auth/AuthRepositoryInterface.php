<?php

namespace App\Repositories\Auth;

use Symfony\Component\HttpFoundation\ParameterBag;

interface AuthRepositoryInterface
{
    public function register(ParameterBag $data);
}
