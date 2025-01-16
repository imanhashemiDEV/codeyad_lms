<?php

namespace Modules\Panel\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if($user->roles){
            return $next($request);
        }

        return redirect()->route('home');

    }
}
