<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next, $role = null, ...$guards )
    {
        $this->authenticate($request, $guards);

        // midddleware auth:administrator
        if($role){
            if( !$request->user()->hasRole($role)){
                abort(403, "Nemáte povolenie na požadovanú akciu.");
            }
        }

        return $next($request);
    }
}
