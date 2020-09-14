<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { if (Auth::check() && Auth::user()->isRole()=="user") {
        # code...
        return $next($request);

    } else {
        # code...
        return redirect()->route('login');
    }
    }
}
