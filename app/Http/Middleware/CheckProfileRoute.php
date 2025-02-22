<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckProfileRoute
{
    /**
     * Handle an incoming request.
     */

    //Acara 4
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah route yang sedang diakses bernama 'profile'
        if ($request->route()->named('profile')) {
            // Tambahkan logika yang diinginkan, contoh: return abort(403);
        }

        return $next($request);
    }
}
