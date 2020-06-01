<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Session;
use Log;
use App\User;

class DemoMiddleware
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
        if(env('APP_ENV', false) == 'demo'){
            if(Route::getCurrentRoute()->getName() == 'oauth.store'){
                Session::flash('error_msg', 'Not allowed to save in Demo.');
                return redirect('oauth');
            } else if(Route::getCurrentRoute()->getName() == 'users.destroy'){
                $someUsers = User::orderBy('created_at', 'asc')->get()->take(5)->pluck('id')->toArray();
                if(in_array($request->segment(2), $someUsers)){
                    Session::flash('error_msg', 'Not allowed to delete in Demo.');
                    return redirect('users');
                }
            } else if(Route::getCurrentRoute()->getName() == 'email.store'){
                Session::flash('error_msg', 'Not allowed to save in Demo.');
                return redirect('email');
            }
        }

        return $next($request);
    }
}
