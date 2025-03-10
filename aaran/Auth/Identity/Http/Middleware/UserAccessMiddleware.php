<?php

namespace Aaran\Auth\Identity\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccessMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || !auth()->user()->can('manage_users')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        return $next($request);
    }
}
