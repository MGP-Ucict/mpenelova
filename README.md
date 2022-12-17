1. Install package. In console:

	composer require laravelroles/rolespermissions

        
2. Register package middleware in app/Http/Kernel.php
    
	protected $routeMiddleware = [

		'permissions.required' => \Laravelroles\Rolespermissions\Middleware\PermissionsRequiredMiddleware::class

	];
			    
	    
		    
3. In console:

	php artisan vendor:publish --provider="Laravelroles\Rolespermissions\RolespermissionsServiceProvider"

4. In console:

	php artisan migrate
	
5. In console:

	composer dump-autoload

6. In console:

	php artisan laravelroles:seeder


7. Class User from main laravel project  extends Laravelroles\Rolespermissions\Models\User

User.php:

	use Laravelroles\Rolespermissions\Models\User as BaseUser;


	class User extends BaseUser

	{


	}
8. Set localization in config/app.php - bg or en
    
9. Log in main program with example user test@test.bg and password test

10. Configure fine-grained access control of HRABAC for the operations show, edit and delete (for example):

Route::resource('salaries', 'SalaryController')->middleware('permissions.required:salary,show|edit|delete');

