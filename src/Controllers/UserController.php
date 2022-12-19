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

		return View::make('rolespermissions/users/create')->with(['roles' => $roles]);	
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
		return View::make('rolespermissions/users/edit')->with([
			'user' 			=> User::find($id), 
			'roles' 		=> Role::all(), 
			'checkedRoles' 	=> $user->roles()->allRelatedIds()->toArray()
		]);
	}

	public function update(UserRequest $request, User $user)
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
		if (!isset($validated['is_active'])){
			$validated = array_merge(['is_active' => false], $validated);
		}
		$user->update($validated);
		$user->roles()->sync($roles);
		
		return redirect()->route('users.index');
	}
	
	public function destroy(User $user)
	{
		$user->roles()->detach();
		$user->delete();
		return redirect()->route('users.index');
	}
	
	public function index()
	{
		return View::make('rolespermissions/users/index')->with([
			'users' => User::all()
		]);
	}
}
