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
		Schema::dropIfExists('users');

		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('username',32);
			$table->string('email', 320);
			$table->string('password', 64);
			
			$table->string('remember_token', 100)->nullable();
			
			$table->string('activation_code', 60);
			$table->boolean('active')->default(false);

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
		Schema::dropIfExists('users');
	}

}
