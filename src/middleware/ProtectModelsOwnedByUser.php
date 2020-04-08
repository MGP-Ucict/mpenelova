<?php

namespace Laravelroles\Rolespermissions\Middleware;
use Closure;

class ProtectModelsOwnedByUser
{
	
	
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $className)
    {
		// Get the current route.
		$user = $request->user();
		if (!$user){
			return redirect('/');
		}
		$route =  $request->path();
		$method = $request->method();
		if ($user->is_active){
			$roles = $user->roles()->get();
			foreach($roles as $role){
				if ($role->is_active){
					$routeArray = explode( "/", $route);
					$count = count($routeArray)-1;
					$id = $routeArray[$count];
					if ($user->ownsClass($className, $id)){
						return $next($request);
					}
				}
			}
		}
		return abort(403);
    }
}
