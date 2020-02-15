1. Install laravel project:

	composer create-project --prefer-dist laravel/laravel project

2. In config/app.php:


	'providers' => [

		Laravelroles\Rolespermissions\RolespermissionsServiceProvider::class,

		Collective\Html\HtmlServiceProvider::class,
	]
        
3. In config/app.php:

	'aliases' => [

		'Form'=> Collective\Html\FormFacade::class,

		'Html'=> Collective\Html\HtmlFacade::class,

	]
   
4. Register package middleware in app/Http/Kernel.php
    
	protected $routeMiddleware = [

		'permissions.required' => \Laravelroles\Rolespermissions\Middleware\PermissionsRequiredMiddleware::class,

	];
			    
	    
		    
5. In composer.json:

	"require": {

		"laravelroles/rolespermissions": "dev-master",

		"laravelcollective/html": "~5.0"

	},

    
6. In composer.json:

	 "psr-4": {

		    "App\\": "app/",

		    "Laravelroles\\Rolespermissions\\": "vendor/laravelroles/rolespermissions/src"

	}
	
7. In console:

	composer update

8. Delete fom database/migrations users table migration

9. In console:

	php artisan vendor:publish --provider="Laravelroles\Rolespermissions\RolespermissionsServiceProvider"
10. In console: 

	php artisan make:auth

11. In console:

	php artisan migrate

12. In console:

	composer dump-autoload

13. In console:

	php artisan clear-compiled

14. In console:

	php artisan optimize	   

15. In console:

	php artisan laravelroles:seeder


16. Class User from main laravel project  extends Laravelroles\Rolespermissions\Models\User

User.php:

	use Laravelroles\Rolespermissions\Models\User as BaseUser;


	class User extends BaseUser

	{


	}
17. Set localization in config/app.php - bg or en
    
18. Log in main program with example user test@test.bg and password test
