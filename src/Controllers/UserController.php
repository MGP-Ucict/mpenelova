<?php
namespace Laravelroles\Rolespermissions\Controllers;

use Laravelroles\Rolespermissions\Models\Role;
use App\User;
use Illuminate\Http\Request;
use View;
use Laravelroles\Rolespermissions\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller{
	
	public function create(Request $request)
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
		
		return $this->index();
	}
	
	public function edit(Request $request, $id)
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
		$user = $user->update($validated);
		$user->roles()->sync($roles);
		
		return $this->index();
	}
	
	public function destroy($id)
	{
		$user = User::find($id);
		$user->roles()->detach();
		$user->delete();
		return $this->index();
	}
	public function index()
	{
		$users = User::all();
		$data = compact(['users']);
		return View::make('rolespermissions/users/index')->with($data);
	}
}
