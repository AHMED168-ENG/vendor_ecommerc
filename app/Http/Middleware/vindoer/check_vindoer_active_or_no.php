<?php

namespace App\Http\Middleware\vindoer;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class check_vindoer_active_or_no
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
        if(!Auth::check()) {
            return redirect() -> route("login");
        } else if(!Auth::guard("vindoers")->check()) {
            return redirect() -> route("login_vindoer");
        } else if (auth()->guard("vindoers")->check()) {
            if(Auth::guard('vindoers') -> user() -> active == "0") {
                return redirect() -> route("home")->with(["message" => "لم يتم الموافقه عليك من قبل الادمن الان" , "type" => "danger"]);
            }
        }
        return $next($request);
    }
}
