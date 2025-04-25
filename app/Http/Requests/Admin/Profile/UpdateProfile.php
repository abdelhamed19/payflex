<?php

namespace App\Http\Requests\Admin\Profile;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rules\Password;

class UpdateProfile extends BaseRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'lang' => ['nullable','min:2','in:ar,en'],
            'email' => ['required','email', 'unique:users,email,' . $this->user()->id],
            'password' => ['nullable','confirmed', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
