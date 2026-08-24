<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login dan is_admin = 1
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        // Kalau bukan admin, redirect ke home atau abort(403)
        return redirect('/');
    }
}
