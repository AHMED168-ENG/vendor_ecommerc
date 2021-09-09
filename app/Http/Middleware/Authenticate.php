<?php

namespace App\Http\Middleware;

use GuzzleHttp\Psr7\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if($request->is("admin/*")) {
                return route("show_admin");
            } else if($request->is("web_sit/vindoer/*")) {
                return route("login_vindoer");
            } else {
                return route("login");
            }
        }
    }
}
