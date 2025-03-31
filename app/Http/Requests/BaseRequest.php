<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
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
            //
        ];
    }
    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'string' => __('validation.string'),
            'email' => __('validation.email'),
            'numeric' => __('validation.numeric'),
            'date' => __('validation.date'),
            'exists' => __('validation.exists'),
            'unique' => __('validation.unique'),
            'min' => __('validation.min.string'),
            'max' => __('validation.max.string'),
            'in' => __('validation.in'),
        ];
    }
}
