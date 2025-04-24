<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PageVisit;

class TrackPageVisits
{
    public function handle(Request $request, Closure $next)
    {
        // Optional: Exclude admin or AJAX routes
        if (
            $request->isMethod('get') &&
            !$request->is('admin/*') &&
            !$request->ajax() &&
            !str_ends_with($request->path(), 'dashboard')
        ) {
            PageVisit::create([
                'url'        => $request->fullUrl(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }
        return $next($request);
    }
}
