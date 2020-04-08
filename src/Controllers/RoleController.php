<?php
namespace Laravelroles\Rolespermissions\Controllers;

use Laravelroles\Rolespermissions\Models\Role;
use  Laravelroles\Rolespermissions\Models\Permission;
use Illuminate\Http\Request;
use View;
use App\Http\Controllers\Controller;
use Laravelroles\Rolespermissions\Requests\RoleRequest;

class RoleController extends Controller{

	public function create(Request $request)
	{	
		$permissions = Permission::all();
		$data = compact(['permissions']);
		
		return View::make('rolespermissions/roles/create')->with($data);	
	}

	public function store(RoleRequest $request)
	{
		$validated = $request->validated();
		$routes = $validated['routes'];
		unset($validated['routes']);
		$role = Role::create($validated);
		$role->routes()->attach($routes);
		
		return redirect()->route('roles-list');
	}    


	public function edit(Request $request, $id)
	{	
		
		$role = Role::find($id);
		$permissions = Permission::all();
		$checkedPermissions = $role->getCheckedPermissions();
		$data = compact(['role', 'permissions', 'checkedPermissions']);
		return View::make('rolespermissions/roles/edit')->with($data);
	}

	public function update(RoleRequest $request, $id)
	{
		$role = Role::find($id);
		$validated = $request->validated();
		$permissions = $validated['routes'];
		unset($validated['routes']);
		$role->update($validated);
		$role->routes()->sync($permissions);
		
		return  redirect()->route('roles-list');
	}
	public function destroy($id)
	{
		$role= Role::find($id);
		$role->routes()->detach();
		$role->delete();
		return redirect()->route('roles-list');
	}
	public function index(){
		$roles = Role::all();
		$data = compact(['roles']);
		return View::make('rolespermissions/roles/index')->with($data);
	}
}
