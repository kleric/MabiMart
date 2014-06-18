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
		Schema::dropIfExists('reforges');

		Schema::create('reforges', function(Blueprint $table)
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

		Schema::table('auctions', function($table)
		{
			$table->integer('reforge_id')->unsigned();
			$table->foreign('reforge_id')->references('id')->on('reforges');
			$table->smallInteger('reforge_level')->unsigned()->nullable();
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
