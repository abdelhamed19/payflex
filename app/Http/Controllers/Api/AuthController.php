<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use App\Traits\ResponseTrait;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ResponseTrait, UploadTrait;
    public function signIn(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();
        if (!$user || !password_verify($data['password'], $user->password) || $user->is_active == 0) {
            return $this->failResponse(__('auth.failed'));
        }
        return $this->successResponse(UserResource::make($user));
    }
    public function uploadImage(Request $request)
    {
        $image = $request->file('image');
        $file = $this->uploadFile($image, 'users');
        if ($file) {
            $user = auth()->user();
            $user->image = $file;
            $user->save();
            return $this->successResponse(UserResource::make($user));
        }
        return $this->failResponse(__('messages.image_upload_failed'));
    }
}
