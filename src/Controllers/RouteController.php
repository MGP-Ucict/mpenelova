<?php
namespace Laravelroles\Rolespermissions\Controllers;

use Laravelroles\Rolespermissions\Models\Permission;
use Illuminate\Http\Request;
use View;
use Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Laravelroles\Rolespermissions\Requests\RouteCreateRequest;
use Laravelroles\Rolespermissions\Requests\RouteUpdateRequest;

class RouteController extends Controller{

	public function create(Request $request)
	{	
		return View::make('laravelroles/rolespermissions/Routes/route_create');

		
	}
	public function store(RouteCreateRequest $request){

		if($request->isMethod('post') && $request->input('submit') ){
			$routeObj = new Permission;
			$routeObj->name = $request->get('name');
			$routeObj->method = $request->get('method');
			$routeObj->route = $request->get('route');
			$routeObj->save();
		}
		
		return View::make('laravelroles/rolespermissions/Routes/route_create');
	}

	public function edit(Request $request, $id)
	{	
		$routeObj = Permission::find($id);
		return View::make('laravelroles/rolespermissions/Routes/route_update')->with(array('routeId'=>$id,
		 'routeObj'=>$routeObj));
		
	}
	public function update(RouteUpdateRequest $request, $id)
	{
		$routeObj = Permission::find($id);
		if($request->isMethod('put') && $request->input('submit')){
			$routeObj->name = $request->get('name');
			$routeObj->method = $request->get('method');
			$routeObj->route = $request->get('route');
			$routeObj->save();
		}
		return View::make('laravelroles/rolespermissions/Routes/route_update')->with(array('routeId'=>$id,
		 'routeObj'=>$routeObj));

	}
	public function routeDelete(Request $request, $id){
		$routeObj = Permission::find($id);
		$routeObj->delete();
	
		$routeObjs = Permission::all();
		return View::make('laravelroles/rolespermissions/Routes/route_list')->with(array('routeObjs'=>$routeObjs));

	}
	public function routeList(Request $request){
		$routeObjs = Permission::all();
		return View::make('laravelroles/rolespermissions/Routes/route_list')->with(array('routeObjs'=>$routeObjs));
	}
}