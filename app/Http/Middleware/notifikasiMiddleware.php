<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class notifikasiMiddleware
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

        // its a bad aidea to return data from middleware.
        //this is only for changing views and redirecting to multiple pages





        return $next($request);
    }
}
