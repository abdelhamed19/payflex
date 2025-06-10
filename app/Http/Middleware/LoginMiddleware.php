<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $email = $request->email;
        $user = User::whereEmail($email)->first();
        if (!$user) {
            if ($request->expectsJson()) {
                return $this->failResponse(__('auth.failed'));
            } else {
                return redirect()->route('login')->with('error', __('auth.inactive_account'));
            }
        }
        $role = Role::find($user->role_id);
        if ($user->is_active == 0 || $role->is_active == 0 || !$role) {
            if ($request->expectsJson()) {
                return $this->failResponse(__('auth.inactive_account'));
            } else {
                return redirect()->route('login')->with('error', __('auth.inactive_account'));
            }
        }
        return $next($request);
    }
}
