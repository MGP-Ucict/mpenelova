<?php

namespace Laravelroles\Rolespermissions\Seeders;

use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
	
	public function run(): void {

		User::factory()->create([
			'name' => 'test',
			'email'=> 'test@test.bg',
			'password' => Hash::make('test'),
			'is_active' => true,
			'created_at' => now(),
			'updated_at' => now()
		]);
	}
}
