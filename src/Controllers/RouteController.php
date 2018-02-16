<?php

namespace Laravelroles\Rolespermissions\Controllers;

use Laravelroles\Rolespermissions\Models\Permission;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use View;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Laravelroles\Rolespermissions\Requests\RouteCreateRequest;
use Laravelroles\Rolespermissions\Requests\RouteUpdateRequest;

class RouteController extends Controller{

public function create(Request $request)
    {	
	return View::make('laravelroles/rolespermissions/route_create');

	
    }
public function store(RouteCreateRequest $request){
	//dd($request->isMethod('post'));
	if($request->isMethod('post') && $request->input('submit') ){
	

		$input = Input::get();
		$routeObj = new Permission;
		$routeObj->name = $input['name'];
		$routeObj->route = $input['route'];
		
		
		$routeObj->save();
		
	
	}
	
	 return View::make('laravelroles/rolespermissions/route_create');

}

public function edit(Request $request, $routeId)
    {	
	$routeObj = Permission::find($routeId);
	return View::make('laravelroles/rolespermissions/route_update')->with(array('routeId'=>$routeId,
	 'routeObj'=>$routeObj));
	
    }
public function update(RouteUpdateRequest $request, $routeId){
	$routeObj = Permission::find($routeId);
	//dd($routeObj);
	if($request->isMethod('post') && $request->input('submit')){
	//dd('vvcd');
		$input = Input::get();
		//$routeObj->id = $routeId;
		$routeObj->name = $input['name'];
		$routeObj->route = $input['route'];
		//$routeObj->is_active = (isset($input['is_active']))?true:false;
		
		$routeObj->save();
		
	
	}
	
	 return View::make('laravelroles/rolespermissions/route_update')->with(array('routeId'=>$routeId,
	 'routeObj'=>$routeObj));

}
public function routeDelete(Request $request, $routeId){
	$routeObj = Permission::find($routeId);
	
	if($request->isMethod('get')){
	//dd('vvcd');
		
		
		$routeObj->delete();
		
	
	}
	$routeObjs = Permission::all();
	 return View::make('laravelroles/rolespermissions/route_list')->with(array('routeObjs'=>$routeObjs));

}
public function routeList(Request $request){
	$routeObjs = Permission::all();
	
	
	 return View::make('laravelroles/rolespermissions/route_list')->with(array('routeObjs'=>$routeObjs));

}

}