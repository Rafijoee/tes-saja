<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class pemerintahMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if(!auth()->check() || auth()->user()->roles_id !== 2){
            return redirect()->intended('/')->with('alert', 'Silakan login!');
        }
        return $next($request);
    }
}
