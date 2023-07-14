<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ModelNotFoundExceptionHandler
{
    public static function checkModelExists(?Model $model, int $statusCode, string $message): void
    {
        if ($model) return;
        throw new ModelNotFoundException($message, $statusCode);
    }

}
