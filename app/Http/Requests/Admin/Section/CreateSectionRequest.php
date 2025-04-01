<?php

namespace App\Http\Requests\Admin\Section;

use App\Http\Requests\BaseRequest;
use App\Rules\Admin\ValidSectionNameRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSectionRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name.en' => ['required', 'string', 'max:255', new ValidSectionNameRule()],
            'icon' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'child_sections.*.name.*' => 'required|string|max:255',
            'child_sections.*.icon' => 'nullable|string|max:255',
            'child_sections.*.route' => [
                'nullable',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (isset($value)) {
                        if (!preg_match('/^\//', $value)) {
                            $fail(__('validation.route.regex_slash'));
                        }
                        if (!preg_match('/^[a-zA-Z0-9_\/]+$/', $value)) {
                            $fail(__('validation.route.regex_num'));
                        }
                    }
                },
            ],
            'child_sections.*.route_name' => 'nullable|string|max:255',
            'child_sections.*.is_active' => 'required|boolean',
        ];
    }
}
