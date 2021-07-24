<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->is_company == 1){
            return $next($request);
        }
   
        return redirect(‘home’)->with(‘error’,"You don't have admin access.");
    }
}
