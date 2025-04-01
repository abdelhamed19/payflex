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
            'email' => ['required','email', 'unique:users,email,' . $this->user()->id],
            'password' => ['required','confirmed', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'lang' => 'nullable|string|max:2',
        ];
    }
}
