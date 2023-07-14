<?php

namespace App\Services\Auth;

use Symfony\Component\HttpFoundation\ParameterBag;

class AuthService implements AuthServiceInterface
{
    public function register(ParameterBag $data)
    {
        dd($data);
    }
}
