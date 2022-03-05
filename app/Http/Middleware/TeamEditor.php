<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeamEditor
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
        if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'update')) {
            return $next($request);
        }
        return abort('403');
    }
}
