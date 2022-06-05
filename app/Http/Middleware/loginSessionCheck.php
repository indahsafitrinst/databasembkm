<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class loginSessionCheck
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
        if(!session()->has('nim') && !session()->has('nip')){
          return redirect('/');
        }
        return $next($request);
    }
}