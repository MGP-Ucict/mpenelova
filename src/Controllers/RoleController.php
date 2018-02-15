<?php

namespace Laravelroles\Rolespermissions\Controllers;

use Laravelroles\Rolespermissions\Models\Role;
use  Laravelroles\Rolespermissions\Models\Permission;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class RoleController extends Controller{

public function roleCreate(Request $request){
	$permissions = Permission::all();
	//dd($permissions);
	if($request->isMethod('post') && $request->input('submit')){
	
		$input = Input::get();
		$roleObj = new Role;
		$roleObj->name = $input['name'];
		$routes = $input['routes'];
		//$roleObj->is_active = (isset($input['is_active']))?$input['is_active']:0;
		$roleObj->save();
		foreach($routes as $key=>$value){
			$rr = Permission::find($value);
			
			$roleObj->routes()->attach($rr);
		
		}
		
		
	
	}
	
	 return View::make('laravelroles/rolespermissions/role_create')->with(array('permissions'=>$permissions));

}


public function roleUpdate(Request $request, $roleId){
	$roleObj = Role::find($roleId);
	$routes0 = Role::find($roleId)->routes()->get();
	
	$routes = Permission::all();
	if($request->isMethod('post') && $request->input('submit')){
	
		$input = Input::get();
		
		$roleObj->name = $input['name'];
		$roles = $input['routes'];
		//$roleObj->is_active = (isset($input['is_active']))?true:false;
		$roleObj->save();
		foreach($routes0 as $key=>$value){
			$rr = Permission::find($value);
			
			$roleObj->routes()->detach($rr);
		
		}
		foreach($routes as $key=>$value){
			$rr = Permission::find($value);
			
			$roleObj->routes()->attach($rr);
		
		}
		
	
	}
	$countPermissions = count($routes0);
	$data = array(
	'roleId'=>$roleId,
	 'roleObj'=>$roleObj,
	 'routes'=>$routes,
	 'permissions'=>$routes0,
	'cnt'=>$countPermissions,
	
	);
	 return View::make('laravelroles/rolespermissions/role_update')->with($data);

}
public function roleDelete(Request $request, $roleId){
	$roleObj = Role::find($roleId);
	
	if($request->isMethod('get')){
	//dd('vvcd');
		
		
		$roleObj->delete();
		
	
	}
	$roleObjs = Role::all();
	 return View::make('laravelroles/rolespermissions/role_list')->with(array('roleObjs'=>$roleObjs));

}
public function roleList(Request $request){
	$roleObjs = Role::all();
	
	
	 return View::make('laravelroles/rolespermissions/role_list')->with(array('roleObjs'=>$roleObjs));

}

}
