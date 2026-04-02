<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            abort(403, 'Anda tidak memiliki akses');
        }

        if (auth()->user()->email !== 'admin@example.com') {
            abort(403, 'Anda tidak memiliki akses');
        }

        return $next($request);
    }
}
