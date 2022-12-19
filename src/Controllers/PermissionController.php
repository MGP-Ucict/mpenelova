<?php
namespace Laravelroles\Rolespermissions\Controllers;

use Laravelroles\Rolespermissions\Models\Permission;
use Illuminate\Http\Request;
use View;
use App\Http\Controllers\Controller;
use Laravelroles\Rolespermissions\Requests\RouteRequest;

class PermissionController extends Controller{

	public function create()
	{	
		return View::make('rolespermissions/permissions/create');
	}
	
	public function store(RouteRequest $request)
	{
		$validated = $request->validated();
		Permission::create($validated);
		
		return redirect()->route('permissions.index');
	}

	public function edit(Permission $permission)
	{	
		return View::make('rolespermissions/permissions/edit')->with([
			'permission' => $permission
		]);
	}
	
	public function update(RouteRequest $request, Permission $permission)
	{
		$validated = $request->validated();
		$permission->update($validated);
		
		return redirect()->route('permissions.index');
	}
	
	public function destroy(Permission $permission)
	{
		$permission->delete();
		
		return redirect()->route('permissions.index');
	}
	
	public function index()
	{
		return View::make('rolespermissions/permissions/index')->with([
			'permissions' => Permission::all()
		]);
	}
}