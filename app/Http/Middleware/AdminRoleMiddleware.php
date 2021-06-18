<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (empty($user) || $user->role !== 'admin') {
            abort(403);
        }

        return $next($request);
    }
}
