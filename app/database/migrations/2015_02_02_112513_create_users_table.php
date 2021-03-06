<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table){

			$table->increments('id');
			$table->string('username');
			$table->string('password');
			$table->enum('role', array('visitor', 'admin'))->default('visitor');
			$table->enum('status', array('online', 'offline'))->default('online');
			$table->string('remember_token', 100);
			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
