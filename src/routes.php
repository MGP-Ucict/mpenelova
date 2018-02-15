<?php
Route::post('/route_create', [
	'as'        => 'route_create',
	'middleware' => ['web', 'permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\RouteController@routeCreate',
 ]);
Route::get('/route_create', [
	'as'        => 'route_create',
	'middleware' => ['web', 'permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\RouteController@routeCreate',
 ]);
 Route::any('/route_update/{routeId}', [
	'as'        => 'route_update',
	'middleware' => ['web','permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\RouteController@routeUpdate',
 ]);
Route::any('/route_delete/{routeId}', [
	'as'        => 'route_delete',
	'middleware' => ['web','permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\RouteController@routeDelete',
 ]);
Route::any('/route_list', [
	'as'        => 'route_list',
	//'middlewareGroups' => ['web'],
	'middleware' => ['web','permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\RouteController@routeList',
 ]);
 Route::any('/role_list', [
	'as'        => 'role_list',
	'middleware' => ['web', 'permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@roleList',
 ]);
 Route::any('/role_create', [
	'as'        => 'role_create',
	'middleware' => ['web', 'permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@roleCreate',
 ]);
 Route::any('/role_update/{roleId}', [
	'as'        => 'role_update',
	'middleware' => ['web','permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@roleUpdate',
 ]);
 Route::any('/role_delete/{roleId}', [
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
 Route::post('/user_update/{userId}', [
	'as'        => 'user_update',
	'middleware' => ['web','permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@update',
 ]);
Route::get('/user_update/{userId}', [
	'as'        => 'user_update',
	'middleware' => ['web','permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@edit',
 ]);
 Route::any('/user_delete/{userId}', [
	'as'        => 'user_delete',
	'middleware' => ['web','permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@userDelete',
 ]);
 Route::any('/user_list', [
	'as'        => 'user_list',
	'middleware' => ['web', 'permissions.required'],
	'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@userList',
 ]);
