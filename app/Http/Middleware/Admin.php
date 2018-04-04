<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Admin
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
        if (Auth::check()) {
            if (Auth::user()->role != 'admin') {
                return abort(404, 'You are not allowed to edit this page');
            }
        } else {
            return abort(404, 'You must log in');
        };
        return $next($request);
    }
}
