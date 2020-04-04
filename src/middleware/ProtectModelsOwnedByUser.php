<?php

namespace Laravelroles\Rolespermissions\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class ProtectModelsOwnedByUser
{
	protected $class;
	
	public function __construct($class)
	{
		$this->class = $class;
	}	
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
			if ($user->is_active){
				$roles = $user->roles()->get();
				foreach($roles as $role){
					if($role->is_active){
						$perms = $role->routes()->get();
						foreach($perms as $perm){
							if($this->compareRoutes($route, $perm) && $method == $perm->method)
								return $next($request);
						}
					}
				}
			}
		return abort(403);
    }
	
	private function compareRoutes($route, $iterRoute){
		$flag = false;
		$routeArray = [];
		$routeArray = explode( "/", $route);
			
		$iterRouteArray = [];	
		$iterRouteArray = explode("/", $iterRoute->route);
		
		$cntr = 0;
		$length = count($routeArray) - 1;
		$iterLength = count($iterRouteArray) - 1;
		if($length == $iterLength){
			while($cntr <= $length){
				if($cntr == $length && !is_numeric($routeArray[$cntr]) && $iterRouteArray[$cntr] == $routeArray[$cntr]){
					$flag = true;
				}
				if($cntr == $length && is_numeric($routeArray[$cntr])){
					$id = $routeArray[$cntr];
					if ($user->owns($this->class, $id){
						$flag = true;
					}
				}
				$cntr++;
			}
		}
		return $flag;
	}
}
