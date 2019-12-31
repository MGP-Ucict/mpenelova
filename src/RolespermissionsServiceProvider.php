<?php

namespace Laravelroles\Rolespermissions;

use Laravelroles\Rolespermissions\Models\Permission;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravelroles\Rolespermissions\Commands\LaravelrolesCommand;

class RolespermissionsServiceProvider extends ServiceProvider
{
    
protected $commands = [
    'Laravelroles\Rolespermissions\Commands\LaravelrolesCommand'
];
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       	$this->commands($this->commands);
		//custom blade directive
		\Blade::if('path', function($expression){
				return auth()->user()->hasAccess($expression);
		});
		//load and publish translations
		$this->loadTranslationsFrom(__DIR__.'/lang', 'lang');
		$this->publishes([__DIR__.'/lang'=> base_path('resources/lang')]);
		
		//publish views
		$this->publishes([__DIR__.'/views'=> base_path('resources/views/laravelroles/rolespermissions')]
		);
		//publish error views
		$this->publishes([__DIR__.'/views/errors'=> base_path('resources/views/errors')]);
		//publish migrations
		$this->publishes([
		__DIR__. '/migrations'=>$this->app->databasePath().'/migrations'], 'migrations');
		//publish seeds
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
	       
		include __DIR__."/routes.php";
		
		$this->app->make('Laravelroles\Rolespermissions\Controllers\RoleController');
		$this->app->make('Laravelroles\Rolespermissions\Controllers\RouteController');
		$this->app->make('Laravelroles\Rolespermissions\Controllers\UserController');
		
		
    }
	
}
