<?php

namespace App\Http\Middleware;

use Closure;

class RestrictedDocsAccess
{
    public function handle($request, Closure $next)
    {
        if (! app()->isProduction()) {
            return $next($request);
        }

        abort(403);
    }
}
