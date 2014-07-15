<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyAuctionMethod extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('auctions', function($table) {
			$table->boolean('old_style')->default(true);
		});
		DB::statement('ALTER TABLE `auctions` MODIFY COLUMN `description` TEXT');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('auctions', function($table) {
			$table->dropColumn('old_style');
		});
	}

}
