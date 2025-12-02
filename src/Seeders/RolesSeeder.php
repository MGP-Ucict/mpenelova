<?php
namespace Laravelroles\Rolespermissions\Seeders;

use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder{
	
	public function run(): void {

		DB::table('roles')->insert(
			[
				'name' => 'admin',
				'is_active' => true,
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()

			]
		);
	}
}
