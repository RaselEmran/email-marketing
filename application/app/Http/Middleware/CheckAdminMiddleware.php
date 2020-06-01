<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdminMiddleware
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
        if ( Auth::user()->role != 'admin') {
            return redirect('/');
        }
        return $next($request);
    }
}
