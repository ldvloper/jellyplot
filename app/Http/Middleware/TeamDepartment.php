<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeamDepartment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->currentTeam->department)
        {
            return $next($request);
        }
        return abort('403');

    }
}
