<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponseLocalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // جلب قيمة اللغة من الهيدر، وإذا لم تكن موجودة يتم تعيين "ar" كافتراضي
        $lang = $request->header('Lang') ?? 'ar';
        // تعيين اللغة للتطبيق
        app()->setLocale($lang);

        return $next($request);
    }
}
