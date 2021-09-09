<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if($guard == "" || $guard == "web") {
                return redirect(RouteServiceProvider::HOME);
            } else if($guard == "admins") {
                return redirect(RouteServiceProvider::dashpored);
            } else if($guard == "vindoers") {
                return redirect(RouteServiceProvider::vindoers_main);
            }
        }
        return $next($request);
    }
}
