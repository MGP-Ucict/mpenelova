<?php
use Laravelroles\Rolespermissions\Controllers\UserController;
use Laravelroles\Rolespermissions\Controllers\RoleController;
use Laravelroles\Rolespermissions\Controllers\PermissionController;

Route::prefix('admin')->group(function () {
	Route::get('/users', [UserController::class, 'index']);
	Route::get('/user/{id}', [UserController::class, 'show']);
	Route::get('/user/create', [UserController::class, 'create']);
	Route::get('/user/{id}edit', [UserController::class, 'edit']);
	Route::post('/users', [UserController::class, 'store']);
	Route::put('/users', [UserController::class, 'update']);
	Route::delete('/users', [UserController::class, 'delete']);
	Route::get('/roles', [RoleController::class, 'index']);
	Route::get('/role/{id}', [RoleController::class, 'show']);
	Route::get('/role/create', [RoleController::class, 'create']);
	Route::get('/role/{id}edit', [RoleController::class, 'edit']);
	Route::post('/roles', [RoleController::class, 'store']);
	Route::put('/roles', [RoleController::class, 'update']);
	Route::delete('/roles', [RoleController::class, 'delete']);
	Route::get('/permissions', [PermissionController::class, 'index']);
	Route::get('/permission/{id}', [PermissionController::class, 'show']);
	Route::get('/permission/create', [PermissionController::class, 'create']);
	Route::get('/permission/{id}edit', [PermissionController::class, 'edit']);
	Route::post('/permissions', [PermissionController::class, 'store']);
	Route::put('/permissions', [PermissionController::class, 'update']);
	Route::delete('/permissions', [PermissionController::class, 'delete']);
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
