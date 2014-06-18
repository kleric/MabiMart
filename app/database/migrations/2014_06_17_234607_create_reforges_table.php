<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReforgesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name',64);

			$table->smallInteger('rank_one_cap')->unsigned();
			$table->smallInteger('rank_two_cap')->unsigned();
			$table->smallInteger('rank_three_cap')->unsigned();

			$table->string('effects', 128);
			$table->string('effect_per_level', 128);
			
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
		Schema::drop('reforges');
	}

}
