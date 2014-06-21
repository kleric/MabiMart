<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('categories');

		Schema::create('categories', function(Blueprint $table) 
		{
			$table->increments('id');

			$table->string('name', 64);
			$table->string('description', 255);

			$table->string('urlname', 64);

			$table->integer('thumbnail_item_id')->unsigned();
			$table->foreign('thumbnail_item_id')->references('id')->on('items');

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
		Schema::dropIfExists('categories');
	}

}
