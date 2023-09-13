<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class adminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!empty(Auth::user())) {
            # url check...
            if (url()->current() == route('Auth#login') || url()->current() == route('Auth#register')) {
                return back();
            }

            if (Auth::user()->role == 'user') {
                return back();
            }
            return $next($request);
        }
        return $next($request);
    }
}