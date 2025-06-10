<?php

namespace App\Http\Resources\Api;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->full_name,
            'email' => $this->email,
            'is_active' => $this->is_active,
            'role' => Role::find($this->role_id)->name,
            'token' => $this->createToken('auth_token')->plainTextToken,
            'image' => $this->image
        ];
    }
}
