<?php
Route::prefix('admin')->group(function () {
	Route::resource('permissions', 'Laravelroles\Rolespermissions\Controllers\PermissionController')
	->except(['show'])
	->middleware(['web', 'permissions.required']);
	Route::resource('roles', 'Laravelroles\Rolespermissions\Controllers\RoleController')
	->except(['show'])
	->middleware(['web', 'permissions.required']);
	Route::resource('users', 'Laravelroles\Rolespermissions\Controllers\UserController')
	->except(['show'])
	->middleware(['web', 'permissions.required']);
});
