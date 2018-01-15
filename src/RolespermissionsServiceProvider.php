<?php

namespace Laravelroles\Rolespermissions;

use Laravelroles\Rolespermissions\Models\Permission;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class RolespermissionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		//$this->registerPolicies();
		$this->registerRolePolicies();
		$this->loadTranslationsFrom(__DIR__.'/lang', 'blah'
		);
		$this->publishes([__DIR__.'/views'=> base_path('resources/views/laravelroles/rolespermissions')]
		);
		$this->publishes([__DIR__.'/lang'=> base_path('resources/lang')]
		);
		$this->publishes([__DIR__.'/views/errors'=> base_path('resources/views/errors')]
		);
		$this->publishes([
		__DIR__. '/migrations'=>$this->app->databasePath().'/migrations'], 'migrations');
		$this->publishes([
		__DIR__. '/seeds'=>$this->app->databasePath().'/seeds'], 'seeds');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
		include __DIR__."/routes.php";
		
		$this->app->make('Laravelroles\Rolespermissions\Controllers\RoleController');
		$this->app->make('Laravelroles\Rolespermissions\Controllers\RouteController');
		$this->app->make('Laravelroles\Rolespermissions\Controllers\UserController');
		
    }
	 public function map()
    {
        //$this->mapWebRoutes();

        //$this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
	public function registerRolePolicies()
{
    Gate::define('access-permission', function () {
        return true;//$user->hasAccess([$p]);
   });
    
	
	}
}
