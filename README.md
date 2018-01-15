1. Install laravel project
2. Register package Service Provider and HtmlServiceProvider in config/app.php


    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
     
        Laravelroles\Rolespermissions\RolespermissionsServiceProvider::class,
        Collective\Html\HtmlServiceProvider::class,
        ]
        
        
 3. Register HTML aliases in config/app.php
 
  'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        //....
        'Form'=> Collective\Html\FormFacade::class,
        'Html'=> Collective\Html\HtmlFacade::class,
        //...
    ],
    
    
    
   4. Register package middleware in app/Http/Kernel.php
    
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        //...
        'permissions.required' => \Laravelroles\Rolespermissions\Middleware\PermissionsRequiredMiddleware::class,
        //...
    ];
5.composer.json:
    "require": {
        "laravelroles/rolespermissions": "dev-master",
	    "laravelcollective/html": "~5.0"
    },
6. composer.json: 
     "psr-4": {
            "App\\": "app/",
            "Laravelroles\\Rolespermissions\\": "vendor/laravelroles/rolespermissions/src",
            "Tests\\": "tests/"
        } 
7. composer update


8. php artisan vendor:publish
9. php artisan make:auth
10. php artiisan migrate
11. php artisan db:seed

12. Class User from main laravel project  extends Laravelroles\Rolespermissions\Models\User:

use Laravelroles\Rolespermissions\Models\User as BaseUser;

class User extends BaseUser
{
//...
}
13. Set localization in config/app.php - bg or en
    
14. Log in main program with example user test and password test