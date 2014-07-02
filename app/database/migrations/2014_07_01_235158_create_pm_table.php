<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('pms');

		Schema::create('pms', function(Blueprint $table) 
		{
			$table->increments('id');

			$table->string('subject', 80);
			$table->string('content', 5000);

			$table->integer('sender_id')->unsigned();
			$table->foreign('sender_id')->references('id')->on('users');

			$table->integer('reciever_id')->unsigned();
			$table->foreign('reciever_id')->references('id')->on('users');

			$table->boolean('recieverdeleted')->default(false);
			$table->boolean('senderdeleted')->default(false);
			
			$table->boolean('sent')->default(false);

			$table->boolean('read')->default(false);

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
		Schema::dropIfExists('pms');
	}

}
