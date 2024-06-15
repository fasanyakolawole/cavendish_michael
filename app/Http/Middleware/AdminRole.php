<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminRole
{
   // todo: I always like to make this dynamic but we can go by this for prove of concept
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user()->hasRole('admin') || ! $request->user()->can('delete website')) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
