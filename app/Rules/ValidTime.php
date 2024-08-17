<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Closure;

class ValidTime implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $value)) {
            $fail('The :attribute is not a valid time format.');
        }
    }
}
