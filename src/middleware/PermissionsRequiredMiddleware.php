<?php

namespace Laravelroles\Rolespermissions\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class PermissionsRequiredMiddleware
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
        
			// Get the current route.
			$user = $request->user();
			if (!$user)
				return redirect('/');
			$route =  $request->path();
			$method = $request->method();
			$routeArray = array();
			$routeArray = explode( "/", $route);
			$routeName = $routeArray[0];
			if ($user->is_active){
				$roles = $user->roles()->get();
				foreach($roles as $role){
					if($role->is_active){
						$perms = $role->routes()->get();
						foreach($perms as $p){
							if($routeName == $p->name  && $method == $p->method)
								return $next($request);
						}
					}
				}
			}
		return abort(403);
    }
}
