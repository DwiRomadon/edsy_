<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class guru
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
        if (Auth()->guest()) {
            return redirect()->route('login');
        } else {
            if (auth()->user()->role === 'guru') {
                return $next($request);
            } 
            // redirect kalo role tidak sesuai
            else {
                return redirect()->route('login');
            }
        }
        // return $next($request);
    }
}
