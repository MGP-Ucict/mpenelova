<?php
use Illuminate\Support\Facades\Route;
use Laravelroles\Rolespermissions\Controllers\UserController;
use Laravelroles\Rolespermissions\Controllers\PermissionController;
use Laravelroles\Rolespermissions\Controllers\RoleController;

	Route::prefix('/admin')->middleware(['web', 'bindings',])->group(function () {
		Route::resource('permissions', PermissionController::class)->except('show')->middleware('permissions.required');
		Route::resource('roles', RoleController::class)->except('show')->middleware('permissions.required');
		Route::resource('users', UserController::class)->except('show')->middleware('permissions.required:id');
	});

	