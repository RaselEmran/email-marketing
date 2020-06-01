<?php

namespace App\Http\Middleware;

use Closure;

class CheckInstallMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // successfully installation check
        if ( ! env('INSTALLED', false)) {
            return redirect('/');
        }
        return $next($request);
    }
}
