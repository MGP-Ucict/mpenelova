1. Install laravel project
2. composer up
3. php artisan make:auth

4. composer require laravelroles/rolespermissions
5. php artisan vendor:publish
6. php artiisan migrate
7. php artisan db:seed

8. Class User from main laravel project  extends Laravelroles\Rolespermissions\Models\User:

use Laravelroles\Rolespermissions\Models\User as BaseUser;

class User extends BaseUser
{
//...
}

9. Register package Service Provider and HtmlServiceProvider in config/app.php


    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        //..
        Laravelroles\Rolespermissions\RolespermissionsServiceProvider::class,
        Collective\Html\HtmlServiceProvider::class,
        //....
        
        
 10. Register HTML aliases in config/app.php
 
  'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        //....
        'Form'=> Collective\Html\FormFacade::class,
        'Html'=> Collective\Html\HtmlFacade::class,
        //...
    ],
    
    
    
    11. Register package middleware in app/Http/Kernel.php
    
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        //...
        'permissions.required' => \Laravelroles\Rolespermissions\Middleware\PermissionsRequiredMiddleware::class,
        //...
    ];
    
    12. composer require laravelcollective/html
    
    13. Set localization in config/app.php - bg or en
    
    14. Log in main program with example user test and password test
