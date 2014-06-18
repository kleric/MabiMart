<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnchantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('enchants'); #get rid of it if we already have the table

		Schema::create('enchants', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name',128);
			$table->smallInteger('rank');
			$table->string('effect', 1024);
			$table->string('onto', 256);
			$table->string('from', 256);

			$table->string('wikilink', 256)->nullable();
			$table->timestamps();
		});

		Schema::table('auctions', function($table)
		{
			$table->integer('prefix_enchant_id')->unsigned();
			$table->integer('suffix_enchant_id')->unsigned();

			$table->foreign('prefix_enchant_id')->references('id')->on('enchants')->unsigned();
			$table->foreign('suffix_enchant_id')->references('id')->on('enchants')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('enchants');
	}

}
