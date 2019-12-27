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
		if($request->isMethod('post') && $request->get('submit')){
			$userObj = new User;
			$userObj->username = $request->get('username');
			$userObj->name = $request->get('name');
			$userObj->email = $request->get('email');
			if ($request->get('password')){
				$userObj->password = bcrypt($request->get('password'));
			}
			$roles = $request->get('roles');
			$userObj->is_active = $request->get('is_active');
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
		$rolesOld = User::find($userId)->roles()->get();
		$roles = Role::all();
		
		$data = array(
			'userId'=>$userId,
			'userObj'=>$userObj,
			'roles'=>$roles,
			'rolesOld'=>$rolesOld,		
		);
		return View::make('laravelroles/rolespermissions/Users/user_update')->with($data);
	}

	public function update(UserRequest $request, $id)
	{
		$userObj = User::find($id);
		$rolesOld = User::find($id)->roles()->get();
		
		$roles = Role::all();
		if($request->isMethod('put') && $request->get('submit')){
			$userObj->username = $request->get('username');
			$userObj->name = $request->get('name');
			$userObj->email = $request->get('email');
			if ($request->get('password')){
				$userObj->password = bcrypt($request->get('password'));
			}
			$rolesNew = $request->get('roles');
			$userObj->is_active = $request->get('is_active');
			foreach($rolesOld as $key=>$value){
				$rr = Role::find($value);
				$userObj->roles()->detach($rr);
			}
			foreach($rolesNew as $key=>$value){
				$rr = Role::find($value);	
				$userObj->roles()->attach($rr);
			}
			
			$userObj->save();
		}
		
		$data = array(
			'userId'=>$id,
			'userObj'=>$userObj,
			'roles'=>$roles,
			'rolesOld'=>$rolesOld,
		);
		return View::make('laravelroles/rolespermissions/Users/user_update')->with($data);
	}
	
	public function userDelete(Request $request, $id)
	{
		$userObj = User::find($id);
		$userObj->delete();
		$userObjs = User::all();
		return redirect('admin/user_list')->with(array('userObjs'=>$userObjs));
	}
	public function userList(Request $request){
		$userObjs = User::all();
		return View::make('laravelroles/rolespermissions/Users/user_list')->with(array('userObjs'=>$userObjs));
	}
}
