<?php
namespace Laravelroles\Rolespermissions\Controllers;

use Laravelroles\Rolespermissions\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

use Laravelroles\Rolespermissions\Requests\RouteRequest;

class PermissionController extends Controller{

	public function create(): view
	{	
		return view('rolespermissions.permissions.create');
	}
	
	public function store(RouteRequest $request): view|RedirectResponse
	{
		if (isset($request->validator) && $request->validator->fails()) {
	        $errors = $request->validator->errors()->messages();
	        redirect()->back()->withInput()->withErrors($errors);
	    }
		$validated = $request->validated();
		Permission::create($validated);
		$request->session()->flash('status', 'Данните бяха запазени успешно!');
		return redirect()->route('permissions.index');
	}

	public function edit(Permission $permission): view
	{	
		return view('rolespermissions.permissions.edit', [
			'permission' => $permission
		]);
	}
	
	public function update(RouteRequest $request, Permission $permission): view|RedirectResponse
	{
		if (isset($request->validator) && $request->validator->fails()) {
	       $errors = $request->validator->errors()->messages();
	       redirect()->back()->withInput()->withErrors($errors);
	    }
		$validated = $request->validated();
		$permission->update($validated);
		$request->session()->flash('status', 'Данните бяха запазени успешно!');
		return redirect()->route('permissions.index');
	}
	
	public function destroy(Permission $permission): RedirectResponse
	{
		$permission->delete();
		
		return redirect()->route('permissions.index');
	}
	
	public function index(): view
	{
		return view('rolespermissions.permissions.index', [
			'permissions' => Permission::all()
		]);
	}
}