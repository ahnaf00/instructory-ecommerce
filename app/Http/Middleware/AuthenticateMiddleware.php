<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Check if the authenticated user's role_id is not 1
            if (Auth::user()->role_id !== 1) {
                return redirect()->route('admin.login');
            }
        } else {
            // If the user is not authenticated, redirect to the login page
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
