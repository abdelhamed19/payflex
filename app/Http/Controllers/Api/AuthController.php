<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;

class AuthController extends Controller
{
    use ResponseTrait;
    public function signIn(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();
        if (!$user || !password_verify($data['password'], $user->password)) {
            return $this->failResponse(__('auth.failed'));
        }
        return $this->successResponse(UserResource::make($user));
    }
    public function logoutFromAllDevices()
    {
        $user = auth()->user();
        try {
            DB::beginTransaction();
            $user->tokens()->delete();
            DB::commit();
            return $this->successResponse(UserResource::make($user));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->failResponse(__('auth.logout_failed'));
        }
    }
    public function signUp(RegisterRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {
            $user = User::create($data);
            DB::commit();
            return $this->successResponse(UserResource::make($user));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->failResponse(__('auth.register_failed'));
        }
    }
}
