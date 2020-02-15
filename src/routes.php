<?php
Route::prefix('admin')->group(function () {
	Route::get('/permission-create', [
		'as'        => 'permission-create',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\PermissionController@create',
	 ]);
	Route::post('/permission-create', [
		'as'        => 'permission-create',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\PermissionController@store',
	 ]);
	 Route::put('/permission-update/{id}', [
		'as'        => 'permission-update',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\PermissionController@update',
	 ]);
	Route::get('/permission-update/{id}', [
		'as'        => 'permission-update',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\PermissionController@edit',
	 ]);
	Route::delete('/permission-delete/{id}', [
		'as'        => 'permission-delete',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\PermissionController@destroy',
	 ]);
	Route::get('/permissions-list', [
		'as'        => 'permissions-list',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\PermissionController@index',
	 ]);
	 Route::get('/roles-list', [
		'as'        => 'roles-list',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@index',
	 ]);
	 
	 Route::get('/role-create', [
		'as'        => 'role-create',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@create',
	 ]);
	Route::post('/role-create', [
		'as'        => 'role-create',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@store',
	 ]);
	 Route::put('/role-update/{id}', [
		'as'        => 'role-update',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@update',
	 ]);
	Route::get('/role-update/{id}', [
		'as'        => 'role-update',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@edit',
	 ]);
	 Route::delete('/role-delete/{id}', [
		'as'        => 'role-delete',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\RoleController@destroy',
	 ]);
	Route::get('/user-create', [
		'as'        => 'user-create',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@create',
	 ]);
	Route::post('/user-create', [
		'as'        => 'user-create',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@store',
	 ]);
	 Route::put('/user-update/{id}', [
		'as'        => 'user-update',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@update',
	 ]);
	Route::get('/user-update/{id}', [
		'as'        => 'user-update',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@edit',
	 ]);
	 Route::delete('/user-delete/{id}', [
		'as'        => 'user-delete',
		'middleware' => ['web','permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@destroy',
	 ]);
	 Route::get('/users-list', [
		'as'        => 'users-list',
		'middleware' => ['web', 'permissions.required'],
		'uses'      => 'Laravelroles\Rolespermissions\Controllers\UserController@index',
	 ]);
});
