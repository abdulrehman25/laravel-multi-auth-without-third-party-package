<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MultiAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        foreach (['student', 'teacher', 'admin'] as $guard) {
            if (Auth::guard($guard)->check()) {
                return $next($request);
            }
        }
        return redirect(route('welcome'));
    }
}
