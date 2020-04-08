<?php
namespace Laravelroles\Rolespermissions\Controllers;

use Laravelroles\Rolespermissions\Models\Permission;
use Illuminate\Http\Request;
use View;
use App\Http\Controllers\Controller;
use Laravelroles\Rolespermissions\Requests\RouteRequest;

class PermissionController extends Controller{

	public function create(Request $request)
	{	
		return View::make('rolespermissions/permissions/create');
	}
	
	public function store(RouteRequest $request)
	{
		$validated = $request->validated();
		Permission::create($validated);
		
		return redirect()->route('permissions-list');
	}

	public function edit(Request $request, $id)
	{	
		$permission = Permission::find($id);
		$data = compact(['permission']);
		
		return View::make('rolespermissions/permissions/edit')->with($data);
	}
	
	public function update(RouteRequest $request, $id)
	{
		$permission = Permission::find($id);
		$validated = $request->validated();
		$permission->update($validated);
		
		return redirect()->route('permissions-list');
	}
	
	public function destroy($id)
	{
		$permissiion = Permission::find($id);
		$permission->delete();
		
		return redirect()->route('permissions-list');
	}
	
	public function index()
	{
		$permissions = Permission::all();
		$data = compact(['permissions']);
		
		return View::make('rolespermissions/permissions/index')->with($data);
	}
}