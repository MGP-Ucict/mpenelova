<?php
use Laravelroles\Rolespermissions\Controllers\UserController;

Route::prefix('admin')->group(function () {
	Route::get('/users', [UserController::class, 'index']);
	Route::get('/user/{id}', [UserController::class, 'show']);
	Route::get('/user/create', [UserController::class, 'create']);
	Route::get('/user/{id}edit', [UserController::class, 'edit']);
	Route::post('/users', [UserController::class, 'store']);
	Route::put('/users', [UserController::class, 'update']);
	Route::delete('/users', [UserController::class, 'delete']);
	// Route::resource('permissions', 'Laravelroles\Rolespermissions\Controllers\PermissionController')
	// ->except(['show'])
	// ->middleware(['web', 'permissions.required']);
	// Route::resource('roles', 'Laravelroles\Rolespermissions\Controllers\RoleController')
	// ->except(['show'])
	// ->middleware(['web', 'permissions.required']);
	// Route::resource('users', 'Laravelroles\Rolespermissions\Controllers\UserController')
	// ->except(['show'])
	// ->middleware(['web', 'permissions.required']);
});
