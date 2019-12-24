<?php
Route::prefix('admin')->group(function () {
	Route::get('/route_create', [
		'as'        => 'route_create',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RouteController@create',
	 ]);
	Route::post('/route_create', [
		'as'        => 'route_create',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RouteController@store',
	 ]);
	 Route::put('/route_update/{id}', [
		'as'        => 'route_update',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RouteController@update',
	 ]);
	Route::get('/route_update/{id}', [
		'as'        => 'route_update',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RouteController@edit',
	 ]);
	Route::delete('/route_delete/{id}', [
		'as'        => 'route_delete',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RouteController@routeDelete',
	 ]);
	Route::get('/route_list', [
		'as'        => 'route_list',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RouteController@routeList',
	 ]);
	 Route::get('/role_list', [
		'as'        => 'role_list',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@roleList',
	 ]);
	 
	 Route::get('/role_create', [
		'as'        => 'role_create',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@create',
	 ]);
	Route::post('/role_create', [
		'as'        => 'role_create',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@store',
	 ]);
	 Route::put('/role_update/{id}', [
		'as'        => 'role_update',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@update',
	 ]);
	Route::get('/role_update/{id}', [
		'as'        => 'role_update',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@edit',
	 ]);
	 Route::delete('/role_delete/{id}', [
		'as'        => 'role_delete',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@roleDelete',
	 ]);
	Route::get('/user_create', [
		'as'        => 'user_create',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@create',
	 ]);
	Route::post('/user_create', [
		'as'        => 'user_create',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@store',
	 ]);
	 Route::put('/user_update/{id}', [
		'as'        => 'user_update',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@update',
	 ]);
	Route::get('/user_update/{id}', [
		'as'        => 'user_update',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@edit',
	 ]);
	 Route::delete('/user_delete/{id}', [
		'as'        => 'user_delete',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@userDelete',
	 ]);
	 Route::any('/user_list', [
		'as'        => 'user_list',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@userList',
	 ]);
});
