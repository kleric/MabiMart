<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsortingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('sorteditems');

		Schema::create('sorteditems', function(Blueprint $table) 
		{
			$table->increments('id');

			$table->integer('sorteditem_id')->unsigned();
			//$table->foreign('sorteditem_id')->references('id')->on('items');

			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categories');

			$table->string('sorteditem_type', 100);
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
		Schema::dropIfExists('sorteditems');
	}

}
