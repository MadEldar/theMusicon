<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authentication
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
        if (!Auth::check()) {
            $role = Auth::user()->user_role;
            if ($role = 0) {
                return $next($request);
            } else if ($request->is('admin/*')) {
                return redirect()->back()->withErrors(['User is unauthorized.']);
            } else {
                return $next($request);
            }
        } else {

        }
    }
}
