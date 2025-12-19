<?php

namespace Laravelroles\Rolespermissions;

use Laravelroles\Rolespermissions\Models\Permission;
use Laravelroles\Rolespermissions\Middleware\PermissionsRequiredMiddleware;
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
		\Blade::if('path', function($routeName){
			return optional(auth()->user())->hasAccess($routeName);
		});
		\Blade::if('owns', function($attributeValue){
			return auth()->id() == $attributeValue;
		});
		\Blade::if('has', function($attributeValue, $routeName){
			return optional(auth()->user())->hasAccess($routeName) ||  (auth()->id() == $attributeValue);
		});
		//load and publish translations
		$this->publishes([__DIR__.'/lang'=> base_path('resources/lang')]);
		$this->loadTranslationsFrom(base_path('resources/lang'), 'lang');
		
		//publish views
		$this->publishes([__DIR__.'/views'=> base_path('resources/views/rolespermissions')]
		);
		//publish error views
		$this->publishes([__DIR__.'/views/errors'=> base_path('resources/views/errors')]);
		//publish migrations
		$this->publishes([
		__DIR__. '/migrations'=>$this->app->databasePath().'/migrations'], 'migrations');
		//publish seeds
		// $this->publishes([
		// __DIR__. '/Seeders'=>$this->app->databasePath().'/Seeders'], 'seeders');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {		
	       
		include __DIR__."/routes.php";
		include __DIR__."/Seeders/PermissionsSeeder.php";
		include __DIR__."/Seeders/RolesSeeder.php";
		include __DIR__."/Seeders/RolesUserSeeder.php";
		include __DIR__."/Seeders/UsersSeeder.php";

		
		$this->app->make('\Laravelroles\Rolespermissions\Controllers\RoleController');
		$this->app->make('\Laravelroles\Rolespermissions\Controllers\PermissionController');
		$this->app->make('\Laravelroles\Rolespermissions\Controllers\UserController');
		
		
    }
	
}
