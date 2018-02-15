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

class RouteController extends Controller{

public function routeCreate(Request $request){
	//dd($request->isMethod('post'));
	if($request->isMethod('get') && $request->input('submit') ){
	
// 		$validator = Validator::make($request->all(), [
//             'route' => 
// 			  array(
//             'required',
//              'regex:[a-z]'
//         ),
//             'name' => 'required',
//         ]);
// //dd("xxzz");
//         if ($validator->fails()) {
// 		//dd("bzxzc");
//             return redirect()->route('route_create')
//                         ->withErrors($validator)
//                         ->withInput();
//         }
		$input = Input::get();
		$routeObj = new Permission;
		$routeObj->name = $input['name'];
		$routeObj->route = $input['route'];
		///$routeObj->is_active = (isset($input['is_active']))?true:false;
		
		$routeObj->save();
		
	
	}
	
	 return View::make('laravelroles/rolespermissions/route_create');

}


public function routeUpdate(Request $request, $routeId){
	$routeObj = Permission::find($routeId);
	//dd($routeObj);
	if($request->isMethod('get') && $request->input('submit')){
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
	 return View::make('route_list')->with(array('routeObjs'=>$routeObjs));

}
public function routeList(Request $request){
	$routeObjs = Permission::all();
	
	
	 return View::make('laravelroles/rolespermissions/route_list')->with(array('routeObjs'=>$routeObjs));

}

}