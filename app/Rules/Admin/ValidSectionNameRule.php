<?php

namespace App\Rules\Admin;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidSectionNameRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (preg_match('/^[0-9]+$/', $value)) {
            $fail(__('validation.valid_section_name.numbers_only'));
        }
        if (preg_match('/\s+/', $value)) {
            $fail(__('validation.valid_section_name.multiple_spaces'));
        }
        if (preg_match('/^\s|\s$/', $value)) {
            $fail(__('validation.valid_section_name.start_end_spaces'));
        }
        if (preg_match('/\s{2,}/', $value)) {
            $fail(__('validation.valid_section_name.multiple_spaces'));
        }
        if (preg_match('/[^\p{L}\p{N}\s]/u', $value)) {
            $fail(__('validation.valid_section_name.special_characters'));
        }
    }
}
