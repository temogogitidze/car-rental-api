<?php

namespace App\Rules\Auth;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordRule implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (is_string($value) && preg_match('/^.{6,255}$/', $value)) {
            return;
        }

        $fail("The $attribute must be a string with a minimum length of 6 characters.");
    }

}
