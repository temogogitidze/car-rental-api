<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\Model;

class ModelNotFoundException
{
    public static function checkModelExists(?Model $model, int $statusCode, string $message): void
    {
        if ($model) return;
        throw new \Symfony\Component\HttpKernel\Exception\HttpException($statusCode, $message);
    }

}
