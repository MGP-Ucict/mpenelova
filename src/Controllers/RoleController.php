<?php
namespace Laravelroles\Rolespermissions\Controllers;

use Laravelroles\Rolespermissions\Models\Role;
use Laravelroles\Rolespermissions\Models\Permission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Laravelroles\Rolespermissions\Requests\RoleRequest;

class RoleController extends Controller{

	public function create(): view
	{	
		return view('rolespermissions.roles.create', [
			'permissions' => Permission::all()
		]);	
	}

	public function store(RoleRequest $request): view|RedirectResponse
	{

		if (isset($request->validator) && $request->validator->fails()) {
	        $errors = $request->validator->errors()->messages();
	        redirect()->back()->withInput()->withErrors($errors);
	    }
		$validated = $request->validated();
		$routes = $validated['routes'];
		unset($validated['routes']);
		$role = Role::create($validated);
		$role->routes()->attach($routes);
		$request->session()->flash('status', 'Данните бяха запазени успешно!');
		return redirect()->route('roles.index');
	}    


	public function edit(Role $role): view
	{
		return view('rolespermissions.roles.edit', [
			'role' => $role,
			'permissions' => Permission::all(),
			'checkedPermissions' => $role->getCheckedPermissions()
		]);
	}

	public function update(RoleRequest $request, Role $role): view|RedirectResponse
	{
		if (isset($request->validator) && $request->validator->fails()) {
	        $errors = $request->validator->errors()->messages();
	       	redirect()->back()->withInput()->withErrors($errors);
	    }
		$validated = $request->validated();
		$permissions = $validated['routes'];
		unset($validated['routes']);
		if (!isset($validated['is_active'])){
			$validated = array_merge(['is_active' => false], $validated);
		}
		$role->update($validated);
		$role->routes()->sync($permissions);
		$request->session()->flash('status', 'Данните бяха запазени успешно!');
		return redirect()->route('roles.index');
	}
	public function destroy(Role $role): RedirectResponse
	{
		$role->routes()->detach();
		$role->delete();
		return redirect()->route('roles.index');
	}

	public function index(): view
	{
		return view('rolespermissions.roles.index', [
			'roles' => Role::all()
		]);
	}
}
