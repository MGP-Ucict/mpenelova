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
    public function handle($request, Closure $next)
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
        }
		
		return abort(403);
    }
}
