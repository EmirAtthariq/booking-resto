<?php

namespace App\Rules;

use Closure;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;

class DateBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pickupDate = Carbon::parse($value);
        $now = Carbon::now();
        $lastDate = Carbon::now()->addWeek();

        if (!($pickupDate->between($now, $lastDate))) {
            $fail('Please choose a date between now and one week from now.');
        }
    }
}
