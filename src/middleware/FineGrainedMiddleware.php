<?php

namespace Laravelroles\Rolespermissions\Middleware;
use Illuminate\Support\Facades\Route;
use Closure;
use Illuminate\Http\Request;

class FineGrainedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $property)
    {
		// Get the current route.
		$user = auth()->user();
		$route = Route::getRoutes()->match($request)->getName();

		if (is_null($user)){
			abort(401);
		}
	
		$routeArray = explode('.', $route);
		$model = rtrim($routeArray[0], 's');
		$id = $request->route($model);
		$instance = \DB::table($routeArray[0])->where('id', $id)->first();
		if ($user->roles->count() && $instance->{$property} == $user->id)
		{
			return app(\Illuminate\Routing\Middleware\SubstituteBindings::class)
			    ->handle($request, function($request) use ($next) {
			        return $next($request);
			});
		 }
		
		return abort(403);
    }
}
