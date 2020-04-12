<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::check()) {
            $userRole = Auth::user()->user_role;
            if ($userRole === 0) {
                return $next($request);
            } else if ($request->is('administrator/*')) {
                return redirect('/')->withErrors(['User is unauthorized.']);
            } else {
                return $next($request);
            }
        } else {
            return redirect('/sign-in')->withErrors(['User must login first.']);
        }
    }
}
