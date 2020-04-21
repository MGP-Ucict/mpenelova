<?php
namespace Laravelroles\Rolespermissions\Controllers;

use Laravelroles\Rolespermissions\Models\Role;
use App\User;
use Illuminate\Http\Request;
use View;
use Laravelroles\Rolespermissions\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller{
	
	public function create()
	{	
		$roles = Role::all();
		$data = compact(['roles']);
		return View::make('rolespermissions/users/create')->with($data);	
	}

	public function store(UserRequest $request)
	{
		$validated = $request->validated();
		$roles = $validated['roles'];
		unset($validated['roles']);
		if (isset($validated['password'])){
			$password = $validated['password'];
			unset($validated['password']);
			unset($validated['password_confirmation']);
			$encryptedPassword = bcrypt($password);
			$validated = array_merge(['password' => $encryptedPassword], $validated);
		}
		$user = User::create($validated);
		$user->roles()->attach($roles);
		
		return redirect()->route('users.index');
	}
	
	public function edit($id)
	{	
		$user = User::find($id);
		$checkedRoles = $user->roles()->allRelatedIds()->toArray();
		$roles = Role::all();
		$data = compact(['user', 'roles', 'checkedRoles']);
		return View::make('rolespermissions/users/edit')->with($data);
	}

	public function update(UserRequest $request, $id)
	{
		$user = User::find($id);
		$validated = $request->validated();
		$roles = $validated['roles'];
		unset($validated['roles']);
		if (isset($validated['password'])){
			$password = $validated['password'];
			unset($validated['password']);
			unset($validated['password_confirmation']);
			$encryptedPassword = bcrypt($password);
			$validated = array_merge(['password' => $encryptedPassword], $validated);
		}
		if (!isset($validated['is_active'])){
			$validated = array_merge(['is_active' => false], $validated);
		}
		$user->update($validated);
		$user->roles()->sync($roles);
		
		return redirect()->route('users.index');
	}
	
	public function destroy($id)
	{
		$user = User::find($id);
		$user->roles()->detach();
		$user->delete();
		return redirect()->route('users.index');
	}
	
	public function index()
	{
		$users = User::all();
		$data = compact(['users']);
		return View::make('rolespermissions/users/index')->with($data);
	}
}
