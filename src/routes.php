<?php
use Illuminate\Support\Facades\Route;
use Laravelroles\Rolespermissions\Controllers\UserController;
use Laravelroles\Rolespermissions\Controllers\PermissionController;
use Laravelroles\Rolespermissions\Controllers\RoleController;

	Route::prefix('/admin')->middleware(['web', 'bindings', 'permissions.required'])->group(function () {
		Route::resource('permissions', PermissionController::class)->except('show');
		Route::resource('roles', RoleController::class)->except('show');
		Route::resource('users', UserController::class)->except('show')->middleware('fine.grained:id');
	});

	