<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictedDocsAccess
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (! app()->isProduction()) {
            return $next($request);
        }

        abort(403);
    }
}
