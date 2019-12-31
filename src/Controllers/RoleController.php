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
		return View::make('laravelroles/rolespermissions/Roles/role_create')->with(array('permissions'=>$permissions));	
		
	}

	public function store(RoleRequest $request)
	{
		$permissions = Permission::all();
		if($request->isMethod('post') && $request->input('submit')){
			$roleObj = new Role;
			$roleObj->name = $request->get('name');
			$routes = $request->get('routes');
			$roleObj->is_active = $request->get('is_active');
			$roleObj->save();
			foreach($routes as $key=>$value){
				$rr = Permission::find($value);
				$roleObj->routes()->attach($rr);
			}
		}
		return View::make('laravelroles/rolespermissions/Roles/role_create')->with(array('permissions'=>$permissions));
	}    


	public function edit(Request $request, $roleId)
	{	
		
		$roleObj = Role::find($roleId);
		$routesOld = Role::find($roleId)->routes()->get();
		$routes = Permission::all();
		$countPermissions = count($routesOld);
		$data = array(
			'roleId'=>$roleId,
			'roleObj'=>$roleObj,
			'routes'=>$routes,
			'permissions'=>$routesOld,
			'cnt'=>$countPermissions,
		);
		return View::make('laravelroles/rolespermissions/Roles/role_update')->with($data);
	}

	public function update(RoleRequest $request, $roleId)
	{
		$roleObj = Role::find($roleId);
		$routesOld = Role::find($roleId)->routes()->get();
		$routes = Permission::all();
		if($request->isMethod('put') && $request->input('submit')){
			$roleObj->name = $request->get('name');
			$routesNew = $request->get('routes');
			$roleObj->is_active = $request->get('is_active');
			$roleObj->save();
			foreach($routesOld as $key=>$value){
				$rr = Permission::find($value);
				$roleObj->routes()->detach($rr);
			
			}
			foreach($routesNew as $key=>$value){
				$rr = Permission::find($value);
				$roleObj->routes()->attach($rr);	
			}
		}
		$countPermissions = count($routesOld);
			$data = array(
				'roleId'=>$roleId,
				'roleObj'=>$roleObj,
				'routes'=>$routes,
				'permissions'=>$routesOld,
				'cnt'=>$countPermissions,
			);
		return View::make('laravelroles/rolespermissions/Roles/role_update')->with($data);
	}
	public function roleDelete(Request $request, $roleId)
	{
		$roleObj = Role::find($roleId);
		$roleObj->delete();
		$roleObjs = Role::all();
		return redirect('admin/role_list')->with(array('roleObjs'=>$roleObjs));
	}
	public function roleList(Request $request){
		$roleObjs = Role::all();
		return View::make('laravelroles/rolespermissions/Roles/role_list')->with(array('roleObjs'=>$roleObjs));
	}
}
