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
			$table->string('description', 256);

			$table->timestamps();
		});

		Schema::table('auctions', function($table)
		{
			$table->integer('reforgeone_id')->unsigned()->nullable();
			$table->foreign('reforgeone_id')->references('id')->on('reforges');

			$table->integer('reforgetwo_id')->unsigned()->nullable();
			$table->foreign('reforgetwo_id')->references('id')->on('reforges');

			$table->integer('reforgethree_id')->unsigned()->nullable();
			$table->foreign('reforgethree_id')->references('id')->on('reforges');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('auctions', function($table) 
		{
			$table->dropForeign('auctions_reforgeone_id_foreign');
			$table->dropForeign('auctions_reforgetwo_id_foreign');
			$table->dropForeign('auctions_reforgethree_id_foreign');
		});
		Schema::dropIfExists('reforges');
	}

}
