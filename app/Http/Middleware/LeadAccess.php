<?php

namespace App\Http\Middleware;

use Closure;

class LeadAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if($role != 'project leader'){
            dd('Page only accessible by project leader');
        }
        return $next($request);
    }
}
