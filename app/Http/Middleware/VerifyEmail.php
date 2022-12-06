<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->is_verified === 0) {
            return redirect('/')->withErrors([
                'message' => 'Verify your email address.'
            ]); 
        }

        return $next($request);
    }
}
