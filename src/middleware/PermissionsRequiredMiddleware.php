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
			$user = Auth::user();//$request->user();
			//$user = $request->user();
			//var_dump($user->name);
			//die();	
			$route =  $request->path();
			$route_array = array();
			$route_array = explode( "/", $route);
			$route = $route_array[0];
			//dd($route);
			//die($route);
			$roles = $user->roles()->get();
		foreach($roles as $role){
			$perms = $role->routes()->get();
			foreach($perms as $p){
				if($route == $p->name)
					return $next($request);
					
				
			
			}
		}
		return abort(403);
    
    }
}
