<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueAcrossTable implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (
            DB::table('kasirs')->where($attribute, $value)->exists() ||
            DB::table('admins')->where($attribute, $value)->exists() ||
            DB::table('members')->where($attribute, $value)->exists()
        ) {
            $fail("The $attribute has already been taken.");
        }
    }
}
