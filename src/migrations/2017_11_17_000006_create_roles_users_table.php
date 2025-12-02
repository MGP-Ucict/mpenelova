<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('roles_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
			$table->foreign('role_id')->references('id')->on('roles');
			$table->foreignId('user_id')->nullable();	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('roles_users');
    }
};