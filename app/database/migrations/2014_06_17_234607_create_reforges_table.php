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
		Schema::table('auctions', function($table) 
		{
			$table->dropForeign('auctions_reforge_id_foreign');

			$table->dropColumn('reforge_level');
		});
		Schema::dropIfExists('reforges');
	}

}
