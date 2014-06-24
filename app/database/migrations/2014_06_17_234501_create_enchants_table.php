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

			$table->string('name',128); //Name of enchant
			$table->smallInteger('rank')->unsigned(); //What rank is the scroll do direct HEX conversion, A = 10, B = 11, C = 12, etc.
			$table->tinyInteger('type')->unsigned(); //1 is prefix, 2 is suffix
			$table->boolean('personalized'); // Can it be traded
			$table->string('effects', 2048); //What does it do
			$table->string('enchantsonto', 256); //What can we enchant it on

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
		Schema::table('auctions', function($table)
		{
			$table->dropForeign('auctions_prefix_enchant_id_foreign');
			$table->dropForeign('auctions_suffix_enchant_id_foreign');
		});
		Schema::dropIfExists('enchants');
	}

}
