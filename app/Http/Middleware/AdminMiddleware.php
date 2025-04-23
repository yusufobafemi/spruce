<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and has admin role
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request); // allow the request to continue
        }

        // Not an admin — deny access or redirect
        // abort(403, 'Unauthorized access.');
        // OR you can redirect them:
        return redirect('/');
    }
}
