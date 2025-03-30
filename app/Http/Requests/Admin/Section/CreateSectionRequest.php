<?php

namespace App\Http\Requests\Admin\Section;

use Illuminate\Foundation\Http\FormRequest;

class CreateSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name.*' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'route' => 'nullable|string|max:255',
            'route_name' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
            'child_sections.*.name.*' => 'required|string|max:255',
            'child_sections.*.icon' => 'nullable|string|max:255',
            'child_sections.*.route' => 'nullable|string|max:255',
            'child_sections.*.route_name' => 'nullable|string|max:255',
            'child_sections.*.is_active' => 'required|boolean',
        ];
    }
}
