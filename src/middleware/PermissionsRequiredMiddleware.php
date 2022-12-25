<?php

namespace Laravelroles\Rolespermissions\middleware;
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
    public function handle($request, Closure $next, $object = null, $fineGrainedOperations = [])
    {
		// Get the current route.
		$user = $request->user();
		$route =  $request->route()->getName();
		if (!$user){
			return redirect('/');
		}
		$model = request()->route()->parameter($object);

		$roles = $user->roles->where('is_active', 1);
		foreach($roles as $role) {
		if ($role->hasAccess($route)) {
		 		return $next($request);
			}
		}

		if ($roles->count() && $user->ownsModel($model)
			&& $user->isAllowedOperation($fineGrainedOperations, $route)) {
			return $next($request);
		}

		return abort(403);
    }
}
