<?php

namespace App\Http\Middleware;

use Closure;

class UrlProtect
{
    // Custom middleware to protect user from accessing other data via url

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        /* 
            Get the user id parameter from url and compare it to the authenticated user id.
            If not the same redirect user to another page.
        */
        if($request->route('user') != auth()->user()->id){
            dd('no access');
        }

        return $next($request);
    }
}
