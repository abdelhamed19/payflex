<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Sidebar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (!$user) {
            return redirect()->route('login');
        }
        $role = $user->role_id;
        $section = DB::table('sidebars')->where('route','like','%'.$request->getPathInfo().'%')->first();
        if ($section) {
            $permetted = DB::table('sidebar_role')
                ->where('role_id', $role)
                ->where('sidebar_id', $section->id)
                ->exists();
            if (!$permetted) {
               abort(403);
            }
        }
        return $next($request);
    }
}
