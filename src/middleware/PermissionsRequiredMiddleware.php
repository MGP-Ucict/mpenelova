<?php

namespace Laravelroles\Rolespermissions\Middleware;
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
    public function handle($request, Closure $next, $object = null)
    {
		// Get the current route.
		$user = $request->user();
		$route =  $request->route()->getName();
		if (!$user){
			return redirect('/');
		}
		$modelArray = array_values(request()->route()->parameter($object));

		$roles = $user->roles->where('is_active', 1);
		foreach($roles as $role) {
		if ($role->hasAccess($route)) {
		 		return $next($request);
			}
		}

		if ($roles->count() && isset($modelArray[0]) && $user->ownsModel($modelArray[0])) {
			return $next($request);
		}

		return abort(403);
    }
}
