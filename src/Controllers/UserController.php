<?php
namespace Laravelroles\Rolespermissions\Controllers;

use Laravelroles\Rolespermissions\Models\Role;
use App\User;
use Illuminate\Http\Request;
use View;
use Laravelroles\Rolespermissions\Requests\UserRequest;
use Laravelroles\Rolespermissions\Requests\UserUpdateRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller{
	
	public function create(Request $request)
	{	
		$role = Role::all();
		return View::make('laravelroles/rolespermissions/Users/user_create')->with(array('roles'=>$role));	
	}

	public function store(UserRequest $request){
		$role = Role::all();
		if($request->isMethod('post') && $request->input('submit')){
		
			$input = Input::get();
			$userObj = new User;
			$userObj->name = $request->get('name');
			$userObj->email = $request->get('email');
			$userObj->password = bcrypt($request->get('password'));
			$roles = $request->get('roles');
			$userObj->is_active = ($request->has('is_active'))? $request->get('is_active'): 0;
			$userObj->save();
			foreach($roles as $key=>$value){
				$rr = Role::find($value);
				$userObj->roles()->attach($rr);
			}
		}
		return View::make('laravelroles/rolespermissions/Users/user_create')->with(array('roles'=>$role));
	}
	public function edit(Request $request, $userId)
	{	
		$userObj = User::find($userId);
		$roles0 = User::find($userId)->roles()->get();
		$roles = Role::all();
		
		$data = array(
			'userId'=>$userId,
			'userObj'=>$userObj,
			'roles'=>$roles,
			'roles0'=>$roles0,		
		);
		return View::make('laravelroles/rolespermissions/Users/user_update')->with($data);
	}

	public function update(UserUpdateRequest $request, $userId)
	{
		$userObj = User::find($userId);
		$roles0 = User::find($userId)->roles()->get();
		
		$roles = Role::all();
		if($request->isMethod('put') && $request->input('submit')){
			$userObj->name = $request->get('name');
			$userObj->email = $request->get('email');
			$userObj->password = bcrypt($request->get('password'));
			$roles = $request->get('roles');
			$userObj->is_active = ($request->has('is_active'))? $request->get('is_active'): 0;
			foreach($roles0 as $key=>$value){
				$rr = Role::find($value);
				$userObj->roles()->detach($rr);
			}
			foreach($roles1 as $key=>$value){
				$rr = Role::find($value);	
				$userObj->roles()->attach($rr);
			}
			
			$userObj->save();
		}
		
		$data = array(
			'userId'=>$userId,
			'userObj'=>$userObj,
			'roles'=>$roles,
			'roles0'=>$roles0,
		);
		return View::make('laravelroles/rolespermissions/Users/user_update')->with($data);
	}
	
	public function userDelete(Request $request, $userId)
	{
		$userObj = User::find($userId);
		if($request->isMethod('get')){
			$userObj->delete();
		}
		$userObjs = User::all();
		return View::make('laravelroles/rolespermissions/Users/user_list')->with(array('userObjs'=>$userObjs));
	}
	public function userList(Request $request){
		$userObjs = User::all();
		return View::make('laravelroles/rolespermissions/Users/user_list')->with(array('userObjs'=>$userObjs));
	}
}
