<?php
use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder{
	
	public function run(){

		DB::table('permissions')->insert(
			[
				'name' => 'user_list',
				'route'=> 'user_list',
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()

			]
		);
		DB::table('permissions')->insert(
			[
				'name' => 'user_create',
				'route'=> 'user_create',
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()

			]
		);
		DB::table('permissions')->insert(
			[
				'name' => 'user_update',
				'route'=> 'user_update',
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()

			]
		);
		DB::table('permissions')->insert(
			[
				'name' => 'user_delete',
				'route'=> 'user_delete',
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()

			]
		);
		DB::table('permissions')->insert(
			[
				'name' => 'role_create',
				'route'=> 'role_create',
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()

			]
		);
		DB::table('permissions')->insert(
			[
				'name' => 'role_update',
				'route'=> 'role_update',
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()

			]
		);
		DB::table('permissions')->insert(
			[
				'name' => 'role_delete',
				'route'=> 'role_delete',
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()

			]
		);
		DB::table('permissions')->insert(
			[
				'name' => 'route_create',
				'route'=> 'route_create',
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()

			]
		);
		DB::table('permissions')->insert(
			[
				'name' => 'route_update',
				'route'=> 'route_update',
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()

			]
		);
		DB::table('permissions')->insert(
			[
				'name' => 'route_list',
				'route'=> 'route_list',
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()

			]
		);
		DB::table('permissions')->insert(
			[
				'name' => 'route_delete',
				'route'=> 'route_delete',
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()

			]
		);
	}
}
