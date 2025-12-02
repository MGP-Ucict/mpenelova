<?php
namespace Laravelroles\Rolespermissions\Seeders;

use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Seeder;

class RolesUserSeeder extends Seeder{
	
	public function run(): void {

		DB::table('roles_users')->insert(
			[
				'role_id' => 1,
				'user_id' => 1,
				
			]
		);
	}
}
