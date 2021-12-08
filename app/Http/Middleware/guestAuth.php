<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class guestAuth
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
        if (auth()->guest()) {
            return $next($request);
        } else {
            if (auth()->user()->role === 'guru') {
                return redirect()->route('dashboard');
            }
        }
        
    }
}
