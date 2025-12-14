<?php

namespace Laravelroles\Rolespermissions\Middleware;
use Illuminate\Support\Facades\Route;
use Closure;
use Illuminate\Http\Request;

class PermissionsRequiredMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $property = null)
    {
		// Get the current route.
		$user = auth()->user();
		$route = Route::getRoutes()->match($request)->getName();

		if (is_null($user)){
			abort(401);
		}
		$roles = $user->roles->where('is_active', 1);
		foreach ($roles as $role) {
        	if ($role->hasAccess($route)) {
	 			 return app(\Illuminate\Routing\Middleware\SubstituteBindings::class)
				    ->handle($request, function($request) use ($next) {
				        return $next($request);
				 });
          	}
        	if(!is_null($property)) {
	        	$routeArray = explode('.', $route);
				$model = rtrim($routeArray[0], 's');
				$id = $request->route($model);
				if (!is_null($id)) {
					$instance = \DB::table($routeArray[0])->where('id', $id)->first();
					if (!is_null($instance) && $user->roles->count() && $instance->{$property} == $user->id && rtrim($routeArray[0], 's') == $model)
					{
						return app(\Illuminate\Routing\Middleware\SubstituteBindings::class)
						    ->handle($request, function($request) use ($next) {
						        return $next($request);
						});
					}
				}
	        }
	    }
		return abort(403);
    }
}
