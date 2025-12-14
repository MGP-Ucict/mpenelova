<?php
namespace Laravelroles\Rolespermissions\Controllers;

use Laravelroles\Rolespermissions\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Laravelroles\Rolespermissions\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller{
	
	public function create(): view
	{	
		$roles = Role::all();

		return view('rolespermissions.users.create', ['roles' => $roles]);	
	}

	public function store(UserRequest $request): view|RedirectResponse
	{
		if (isset($request->validator) && $request->validator->fails()) {
	        $errors = $request->validator->errors()->messages();
	        redirect()->back()->withInput()->withErrors($errors);
	    }
		$validated = $request->validated();
		$roles = $validated['roles'];
		unset($validated['roles']);
		//if (isset($validated['password'])){
			$password = 123;//$validated['password'];
			unset($validated['password']);
			unset($validated['password_confirmation']);
			$encryptedPassword = bcrypt($password);
			$validated = array_merge(['password' => $encryptedPassword], $validated);
		//}
		$user = User::create($validated);
		$user->roles()->attach($roles);
		$request->session()->flash('status', 'Данните бяха запазени успешно!');
		return redirect()->route('users.index');
	}
	
	public function edit(User $user): view
	{	
		return view('rolespermissions.users.edit', [
			'user' 			=> $user, 
			'roles' 		=> Role::all(), 
			'checkedRoles' 	=> $user->roles()->allRelatedIds()->toArray()
		]);
	}

	public function update(UserRequest $request, User $user): view|RedirectResponse
	{
		if (isset($request->validator) && $request->validator->fails()) {
	        $errors = $request->validator->errors()->messages();
	        redirect()->back()->withInput()->withErrors($errors);
	    }
		$validated = $request->validated();
		$roles = $validated['roles'];
		unset($validated['roles']);
		// if (isset($validated['password'])){
		// 	$password = $validated['password'];
		// 	unset($validated['password']);
		// 	unset($validated['password_confirmation']);
		// 	$encryptedPassword = bcrypt($password);
		// 	$validated = array_merge(['password' => $encryptedPassword], $validated);
		// } else {
		// 	unset($validated['password']);
		// }

		if (!isset($validated['is_active'])){
			$validated = array_merge(['is_active' => false], $validated);
		}
		$user->update($validated);
		$user->roles()->sync($roles);
		$request->session()->flash('status', 'Данните бяха запазени успешно!');
		return redirect()->route('users.index');
	}
	
	public function destroy(User $user): RedirectResponse
	{
		$user->roles()->detach();
		$user->delete();
		return redirect()->route('users.index');
	}
	
	public function index(): view
	{
		return view('rolespermissions.users.index', [
			'users' => User::all()
		]);
	}
}
