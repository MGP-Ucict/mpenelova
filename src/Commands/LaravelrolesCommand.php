<?php

namespace Laravelroles\Rolespermissions\Commands;

use Laravelroles\Rolespermissions\Seeders\RolesSeeder;
use Laravelroles\Rolespermissions\Seeders\RolesUserSeeder;
use Laravelroles\Rolespermissions\Seeders\PermissionsSeeder;
use Illuminate\Console\Command;

class LaravelrolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravelroles:seeder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds Laravelroles Data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		//$this->call('db:seed', ['--class'=>'Laravelroles\Rolespermissions\Seeders\UsersSeeder']);
		$this->call('db:seed', ['--class'=>'Laravelroles\Rolespermissions\Seeders\RolesSeeder']);
		$this->call('db:seed', ['--class'=>'Laravelroles\Rolespermissions\Seeders\RolesUserSeeder']);
		$this->call('db:seed', ['--class'=>'Laravelroles\Rolespermissions\Seeders\PermissionsSeeder']);
    }
}
