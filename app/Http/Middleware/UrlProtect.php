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
        //dd($request->route('user'));
        //dd(auth()->user()->id);

        if($request->route('user') != auth()->user()->id){
            dd('no access');
        }

        return $next($request);
    }
}
