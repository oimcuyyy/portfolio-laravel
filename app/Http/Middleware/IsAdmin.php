<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika belum login ATAU bukan admin, lempar balik ke halaman utama
        if (! $request->user() || ! $request->user()->is_admin) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman Admin.');
        }

        return $next($request);
    }
}
