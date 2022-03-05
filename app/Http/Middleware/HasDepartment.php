<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasDepartment
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        //Check if the user has department or is the admin
        if(auth()->user()->department || auth()->user()->email === config('app.admin_email'))
        {
            return $next($request);
        }
        return redirect(route('welcome'));
    }
}
