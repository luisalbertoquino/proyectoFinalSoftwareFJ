<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\HasRolesAndPermissions;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        foreach($roles as $role){
            if(auth()->user()->hasRole($role)){
                return $next($request); 
            } 
        }
        abort(404);
    }
}